<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class TestMailController extends Controller
{
    public function ship(Request $request)
    {
        //
    }
}
