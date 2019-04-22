<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreditcardController extends Controller
{

    /*クレジットカード表示*/
    public function cardInfo() {


//        $cards = \App\User::with('credit_cards')->get();
//        $cards = DB::table('credit_cards')->get();
        $id = Auth::id();
        $cards = \App\CreditCard::where('user_id',$id)->get();
//        var_dump($id);

        return view('flovis.creditcard.creditcard')->with([
                'cards' => $cards,
                'id' => $id,
//            'data' => $data,
            ]);




    }


    /*カード登録フォーム*/
    public function registerForm() {

        $id = Auth::id();

        $cards = DB::table('credit_cards')
            ->where('user_id','=',$id)
            ->get();

        foreach($cards as $card) {
            if(!empty($card->user_id)) {
                return redirect()->back();
            }
        }

        return view('flovis.creditcard.cardregisterform');


    }


    /*登録システム*/
    public function store(Request $request) {
        $validateRules = [
            'user_id' => 'required',
            'cardNum' => 'required|numeric|digits:16',
            'securityCode' => 'required|numeric|digits:3',
            'expirationMonth' => 'required',
            'expirationYear' => 'required',
            'name' => 'required|regex:/^[A-Z 　]*$/u',

        ];

        $validateMessage = [
            "required" => "必須項目です。",
            "numeric" => "半角数字で入力して下さい。",
            "digits:16" => "16桁で入力して下さい。",
            "digit" => "3桁で入力して下さい。",
            "alpha" => "英字で入力して下さい。",
            "regex" => "英大文字で入力してください。"
        ];

        $this->validate($request,$validateRules,$validateMessage);

        $data = \Request::all();

//        $content = var_dump($data);

        $request->session()->put($data);

        return view('flovis.creditcard.cardconfirm',compact('data'));

    }

    /*完了ページ*/
    public function fin(Request $request) {

        $creditcard = new \App\CreditCard();
        $creditcard->user_id = $request->user_id;
        $creditcard->cardNum = $request->cardNum;
        $creditcard->securityCode = Hash::make($request->securityCode);
        $creditcard->expirationMonth = $request->expirationMonth;
        $creditcard->expirationYear = $request->expirationYear;
        $creditcard->name = $request->name;

        $creditcard->save();

        return view('flovis.creditcard.cardfin');
    }










    /*カード情報変更*/
    public function change() {

        return view('flovis.creditcard.changecard');

    }



    public function updateStore(Request $request) {

        $validateRules = [
            'user_id' => 'required',
            'cardNum' => 'required|numeric|digits:16',
            'securityCode' => 'required|numeric|digits:3',
            'expirationMonth' => 'required',
            'expirationYear' => 'required',
            'name' => 'required|regex:/^[A-Z 　]*$/u',

        ];

        $validateMessage = [
            "required" => "必須項目です。",
            "numeric" => "半角数字のみを入力して下さい。",
            "digits:16" => "16桁で入力して下さい。",
            "digit" => "3桁で入力して下さい。",
            "alpha" => "英大文字で入力して下さい。"

        ];

        $this->validate($request,$validateRules,$validateMessage);


            $data = \Request::all();

        $request->session()->put($data);

        return view('flovis.creditcard.cardupdateconfirm',compact('data'));

    }


    public function update(Request $request) {

//        $creditcard = \App\CreditCard();
//        $creditcard->user_id = $request->user_id;
//        $creditcard->cardNum = $request->cardNum;
//        $creditcard->securityCode = Hash::make($request->securityCode);
//        $creditcard->expirationMonth = $request->expirationMonth;
//        $creditcard->expirationYear = $request->expirationYear;
//        $creditcard->name = $request->name;
//
//        $creditcard->update();

        $id = Auth::id();

        $param = [
            'user_id' => $request->user_id,
            'cardNum' => $request->cardNum,
            'securityCode' => Hash::make($request->securityCode),
            'expirationMonth' => $request->expirationMonth,
            'expirationYear' => $request->expirationYear,
            'name' => $request->name,
        ];

        DB::table('credit_cards')
            ->where('user_id',$id)
            ->update($param);

        return view('flovis.creditcard.cardfin');
    }


    public function destroy() {

        $id = Auth::id();
        $card = \App\CreditCard::where('user_id',$id)->delete();



        return redirect('flovis/profile')->with([
            'card' => $card,
        ]);
    }

}
