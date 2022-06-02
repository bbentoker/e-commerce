<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Seller;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'quantity' => 'required'
        ]);

        $user = Auth::user();
        $seller = \App\Models\Seller::find($data['seller_id']);
        $product = $seller->products->find($data['product_id']);

        //not allowing user to buy more than seller has
        if($data['quantity'] > $product->pivot->quantity )
        {
            return redirect()->route('buy',[$data['id'],$product->id])->with('error','Not enough quantity');
        }

        $user->bought()->create([
            'product_id' => $product->id,
            'seller_id' => $seller->id,
            'quantity' => $data['quantity'],
            'price' => $product->pivot->price,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
