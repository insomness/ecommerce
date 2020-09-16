@extends('front.layouts.app')
@section('content')
        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h5 class="display-3"><strong>Welcome,</strong></h5>
            <p class="display-4"><strong>SALE UPTO 50%</strong></p>
            <p class="display-4">&nbsp;</p>
            <a href="#" class="btn btn-warning btn-lg float-right">SHOP NOW!</a>
        </header>

        <!-- Page Features -->
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <div class="row text-center">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('storage/products/thumbnail/'.$product->image)}}" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">
                            {{$product->description}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <strong>Rp. {{number_format($product->price, null ,',','.')}}</strong> <br>
                        <form action="{{route('carts.store', $product->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-outline-dark mt-3">
                                <i class="fa fa-cart-plus "></i> Add To Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->
@endsection
