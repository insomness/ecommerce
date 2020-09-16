@extends('front.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 mt-5">
        <h3>Order Detail</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at->toDateString()}}</td>
                    <td>{{$order->orderItems[0]->quantity}}</td>
                    <td>{{$order->orderItems[0]->price}}</td>
                    <td>{{$order->address}}</td>
                    <td>
                        @if ($order->status)
                            <span class="badge badge-success">Confirmed</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="">
            <h4 class="px-3 pt-3">Users</h4>
            <p  class="px-3">List of all registered users</p>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>{{$order->user->id}}</td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>{{$order->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$order->user->email}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="">
            <h4 class="px-3 pt-3">Product</h4>
            <p class="px-3">Detail Product</p>
            <div class="table-responsive">
                <table class="table table-striped ">
                    <tr>
                        <td>ID</td>
                        <td>{{$order->products[0]->id}}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{$order->products[0]->name}}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>Rp. {{number_format($order->products[0]->price, null ,',','.')}}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><img src="{{asset('storage/'.$order->products[0]->image)}}" width="150" style="object-fit: cover;" ></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
