<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Job;
use App\Models\Freelancer;
use App\Models\Manger;

class JobExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$worker_id=null,$owner_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Job::class,
			[
				'content'=>'content',
				'needed_postion'=>'needed_postion',
				'max_price'=>'max_price',
				'max_time'=>'max_time',
				'expected_start_date'=>'expected_start_date',
				'worker_id'=>'worker_id', /* relation 1-M */
				'owner_id'=>'owner_id', /* relation 1-M */
			],[
				__('caption.cms.fields.job.content')=>'content',
				__('caption.cms.fields.job.needed_postion')=>'needed_postion',
				__('caption.cms.fields.job.max_price')=>'max_price',
				__('caption.cms.fields.job.max_time')=>'max_time',
				__('caption.cms.fields.job.expected_start_date')=>'expected_start_date',
				__('caption.cms.fields.job.worker_id')=>'worker_id', /* relation 1-M */
				__('caption.cms.fields.job.owner_id')=>'owner_id', /* relation 1-M */
			],[
				'content'=>'required',
				'needed_postion'=>'required',
				'max_price'=>'required',
				'max_time'=>'required',
				'expected_start_date'=>'required',
				'worker_id'=>'required', /* relation 1-M */
				'owner_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'content'	=>__('caption.cms.fields.job.content')
'needed_postion'	=>__('caption.cms.fields.job.needed_postion')
'max_price'	=>__('caption.cms.fields.job.max_price')
'max_time'	=>__('caption.cms.fields.job.max_time')
'expected_start_date'	=>__('caption.cms.fields.job.expected_start_date')
'worker_id'	=>__('caption.cms.fields.job.worker_id')
'owner_id'	=>__('caption.cms.fields.job.owner_id')
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