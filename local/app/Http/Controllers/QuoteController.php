<?php

namespace Monbord\Http\Controllers;

use Illuminate\Http\Request;

use Monbord\Author;
use Monbord\Http\Requests;
use Monbord\Quote;

class QuoteController extends Controller
{

    public function index(Request $request){

        return view('quotes.index');
    }

    public function postQuote(Request $request){
        /*
        $this->validate($request, [
            'author' => 'required|min:6|alpha',
            'quote' => 'required|min:35'
        ]);
        */

        $authorText = ucfirst($request->author);
        $quoteText = trim($request->quote);
        $author = Author::where('name',$authorText)->first();
        if(!$author){
            $author = new Author();
            $author->name = $authorText;
            $author->save();
            $quote = new Quote();
            $quote->quote = $quoteText;
            $author->quotes()->save($quote);
            return view('quotes.index');
        }
        $quote = new Quote();
        $quote->quote = $quoteText;
        $author->quotes()->save($quote);
        return view('quotes.index');
    }
}
