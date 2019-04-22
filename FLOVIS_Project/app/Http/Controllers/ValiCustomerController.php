<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValiCustomerController extends Controller
{
    /*public function customer_register() {
        return view('flovis.customer_register_form');
    }*/

    /*public function customer_confirm(Request $request) {
        $validateRules = [
            'userId' => 'required|alpha_num',
            'name1' => 'required',
            'name2' => 'required',
            'kanaSei' => 'required',
            'kanaMei' => 'required',
            'pw' => 'required',
            'pwConfirm' => 'required',
            'email' => 'required|email',
            'yubin21' => 'required',
            'yubin22' => 'required',
            'region21' => 'required',
            'local21' => 'required',
            'addr21' => 'required',
            'tel' => 'required|numeric|digits_between:10,11',
        ];

        $validateMessage = [
            "required" => "必須項目です。",
            "alpha_num" => "英数字のみの入力です。",
            "email" => "メールアドレスの形式で入力して下さい。",
            "integer" => "数値のみの入力です。",
            "numeric" => "数字を入力して下さい。",
            "digits_between" => "10〜11桁で入力して下さい。",
        ];

//        //バリデーションをインスタンス化
        $this->validate($request, $validateRules, $validateMessage);

        $data = \Request::all();


//        $data = $request->input('userId');

//        dd($data);
//        echo $data;

//        printf($data);
//        $hoge = "hoge";

        return view('flovis.customer_confirm',compact('data'));
    }*/

}
