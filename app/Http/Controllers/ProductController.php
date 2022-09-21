<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use \Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Import products records from the spreadsheet
     *
     */
    public function import()
    {
        \Excel::import(new ProductsImport, 'users.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products   = Product::paginate(15);
        $categories = Product::find(1);

        return view('products.index', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()) {
            $categories = Category::orderBy('name')->get();

            return view('products.create', ['categories' => $categories]);
        }

        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($product)
    {
        $product_item     = Product::where('id', $product)->first();
        $product_variants = Product::find($product)->getProductVariant;

        return view(
            'products.show',
            [
                'product_item'     => $product_item,
                'product_variants' => $product_variants,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        if (Auth::check()) {
            $product    = Product::where('id', $product)->first();
            $categories = Category::orderBy('name')->get();

            return view('products.edit', [ 'product' => $product, 'categories' => $categories ]);
        }

        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if (Auth::check()) {
            if ($request['submit'] == NULL) {
                return redirect('/products');
            } else if ($request['submit'] == 'Update') {
                $product = Product::find($request->procduct_id);

                $product->name = $request->name;
                $product->slug = $request->name;

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
