@extends('admin.layouts.app')
@section('content')

@include('admin.layouts.partial.message')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">All Products</h4>
                <p class="category">List of all stock</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->name}}</td>
                        <td>Rp. {{number_format($product->price, null ,',','.')}}</td>
                        <td>
                            <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-sm btn-info ti-pencil-alt" title="Edit">Edit</a>

                            <form action="{{route('admin.products.destroy', $product->id)}}" method="post" style="display: inline-block" id="form-delete">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="btn btn-sm btn-danger ti-trash" onclick="return alertConfirm()" title="Delete">Delete</button>
                            </form>

                            <a href="{{route('admin.products.show', $product->id)}}" class="btn btn-sm btn-primary ti-info" title="Detail">Detail</a>
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
