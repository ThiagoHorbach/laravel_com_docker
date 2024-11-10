@foreach ($products as $row => $product)
    <a href="{{route("products.show", $row)}}">
        {{$product["product_name"]}}
    </a>
    <br>
    {{$product["sku"]}}
    <br>
    {{$product["description"]}}
    <hr>
@endforeach