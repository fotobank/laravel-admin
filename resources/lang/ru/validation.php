<?php

return [

	/*
		|--------------------------------------------------------------------------
		| Языковые ресурсы для проверки значений
		|--------------------------------------------------------------------------
		|
		| Последующие языковые строки содержат сообщения по-умолчанию, используемые
		| классом, проверяющим значения (валидатором). Некоторые из правил имеют
		| несколько версий, например, size. Вы можете поменять их на любые
		| другие, которые лучше подходят для вашего приложения.
		|
		*/
	'accepted'             => 'Вы должны принять :attribute.',
	'active_url'           => 'Поле :attribute должно быть полным URL.',
	'after'                => 'Поле :attribute должно быть датой после :date.',
	'after_or_equal'       => 'Поле :attribute должно быть дата, после или равно :date.',
	'alpha'                => 'Поле :attribute может содержать только буквы.',
	'alpha_dash'           => 'Поле :attribute может содержать только буквы, цифры и тире.',
	'alpha_num'            => 'Поле :attribute может содержать только буквы и цифры.',
	'array'                => 'Поле :attribute должно иметь выбранные элементы.',
	'before'               => 'Поле :attribute должно быть датой перед :date.',
	'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
	'between'              =>
		[
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
	'max'                  =>
		[
			'numeric' => 'Поле :attribute должно быть меньше :max.',
			'file'    => 'Поле :attribute должно быть меньше :max Килобайт.',
			'string'  => 'Поле :attribute должно быть короче :max символов.',
			'array'   => 'The :attribute may not have more than :max items.',
		],
	'mimes'                => 'Поле :attribute должно быть файлом одного из типов: :values.',
	'mimetypes'            => 'The :attribute must be a file of type: :values.',
	'min'                  =>
		[
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
	'size'                 =>
		[
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
	'captcha'              => 'недействительный :attribute',

	'date_equals' => 'Поле :attribute должно быть датой равной :date.',
	'ends_with'   => 'Поле :attribute должно заканчиваться одним из следующих значений: :values',
	'gt'          => [
		'numeric' => 'Поле :attribute должно быть больше :value.',
		'file'    => 'Размер файла в поле :attribute должен быть больше :value Килобайт(а).',
		'string'  => 'Количество символов в поле :attribute должно быть больше :value.',
		'array'   => 'Количество элементов в поле :attribute должно быть больше :value.',
	],
	'gte'         => [
		'numeric' => 'Поле :attribute должно быть больше или равно :value.',
		'file'    => 'Размер файла в поле :attribute должен быть больше или равен :value Килобайт(а).',
		'string'  => 'Количество символов в поле :attribute должно быть больше или равно :value.',
		'array'   => 'Количество элементов в поле :attribute должно быть больше или равно :value.',
	],
	'lt'          => [
		'numeric' => 'Поле :attribute должно быть меньше :value.',
		'file'    => 'Размер файла в поле :attribute должен быть меньше :value Килобайт(а).',
		'string'  => 'Количество символов в поле :attribute должно быть меньше :value.',
		'array'   => 'Количество элементов в поле :attribute должно быть меньше :value.',
	],
	'lte'         => [
		'numeric' => 'Поле :attribute должно быть меньше или равно :value.',
		'file'    => 'Размер файла в поле :attribute должен быть меньше или равен :value Килобайт(а).',
		'string'  => 'Количество символов в поле :attribute должно быть меньше или равно :value.',
		'array'   => 'Количество элементов в поле :attribute должно быть меньше или равно :value.',
	],
	'not_regex'   => 'Выбранный формат для :attribute ошибочный.',
	'password'    => 'Неверный пароль.',
	'starts_with' => 'Поле :attribute должно начинаться из одного из следующих значений: :values',
	'uuid'        => 'Поле :attribute должно быть корректным UUID.',


	/*
	|--------------------------------------------------------------------------
	| Собственные языковые ресурсы для проверки значений
	|--------------------------------------------------------------------------
	|
	| Здесь Вы можете указать собственные сообщения для атрибутов.
	| Это позволяет легко указать свое сообщение для заданного правила атрибута.
	|
	| http://laravel.com/docs/validation#custom-error-messages
	| Пример использования
	|
	|   'custom' => [
	|       'email' => [
	|           'required' => 'Нам необходимо знать Ваш электронный адрес!',
	|       ],
	|   ],
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Собственные названия атрибутов
	|--------------------------------------------------------------------------
	|
	| Последующие строки используются для подмены программных имен элементов
	| пользовательского интерфейса на удобочитаемые. Например, вместо имени
	| поля "email" в сообщениях будет выводиться "электронный адрес".
	|
	| Пример использования
	|
	|   'attributes' => [
	|       'email' => 'электронный адрес',
	|   ],
	|
	*/

	'attributes' => [
		'name'                  => 'Имя',
		'username'              => 'Никнейм',
		'email'                 => 'E-Mail адрес',
		'first_name'            => 'Имя',
		'last_name'             => 'Фамилия',
		'password'              => 'Пароль',
		'password_confirmation' => 'Подтверждение пароля',
		'city'                  => 'Город',
		'country'               => 'Страна',
		'address'               => 'Адрес',
		'phone'                 => 'Телефон',
		'mobile'                => 'Моб. номер',
		'age'                   => 'Возраст',
		'sex'                   => 'Пол',
		'gender'                => 'Пол',
		'day'                   => 'День',
		'month'                 => 'Месяц',
		'year'                  => 'Год',
		'hour'                  => 'Час',
		'minute'                => 'Минута',
		'second'                => 'Секунда',
		'title'                 => 'Наименование',
		'content'               => 'Контент',
		'description'           => 'Описание',
		'excerpt'               => 'Выдержка',
		'date'                  => 'Дата',
		'time'                  => 'Время',
		'available'             => 'Доступно',
		'size'                  => 'Размер',
		'captcha'               => 'проверочный код',
	],
];
