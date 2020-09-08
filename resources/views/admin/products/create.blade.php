@extends('admin.layouts.app')
@section('content')

@include('admin.layouts.partial.message')
@include('admin.layouts.partial.errors')
<div class="row">
    <div class="col-lg-10 col-md-10">
        <div class="card">
            <div class="header">
                <h4 class="title">Add Product</h4>
            </div>
            <div class="content">
                <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">

                                <div class="form-group">
                                    <label>Product Name:</label>
                                    <input type="text" class="form-control border-input" placeholder="Macbook pro" name="name" required value="{{old('name')}}">
                                </div>

                                <div class="form-group">
                                    <label>Product Price:</label>
                                    <input type="text" class="form-control border-input" placeholder="$2500" name="price" required value="{{old('price')}}">
                                </div>

                                <div class="form-group">
                                    <label>Product Description:</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control border-input" placeholder="Product Description">{{old('description')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Product Image:</label>
                                    <input type="file" class="form-control border-input" name="image" id="files">
                                    <img id="image" class="img-thumbnail"/>
                                </div>

                        </div>
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Product</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.getElementById("files").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
    </script>
@endpush
@endsection
