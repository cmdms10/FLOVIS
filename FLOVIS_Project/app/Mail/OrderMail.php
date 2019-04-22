<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use \Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        $contents = \Gloudemans\Shoppingcart\Facades\Cart::content();/*カートの中身*/
        $total = \Gloudemans\Shoppingcart\Facades\Cart::total();/*全合計*/

        $data = \Request::all();

        $products = \App\Product::get();

//        $request->session()->put($data);

        Cart::destroy();

        return $this
            ->from('flovis@example.com')
            ->subject('ご注文内容確認メール')
            ->view('flovis.mailContent')->with([
                'contents' => $contents,
                'products' => $products,
                'total' => $total,
                'data' => $data,
            ]);
    }
}
