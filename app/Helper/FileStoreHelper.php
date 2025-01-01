<?php

namespace App\Helper;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use File;
class FileStoreHelper
{
	public $disk ;

	public function __construct($disk=null){
		$this->disk=$disk??config('filesystems.default');
	}

	public function read($filePath){
		if (Storage::disk($this->disk)->exists($filePath)) 
			return Storage::disk($this->disk)->get($filePath);
		return null;
	}
	
	public function write($filePath,$text){
		$this->validateParentDir($filePath);
		Storage::disk($this->disk)->put($filePath, $text);
	}
	
	public function validateParentDir($filePath){
		$dirs = explode("/",$filePath);
		unset($dirs[count($dirs)-1]);
		$dir="";
		foreach($dirs as $temp)
			$dir .= "$temp/";
		if (!Storage::disk($this->disk)->exists($dir)) 
			Storage::disk($this->disk)->makeDirectory($dir);
	}

	public function mkdir($path){
		File::makeDirectory(Storage::disk($this->disk)->path($path), 0777, false, true);
	}

	public function createZipArchive(string $sourceDirPath, string $resultZipFilePath)
	{
		if(!Storage::disk($this->disk)->exists($path)){
			throw new \RuntimeException('Cannot Find ' . $sourceDirPath);
		}
		$zip = new ZipArchive();
	
		if ($zip->open($resultZipFilePath, ZipArchive::CREATE) !== true) {
			throw new \RuntimeException('Cannot open ' . $resultZipFilePath);
		}
	
		$iterator = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator(
				$sourceDirPath,
				\FilesystemIterator::FOLLOW_SYMLINKS
			),
			\RecursiveIteratorIterator::SELF_FIRST
		);
	
		while ($iterator->valid()) {
			if (!$iterator->isDot()) {
				$filePath = $iterator->getPathName();
				$relativePath = substr($filePath, strlen($sourceDirPath) + 1);
	
				if (!$iterator->isDir()) {
					$zip->addFile($filePath, $relativePath);
				} else {
					if ($relativePath !== false) {
						$zip->addEmptyDir($relativePath);
					}
				}
			}
			$iterator->next();
		}
		return $resultZipFilePath; 
	}
	
}
