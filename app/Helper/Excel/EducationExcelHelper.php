<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Education;
use App\Models\Freelancer;

class EducationExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$freelancer_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Education::class,
			[
				'title'=>'title',
				'score'=>'score',
				'show_score'=>'show_score',
				'start_date'=>'start_date',
				'end_date'=>'end_date',
				'organizer'=>'organizer',
				'category'=>'category',
				'special_rank'=>'special_rank',
				'note'=>'note',
				'freelancer_id'=>'freelancer_id', /* relation 1-M */
			],[
				__('caption.cms.fields.education.title')=>'title',
				__('caption.cms.fields.education.score')=>'score',
				__('caption.cms.fields.education.show_score')=>'show_score',
				__('caption.cms.fields.education.start_date')=>'start_date',
				__('caption.cms.fields.education.end_date')=>'end_date',
				__('caption.cms.fields.education.organizer')=>'organizer',
				__('caption.cms.fields.education.category')=>'category',
				__('caption.cms.fields.education.special_rank')=>'special_rank',
				__('caption.cms.fields.education.note')=>'note',
				__('caption.cms.fields.education.freelancer_id')=>'freelancer_id', /* relation 1-M */
			],[
				'title'=>'required',
				'score'=>'required',
				'show_score'=>'required',
				'start_date'=>'required',
				'end_date'=>'required',
				'organizer'=>'required',
				'category'=>'required',
				'special_rank'=>'required',
				'note'=>'required',
				'freelancer_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'title'	=>__('caption.cms.fields.education.title')
'score'	=>__('caption.cms.fields.education.score')
'show_score'	=>__('caption.cms.fields.education.show_score')
'start_date'	=>__('caption.cms.fields.education.start_date')
'end_date'	=>__('caption.cms.fields.education.end_date')
'organizer'	=>__('caption.cms.fields.education.organizer')
'category'	=>__('caption.cms.fields.education.category')
'special_rank'	=>__('caption.cms.fields.education.special_rank')
'note'	=>__('caption.cms.fields.education.note')
'freelancer_id'	=>__('caption.cms.fields.education.freelancer_id')
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