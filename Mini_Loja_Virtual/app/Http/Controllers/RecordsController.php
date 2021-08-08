<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RecordsController extends Controller
{
    
    public function index()
    {
        $search = request('search');
        if($search):
            $records = Product::where([['name_product', 'like', '%'.$search.'%']])->get();
        else:
            $records = Product::all();
        endif;

        return view('index', ['records'=>$records, 'search'=>$search]);
    }

    public function create()
    {
        return view('autenticated.create');
    }

    public function store(StoreUpdateProduct $request)
    {
        $records = new Product;
        $records->name_product = $request->name_product;
        $records->description = $request->description;
        $records->price = $request->price;
        $records->image = $request->image;

        if($request->image->isValid()):

            $destiny = 'public/images_products';
            $image  = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destiny, $imageName);
            $records['image'] = $imageName;

            $user = auth()->user();
            $records->user_id = $user->id;
            $records->save();
        else:
            return redirect()->back();
        endif;
        
        return redirect()->route('index.dashboard')->with('msg_create', 'Produto Cadastrado Com Sucesso!!');
    }

    public function destroy($id)
    {
        $records = Product::findOrFail($id)->delete();

        if(!$records = Product::find($id)):
            return redirect()->back();
        endif;
               
        if(Storage::exists($records->image)):
            Storage::delete($records->image);
        endif;
        
        return redirect()->route('index.dashboard')->with('msg_delete', 'Produto Excluido!');
    }

    public function show($id)
    {
        if( !$records = Product::findOrFail($id)):
            return redirect()->back();
        endif;

        $user = auth()->user();
        $name_user = User::where('id', $records->user_id)->first()->toArray();

        $userLike = false;
        $userCart = false;

        if($user):

            $like = $user->like_product->toArray();
            $cart = $user->cart_shoppings->toArray();

            foreach($cart as $carts){

                if($carts['cart_id'] == $id):
                    $userCart = true;
                endif;
            }
            foreach($like as $likes){

                if($likes['id'] == $id):
                    $userLike = true;
                endif;
            }
        endif;

            return view('show', ['records'=>$records, 'name_user'=>$name_user,'userLike'=> $userLike, 'userCart'=>$userCart]);
      
    }

    public function edit($id)
    {
        $records = Product::findOrFail($id);
        $user = auth()->user();

        if($user->id != $records->user_id):
            return redirect()->back();
         endif;

         return view('autenticated.edit', ['records'=> $records]);
    }

    public function update(StoreUpdateProduct $request, $id)
    {

        if(!$records = Product::find($id)):
            return redirect()->back();
        endif;

        $records = $request->all();
        $user = auth()->user();

            if($request->image->isValid()):

                $destiny = 'public/images_products';
                $image  = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $path = $request->file('image')->storeAs($destiny, $imageName);
                $records['image'] = $imageName;
    
                Product::findOrFail($request->id)->update($records);
                    return redirect()->route('index.dashboard')->with('msg_update','Produto Atualizado Com Sucesso!!');
            else:
                return redirect()->back();
            endif;
    }

    public function dashboard()
    {
        $user = auth()->user();
        $records = $user->products;

        return view('autenticated.dashboard', ['records'=> $records]);
    }

    public function like_product($id)
    {
        $user = auth()->user();
        $user->like_product()->attach($id);

        $records = Product::findOrFail($id);
            return redirect()->back();
    }

}
