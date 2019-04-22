<?php

use Illuminate\Database\Seeder;

class MarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*id=1*/
        $market = new \App\Market();
        $market->name = 'floret';
        $market->mail = 'floret@gmail.com';
        $market->phone = '09012345678';
        $market->url = 'https://floret.com';
        $market->zipcode = '1600023';
        $market->address1 = '東京都';
        $market->address2 = '新宿区';
        $market->address3 = '西新宿1-7-3';
        $market->first_name = 'ほげ';
        $market->last_name = 'ほげ';
        $market->first_kanasei = 'ホゲ';
        $market->last_kanamei = 'ホゲ';
        $market->save();

        /*id=2*/
        $market = new \App\Market();
        $market->name = '青山フラワーマーケット';
        $market->mail = 'aoyamaflowermarket@gmail.com';
        $market->phone = '09012345677';
        $market->url = 'https://www.aoyamaflowermarket.com/';
        $market->zipcode = '1600023';
        $market->address1 = '東京都';
        $market->address2 = '新宿区';
        $market->address3 = '西新宿1-7-3';
        $market->first_name = 'ほげ';
        $market->last_name = 'ほげ';
        $market->first_kanasei = 'ホゲ';
        $market->last_kanamei = 'ホゲ';
        $market->save();

        /*id=3*/
        $market = new \App\Market();
        $market->name = '世界の花屋';
        $market->mail = 'sekainohanaya@gmail.com';
        $market->phone = '09012345676';
        $market->url = 'https://sekainohanaya.shop-pro.jp/';
        $market->zipcode = '1600023';
        $market->address1 = '東京都';
        $market->address2 = '新宿区';
        $market->address3 = '西新宿1-7-3';
        $market->first_name = 'ほげ';
        $market->last_name = 'ほげ';
        $market->first_kanasei = 'ホゲ';
        $market->last_kanamei = 'ホゲ';
        $market->save();

    }
}
