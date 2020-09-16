@extends('admin.layouts.app')
@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Detail order of {{$user->name}} user</h4>
                <p class="category">List of all registered users</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped" id="table">
                    <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Product Name</th>
                        <th>Address</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->products[0]->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->orderItems[0]->price}}</td>
                            <td>{{$order->orderItems[0]->quantity}}</td>
                            <td>{{$order->date}}</td>
                            <td>
                                @if ($order->status)
                                    <span class="label label-success">Confirmed</span>
                                @else
                                    <span class="label label-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center"><p>This user doesnt have order!</p></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
