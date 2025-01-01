<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Chat;
use App\Models\User;
use App\Models\User;
use App\Models\User;

class ChatExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$first_member_id=null,$second_member_id=null,$created_by_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Chat::class,
			[
				'title'=>'title',
				'first_member_id'=>'first_member_id', /* relation 1-M */
				'second_member_id'=>'second_member_id', /* relation 1-M */
				'created_by_id'=>'created_by_id', /* relation 1-M */
			],[
				__('caption.cms.fields.chat.title')=>'title',
				__('caption.cms.fields.chat.first_member_id')=>'first_member_id', /* relation 1-M */
				__('caption.cms.fields.chat.second_member_id')=>'second_member_id', /* relation 1-M */
				__('caption.cms.fields.chat.created_by_id')=>'created_by_id', /* relation 1-M */
			],[
				'title'=>'required',
				'first_member_id'=>'required', /* relation 1-M */
				'second_member_id'=>'required', /* relation 1-M */
				'created_by_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'title'	=>__('caption.cms.fields.chat.title')
'first_member_id'	=>__('caption.cms.fields.chat.first_member_id')
'second_member_id'	=>__('caption.cms.fields.chat.second_member_id')
'created_by_id'	=>__('caption.cms.fields.chat.created_by_id')
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