<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use App\Models\ProductVarient;
use App\Http\Requests\StoreProductVarientRequest;
use App\Http\Requests\UpdateProductVarientRequest;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductVarientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductVarientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $productVariant
     * @return \Illuminate\Http\Response
     */
    public function show(int $productVariant)
    {

        $product_variant = ProductVariant::where('id', $productVariant)->first();

        return view('product_variant.show', ['product_variant' => $product_variant]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVarient  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVarient $productVariant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductVarientRequest  $request
     * @param  \App\Models\ProductVarient  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductVarientRequest $request, ProductVarient $productVariant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVarient  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVarient $productVariant)
    {
        //
    }
}
