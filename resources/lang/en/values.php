<?php

return [

	'user'=>[
		'gender'=> array(
            \App\Models\User::GENDER_MALE => 'Male',
            \App\Models\User::GENDER_FEMALE => 'Female',
            \App\Models\User::GENDER_OTHER => 'Other',
        ),
        'marital_status'=> array(
            \App\Models\User::MARITAL_STATUS_SINGLE => 'Single',
            \App\Models\User::MARITAL_STATUS_MARRIED => 'Married',
            \App\Models\User::MARITAL_STATUS_WIDOWED => 'Widowed',
            \App\Models\User::MARITAL_STATUS_DIVORCED => 'Divorced',
            \App\Models\User::MARITAL_STATUS_OTHER => 'Other',
        ),
		'nationality'=> array(
            \App\Models\User::NATIONALITY_PAL => 'Palestinian',
            \App\Models\User::NATIONALITY_OTHER => 'Other',
        ),
		'city'=> array(
            'ps'=>'Palestine',
            'other'=>'Other',
        ),
		'country'=> array(
            'ps-gz'=>'Gaza',
            'ps-rf'=>'Rafah',
            'other'=>'Other',
        ),
	],
	'freelancer'=>[
	],
	'manger'=>[
	],
	'skill'=>[
		'category'=> array(
					/*values here*/
					''=>'',
				),
		'show'=> array(
					0=>'No',
					1=>'Yes'
				),
	],
	'certificate'=>[
		'category'=> array(
					/*values here*/
					''=>'',
				),
		'show'=> array(
					0=>'No',
					1=>'Yes'
				),
	],
	'education'=>[
		'category'=> array(
					/*values here*/
					''=>'',
				),
		'show_score'=> array(
					0=>'No',
					1=>'Yes'
				),
	],
	'language'=>[
		'category'=> array(
					/*values here*/
					''=>'',
				),
		'show_details'=> array(
					0=>'No',
					1=>'Yes'
				),
	],
	'experience'=>[
		'category'=> array(
					/*values here*/
					''=>'',
				),
	],
	'portfolio'=>[
		'categry'=> array(
					/*values here*/
					''=>'',
				),
	],
	'reference'=>[
	],
	'post'=>[
	],
	'job'=>[
	],
	'comment'=>[
	],
	'offer'=>[
		'status'=> array(
					/*values here*/
					''=>'',
				),
	],
	'reaction'=>[
		'type'=> array(
					/*values here*/
					''=>'',
				),
	],
	'chat'=>[
	],
	'message'=>[
	],
	'common'=>[
	]
];
