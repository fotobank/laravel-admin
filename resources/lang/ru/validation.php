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

	'accepted'             => 'Вы должны принять :attribute.',
	'active_url'           => 'Поле :attribute должно быть полным URL.',
	'after'                => 'Поле :attribute должно быть датой после :date.',
	'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
	'alpha'                => 'Поле :attribute может содержать только буквы.',
	'alpha_dash'           => 'Поле :attribute может содержать только буквы, цифры и тире.',
	'alpha_num'            => 'Поле :attribute может содержать только буквы и цифры.',
	'array'                => 'The :attribute must have selected elements.',
	'before'               => 'Поле :attribute должно быть датой перед :date.',
	'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
	'between'              => [
		'numeric' => 'Поле :attribute должно быть между :min и :max.',
		'file'    => 'Поле :attribute должно быть от :min до :max Килобайт.',
		'string'  => 'Поле :attribute должно быть от :min до :max символов.',
		'array'   => 'The :attribute must have between :min and :max items.',
	],
	'boolean'              => 'The :attribute field must be true or false.',
	'confirmed'            => 'Поле :attribute не совпадает с подтверждением.',
	'date'                 => 'The :attribute is not a valid date.',
	'date_format'          => 'The :attribute does not match the format :format.',
	'different'            => 'The :attribute and :other must be different.',
	'digits'               => 'The :attribute must be :digits digits.',
	'digits_between'       => 'The :attribute must be between :min and :max digits.',
	'dimensions'           => 'The :attribute has invalid image dimensions.',
	'distinct'             => 'The :attribute field has a duplicate value.',
	'email'                => 'The :attribute must be a valid email address.',
	'exists'               => ':attribute является недействительным.',
	'file'                 => ':attribute должен быть файл.',
	'filled'               => ':attribute поле должно иметь значение.',
	'image'                => 'Поле :attribute должно быть картинкой.',
	'in'                   => 'Выбранное значение для :attribute не верно.',
	'in_array'             => 'The :attribute field does not exist in :other.',
	'integer'              => 'Поле :attribute должно быть целым числом.',
	'ip'                   => 'Поле :attribute должно быть полным IP-адресом.',
	'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
	'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
	'json'                 => 'The :attribute must be a valid JSON string.',
	'max'                  => [
		'numeric' => 'Поле :attribute должно быть меньше :max.',
		'file'    => 'Поле :attribute должно быть меньше :max Килобайт.',
		'string'  => 'Поле :attribute должно быть короче :max символов.',
		'array'   => 'The :attribute may not have more than :max items.',
	],
	'mimes'                => 'Поле :attribute должно быть файлом одного из типов: :values.',
	'mimetypes'            => 'The :attribute must be a file of type: :values.',
	'min'                  => [
		'numeric' => 'Поле :attribute должно быть не менее :min.',
		'file'    => 'Поле :attribute должно быть не менее :min Килобайт.',
		'string'  => 'Поле :attribute должно быть не короче :min символов.',
		'array'   => 'The :attribute must have at least :min items.',
	],
	'not_in'               => 'Выбранное значение для :attribute не верно.',
	'numeric'              => 'Поле :attribute должно быть числом.',
	'present'              => 'Поле :attribute должно присутствовать.',
	'regex'                => ':attribute неверный формат.',
	'required'             => 'Поле :attribute обязательно для заполнения.',
	'required_if'          => 'Поле :attribute поле обязательно для заполнения, если :other является :value.',
	'required_unless'      => 'Поле :attribute не требуется, если :other в :values.',
	'required_with'        => 'Поле :attribute поле обязательно для заполнения, если :values настоящее.',
	'required_with_all'    => 'Поле :attribute поле обязательно для заполнения, если :values настоящее.',
	'required_without'     => 'Поле :attribute поле обязательно для заполнения, если :values нет.',
	'required_without_all' => 'Поле :attribute обязательное для заполнения когда ни один из :values присутствуют.',
	'same'                 => 'Нет данных. :attribute а также :other должны соответствовать.',
	'size'                 => [
		'numeric' => 'Поле :attribute должно быть :size.',
		'file'    => 'Поле :attribute должно быть :size Килобайт.',
		'string'  => 'Поле :attribute должно быть длиной :size символов.',
		'array'   => 'The :attribute must contain :size items.',
	],
	'string'               => 'The :attribute must be a string.',
	'timezone'             => 'The :attribute must be a valid zone.',
	'unique'               => 'Такое значение поля :attribute уже существует.',
	'uploaded'             => 'The :attribute failed to upload.',
	'url'                  => 'Поле :attribute имеет неверный формат.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention 'attribute.rule' to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of 'email'. This simply helps us make messages a little cleaner.
	|
	*/

	'captcha'    => 'недействительный :attribute',
	'attributes' => [
		'captcha' => 'проверочный код',
	],
];