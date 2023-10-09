<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Product::all());
        // $product = Product::orderBy('created_at', 'desc')->paginate(5);
        // $products = Product::latest()->paginate(3);
        $products = Product::all();

        foreach ($products as $product) {
            $product['items'] = $product->items;
        }

        // $product = Product::all();

        //     return response()->json
        // (['data'=>$product]
        if ($products) {
            return $this->successResponse($products, 'get product successfully');
        } else {
            return $this->errorResponse('get error message');
        }




        //
        // return response()->json([
        //     [
        //         'name' => 'Dab',
        //         'age' => 4
        //     ],
        //     [
        //         'name' => 'mon',
        //         'age' => 5
        //     ]
        // ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //Create 1
        // $product = new Product();
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->save();

        // return response()->json([
        //     'product' => $product
        // ]);

        // Example create with req and resp
        // $validator = $request->validated();

        // if ($employ = Employ::create($validator)) {

        //     return $this->successResponse($employ, "employ created");
        // } else {
        //     return $this->errorResponse("employ created fail");
        // }

        $validator = $request->validated();
        $product = Product::create($validator);
        if ($product) {
            return $this->successResponse($product, "product created");
        } else {
            return $this->errorResponse("error Created");
        }
    }

    /**
     * Display the specified resource.
     */

    //  show
    // public function show($id)
    // {
    //     $product = Product::where('id', $id)->first();
    //     return response()->json($product);
    // }





    public function show(string $id)
    {

        $product = Product::where('id', $id)->first();
        if ($product) {
            return $this->successResponse($product, 'product with id Complete');
        }
        return $this->errorResponse('no have Product with get ur id');
        //
        // return response()->json([
        //     'product' => $product,
        //     'data'=> 'complete'
        // ]);
        // if ($employ) {
        //     return $this->successResponse($employ, "employ detail");
        // } else {
        //     return $this->errorResponse("no detail for employ");
        // }

        // $attendance = $attendance->with('employee')->find($attendance->id);


        // if ($product) {
        //     return $this->successResponse($product, 'product is here');
        // } else {
        //     return $this->errorResponse('product NO');
        // }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product, string $id)
    {
        // EmployRequest $request, Employ $employ

        $validator = $request->validated();
        // if ($product->update($validator)) {
        //     return $this->successResponse($product, 'update complete');
        // } else {
        //     return $this->errorResponse('error Update');
        // }

        // $product = Product::where('id',$id)->update($validator);
        $product = Product::where('id', $id)->first();
        if ($product->update($validator)) {
            return $this->successResponse($product, 'update complete');
        } else {
            return $this->errorResponse('error Update');
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, string $id)
    {

        $product = Product::where('id', $id)->delete();
        if ($product) {
            return $this->successResponse($product, 'Delete product with id Complete');
        }
        return $this->errorResponse('fail Delete Product with ur id');





        // $team = $team->delete();
        // if ($team) {
        //     return $this->successResponse($team, "Deleted team Successfully");
        // }
        // return $this->errorResponse("Deleted team Failed");

        // if ($attendance->delete()) {
        //     # code...
        //     return $this->successResponse($attendance, "delete complete");
        // } else {
        //     return $this->errorResponse("cant delete");
        // }


        // if ($product->delete()) {
        //     return $this->successResponse($product, 'delete complete');
        // } else {
        //     return $this->errorResponse('cant delete');
        // }
        //
    }
}
