<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_form() {
        return view('logintest.index');
    }

    public function betaLogin(Request $request){



        $this->validate($request,[
            'userId' => 'required',
            'password' => 'required',
        ]);

//        $id = $request->input('userId');
//        $pw = $request->input('password');

        if(Auth::attempt(['U_ID' => $request->input('userId'), 'U_PW' => $request->input('password')])) {
            return view('logintest.success');
        }






//        $pwhash = DB::tabel('user_accounts')->where('userId',$id)->first();
//        $pwhash = DB::table('user_accounts')->where('U_PW',$id)->value('password');
//        $pw = bcrypt($request->input('password'));
//        $pw = Hash::make($request->input('password'));



//        if(Auth::attempt(['U_ID' => $id, 'U_PW' => $pw])) {
//            return view('logintest.success');
//        }



//        return view('logintest.false');
        return redirect()->back();
    }

}
