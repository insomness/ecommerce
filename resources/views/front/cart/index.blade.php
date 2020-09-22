@extends('front.layouts.app')
@section('content')

<div class="container" style="margin: 50px auto;">

    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
            <hr>
            <h4 class="mt-5">{{$carts->count()}} items(s) in Shopping Cart</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                @foreach ($carts as $cart)
                    <tr class="cart-{{$cart->id}}">
                        <td>
                            <img src="{{asset('storage/products/thumbnail/' . $cart->associatedModel->image)}}" style="object-fit: cover" height="100px">
                        </td>
                        <td style="vertical-align: middle">
                            <strong>{{$cart->name}}</strong>
                            <br>
                            <small>{{$cart->associatedModel->description}}</small>
                        </td>
                        <td style="vertical-align: middle">
                            <a href="">Remove</a>
                            <br>
                            <a href="">Save For Later</a>
                        </td>
                        <td style="vertical-align: middle">
                            <select class="form-control" style="width: 80px" data-id="{{$cart->id}}">
                                @for ($i = 1; $i <= 50; $i++)
                                    <option value={{$i}} {{$i == $cart->quantity ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                        <td style="vertical-align: middle" class="price">
                            <span class="amountofunit">Rp. {{number_format($cart->price * $cart->quantity, null ,',','.')}}</span>
                            <br>
                            (Rp. {{number_format($cart->price, null ,',','.')}} / Unit)
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.table tr .form-control').on('change', function(){
        const productId = $(this).data('id');
        const quantityChanged = parseInt($(this).val());

        $.ajax({
        url: 'carts',
        dataType: 'json',
        type: 'PATCH',
        data: {
            productId: productId,
            quantityChanged: quantityChanged,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            cartList(data);
        },
        error: function(xhr, ajaxOption, thrownError){
            if(xhr.status == 401){
                window.location.href = "{{route('login')}}"
            }
        }
    });
});


function cartList(data){
        let {cart} = data;
        $(`.cart-${cart.id} .price .amountofunit`).html('Rp. ' + numberWithCommas(cart.price * cart.quantity));
        $(`.product-widget[data-id=${cart.id}] .product-price .qty`).html(`${cart.quantity} x`);
    }

</script>
@endpush

