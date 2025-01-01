<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Offer;
use App\Models\Freelancer;
use App\Models\Job;

class OfferExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$owner_id=null,$job_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Offer::class,
			[
				'content'=>'content',
				'price'=>'price',
				'time'=>'time',
				'status'=>'status',
				'status_reason'=>'status_reason',
				'owner_id'=>'owner_id', /* relation 1-M */
				'job_id'=>'job_id', /* relation 1-M */
			],[
				__('caption.cms.fields.offer.content')=>'content',
				__('caption.cms.fields.offer.price')=>'price',
				__('caption.cms.fields.offer.time')=>'time',
				__('caption.cms.fields.offer.status')=>'status',
				__('caption.cms.fields.offer.status_reason')=>'status_reason',
				__('caption.cms.fields.offer.owner_id')=>'owner_id', /* relation 1-M */
				__('caption.cms.fields.offer.job_id')=>'job_id', /* relation 1-M */
			],[
				'content'=>'required',
				'price'=>'required',
				'time'=>'required',
				'status'=>'required',
				'status_reason'=>'required',
				'owner_id'=>'required', /* relation 1-M */
				'job_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'content'	=>__('caption.cms.fields.offer.content')
'price'	=>__('caption.cms.fields.offer.price')
'time'	=>__('caption.cms.fields.offer.time')
'status'	=>__('caption.cms.fields.offer.status')
'status_reason'	=>__('caption.cms.fields.offer.status_reason')
'owner_id'	=>__('caption.cms.fields.offer.owner_id')
'job_id'	=>__('caption.cms.fields.offer.job_id')
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