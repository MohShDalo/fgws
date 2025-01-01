<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Manger;

class MangerExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Manger::class,
			[
				'company_name'=>'company_name',
				'company_objectives'=>'company_objectives',
				'company_employees'=>'company_employees',
			],[
				__('caption.cms.fields.manger.company_name')=>'company_name',
				__('caption.cms.fields.manger.company_objectives')=>'company_objectives',
				__('caption.cms.fields.manger.company_employees')=>'company_employees',
			],[
				'company_name'=>'required',
				'company_objectives'=>'required',
				'company_employees'=>'required',
			]
		);
	}

	/***

'company_name'	=>__('caption.cms.fields.manger.company_name')
'company_objectives'	=>__('caption.cms.fields.manger.company_objectives')
'company_employees'	=>__('caption.cms.fields.manger.company_employees')
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