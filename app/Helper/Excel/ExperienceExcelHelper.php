<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Experience;
use App\Models\Freelancer;

class ExperienceExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$freelancer_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Experience::class,
			[
				'postion'=>'postion',
				'company_name'=>'company_name',
				'company_address'=>'company_address',
				'start_date'=>'start_date',
				'end_date'=>'end_date',
				'category'=>'category',
				'note'=>'note',
				'freelancer_id'=>'freelancer_id', /* relation 1-M */
			],[
				__('caption.cms.fields.experience.postion')=>'postion',
				__('caption.cms.fields.experience.company_name')=>'company_name',
				__('caption.cms.fields.experience.company_address')=>'company_address',
				__('caption.cms.fields.experience.start_date')=>'start_date',
				__('caption.cms.fields.experience.end_date')=>'end_date',
				__('caption.cms.fields.experience.category')=>'category',
				__('caption.cms.fields.experience.note')=>'note',
				__('caption.cms.fields.experience.freelancer_id')=>'freelancer_id', /* relation 1-M */
			],[
				'postion'=>'required',
				'company_name'=>'required',
				'company_address'=>'required',
				'start_date'=>'required',
				'end_date'=>'required',
				'category'=>'required',
				'note'=>'required',
				'freelancer_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'postion'	=>__('caption.cms.fields.experience.postion')
'company_name'	=>__('caption.cms.fields.experience.company_name')
'company_address'	=>__('caption.cms.fields.experience.company_address')
'start_date'	=>__('caption.cms.fields.experience.start_date')
'end_date'	=>__('caption.cms.fields.experience.end_date')
'category'	=>__('caption.cms.fields.experience.category')
'note'	=>__('caption.cms.fields.experience.note')
'freelancer_id'	=>__('caption.cms.fields.experience.freelancer_id')
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