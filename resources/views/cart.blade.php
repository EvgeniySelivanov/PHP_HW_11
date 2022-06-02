@if(session('cart'))

<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
@foreach(session('cart') as $product)
        <tr>
            <td><img src="{{$product['img']}}" alt="" class="img-fluid"></td>
            <td>{{$product['name']}}</td>
            <td>{{$product['qty']}} x {{$product['price']}} UAH</td>
            <td>{{$product['qty'] * $product['price']}} UAH</td>
            <td></td>
        </tr>
@endforeach
    </tbody>
</table>

@else
<p>Your cart is empty</p>
@endif






{{-- 
[
    'id'=>1,
    'qty'=>5,
    'img'=>'',
    'name'=>'',
    'price'=>123
] --}}