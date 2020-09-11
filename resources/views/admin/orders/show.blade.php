@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Orders</h4>
                <p class="category">List of all orders</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
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
                                <span class="label label-success">Confirmed</span>
                            @else
                                <span class="label label-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            <form method="post" action="{{route('admin.orders.switchstatus', $order->id)}}" style="display: inline-block">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success ti-exchange-vertical" title="Change Status"></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title">Users</h4>
                <p class="category">List of all registered users</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
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
        <div class="card">
            <div class="header">
                <h4 class="title">Product</h4>
                <p class="category">Detail Product</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
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
