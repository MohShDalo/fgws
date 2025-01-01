<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null,$created_by_id=null,$post_id=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, Comment::class,
			[
				'content'=>'content',
				'created_by_id'=>'created_by_id', /* relation 1-M */
				'post_id'=>'post_id', /* relation 1-M */
			],[
				__('caption.cms.fields.comment.content')=>'content',
				__('caption.cms.fields.comment.created_by_id')=>'created_by_id', /* relation 1-M */
				__('caption.cms.fields.comment.post_id')=>'post_id', /* relation 1-M */
			],[
				'content'=>'required',
				'created_by_id'=>'required', /* relation 1-M */
				'post_id'=>'required', /* relation 1-M */
			]
		);
	}

	/***

'content'	=>__('caption.cms.fields.comment.content')
'created_by_id'	=>__('caption.cms.fields.comment.created_by_id')
'post_id'	=>__('caption.cms.fields.comment.post_id')
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