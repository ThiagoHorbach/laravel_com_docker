@foreach ($products as $product)
    <p>Nome: {{$product->name}}</p> 

    <x-status-badge :status="$product->status" />

    @empty($product->brand_id)
        Produto não possui marca cadastrada
    @endempty
    <hr>
@endforeach