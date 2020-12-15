<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Shoe;
use App\Cart;
use DB;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('useronly');
    }

    public function getShoePage($id){
        $data = Shoe::get()->where('id','=',$id)->first();
        return view('shoe', ['data' => $data]);
    }

    public function addToCart(Request $request, $id){
        $cart = Cart::get()
                    ->where('shoe_id', '=', $id)
                    ->where('user_id', '=', Auth::user()->id)
                    ->first();

        if(is_null($cart)){
            DB::table('carts')->insert([
                'shoe_id' => $id,
                'user_id' => Auth::user()->id,
                'quantity' => $request->quantity
            ]);
        } else {
            $cart->increment('quantity', $request->quantity);
        }

        return redirect('/Carts');
    }

    public function getCarts(){
        $carts = Cart::where('user_id', '=', Auth::user()->id)
                    ->get();
        // dd($carts);
        return view('carts', ['carts' => $carts]);
    }

    public function checkouts(Request $request){
        $id = DB::table('transaction_headers')->insertGetId([
            'user_id' => Auth::user()->id
        ]);
        
        $carts = Cart::where('user_id', '=', Auth::user()->id)
                    ->get();
        
        // dd($carts);
        foreach ($carts as $cart){
            DB::table('transaction_details')->insert([
                'header_id' => $id,
                'shoe_id' => $cart->shoe_id,
                'quantity' => $cart->quantity
            ]);
        }

        Cart::where('user_id', '=', Auth::user()->id)->delete();

        return redirect('/');
    }

    public function getEditCart($id){
        $cart = Cart::where('shoe_id', '=', $id)
                    ->where('user_id', '=', Auth::user()->id)
                    ->first();
        // dd($cart);
        return view('shoe', ['data' => $cart]);
    }

    public function editCart(Request $request){
        $cart = Cart::where('shoe_id', '=', $request->shoe_id)
                    ->where('user_id', '=', Auth::user()->id);
        if(!$request->is_update){
            $cart->delete();
            return redirect('/Carts');
        }

        $cart->update(['quantity' => $request->quantity]);
        return redirect('/Carts');
    }
}
