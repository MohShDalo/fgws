<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	'accepted' => 'حقل :attribute يجب أن يكون مقبولاً.',
	'active_url' => 'حقل :attribute ليس رابطاً صحيحاً.',
	'after' => 'حقل :attribute يجب أن يكون بعد تاريخ :date.',
	'after_or_equal' => 'حقل :attribute يجب أن يكون بعد تاريخ :date. أو نفسه',
	'alpha' => 'حقل :attribute يجب أن يحتوب على حروف الهجاء فقط.',
	'alpha_dash' => 'حقل :attribute يجب أن يحتوب على حروف الهجاء، أرقام، شرطة علوية أو شرطة سفلية فقط.',
	'alpha_num' => 'حقل :attribute  يجب أن يحتوب على حروف الهجاء أو ارقام فقط.',
	'array' => 'حقل :attribute يجب أن يكون مصفوفة.',
	'before' => 'حقل :attribute يجب أن يكون قبل تاريخ :date.',
	'before_or_equal' => 'حقل :attribute يجب أن يكون قبل تاريخ :date. او نفسه',	
	'between' => [
		'numeric' => 'حقل :attribute يجب أن يكون بين :min و :max.',
		'file' => 'حقل :attribute  يجب أن يكون حجه بين :min و :max كيلوبايت.',
		'string' => 'حقل :attribute  يجب أن يكون عدد حروفه بين :min و :max حرفاً.',
		'array' => 'حقل :attribute  يجب أن يكون عدد عناصرها بين :min و :max عنصراً.',
	],
	'boolean' => 'حقل :attribute يجب أن يكون نعم أو لا.',
	'confirmed' => 'حقل التأكيد لـ :attribute غير متطابق.',
	'date' => 'حقل :attribute ليس بتاريخ صحيح.',
	'date_equals' => 'حقل :attribute لا يساوي تاريخ :date.',
	'date_format' => 'حقل :attribute لا يطابق النمط :format.',
	'different' => 'حقل :attribute و :other يجب أن يكونا مختلفين.',
	'digits' => 'حقل :attribute يجب أن يكون :digits خانة.',
	'digits_between' => 'حقل :attribute يجب أن يكون من :min إلى :max خانة.',
	'dimensions' => 'حقل :attribute لا يمتلك أبعاد الصورة الصحيحة.',
	'distinct' => 'قيمة :attribute مكررة.',
	'email' => 'حقل :attribute يجب أن يكون بريد إلكتروني صالح.',
	'ends_with' => 'حقل :attribute يجب أن ينتهي بإحدى القيم التالية: :values.',
	'exists' => 'قيمة حقل :attribute غير متواجدة.',
	'file' => 'حقل :attribute يجب أن يكون ملفاً.',
	'filled' => 'حقل :attribute يجب أن يحتوي قيمة.',
	'gt' => [
		'numeric' => 'حقل :attribute يجب أن يكون أكبر من :value.',
		'file' => 'حقل :attribute يجب أن يكون حجمه أكبر من :value كيلوبايت.',
		'string' => 'حقل :attribute يجب أن يكون طوله أكبر من :value حرفاً.',
		'array' => 'حقل :attribute يجب أن يحتوب على عناصر تزيد عن :value عنصراً.',
	],
	'gte' => [
		'numeric' => 'حقل :attribute  يجب أن يكون أكبر من أو يساوي :value.',
		'file' => 'حقل :attribute  يجب أن يكون حجمه أكبر من أو يساوي :value كيلوبايت.',
		'string' => 'حقل :attribute  يجب أن يكون طوله أكبر من أو يساوي :value حرفاً.',
		'array' => 'حقل :attribute  يجب أن يحتوب على عناصر تساوي أو تزيد عن :value عنصراً.',
	],
	'image' => 'حقل :attribute يجب أن يكون صورة.',
	'in' => 'القيمة المحدد من :attribute غير صحيحة.',
	'in_array' => 'حقل :attribute لا يتوفر في :other.',
	'integer' => 'حقل :attribute يجب أن يكون رقماً.',
	'ip' => 'حقل :attribute يجب أن يكون عنوان IP صالح.',
	'ipv4' => 'حقل :attribute يجب أن يكون عنوان IPv4 صالح.',
	'ipv6' => 'حقل :attribute يجب أن يكون عنوان IPv6 صالح.',
	'json' => 'حقل :attribute يجب أن يكون بنمط JSON صالح.',
	'lt' => [
		'numeric' => 'حقل :attribute يجب أن يكون أقل من :value.',
		'file' => 'حقل :attribute يجب أن يكون حجمه أقل من :value كيلوبايت.',
		'string' => 'حقل :attribute يجب أن يكون طوله أقل من :value حرفاً.',
		'array' => 'حقل :attribute يجب أن يحتوب على عناصر تقل عن :value عنصراً.',
	],
	'lte' => [
		'numeric' => 'حقل :attribute  يجب أن يكون أقل من أو يساوي :value.',
		'file' => 'حقل :attribute  يجب أن يكون حجمه أقل من أو يساوي :value كيلوبايت.',
		'string' => 'حقل :attribute  يجب أن يكون طوله أقل من أو يساوي :value حرفاً.',
		'array' => 'حقل :attribute  يجب أن يحتوب على عناصر تساوي أو تقل عن :value عنصراً.',
	],
	'max' => [
		'numeric' => 'حقل :attribute لا يمكن أن يكون أكبر من :max.',
		'file' => 'حقل :attribute لا يمكن أن يكون حجمه أكبر من :max كيلوبايت.',
		'string' => 'حقل :attribute لا يمكن أن يكون عدد حروفه أكثر من :max حرفاً.',
		'array' => 'حقل :attribute لا يمكن أن يكون عناصره أكثر من :max عنصراً.',
	],
	'mimes' => 'حقل :attribute يجب أن يكون ملفاً بإحدى الصيغ التالية: :values.',
	'mimetypes' => 'حقل :attribute يجب أن يكون ملفاً بإحدى الصيغ التالية: :values.',
	'min' => [
		'numeric' => 'حقل :attribute يجب أن يكون على الأقل :min.',
		'file' => 'حقل :attribute يجب أن يكون حجمه على الأقل  :min كيلوبايت.',
		'string' => 'حقل :attribute يجب أن يكون عدد حروفه على الأقل  :min حرفاً.',
		'array' => 'حقل :attribute يجب أن يكون عناصره على الأقل  :min عنصراً.',
	],
	'not_in' => 'الحقل :attribute يملك قيمة غير سليمة.',
	'not_regex' => 'حقل :attribute يحمل بيانات غير مقبولة.',
	'numeric' => 'حقل :attribute يجب أن يكون رقماً.',
	'password' => 'كلمة المرور غير صحيحة.',
	'present' => 'حقل :attribute يجب أن يحتوي على بيانات.',
	'regex' => 'حقل :attribute يحمل بيانات غير مقبولة.', 
	'required' => 'حقل :attribute مطلوب.',
	'required_if' => 'حقل :attribute مطلوب عندما :other قيمته :value.',
	'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other قيمته :values.',
	'required_with' => 'حقل :attribute مطلوب عندما تكون :values متوفرة.',
	'required_with_all' => 'حقل :attribute مطلوب عندما يكون :values متوفرين.',
	'required_without' => 'حقل :attribute مطلوب عندما تكون :values غير متوفرة.',
	'required_without_all' => 'حقل :attribute مطلوب عندما لا يكون أي من :values متوفر.',
	'same' => 'حقل :attribute و :other يجب أن يكونا متطابقين.',
	'size' => [
		'numeric' => 'حقل :attribute يجب أن يكون :size.',
		'file' => 'حقل :attribute يجب أن يكون حجمه :size كيلوبايت.',
		'string' => 'حقل :attribute يجب أن يكون :size حرفاً.',
		'array' => 'حقل :attribute يجب أن يكون :size عنصراً.',
	],
	'starts_with' => 'حقل :attribute يجب أن يبدأ بإحدى التالي: :values.',
	'string' => 'حقل :attribute يجب أن يكون نصاً.',
	'timezone' => 'حقل :attribute يجب أن يكون منطقة زمنية صالحة.',
	'unique' => 'قيمة حقل :attribute مستخدمة بالفعل.',
	'uploaded' => 'حقل :attribute فشل رفعه.',
	'url' => 'حقل :attribute يحمل صيغة مرفوضة.',
	'uuid' => 'حقل :attribute يجب أن يكون UUID مقبول.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention 'attribute.rule' to name حقل lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	'values' => [
		'attribute-name' =>[
			'attribute-value'=>'custom-value',
		],
	],
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| Attributes following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as 'E-Mail Address' instead
	| of 'email'. This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [
	]

];
