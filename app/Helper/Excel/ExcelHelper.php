<?php

namespace App\Helper\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Illuminate\Support\Facades\Storage;
use App\Helper\FileStoreHelper;
class ExcelHelper
{
	public const ERROR_MESSAGE_INDEX = "error_message";
	public const CLASSES = array(
		"user"=>UserExcelHelper::class,
		"freelancer"=>FreelancerExcelHelper::class,
		"manger"=>MangerExcelHelper::class,
		"skill"=>SkillExcelHelper::class,
		"certificate"=>CertificateExcelHelper::class,
		"education"=>EducationExcelHelper::class,
		"language"=>LanguageExcelHelper::class,
		"experience"=>ExperienceExcelHelper::class,
		"portfolio"=>PortfolioExcelHelper::class,
		"reference"=>ReferenceExcelHelper::class,
		"post"=>PostExcelHelper::class,
		"job"=>JobExcelHelper::class,
		"comment"=>CommentExcelHelper::class,
		"offer"=>OfferExcelHelper::class,
		"reaction"=>ReactionExcelHelper::class,
		"chat"=>ChatExcelHelper::class,
		"message"=>MessageExcelHelper::class,
	);

	public static function getColName($index){
		$mod = $index % 26;
		$div = (int)($index / 26);
		if($div == 0){
			return chr($mod+65);
		}else{
			return chr($div+65-1).chr($mod+65);
		}
	}

	public $file_path;
	public $model;
	public $is_exist;

	protected $data;
	protected $success_data;
	protected $failed_data;

	protected $model_headers_map;	   // ["Import Excel Header"=>"model Attribute"]
	protected $import_excel_headers;
	protected $export_excel_headers_map;// ["Export Excel Header"=>"model Attribute"]
	
	protected $rules;				   // ["import_excel_heder"=>"rule"]
	protected $init_values;			 // ["import_excel_heder"=>"init value"]

	public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		$this->file_path = $file_path;
		$this->model = $model;
		$this->is_exist = Storage::exists($this->file_path);

		$this->model_headers_map = $model_headers_map;
		$this->import_excel_headers = array_keys($model_headers_map);
		$this->export_excel_headers_map = $export_excel_headers_map;

		$this->rules = $rules;
		$this->init_values = $init_values;

