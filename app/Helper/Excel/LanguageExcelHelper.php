<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Language;
use App\Models\Freelancer;

class LanguageExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$freelancer_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Language::class,
			[
				'language'=>'language',
				'category'=>'category',
				'general_score'=>'general_score',
				'speaking_score'=>'speaking_score',
				'writing_score'=>'writing_score',
				'listening_score'=>'listening_score',
				'show_details'=>'show_details',
				'note'=>'note',
				'freelancer_id'=>'freelancer_id', /* relation 1-M */
			],[
				__('caption.cms.fields.language.language')=>'language',
				__('caption.cms.fields.language.category')=>'category',
				__('caption.cms.fields.language.general_score')=>'general_score',
				__('caption.cms.fields.language.speaking_score')=>'speaking_score',
				__('caption.cms.fields.language.writing_score')=>'writing_score',
				__('caption.cms.fields.language.listening_score')=>'listening_score',
				__('caption.cms.fields.language.show_details')=>'show_details',
				__('caption.cms.fields.language.note')=>'note',
				__('caption.cms.fields.language.freelancer_id')=>'freelancer_id', /* relation 1-M */
			],[
				'language'=>'required',
				'category'=>'required',
				'general_score'=>'required',
				'speaking_score'=>'required',
				'writing_score'=>'required',
				'listening_score'=>'required',
				'show_details'=>'required',
				'note'=>'required',
				'freelancer_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'language'	=>__('caption.cms.fields.language.language')
'category'	=>__('caption.cms.fields.language.category')
'general_score'	=>__('caption.cms.fields.language.general_score')
'speaking_score'	=>__('caption.cms.fields.language.speaking_score')
'writing_score'	=>__('caption.cms.fields.language.writing_score')
'listening_score'	=>__('caption.cms.fields.language.listening_score')
'show_details'	=>__('caption.cms.fields.language.show_details')
'note'	=>__('caption.cms.fields.language.note')
'freelancer_id'	=>__('caption.cms.fields.language.freelancer_id')
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