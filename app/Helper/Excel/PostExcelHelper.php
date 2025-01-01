<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Freelancer;

class PostExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$owner_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Post::class,
			[
				'content'=>'content',
				'image'=>'image',
				'owner_id'=>'owner_id', /* relation 1-M */
			],[
				__('caption.cms.fields.post.content')=>'content',
				__('caption.cms.fields.post.image')=>'image',
				__('caption.cms.fields.post.owner_id')=>'owner_id', /* relation 1-M */
			],[
				'content'=>'required',
				'image'=>'required',
				'owner_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'content'	=>__('caption.cms.fields.post.content')
'image'	=>__('caption.cms.fields.post.image')
'owner_id'	=>__('caption.cms.fields.post.owner_id')
	*/

	public function checkRules($record){
		$finalMessage = parent::checkRules($record);
		if(false){	  //check other rules
			$finalMessage .= '| '.__('validation.required',['attribute'=>'']);
		}
		return $finalMessage;
	}
}

?>