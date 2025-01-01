<?php

namespace App\Helper\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserExcelHelper extends ExcelHelper
{
	public function __construct($file_path=null){
		//public function __construct($file_path, $model, $model_headers_map=[], $export_excel_headers_map=null, $rules=[], $init_values=[]){
		parent::__construct($file_path, User::class,
			[
				'name'=>'name',
				'image'=>'image',
				'cover'=>'cover',
				'email'=>'email',
				'contact_number'=>'contact_number',
				'birth_date'=>'birth_date',
				'gender'=>'gender',
				'marital_status'=>'marital_status',
				'nationality'=>'nationality',
				'city'=>'city',
				'country'=>'country',
				'address_details'=>'address_details',
				'roleable_type'=>'roleable_type',
			],[
				__('caption.cms.fields.user.name')=>'name',
				__('caption.cms.fields.user.image')=>'image',
				__('caption.cms.fields.user.cover')=>'cover',
				__('caption.cms.fields.user.email')=>'email',
				__('caption.cms.fields.user.contact_number')=>'contact_number',
				__('caption.cms.fields.user.birth_date')=>'birth_date',
				__('caption.cms.fields.user.gender')=>'gender',
				__('caption.cms.fields.user.marital_status')=>'marital_status',
				__('caption.cms.fields.user.nationality')=>'nationality',
				__('caption.cms.fields.user.city')=>'city',
				__('caption.cms.fields.user.country')=>'country',
				__('caption.cms.fields.user.address_details')=>'address_details',
				__('caption.cms.fields.user.roleable_type')=>'roleable_type',
			],[
				'name'=>'required',
				'image'=>'required',
				'cover'=>'required',
				'email'=>'required',
				'contact_number'=>'required',
				'birth_date'=>'required',
				'gender'=>'required',
				'marital_status'=>'required',
				'nationality'=>'required',
				'city'=>'required',
				'country'=>'required',
				'address_details'=>'required',
				'roleable_type'=>'required',
			]
		);
	}

	/***

'name'	=>__('caption.cms.fields.user.name')
'image'	=>__('caption.cms.fields.user.image')
'cover'	=>__('caption.cms.fields.user.cover')
'email'	=>__('caption.cms.fields.user.email')
'contact_number'	=>__('caption.cms.fields.user.contact_number')
'birth_date'	=>__('caption.cms.fields.user.birth_date')
'gender'	=>__('caption.cms.fields.user.gender')
'marital_status'	=>__('caption.cms.fields.user.marital_status')
'nationality'	=>__('caption.cms.fields.user.nationality')
'city'	=>__('caption.cms.fields.user.city')
'country'	=>__('caption.cms.fields.user.country')
'address_details'	=>__('caption.cms.fields.user.address_details')
'roleable_type'	=>__('caption.cms.fields.user.roleable_type')
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