<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    /*カート中身*/
    public function cart() {

        $contents = \Gloudemans\Shoppingcart\Facades\Cart::content();/*カートの中身*/
        $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();/*全体の小計*/
        $tax = \Gloudemans\Shoppingcart\Facades\Cart::tax();/*全体の税*/
        $total = \Gloudemans\Shoppingcart\Facades\Cart::total();/*全合計*/
        $count = \Gloudemans\Shoppingcart\Facades\Cart::count();/*カートの中身のカウント*/

        $products = \App\Product::get();


//        if (isset($content)) {
//            return view('flovis.FAQ');
//        }

        return view('flovis.cart')->with([
            'contents' => $contents,
            'subtotal' => $subtotal,
            'count' => $count,
            'total' => $total,
            'tax' => $tax,
//            'productId' => $productId,
            'products' => $products,
        ]);
}



    /*追加*/
    public function store(Request $request) {

        \Gloudemans\Shoppingcart\Facades\Cart::add($request->id, $request->title, $request->qty, $request->price);

        return redirect()->back();
    }


    /*削除*/
    public function delete(Request $request) {

        \Gloudemans\Shoppingcart\Facades\Cart::remove($request->rowId);

        return redirect()->route('cart');
    }



    /*数量変更*/
    public function update(Request $request) {

        \Gloudemans\Shoppingcart\Facades\Cart::update($request->rowId,$request->qty);

        return redirect()->back();
    }



    public function num() {
        $count = Cart::count();

        return view('flovis/')->with([
            'count' => $count,
        ]);
    }


}
