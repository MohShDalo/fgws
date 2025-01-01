<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Reference;
use App\Models\Freelancer;

class ReferenceExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$freelancer_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Reference::class,
			[
				'full_name'=>'full_name',
				'contact_number'=>'contact_number',
				'email'=>'email',
				'postion'=>'postion',
				'note'=>'note',
				'freelancer_id'=>'freelancer_id', /* relation 1-M */
			],[
				__('caption.cms.fields.reference.full_name')=>'full_name',
				__('caption.cms.fields.reference.contact_number')=>'contact_number',
				__('caption.cms.fields.reference.email')=>'email',
				__('caption.cms.fields.reference.postion')=>'postion',
				__('caption.cms.fields.reference.note')=>'note',
				__('caption.cms.fields.reference.freelancer_id')=>'freelancer_id', /* relation 1-M */
			],[
				'full_name'=>'required',
				'contact_number'=>'required',
				'email'=>'required',
				'postion'=>'required',
				'note'=>'required',
				'freelancer_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'full_name'	=>__('caption.cms.fields.reference.full_name')
'contact_number'	=>__('caption.cms.fields.reference.contact_number')
'email'	=>__('caption.cms.fields.reference.email')
'postion'	=>__('caption.cms.fields.reference.postion')
'note'	=>__('caption.cms.fields.reference.note')
'freelancer_id'	=>__('caption.cms.fields.reference.freelancer_id')
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