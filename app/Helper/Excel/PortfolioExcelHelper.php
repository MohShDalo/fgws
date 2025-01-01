<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio;
use App\Models\Freelancer;

class PortfolioExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$freelancer_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Portfolio::class,
			[
				'title'=>'title',
				'release_date'=>'release_date',
				'link'=>'link',
				'categry'=>'categry',
				'mockup_image'=>'mockup_image',
				'file'=>'file',
				'note'=>'note',
				'freelancer_id'=>'freelancer_id', /* relation 1-M */
			],[
				__('caption.cms.fields.portfolio.title')=>'title',
				__('caption.cms.fields.portfolio.release_date')=>'release_date',
				__('caption.cms.fields.portfolio.link')=>'link',
				__('caption.cms.fields.portfolio.categry')=>'categry',
				__('caption.cms.fields.portfolio.mockup_image')=>'mockup_image',
				__('caption.cms.fields.portfolio.file')=>'file',
				__('caption.cms.fields.portfolio.note')=>'note',
				__('caption.cms.fields.portfolio.freelancer_id')=>'freelancer_id', /* relation 1-M */
			],[
				'title'=>'required',
				'release_date'=>'required',
				'link'=>'required',
				'categry'=>'required',
				'mockup_image'=>'required',
				'file'=>'required',
				'note'=>'required',
				'freelancer_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'title'	=>__('caption.cms.fields.portfolio.title')
'release_date'	=>__('caption.cms.fields.portfolio.release_date')
'link'	=>__('caption.cms.fields.portfolio.link')
'categry'	=>__('caption.cms.fields.portfolio.categry')
'mockup_image'	=>__('caption.cms.fields.portfolio.mockup_image')
'file'	=>__('caption.cms.fields.portfolio.file')
'note'	=>__('caption.cms.fields.portfolio.note')
'freelancer_id'	=>__('caption.cms.fields.portfolio.freelancer_id')
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