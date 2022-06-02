<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        dump($request->all());
    }
}
