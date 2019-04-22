<?php

namespace App\Http\Controllers\Validation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValiMarketController extends Controller
{
    public function market_register() {
        return view('flovis.market_register');
    }

    public function market_confirm(Request $request) {



        $validateRules = [
            'marketId' => 'required|regex:/^[a-zA-Z0-9-]+$/',
            'marketName' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'firstKanaName' => 'required',
            'lastKanaName' => 'required',
            'pw' => 'required',
            'pwConfirm' => 'required',
            'mail' => 'required|email',
            'yubin21' => 'required|numeric',
            'yubin22' => 'required|numeric',
            'region21' => 'required',
            'local21' => 'required',
            'addr21' => 'required',
            'tel' => 'required|numeric|digits_between:10,11',
        ];

        $validateMessage = [
            "required" => "必須項目です。",
            "regex" => "英数字のみの入力です。",
            "email" => "メールアドレスの形式で入力して下さい。",
            "integer" => "数値のみの入力です。",
            "numeric" => "数字を入力して下さい。",
            "digits_between" => "10〜11桁で入力して下さい。",
        ];

        //バリデーションをインスタンス化
        $this->validate($request, $validateRules, $validateMessage);
        $data = \Request::all();

        $request->session()->put($data);



        return view('flovis.market_confirm',compact('data'));
    }

    public function market_detail(Request $request) {
        return view('flovis.market_detail');
    }


}
