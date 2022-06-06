@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-12">
        <div class="card m-3">
            <div class="card-body d-flex">
                <div class="col-4">
                    @if($product->name == "Toy")
                        <img src="/img/duck.jpg" style="height: 250px;">
                    @elseif($product->name == "Tool")
                        <img src="/img/tool.jpg" style="height: 250px;">
                    @elseif($product->name == "Plate")
                        <img src="/img/plate.jpg" style="height: 250px;">
                    @elseif($product->name == "Bag")
                        <img src="/img/bag.jpg" style="height: 250px;">
                    @endif
                </div>
                <div class="col-6">
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
                            <b>Brand: </b>
                            {{$product->brand}}
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
                <div class="col-2">
                    <form action="{{route('purchase')}}" method="POST">
                        @csrf
                        <input type="hidden" name="seller_id" value="{{$seller->id}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="row d-flex justify-content-end mb-2">
                            <div class="col d-flex justify-content-start">
                                <label for="quantity">Address</label>

                            </div>
                        </div>                        
                        <div class="row d-flex mb-2">
                            <div class="col-12 d-flex justify-content-start">
                                <input type="text" min="1" max="255" name="address" style="width: 100%;">
                            </div>
                        </div>
                        <div class="row">
                            @error('address')
                                <span role="alert" style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row d-flex justify-content-end mb-2">
                            <div class="col d-flex justify-content-start">
                                <label for="quantity">Amount</label>

                            </div>
                        </div>                        
                        <div class="row d-flex justify-content-end mb-2">
                            <div class="col-12 d-flex justify-content-end">
                                <input type="number" min="1" max="{{$seller->products->find($product->id)->pivot->quantity}}" name="quantity" style="width: 100%;">
                            </div>
                        </div>
                        <div class="row">
                            @error('quantity')
                                <span role="alert" style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <p><strong>Opps Something went wrong</strong></p>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
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