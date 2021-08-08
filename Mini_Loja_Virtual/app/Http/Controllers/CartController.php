<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    
    public function cart()
    {
        $user = auth()->user();
        $records = $user->cart_shoppings;
        $totalPrice = collect($records)->sum('price');
    
            return view('autenticated.cart', ['records'=> $records, 'totalPrice'=> $totalPrice, 'user'=>$user]);
    }

    public function cart_shopping($id)
    {
        if(!$products = Product::findOrFail($id)):
            return redirect()->back();
        endif;
            $user = auth()->user();

            $records = new Cart;
            $records->name_product = $products->name_product;
            $records->description = $products->description;
            $records->price = $products->price;
            $records->image = $products->image;
            
            $records->cart_id = $products->id;
            $records->user_id = $user->id;
            $records->save();

        return redirect()->back()->with('msg_cart', 'Produto Adicionado No Carrinho');
    }

    public function delete_cart($id)
    {
        $user = auth()->user();
        $user->delete_cart()->detach($id);

            return redirect()->route('index.cart')->with('msg_cartDelete', 'Produto Removido Do Carrinho');
    }

    public function buy_products($id)
    {
        $user = auth()->user();
        $user->cart_shoppings()->delete($id);

            return redirect()->route('index.home')->with('msg_buyProduct', 'Seu Produto Foi Aprovado!! Logo logo Chegara Na Sua Casa kkk');
    }
}
