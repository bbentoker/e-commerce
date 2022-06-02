@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-12">
        <div class="card m-3">
            <div class="card-body d-flex">
                <div class="col-4">
                    <img src="/img/duck.jpg" style="height: 250px;">
                </div>
                <div class="col-4">
                    <div class="row mb-3">
                        <div class="col">
                            <b>Seller: </b>
                            {{$seller->name}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <b>Product: </b>
                            {{$product->name}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <b>In Stock: </b>
                            {{$seller->products->find($product->id)->pivot->quantity}} pieces left
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <b>Price: </b>
                            {{$seller->products->find($product->id)->pivot->price}} $
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <form action="{{route('purchase')}}" method="POST">
                        @csrf
                        <input type="hidden" name="seller_id" value="{{$seller->id}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        
                        <div class="row d-flex justify-content-end mb-2">
                            <div class="col d-flex justify-content-end">
                                <label for="quantity">Please select the amount of the product you want to buy</label>

                            </div>
                        </div>                        
                        <div class="row d-flex justify-content-end mb-2">
                            <div class="col-6 d-flex justify-content-end">
                                <input type="number" min="1" max="{{$seller->products->find($product->id)->pivot->quantity}}" name="quantity" style="width: 50%;">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Purchase</button>

                            </div>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection