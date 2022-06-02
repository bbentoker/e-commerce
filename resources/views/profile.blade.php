@extends('layouts.app')
@section('content')
<div class="container">
    <h1><b>User: </b>{{$user->name}}</h1>
    <div class="row">
        <h3>Items bought in the past</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Seller</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->bought as $bought)
                <tr>
                    <td>{{$products->find($bought->product_id)->name}}</td>
                    <td>{{$sellers->find($bought->seller_id)->name}}</td>
                    <td>{{$bought->price}}</td>
                    <td>{{$bought->quantity}}</td>
                    <td>{{$bought->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection