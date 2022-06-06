<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Seller;

class BuyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buy($sellerId,$productId)
    {
        $seller = \App\Models\Seller::find($sellerId);
        $product = \App\Models\Product::find($productId);
        
        return view('buy',compact('seller','product'));
    }
    public function purchase(Request $request)
    {   

        $data = $request->validate([
            'seller_id' => 'required',
            'product_id' => 'required',
            'address' => 'required',
            'quantity' => 'required'
        ]);
        
        
        $user = Auth::user();
        $seller = \App\Models\Seller::find($data['seller_id']);
        $product = $seller->products->find($data['product_id']);

        //not allowing user to buy more than seller has
        if($data['quantity'] > $product->pivot->quantity )
        {
            return redirect()->route('buy',[$seller->id,$product->id])->with('error','Not enough quantity');
        }

        $user->bought()->create([
            'product_id' => $product->id,
            'seller_id' => $seller->id,
            'quantity' => $data['quantity'],
            'price' => $product->pivot->price,
            'address' => $data['address']
        ]);
        

        //decrementing seller's quantity
        $product->pivot->decrement('quantity',$request->quantity);
        $product->pivot->save();
  
        return redirect()->route('home.index');
    }
    


    public function profile()
    {
        $user = Auth::user();
        $products = Product::all();
        $sellers = Seller::all();
        return view('profile',compact('user','products','sellers'));
    }

    public function catFilter($id)
    {
        $categories = \App\Models\Category::all();
        $category = \App\Models\Category::find($id);
        
        return view('homeFiltered',compact('category','categories'));
    }
}
