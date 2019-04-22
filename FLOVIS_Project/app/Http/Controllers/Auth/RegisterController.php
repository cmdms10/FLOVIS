<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use http\Env\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/flovis';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|regex:/^[^あ-んァ-ヶ亜-黑]+$/|max:10',
            'firstName' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u',
            'lastName' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u',
            'kanafirstName' => 'required|regex:/^[ァ-ヶ]*$/u',
            'kanalastName' => 'required|regex:/^[ァ-ヶ]*$/u',
            'password' => 'required|string|regex:/^[a-zA-Z0-9]+$/|min:6|max:255|confirmed|',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'kanafirstName' => $data['kanafirstName'],
            'kanalastName' => $data['kanalastName'],
            'password' => bcrypt($data['password']),
            'email' => $data['email'],
        ]);
    }

}
