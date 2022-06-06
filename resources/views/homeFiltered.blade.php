@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1">
            <div class="d-flex flex-column">
                <h3>Categories</h3>
                @foreach($categories as $c)
                    <div class="row m-2">
                        <a href="{{route('catFilter',$c)}}" style="text-decoration:none;color:black;"><b style="white-space: nowrap;">- {{$c->name}}</b></a>
                    </div>
                @endforeach    
            </div>
        </div>
        <!-- products -->
        <div class="col-11">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1>Home Page</h1>
                    @foreach($category->products as $product)
                    <div class="card mt-1 mb-3">
                        <div class="card-body d-flex">
                            <div class="col-8">
                                <div class="container d-flex">
                                    <div class="col-4">
                                        @if($product->name == "Toy")
                                        <img src="/img/duck.jpg" style="height: 100px;">
                                        @elseif($product->name == "Tool")
                                        <img src="/img/tool.jpg" style="height: 100px;">
                                        @elseif($product->name == "Plate")
                                        <img src="/img/plate.jpg" style="height: 100px;">
                                        @elseif($product->name == "Bag")
                                        <img src="/img/bag.jpg" style="height: 100px;">
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col">
                                                <b>Product:</b>
                                                {{$product->name}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <b>Brand:</b>
                                                {{$product->brand}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <b>Description:</b>
                                                {{$product->description}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 sellers">
                                @foreach($product->sellers as $seller)
                                    @if($seller->products->find($product->id)->pivot->quantity >0)
                                    
                                    <a style="text-decoration:none;color:black;"
                                        href="{{route('buy',['sellerId' => $seller->id, 'productId' => $product->id])}}">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <b>Seller: </b>{{$seller->name}}
                                                <b>Price:
                                                </b>{{$seller->products->Where('name',$product->name)->first()->pivot->price}}
                                                $

                                            </div>
                                        </div>
                                    </a>

                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let x = document.querySelectorAll(".sellers");
    x.forEach((e) => {
        if (e.childElementCount == 0) {
            let b = document.createElement("b");
            b.innerText = "Currently there are no sellers for this product :(";
            e.appendChild(b);
        }
    });

</script>
@endsection