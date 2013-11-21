<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => "خانة :attribute يجب ان تقبل",
	"active_url"       => "خانة :attribute الموقع غير مستخدم حالياً",
	"after"            => "خانة :attribute يجب ان تكون تاريخ بعد :date",
	"alpha"            => "خانة :attribute يجب ان تحتوي فقط على احرف",
	"alpha_dash"       => "خانة :attribute يجب ان تحتوي فقط على حروف,ارقام و( - )",
	"alpha_num"        => "خانة :attribute يجب ان تحتوي فقط على ارقام و حروف",
	"array"            => "خانة :attribute يجب ان تكون مصفوفة",
	"before"           => "خانة :attribute يجب ان تكون تاريخ قبل :date",
	"between"          => array(
		"numeric" => "خانة :attribute يجب ان تكون بين  :min - :max",
		"file"    => "خانة :attribute يجب ان تكون بين  :min - :max كيلوبايت",
		"string"  => "خانة :attribute يجب ان تكون بين  :min - :max حرف",
		"array"   => "خانة :attribute يجب ان تكون بين  :min - :max اغراض",
	),
	"confirmed"        => "خانة :attribute لا تتطابق مع التاكيد",
	"date"             => "خانة :attribute تحتوي على تاريخ غير صحيح",
	"date_format"      => "خانة :attribute لا تتوافق مع الصيغة :format",
	"different"        => "خانة :attribute و :other يجب ان يكونان مختلفتان",
	"digits"           => "خانة :attribute يجب ان تكون ارقام :digits ",
	"digits_between"   => "خانة :attribute يجب ان تكون ارقام بين  :min و :max",
	"email"            => "صيغة خانة :attribute غير صحيحة",
	"exists"           => "الخانة المختارة :attribute غير صحيحة",
	"image"            => "خانة :attribute يجب ان تكون صورة",
	"in"               => "الخانة المختارة :attribute غير صحيحة",
	"integer"          => "خانة :attribute يجب ان تكون رقماً صحيحاً",
	"ip"               => "خانة :attribute يجب ان تحتوي على معرف IP صحيح",
	"max"              => array(
		"numeric" => "خانة :attribute يجب ان لا تكون اكبر من  :max",
		"file"    => "The :attribute يجب ان لاتكون اكبر من  :max كيلوبايت",
		"string"  => "The :attribute يجب ان لاتكون اكبر من  :max حرف",
		"array"   => "The :attribute يجب ان لاتكون اكبر من  :max غرض",
	),
	"mimes"            => "خانة :attribute يجب ان تحتوي على ملف من صيغة type: :values",
	"min"              => array(
		"numeric" => "خانة :attribute يجب ان تزيد عن :min",
		"file"    => "خانة  :attribute يجب ان تزيد عن :min كيلوبايت",
		"string"  => "خانة :attribute يجب ان تزيد عن :min حرف",
		"array"   => "خانة :attribute يجب ان تزيد عن :min غرض",
	),
	"not_in"           => "الخانة المختارة :attribute غير صحيحة",
	"numeric"          => "خانة :attribute يجب ان تكون أرقام",
	"regex"            => "صيغة الخانة :attribute غير صحيحة ",
	"required"         => "خانة :attribute مطلوبة",
	"required_if"      => "خانة :attribute مطلوبة عندما تكون :other :value",
	"required_with"    => "خانة :attribute مطلوبة عندما تكون :values  موجودة",
	"required_without" => "خانة :attribute غير مطلوبة عندما تكون :values  موجودة",
	"same"             => "خانة :attribute و :other يجب ان يكونا متشابهين",
	"size"             => array(
		"numeric" => "خانة :attribute يجب ان تكون  :size",
		"file"    => "خانة :attribute يجب ان تكون :size كيلوبايت",
		"string"  => "خانة :attribute يجب ان تكون :size حرف",
		"array"   => "خانة :attribute يجب ان تحتوي على  :size غرض",
	),
	"unique"           => "الخانة :attribute محجوزة مسبقا",
	"url"              => "صيغة :attribute غير صحيحة",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'name' => 'الاسم',
		'story' => 'القصة',
		'title' => 'العنوان',
		'content' => 'النص',
		'image' => 'الصورة',
		'username' => 'اسم المستخدم',
		'email' => 'الايميل',
		'password' => 'كلمة مرور',
		'username' => 'اسم المستخدم',
		'text' => 'الرسالة',
		'location' => 'المكان',
		'gender' => 'الجنس'
		),

);
