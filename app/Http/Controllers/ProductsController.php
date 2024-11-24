<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateProductsRequest;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = [
        //     0 => [
        //         "product_name" => "Produto 1",
        //         "sku" => "123",
        //         "description" => "exemplo de descrição"
        //     ],
        //     1 => [
        //         "product_name" => "Produto 2",
        //         "sku" => "456",
        //         "description" => "exemplo de descrição"
        //     ],
        //     2 => [
        //         "product_name" => "Produto 3",
        //         "sku" => "789",
        //         "description" => "exemplo de descrição"
        //     ]
        // ];

        //$products = Products::select("id", "name")->get()->all();
        //$products = Products::select("id", "name")->get()->where("id", "=", 1)->all();
        // $products = Products::join("brands", "products.brand_id", "=", "brands.id")
        // ->select(
        //     "products.id",
        //     "products.name",
        //     "sku",
        //     "brand_id",
        //     "brands.name as brand_name"
        // )
        // ->get();
        $products = Products::get();

        //dd($products);

        //echo "<pre>", print_r(json_decode($products)), '</pre>';die;
        
        return view("products.index", ["products" => $products]);
        // return redirect()->route("products.create");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(Request $request)
    public function store(StoreOrUpdateProductsRequest $request)
    {
        //$data = $request->all();
        // $data = $request->validate([
        //     "product_name" => "string|required|min:3|max:100",
        //     "sku" => "integer"
        // ]);

        $data = $request->all();

        //echo $data["product_name"];
        //dd($data);
        return redirect()->back()->with("error", "Erro ao cadastrar o produto");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = [
            0 => [
                "product_name" => "Produto 1",
                "sku" => "123",
                "description" => "exemplo de descrição"
            ],
            1 => [
                "product_name" => "Produto 2",
                "sku" => "456",
                "description" => "exemplo de descrição"
            ],
            2 => [
                "product_name" => "Produto 3",
                "sku" => "789",
                "description" => "exemplo de descrição"
            ]
        ];

        return view("products.show", ["product" => $products[$id]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $products = [
        //     0 => [
        //         "id" => 0,
        //         "product_name" => "Produto 1",
        //         "sku" => "123",
        //         "description" => "exemplo de descrição"
        //     ],
        //     1 => [
        //         "id" => 1,
        //         "product_name" => "Produto 2",
        //         "sku" => "456",
        //         "description" => "exemplo de descrição"
        //     ],
        //     2 => [
        //         "id" => 2,
        //         "product_name" => "Produto 3",
        //         "sku" => "789",
        //         "description" => "exemplo de descrição"
        //     ]
        // ];

        $product = Products::find($id);

        return view("products.edit", ["product" => $product]);
        //return view("products.edit", ["product" => $products[$id]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOrUpdateProductsRequest $request, string $id)
    {
        $product = Products::where("id", $id)->update([
            "name"=>$request->name,
            "sku"=>$request->sku,
            "description"=>$request->description,
        ]);
        dd($product);
        //dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::where("id", $id)->delete();
        return "registro deletado com sucesso!";
    }
}
