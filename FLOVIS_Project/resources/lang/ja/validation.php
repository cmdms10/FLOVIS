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

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

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

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        /*ログイン*/
        'name' => [
            'regex' => "無効な文字が含まれています。",
            'required' => 'ユーザーIDを入力して下さい。',
            'max' => '名前は10文字以内です。',

        ],
        'email' => [
            'required' => 'メールアドレスを入力してください',
            'email' => 'メールアドレスの形式で入力して下さい',
            'unique' => 'このメールアドレスは既に使われています。',
        ],
        'password' => [
            'regex' => "無効な文字が含まれています。",
            'required' => 'パスワードを入力してください',
            'max' =>'255文字以内で入力してください。',
            'min' =>'6文字以上で入力してください。',
            'confirmed' => 'パスワードが一致しませんでした。',
        ],


        /*会員登録・プロフィール編集*/
        'Name' => [
            'required' => '必須項目です。',
            'regex' => '無効な文字が含まれています。',
            'max' => '名前は10文字以内です。',
        ],
        'firstName' => [
            'required' => '必須項目です。',
            'regex' => '無効な文字が含まれています。',
        ],
        'lastName' => [
            'required' => '必須項目です。',
            'regex' => '無効な文字が含まれています。',
        ],
        'kanafirstName' => [
            'regex' => "カタカナで入力してください。",
            'required' => '必須項目です。',
        ],
        'kanalastName' => [
            'regex' => "カタカナで入力してください。",
            'required' => '必須項目です。',
        ],
        'yubin21' => [
            'regex' => '無効な文字が含まれています。',
            'required' => '必須項目です。',
            'digits' => '3桁の数字を入力してください。',
            'numeric' => '半角数字を入力してください。',
        ],
        'yubin22' => [
            'regex' => '無効な文字が含まれています。',
            'required' => '必須項目です。',
            'digits' => '4桁の数字を入力してください。',
            'numeric' => '半角数字を入力してください。',

        ],
        'region21' => [
            'regex' => '無効な文字が含まれています。',
            'required' => '必須項目です。',
        ],
        'local21' => [
            'regex' => '無効な文字が含まれています。',
            'required' => '必須項目です。',
        ],
        'addr21' => [
            'regex' => '無効な文字が含まれています。',
            'required' => '必須項目です。',
        ],
        'tel' => [
            'required' => '電話番号を入力してください。',
            'numeric' => '半角数字を入力してください。',
            'digits_between' => '10〜11桁で入力してください。',
            'unique' => 'この電話番号は既に使われています。',
        ],



        /*クレジットカード*/
        'user_name' => [
            'required' => '必須項目です。',
            'regex' => '英大文字での入力です。',
        ],

        'cardNum' => [
            'required' => '必須項目です。',
            'digits'=> '16桁で入力してください。',
            'numeric' => '半角数字のみを入力してください。'

        ],
        'securityCode' => [
            'required' => '必須項目です。',
            'digits' => '3桁で入力してください。',
            'numeric' => '半角数字のみを入力してください。',
        ],



        /*商品受取人*/
        'ReceiverName' => [
            'required' => '必須項目です。',
            'regex' => '無効な文字が含まれています。',

        ],
        'ReceiverkanaName' => [
            'required' => '必須項目です。',
            'regex' => 'カタカナで入力してください。',
        ],

        'comment' => [
            'required' => '文字を入力してください。',
            'regex' => '文字を入力してください。',
        ],

    ],

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

    'attributes' => [],

];
