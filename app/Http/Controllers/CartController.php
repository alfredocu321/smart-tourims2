<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index(){
        $cartItems = Cart::instance('cart')->content();
        return view('web-page.cart', ['cartItems' => $cartItems]); 
    }


    public function AddToCart(Request $request){
        
        $product = Product::find($request->id);
        $price = $product->price;
        Cart::instance('cart')->add($product->id, $product->product_name, $request->quantity, $price)->associate('App\Models\Product');

        return redirect()->back()->with('message', 'Product added to cart successfully!');
        
    }

    public function UpdateCart(Request $request){
        Cart::instance('cart')->update($request->rowId,$request->quantity);
        return redirect()->route('cart.index');
    }

    public function RemoveItem(Request $request){

        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        
        return redirect()->route('cart.index');
    }

    public function ClearItem(Request $request){

        Cart::instance('cart')->destroy();

        return redirect()->route('cart.index');
    }
}
