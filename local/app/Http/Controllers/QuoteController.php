<?php

namespace Monbord\Http\Controllers;

use Illuminate\Http\Request;

use Monbord\Http\Requests;

class QuoteController extends Controller
{

    public function index(Request $request){

        return view('quotes.index');
    }
}
