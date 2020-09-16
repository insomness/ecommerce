@extends('front.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th colspan="2">User Details <a href="" class="float-right"><i class="fa fa-cogs"></i>Edit Profile</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-weight: 600">User Id</td>
                    <td>{{auth()->user()->id}}</td>
                </tr>
                <tr>
                    <td style="font-weight: 600">Name</td>
                    <td>{{auth()->user()->name}}</td>
                </tr>
                <tr>
                    <td style="font-weight: 600">Username</td>
                    <td>{{auth()->user()->username}}</td>
                </tr>
                <tr>
                    <td style="font-weight: 600">Phone</td>
                    <td>{{auth()->user()->phone ?? 'Not have a number'}}</td>
                </tr>
                <tr>
                    <td style="font-weight: 600">Email</td>
                    <td>{{auth()->user()->email}}</td>
                </tr>
                <tr>
                    <td style="font-weight: 600">Registered At</td>
                    <td>{{auth()->user()->created_at->toFormattedDateString()}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="content table-responsive table-full-width">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($userOrders as $order)
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
                    <td class="">
                        @if ($order->status)
                            <span class="badge badge-success">Confirmed</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </td>
                    <td><a class=" btn btn-outline-dark" href="/orders/{{$order->id}}">Detail</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">You not have any orders</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
