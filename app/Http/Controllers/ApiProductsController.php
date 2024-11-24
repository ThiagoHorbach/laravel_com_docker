<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Exception;
use Illuminate\Http\Request;

class ApiProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$products = Products::get();
        $products = Products::query();

        if($request->name && !empty($request->name)){
            $products->where("name", "like", "%".$request->name."%");
        }

        if($request->sku && !empty($request->sku)){
            $products->where("sku", "like", "%".$request->sku."%");
        }

        if($request->active && $request->active == "true"){
            $products->where("status", 1);
        }

        //$data = $products->paginate(3);
        $data = $products->simplePaginate(3);

        return response($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // $product = Products::create($data);

        try{
            $product = Products::create([
                "name" => $request->name,
                "sku" => $request->sku,
                "description" => $request->description,
                "brand_id" => $request->brand_id
            ]);
        }catch(Exception $e) {
            return response(["success" => "false", "error" => "Houve um erro ao salvar o produto"], 500);
        }
        

        return response($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Products::where("id", $id)
        ->update([
            "name" => $request->name,
            "sku" => $request->sku,
            "description" => $request->description
        ]);

        if($products){
            return response([
                "success" => true,
                "message" => "Produto atualizado com sucesso"
            ], 201);
        }

        return response([
            "success" => false,
            "message" => "Houve um erro ao atualizar o produto"
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Products::where("id", $id)->delete();
            return response([
                "success" => true,
                "message" => "Produto excluido com sucesso"
            ], 201);
        }catch(Exception $e) {
            return response(["success" => "false", "error" => "Houve um erro ao deletar o produto"], 500);
        }
    }

}
