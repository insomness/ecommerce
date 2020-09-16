@extends('admin.layouts.app')
@section('content')
@include('admin.layouts.partial.message')
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
                        <th>User</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>
                            @foreach ($order->products as $item)
                                {{$item->name}}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($order->orderItems as $item)
                                {{$item->quantity}}
                            @endforeach
                        </td>
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

                            <a href="{{route('admin.orders.show', $order->id)}}" class="btn btn-sm btn-primary ti-view-list-alt" title="Details"></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
