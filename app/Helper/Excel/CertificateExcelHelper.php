<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Certificate;
use App\Models\Freelancer;

class CertificateExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$freelancer_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Certificate::class,
			[
				'course_title'=>'course_title',
				'hours'=>'hours',
				'start_date'=>'start_date',
				'end_date'=>'end_date',
				'organizer'=>'organizer',
				'category'=>'category',
				'file'=>'file',
				'show'=>'show',
				'note'=>'note',
				'freelancer_id'=>'freelancer_id', /* relation 1-M */
			],[
				__('caption.cms.fields.certificate.course_title')=>'course_title',
				__('caption.cms.fields.certificate.hours')=>'hours',
				__('caption.cms.fields.certificate.start_date')=>'start_date',
				__('caption.cms.fields.certificate.end_date')=>'end_date',
				__('caption.cms.fields.certificate.organizer')=>'organizer',
				__('caption.cms.fields.certificate.category')=>'category',
				__('caption.cms.fields.certificate.file')=>'file',
				__('caption.cms.fields.certificate.show')=>'show',
				__('caption.cms.fields.certificate.note')=>'note',
				__('caption.cms.fields.certificate.freelancer_id')=>'freelancer_id', /* relation 1-M */
			],[
				'course_title'=>'required',
				'hours'=>'required',
				'start_date'=>'required',
				'end_date'=>'required',
				'organizer'=>'required',
				'category'=>'required',
				'file'=>'required',
				'show'=>'required',
				'note'=>'required',
				'freelancer_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'course_title'	=>__('caption.cms.fields.certificate.course_title')
'hours'	=>__('caption.cms.fields.certificate.hours')
'start_date'	=>__('caption.cms.fields.certificate.start_date')
'end_date'	=>__('caption.cms.fields.certificate.end_date')
'organizer'	=>__('caption.cms.fields.certificate.organizer')
'category'	=>__('caption.cms.fields.certificate.category')
'file'	=>__('caption.cms.fields.certificate.file')
'show'	=>__('caption.cms.fields.certificate.show')
'note'	=>__('caption.cms.fields.certificate.note')
'freelancer_id'	=>__('caption.cms.fields.certificate.freelancer_id')
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