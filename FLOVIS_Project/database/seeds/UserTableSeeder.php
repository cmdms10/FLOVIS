<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = "ponsuke";
        $user->firstName = "山田";
        $user->lastName = "太郎";
        $user->kanafirstName = "ヤマダ";
        $user->kanalastName = "タロウ";
        $user->password = Hash::make("ponsuke");
        $user->email = "ponsuke2510@gmail.com";
        $user->save();
    }
}
