<?php

namespace App\Http\Controllers\Validation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValiContactController extends Controller
{
    public function contact() {
        return view('flovis.contact');
    }

    public function contact_finish(Request $request) {
        $validateRules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'contents' => 'required',
        ];


        $validateMessage = [
            "required" => "必須項目です。",
            "email" => "メールアドレスの形式で入力して下さい。",
        ];

        $this->validate($request, $validateRules, $validateMessage);
//        $data = \Request::all();
//
//        $request->session()->put();

        $contact = new \App\Models\contact();
        $contact->U_FIRST_NAME = $request->firstname;
        $contact->U_LAST_NAME = $request->lastname;
        $contact->U_MAIL = $request->email;
        $contact->U_TITLE = $request->title;
        $contact->U_CONTENT = $request->contents;

        $contact->save();
        return view('flovis.contact_finish');
    }

    public function finish(Request $request) {
//        $contact = new \App\Models\contact();
//        $contact->U_FIRST_NAME = $request->firstname;
//        $contact->U_LAST_NAME = $request->lastname;
//        $contact->U_MAIL = $request->email;
//        $contact->U_TITLE = $request->title;
//        $contact->U_CONTENT = $request->contents;
//
//        $contact->save();
//        return view('flovis.contact_finish');

    }
}
