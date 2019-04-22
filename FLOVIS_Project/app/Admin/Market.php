<?php

namespace App\Admin;

use Enomotodev\LaractiveAdmin\Http\Controllers\Controller;

class Market extends Controller
{
    public $model = \App\Market::class;

    protected $validate = [
        'name' => 'required',
        'mail' => 'required|email|unique:markets,mail',
        'phone' => 'required|numeric|digits_between:10,11|unique:markets,phone',
        'url' => '',
        'zipcode' => 'required|digits:7',
        'address1' => 'required',
        'address2' => 'required',
        'address3' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'first_kanasei' => 'required',
        'last_kanamei' => 'required',
    ];


}

//|unique:markets,phone