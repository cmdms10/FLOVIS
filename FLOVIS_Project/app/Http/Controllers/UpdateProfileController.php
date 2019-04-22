<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UpdateProfileController extends Controller
{
    /*プロフィール表示*/
    public function showProfile()
    {
        $id = Auth::id();


        $cards = \App\CreditCard::where('user_id',$id)->get();

        $profiles = \App\User::where('id', $id)->get();

        $addresses = \App\Address::where('user_id', $id)->get();

        return view('flovis.profileUpdate.showProfile')->with([
            'profiles' => $profiles,
            'addresses' => $addresses,
            'cards' => $cards,
        ]);
    }


    public function updateForm()
    {

        return view('flovis.profileUpdate.profileUpdateForm');
    }

    /*退会*/
    public function delete()
    {

        \App\User::find(Auth::id())->delete();

        return redirect()->route('home');
    }


    /*ログイン情報変更*/
    public function accountConfirm(Request $request)
    {

        $validateRules = [
            'Name' => 'required|regex:/^[a-zA-Z0-9()<>_ ]+$/|max:10',
            'firstName' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u',
            'lastName' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u',
            'kanafirstName' => 'required|regex:/^[ァ-ヶ]*$/u',
            'kanalastName' => 'required|regex:/^[ァ-ヶ]*$/u',
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique('users', 'email')->ignore(Auth::id()),
            ],
            'password' => 'required|string|regex:/^[a-zA-Z0-9]+$/|min:6|confirmed',
        ];


        $this->validate($request, $validateRules);

        $pass = $request->password;

        $data = \Request::all();

        $request->session()->put($data);

        return view('flovis.profileUpdate.updateConfirm')->with([
            'data' => $data,
            'pass' => $pass,
        ]);

    }

    /*プロフィール再設定*/
    public function accountStore(Request $request)
    {

        $id = Auth::id();

        $param = [
            'name' => $request->Name,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'kanafirstName' => $request->kanafirstName,
            'kanalastName' => $request->kanalastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        DB::table('users')
            ->where('id', $id)
            ->update($param);

        return view('flovis.profileUpdate.profileUpdateFinish');
    }


    /*登録住所の編集*/

    public function addressUpdateForm()
    {
        return view('flovis.profileUpdate.addressUpdateForm');
    }


    /*登録住所の変更*/
    public function addressUpdateConfirm(Request $request)
    {

        $validateRules = [
            'yubin21' => 'required|numeric|digits:3',
            'yubin22' => 'required|numeric|digits:4',
            'region21' => 'required|regex:/^[亜-黑]*$/u',
            'local21' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u',
            'addr21' => 'required|regex:/^[あ-んァ-ヶ亜-黑0-9-ー 　]*$/u',
            'tel' => [
                'required',
                'numeric',
                'digits_between:10,11',
                Rule::unique('addresses', 'tel')->ignore(Auth::id()),
            ],

        ];

        $this->validate($request, $validateRules);


        $data = $data = \Request::all();

        $request->session()->put($data);

        return view('flovis.profileUpdate.addressUpdateConfirm')->with([
            'data' => $data,
        ]);
    }

    /*住所再登録*/
    public function addressUpdateFinish(Request $request)
    {

        $id = Auth::id();

        $param = [
            'firstZip' => $request->yubin21,
            'lastZip' => $request->yubin22,
            'region' => $request->region21,
            'local' => $request->local21,
            'addr' => $request->addr21,
            'tel' => $request->tel,
        ];

        DB::table('addresses')
            ->where('user_id', $id)
            ->update($param);

        return view('flovis.profileUpdate.profileUpdateFinish');
    }


    public function profileUpdate(Request $request)
    {
        $id = Auth::id();

        $param = [
            'name' => $request->name,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'kanafirstName' => $request->kanafirstName,
            'kanalastName' => $request->kanalastName,
        ];

        DB::table('users')
            ->where('id', $id)
            ->update($param);

        return redirect()->back();
    }


    /*パスワードのみのアップデート*/
    public function passUpdate(Request $request)
    {
        $false = "失敗";
        $success = "成功";

//        $validateRule = [
//            'password' => 'required|string|regex:/^[a-zA-Z0-9]+$/|min:6|max:255|confirmed|',
//        ];
//
//        $this->validate($request,$validateRule);


        /*ユーザー情報取得*/
        $id = Auth::id();
        $userInfo = Auth::user();

        /*現在のユーザーパスワードをDBから取得*/
        $hashedPassword = $userInfo->password;
        /*入力されたパスワード*/
        $password = $request->old_pass;

        //入力された現在パスワードとDBのパスワードが合致しているかチェック
        if (Hash::check($password, $hashedPassword)) {
            // パスワード一致したら、、、
            // 新しいパスワードの２つがあっているかチェック
            if ($request->new_pass == $request->new_passConf) {
                $encrypted = Hash::make($request->new_pass);
                DB::table('users')
                    ->where('id', $id)
                    ->update(array(
                            'password' => $encrypted
                        )
                    );
                return redirect(route('profile'))->with('message',$success);
            } else {
                return redirect(route('profile'))->with('message',$false);
            }

        } else {
            return redirect(route('profile'))->with('message',$false);
        }

//        return redirect()->back();

    }


}
