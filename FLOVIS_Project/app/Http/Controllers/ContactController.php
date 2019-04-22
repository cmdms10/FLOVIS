<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*問い合わせページ表示*/
    public function form() {
        return view('flovis.contact');
    }

    /*問い合わせページ登録処理*/
    public function store(Request $request) {
        $validateRule = [
            'name' => 'required|string|regex:/^[亜-黑あ-んァ-ヶa-zA-Z0-9()<>_ ]+$/',
            'kanaName' => 'nullable|regex:/^[ァ-ヶ]*$/u',
            'email' => 'required|email',
            'tel' => 'nullable|regex:/^[0-9]+$/|digits_between:10,11',
            'contents' => 'required|min:1',
        ];

        $validateMessage = [
            "required" => "必須項目です",
            "digits_between" => "10〜11桁で入力して下さい。",
//            "digits:1" => "",
        ];

        $this->validate($request,$validateRule,$validateMessage);


        $contact = new \App\Contact();
        $contact->name = $request->name;
        $contact->kanaName = $request->kanaName;
        $contact->email = $request->email;
        $contact->tel = $request->tel;
        $contact->contents = $request->contents;
        $contact->save();

        session()->flash('flash_message','✔ 送信を完了しました。');

        return redirect()->back();
    }


}
