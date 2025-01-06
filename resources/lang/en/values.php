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
        'roleable_type'=>array(
            \App\Models\Manger::class => 'Manager',
            \App\Models\Freelancer::class => 'Freelancer',
        )
	],
	'freelancer'=>[
	],
	'manger'=>[
	],
	'skill'=>[
		'category'=> array(
            \App\Models\Skill::CATEGORY_LIFESTYLE => 'Life Style',
            \App\Models\Skill::CATEGORY_TECHNICAL => 'Technical',
        ),
		'show'=> array(
            0=>'No',
            1=>'Yes'
        ),
	],
	'certificate'=>[
		'category'=> array(
            \App\Models\Certificate::CATEGORY_LIFESTYLE => 'Life Style',
            \App\Models\Certificate::CATEGORY_TECHNICAL => 'Technical',
        ),
		'show'=> array(
            0=>'No',
            1=>'Yes'
        ),
	],
	'education'=>[
		'category'=> array(
            \App\Models\Education::CATEGORY_LIFESTYLE => 'Life Style',
            \App\Models\Education::CATEGORY_TECHNICAL => 'Technical',
        ),
		'show_score'=> array(
            0=>'No',
            1=>'Yes'
        ),
	],
	'language'=>[
		'category'=> array(
            \App\Models\Language::CATEGORY_LIFESTYLE => 'Life Style',
            \App\Models\Language::CATEGORY_TECHNICAL => 'Technical',
        ),
		'show_details'=> array(
            0=>'No',
            1=>'Yes'
        ),
	],
	'experience'=>[
		'category'=> array(
            \App\Models\Experience::CATEGORY_LIFESTYLE => 'Life Style',
            \App\Models\Experience::CATEGORY_TECHNICAL => 'Technical',
        ),
	],
	'portfolio'=>[
		'category'=> array(
            \App\Models\Portfolio::CATEGORY_LIFESTYLE => 'Life Style',
            \App\Models\Portfolio::CATEGORY_TECHNICAL => 'Technical',
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
        ),
	],
	'reaction'=>[
		'type'=> array(
        ),
	],
	'chat'=>[
	],
	'message'=>[
	],
	'common'=>[
	]
];