		if($this->is_exist){
			$this->readFile();
		}
	}

	public function getImportExcelHeaders(){
		return $this->import_excel_headers;
	}

	public function getRules(){
		return $this->rules;
	}

	public function getInitValues(){
		return $this->init_values;
	}
	
	public function getModelHeadersMap(){
		return $this->model_headers_map;
	}
	
	public function getExportExcelHeadersMap(){
		return $this->export_excel_headers_map;
	}

	public function getData(){
		return ["success"=>$this->success_data,"failed"=>$this->failed_data];
	}

	public function readFile(){
		$full_path = Storage::path($this->file_path);
		$spreadsheet = IOFactory::load($full_path);
		if(!$spreadsheet)
			return ;
		$worksheet = $spreadsheet->getActiveSheet();
		$rowCount = $worksheet->getHighestRow();
		$colCount = Coordinate::columnIndexFromString($worksheet->getHighestColumn());
		
		//readed header from file
		$current_import_excel_headers = array();
		for($i=1; $i<= $colCount ; $i++){
			$excel_col_index = ExcelHelper::getColName($i-1);
			$current_import_excel_headers[] = $worksheet->getCell($excel_col_index.'1')->getValue();
		}

		// $array_intersect = array_intersect($excel_col_letters,$this->import_excel_headers);   // return array containing all the values of the import_excel_headers that are present in the headers
		$array_diff = array_diff($current_import_excel_headers,$this->import_excel_headers);	  // return array containing all the values of the import_excel_headers that are not present in the headers
		if(count($array_diff)>0){
			throw new \Exception('Headers not matched !');
		}

		$this->success_data = array();
		$this->failed_data = array();
		$this->data = array();
		
		for ($row = 2; $row <= $rowCount; ++$row) {
			$temp = array();
			foreach($current_import_excel_headers as $index=>$key){
				$excel_col_index = ExcelHelper::getColName($index);
				$temp[$key] = $worksheet->getCell($excel_col_index.$row)->getValue();
			}
			$this->data[] = $temp;
			$error_message = $this->checkRules($temp);
			if($error_message){   //return errors mesage
				$temp[ExcelHelper::ERROR_MESSAGE_INDEX] = $error_message;
				$this->failed_data[] = $temp;
			}else{
				$this->success_data[] = $temp;
			}
		}
		\Log::error("Imported data which has errors: ",[$this->failed_data]);
	}	

	public function checkRules($record){
		$finalMessage = "";
		foreach($this->import_excel_headers as $key){
			$message = null;
			$rule = $this->rules[$key]??'nullable';
			$value = $record[$key]??($this->init_values[$key]??null);
			if($rule != 'nullable'){
				if($rule == 'required' && !$value){
					$message = __('validation.required',["attribute"=>$key]);
				}
				// $format = "/^20\d{2}-[01]?\d-([012]?\d|30|31)$/"; // Expected date format (YYYY-MM-DD)
				// if(!$message && $rule == 'date' && !preg_match($format, $value)){
				// 	$message = __('validation.date_format',["attribute"=>$key,"format"=>"2024-01-31"]);
				// }
			}
			if($message){
				$finalMessage .= "| $message";
			}
		}
		return $finalMessage?$finalMessage:null;
	}

	public function toModelArray($success=true){
		if(!$this->is_exist){
			return array();
		}
		$temp = array();
		$data =$success?$this->success_data:$this->failed_data;
		foreach($data as $record){
			$temp[] = $this->elementToModelArray($record);
		}
		return $temp;
	}

	public function elementToExcelArray($model){
		$execlArray = array();
		$map = $this->export_excel_headers_map??$this->model_headers_map;
		foreach($map as $excel_key=>$model_key){
			$execlArray[$excel_key] = $model->$model_key??'-';
		}
		return $execlArray;
	}

	public function elementToModelArray($record,$plain_error=false){
		$modelArray = array();
		if(isset($record[ExcelHelper::ERROR_MESSAGE_INDEX])){
			if($plain_error){
				$modelArray[ExcelHelper::ERROR_MESSAGE_INDEX] = $record[ExcelHelper::ERROR_MESSAGE_INDEX];
			}else{
				$modelArray[ExcelHelper::ERROR_MESSAGE_INDEX] = "<span class='text-danger'>(".$record[ExcelHelper::ERROR_MESSAGE_INDEX].")</span>";
			}
		}
		foreach($this->model_headers_map as $excel_key=>$model_key){
			$modelArray[$model_key] = $record[$excel_key]??($this->init_values[$excel_key]??null);
			if(isset($this->rules[$excel_key]) && $this->rules[$excel_key] == 'date'){
				$modelArray[$model_key] = (new \Carbon\Carbon('1900-01-01'))->add('P'.($modelArray[$model_key]-2).'D');
				// $modelArray[$model_key] = new \Carbon\Carbon($modelArray[$model_key]);
			}
			if(!$modelArray[$model_key]){
				unset($modelArray[$model_key]);
			}
		}
		return $modelArray;
	}

	public function runAction(){
		$array1 = $this->runActionsOnSuccessRecord();
		$array2 = $this->runActionsOnFaildRecord();
		return $array2;
	}	

	public function runActionsOnFaildRecord(){
		return $this->toModelArray(false);
	}

	public function runActionsOnSuccessRecord(){
		return $this->toModelArray(true);
		foreach($data as $record){
			$this->model::create($record);
		}
		return [];
	}

	public function exportEdits($contains_failed=false){
		if(!$this->is_exist){
			return null;
		}
		$data = array();
		$data = array_merge($data, $this->success_data);
		if($contains_failed)
			$data = array_merge($data, $this->failed_data);
		return $this->storeData($data);
	}	

	public function editAt($value, $row, $col, $success=true){
		if($success){
			$success_data[$row][$col] = $value;
		}else{
			$failed_data[$row][$col] = $value;
		}
	}	

	public function storeDataFromModel($filters=null)
	{
		$init_value = $this->getInitValues();
		$first_key = $this->model_headers_map[$this->import_excel_headers[0]];
		$modelDate = $this->model::where($first_key,'<>',null);
		if(!$filters && $init_value){
			$filters = $init_value;
		}
		if($filters){
			foreach($filters as $modelKey=>$value){
				$modelDate = $modelDate->where($modelKey,$value);
			}
		}
		$modelDate = $modelDate->get();
		$excel_data = array();
		foreach($modelDate as $record){
			$excel_data[] = $this->elementToExcelArray($record);
		}
		return $this->storeData($excel_data);
	}

	public function storeData($data)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$i=0;
		if(count($data)==0)
			throw new \Exception("No data to save");
		foreach($data[0] as $key=>$value){
			$sheet->setCellValue($this->getColName($i++).'1',$key);
		}
		$r=2;
		foreach($data as $record){
			$i=0;
			foreach($record as $value){
				$sheet->setCellValue($this->getColName($i++).($r),$value);
			}
			$r++;
		}
		$writer = new Xlsx($spreadsheet);
		if(!$this->file_path){
			$this->file_path = "files/xlsx/".now()->format('Y-m-d')."/temp ".now()->format('h-i').".xlsx";
		}
		(new FileStoreHelper())->validateParentDir($this->file_path);
		$writer->save($this->file_path);
		return $this->file_path;
	}
}

?>