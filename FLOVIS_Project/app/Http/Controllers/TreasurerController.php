<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;


class TreasurerController extends Controller
{



    /*注文者情報・クレジットカード・お届け先ユーザー入力*/
    public function userconfirm()
    {

        $id = Auth::id();

        $user = Auth::user(DB::table('users')->get());

        $addresses = DB::table('addresses')
            ->where('user_id', $id)
            ->get();

        $cards = DB::table('credit_cards')
            ->where('user_id', $id)
            ->get();

        return view('flovis.settlement.userConfirm')->with([
            'user' => $user,
            'addresses' => $addresses,
            'cards' => $cards,
        ]);
    }



    public function Store(Request $request)
    {

        $id = Auth::id();

        $decision = $request->Decision;

        if ($decision == "all") {
            $validateRule = [
                'user_id' => '',
                'yubin21' => 'required|numeric|digits:3',
                'yubin22' => 'required|numeric|digits:4',
                'region21' => 'required|regex:/^[亜-黑]*$/u',
                'local21' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u',
                'addr21' => 'required|regex:/^[あ-んァ-ヶ亜-黑0-9-ー 　]*$/u',
                'tel' => 'required|numeric|digits_between:10,11|unique:addresses',
                'cardNum' => 'required|numeric|digits:16',
                'securityCode' => 'required|numeric|digits:3',
                'expirationMonth' => 'required',
                'expirationYear' => 'required',
                'user_name' => 'required|regex:/^[A-Z 　]*$/u',
            ];

            $this->validate($request, $validateRule);

            $address = new \App\Address();
            $address->user_id = $request->user_id;
            $address->firstZip = $request->yubin21;
            $address->lastZip = $request->yubin22;
            $address->region = $request->region21;
            $address->local = $request->local21;
            $address->addr = $request->addr21;
            $address->tel = $request->tel;
            $address->save();


            $creditcard = new \App\CreditCard();
            $creditcard->user_id = $request->user_id;
            $creditcard->cardNum = $request->cardNum;
            $creditcard->securityCode = Hash::make($request->securityCode);
            $creditcard->expirationMonth = $request->expirationMonth;
            $creditcard->expirationYear = $request->expirationYear;
            $creditcard->name = $request->user_name;
            $creditcard->save();


            return redirect()->back();

        } elseif ($decision == "credit") {

            $validateRule = [
                'user_id' => 'required',
                'cardNum' => 'required|numeric|digits:16',
                'securityCode' => 'required|numeric|digits:3',
                'expirationMonth' => 'required',
                'expirationYear' => 'required',
                'user_name' => 'required|regex:/^[A-Z 　]*$/u',
            ];

            $this->validate($request, $validateRule);

            $card = new \App\CreditCard();
            $card->user_id = $request->user_id;
            $card->cardNum = $request->cardNum;
            $card->securityCode = $request->securityCode;
            $card->expirationMonth = $request->expirationMonth;
            $card->expirationYear = $request->expirationYear;
            $card->name = $request->user_name;
            $card->save();

            return redirect()->back();


        } elseif ($decision == "addr") {
            $validateRule = [
                'user_id' => '',
                'yubin21' => 'required|numeric|digits:3',
                'yubin22' => 'required|numeric|digits:4',
                'region21' => 'required|regex:/^[亜-黑]*$/u',
                'local21' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u',
                'addr21' => 'required|regex:/^[あ-んァ-ヶ亜-黑0-9-ー 　]*$/u',
                'tel' => 'required|numeric|digits_between:10,11|unique:addresses',
            ];

            $this->validate($request, $validateRule);

            $address = new \App\Address();
            $address->user_id = $request->user_id;
            $address->firstZip = $request->yubin21;
            $address->lastZip = $request->yubin22;
            $address->region = $request->region21;
            $address->local = $request->local21;
            $address->addr = $request->addr21;
            $address->tel = $request->tel;
            $address->save();


            return redirect()->back();


        }


    }


    /*受取人バリデーション*/
    public function card(Request $request)
    {
        $validateRule = [
            'ReceiverName' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u|',
            'ReceiverkanaName' => 'required|regex:/^[ァ-ヶ]*$/u|',
            'yubin21' => 'required|numeric|digits:3',
            'yubin22' => 'required|numeric|digits:4',
            'region21' => 'required|regex:/^[亜-黑]*$/u',
            'local21' => 'required|regex:/^[あ-んァ-ヶ亜-黑]*$/u',
            'addr21' => 'required|regex:/^[あ-んァ-ヶ亜-黑0-9-ー 　]*$/u',
            'tel' => 'required|numeric|digits_between:10,11',
        ];

        $this->validate($request, $validateRule);

        $data = \Request::all();
        $request->session()->put($data);


        $id = Auth::id();


        return view('flovis.settlement.cardConfirm')->with([
            'id' => $id,
            'data' => $data,
        ]);

//        return view('flovis.main');


    }


    /*最終確認画面*/
    public function lastconfirm(Request $request)
    {

        $data = \Request::all();
        $request->session()->put($data);

//        $id = Auth::id();
        $user = Auth::user();


        $products = \App\Product::get();

        $id = Auth::id();
        $addresses = \App\Address::where('user_id', $id)->get();

        $contents = \Gloudemans\Shoppingcart\Facades\Cart::content();/*カートの中身*/
        $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();/*全体の小計*/
        $tax = \Gloudemans\Shoppingcart\Facades\Cart::tax();/*全体の税*/
        $total = \Gloudemans\Shoppingcart\Facades\Cart::total();/*全合計*/
        $count = \Gloudemans\Shoppingcart\Facades\Cart::count();/*カートの中身のカウント*/


        return view('flovis.settlement.orderconfirm')->with([
            'user' => $user,
            'addresses' => $addresses,
            'contents' => $contents,
            'tax' => $tax,
            'subtotal' => $subtotal,
            'total' => $total,
            'count' => $count,
            'data' => $data,
            'products' => $products,
        ]);
    }


    /*購入完了画面*/
    public function orderfinish(Request $request)
    {


        $contents = \Gloudemans\Shoppingcart\Facades\Cart::content();/*カートの中身*/
        $count = \Gloudemans\Shoppingcart\Facades\Cart::count();/*カートの中身のカウント*/


//        $card = DB::table('credit_cards')
//            ->where('user_id',$request->user_id)
//            ->get();

        $id = Auth::id();


        foreach ($contents as $content) {
            $order = new \App\Order();
            $order->user_id = $request->user_id;
            $order->product_id = $content->id;
            $order->qty = $content->qty;
            $order->receiverName = $request->ReceiverName;
            $order->receiverkanaName = $request->ReceiverkanaName;
            $order->firstZip = $request->yubin21;
            $order->lastZip = $request->yubin22;
            $order->region = $request->region21;
            $order->local = $request->local21;
            $order->addr = $request->addr21;
            $order->tel = $request->tel;
            $order->receiverDate = $request->ReceiverDate;
            $order->receiverTime = $request->ReceiverTime;
            $order->remarks = $request->remarks;
            $order->save();
        }


        $data = \Request::all();
        $request->session()->put($data);


        Mail::to(Auth::user()->email)
            ->send(new OrderMail());

//        Cart::destroy();

        return view('flovis.settlement.orderfinish')->with([
            'data' => $data,
//            'cards' => $cards,
        ]);
    }

    /*納入完了メール*/
//    public function sendMail(Request $request) {
//
//        $contents = \Gloudemans\Shoppingcart\Facades\Cart::content();/*カートの中身*/
//
//
//        return view('flovis.demo')->with([
//            'contents' => $contents,
//        ]);
//    }


}
