<?php

namespace App\Http\Controllers\Validation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ValiCustomerController extends Controller
{
    public function customer_register() {
        return view('flovis.customer_register_form');
    }

    public function customer_confirm(Request $request) {
        $validateRules = [
            'userId' => 'required|alpha_num|unique:user_accounts,U_ID',
            'name1' => 'required|string',
            'name2' => 'required|string',
            'kanaSei' => 'required',
            'kanaMei' => 'required',
            'pw' => 'required',
            'pwConfirm' => 'required',
            'email' => 'required|email|unique:user_accounts,U_MAIL',
            'yubin21' => 'required',
            'yubin22' => 'required',
            'region21' => 'required',
            'local21' => 'required',
            'addr21' => 'required',
            'tel' => 'required|numeric|digits_between:10,11|unique:user_accounts,U_TEL',
        ];

        $validateMessage = [
            "required" => "必須項目です。",
            "alpha_num" => "英数字のみの入力です。",
            "email" => "メールアドレスの形式で入力して下さい。",
            "integer" => "数値のみの入力です。",
            "numeric" => "数字を入力して下さい。",
            "digits_between" => "10〜11桁で入力して下さい。",
            "unique" => "すでに使われています。"
        ];

//        //バリデーションをインスタンス化
        $this->validate($request, $validateRules, $validateMessage);
        $data = \Request::all();

        $request->session()->put($data);

//        DB::table('user_accounts')->insert([
//            'U_ID' => $data['userId'],
//        ]);

//        $data = $request->input('userId');

//        dd($data);
//        echo $data;

//        printf($data);
//        $hoge = "hoge";

        return view('flovis.customer_confirm',compact('data'));
    }

    public function finish(Request $request) {
        $user = new \App\Models\user_account();
        $user->U_ID             = $request->userId;
        $user->U_FIRST_NAME     = $request->name1;
        $user->U_LAST_NAME      = $request->name2;
        $user->U_FIRST_kanaNAME = $request->kanaSei;
        $user->U_LAST_kanaNAME  = $request->kanaMei;
        $user->U_PW             = $request->pw;
        $user->U_MAIL           = bcrypt($request->email);
        $user->U_FIRST_ZIP      = $request->yubin21;
        $user->U_LAST_ZIP       = $request->yubin22;
        $user->U_PREFECTURES    = $request->region21;
        $user->U_LOCAL          = $request->local21;
        $user->U_ADDR           = $request->addr21;
        $user->U_TEL            = $request->tel;

        $user->save();
        return view('flovis.main');
    }
}
