@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Product Detail</h4>
                <p class="category">List of all stock</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <tbody>

                        <tr>
                            <th>ID</th>
                            <td>{{$product->id}}</td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td>{{$product->name}}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{!! $product->description !!}</td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td>Rp. {{number_format($product->price, null ,',','.')}}</td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{$product->created_at->diffForHumans()}}</td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>{{$product->updated_at->diffForHumans()}}</td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <td>
                                <img src="{{asset('storage/products/thumbnail/'.$product->image)}}" style="object-fit: cover">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="ml-5">
                    <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-sm btn-primary" title="Edit">Edit</a>

                    <form action="{{route('admin.products.destroy', $product->id)}}" method="post" style="display: inline-block" class="form-delete">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-sm btn-danger" onclick="return alertConfirm()" title="Delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
