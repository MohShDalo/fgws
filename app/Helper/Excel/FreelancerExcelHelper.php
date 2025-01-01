<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Freelancer;
use App\Models\User;

class FreelancerExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$user_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Freelancer::class,
			[
				'main_career'=>'main_career',
				'place_of_birth'=>'place_of_birth',
				'user_id'=>'user_id', /* relation 1-M */
			],[
				__('caption.cms.fields.freelancer.main_career')=>'main_career',
				__('caption.cms.fields.freelancer.place_of_birth')=>'place_of_birth',
				__('caption.cms.fields.freelancer.user_id')=>'user_id', /* relation 1-M */
			],[
				'main_career'=>'required',
				'place_of_birth'=>'required',
				'user_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'main_career'	=>__('caption.cms.fields.freelancer.main_career')
'place_of_birth'	=>__('caption.cms.fields.freelancer.place_of_birth')
'user_id'	=>__('caption.cms.fields.freelancer.user_id')
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