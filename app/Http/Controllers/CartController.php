<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Syscover\ShoppingCart\Facades\CartProvider;
use Syscover\ShoppingCart\Cart;
use Syscover\ShoppingCart\Item;
use Syscover\ShoppingCart\TaxRule;
use Syscover\ShoppingCart\PriceRule;
use App\Product;

class CartController extends Controller
{
    // Show cart
    public function show()
    {
       $cart = CartProvider::instance('shopping')->getCartItems();
       $total = CartProvider::instance()->getQuantity();
       return view('store.cart', compact('cart','total'));
    }    
    // Add item
    public function add($id)
    {
        $product = Product::find($id);
        /*
        To add items we have create a Item object with this properties:

        id:string = Id of product
        name:string = Name of product
        quantity:float = Quantity of product than you want add
        inputPrice:float = Price product by unit
        weight:float [default 1.000] = Weight of product
        transportable:boolean [default true] = Set if product can to be delivery
        taxRule:TaxRule[] [default []] = Set tax rules for this product
        options:array [default []] = Set a associative array to set custom options
        */
        CartProvider::instance('shopping')->add(new Item($id, $product->name, 1, $product->price));    
        return redirect()->route('cart-show');
    }

}
