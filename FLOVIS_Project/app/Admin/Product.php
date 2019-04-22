<?php

namespace App\Admin;

use Enomotodev\LaractiveAdmin\Http\Controllers\Controller;

class Product extends Controller
{
    public $model = \App\Product::class;

    protected $validate = [
        'market_id' => 'required',
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'material' => 'required',
        'height' => 'required|numeric',
        'width' => 'required|numeric',
        'main_image' => 'required|image',
        'second_image' => 'image',
        'third_image' => 'image',
        'fourth_image' => 'image',

    ];

    protected $files = [
        'main_image','second_image','third_image','fourth_image',
    ];
}