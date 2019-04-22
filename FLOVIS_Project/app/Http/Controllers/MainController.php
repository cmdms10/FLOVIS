<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /*topページ*/
    public function flovis() {

        $items = DB::table('products')->get();

        return view('flovis.main')->with([
            'items' => $items
        ]);
    }



    /*パスワード再設定*/
    public function password_reset() {
        return view('flovis.password_reset');
    }

    public function pw_reset_send_finish(Request $request) {

        $data = $request->all();

        return view('flovis.pw_reset_send_finish',compact('data'));
    }

    public function reset_finish() {
        return view('flovis.reset_password');
    }




    public function reset_password_finish() {
        return view('flovis.reset_password_finish');
    }



    public function contact_finish() {
        return view('flovis.contact_finish');
    }

    public function register_finish() {
        return view('flovis.register_finish');
    }

    public function shop_register_form() {
        return view('flovis.shop_register_form');
    }

    public function FAQ() {
        return view('flovis/FAQ');
    }




}
