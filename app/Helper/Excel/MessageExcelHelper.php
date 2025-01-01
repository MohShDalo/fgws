<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Message;
use App\Models\User;
use App\Models\Chat;

class MessageExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$created_by_id=null,$chat_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Message::class,
			[
				'content'=>'content',
				'created_by_id'=>'created_by_id', /* relation 1-M */
				'chat_id'=>'chat_id', /* relation 1-M */
			],[
				__('caption.cms.fields.message.content')=>'content',
				__('caption.cms.fields.message.created_by_id')=>'created_by_id', /* relation 1-M */
				__('caption.cms.fields.message.chat_id')=>'chat_id', /* relation 1-M */
			],[
				'content'=>'required',
				'created_by_id'=>'required', /* relation 1-M */
				'chat_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'content'	=>__('caption.cms.fields.message.content')
'created_by_id'	=>__('caption.cms.fields.message.created_by_id')
'chat_id'	=>__('caption.cms.fields.message.chat_id')
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