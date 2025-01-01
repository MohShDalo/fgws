<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Skill;
use App\Models\Freelancer;

class SkillExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$freelancer_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Skill::class,
			[
				'title'=>'title',
				'category'=>'category',
				'show'=>'show',
				'freelancer_id'=>'freelancer_id', /* relation 1-M */
			],[
				__('caption.cms.fields.skill.title')=>'title',
				__('caption.cms.fields.skill.category')=>'category',
				__('caption.cms.fields.skill.show')=>'show',
				__('caption.cms.fields.skill.freelancer_id')=>'freelancer_id', /* relation 1-M */
			],[
				'title'=>'required',
				'category'=>'required',
				'show'=>'required',
				'freelancer_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'title'	=>__('caption.cms.fields.skill.title')
'category'	=>__('caption.cms.fields.skill.category')
'show'	=>__('caption.cms.fields.skill.show')
'freelancer_id'	=>__('caption.cms.fields.skill.freelancer_id')
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