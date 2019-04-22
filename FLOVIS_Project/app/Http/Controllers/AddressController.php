<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function form() {

        $id = Auth::id();

        if(\App\Address::where('user_id',$id)->exists()) {
            return redirect()->back();
        }

        return view('flovis.address.addressRegister')->with([

        ]);
    }

    public function confirm(Request $request) {

        $id = Auth::id();

        $validateRules = [
            'user_id' => '',
            'yubin21' => 'required|numeric|digits:3',
            'yubin22' => 'required|numeric|digits:4',
            'region21' => 'required|regex:/^[亜-黑]*$/u',
            'local21' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u',
            'addr21' => 'required|regex:/^[あ-んァ-ヶ亜-黑0-9-ー 　]*$/u',
            'tel' => [
                'required',
                'numeric',
                'digits_between:10,11',
                Rule::unique('addresses','tel')->ignore(Auth::id()),
            ],
        ];

        $this->validate($request,$validateRules);

        $data = \Request::all();

        $request->session()->put($data);

        return view('flovis.address.addressConfirm')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {

        $address = new \App\Address();
        $address->user_id = $request->user_id;
        $address->firstZip = $request->yubin21;
        $address->lastZip = $request->yubin22;
        $address->region = $request->region21;
        $address->local = $request->local21;
        $address->addr = $request->addr21;
        $address->tel = $request->tel;

        $address->save();

        return view('flovis.profileUpdate.profileUpdateFinish');
    }
}
