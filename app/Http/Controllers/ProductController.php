<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductVariant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
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
        if (Auth::check()) {
            $categories = Category::orderBy('name', 'desc')->get();

            return view('products.create', compact('categories'));
        }

        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::check()) {
            if ($request['submit'] == NULL) {
                return redirect('/products');
            } else if ($request['submit'] == 'add') {
                $product = new Product();
                $product->name = $request->input('name');
                $product->slug = $request->input('slug');

                $product->save();
                $product->id;

                if ($product->id) {
                    $category_ids = $request->post('category');
                    $product->getCategories()->sync($category_ids);

                    return redirect("/product")
                        ->with('success', 'New Product Added Successfully!')
                        ;
                } else {

                    return back()->withInput()->with('error', "Unsuccessful Entry");
                }
            } else {

                return back()->withInput()->with('error', "Unsuccessful Entry");
            }
        }

        return view('auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param int $product
     * @return Application|Factory|View
     */
    public function show(int $product)
    {
        $product_item     = Product::with('getCategories')->find($product);
        $product_variants = Product::find($product)->getProductVariant;

        return view(
            'products.show', compact('product_item', 'product_variants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $product
     * @return Response
     */
    public function edit(int $product)
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
     * @param \Request $request
     * @param Product $product
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {

        if (Auth::check()) {
            if ($request['submit'] == NULL) {
                return redirect('/products');
            } else if ($request['submit'] == 'Update') {

                $category_ids = $request->post('category');

                $product = Product::find($request->post('product_id'));
                $product->name = $request->input('name');
                $product->slug = $request->input('slug');
                $product->getCategories()->sync($category_ids);
                $product->update();


                return redirect("/products/" . $request->post('product_id'))
                    ->with('success', 'New Product Added Successfully!');

            } else {
                return back()->withInput()->with('error', "Unsuccessful Entry");
            }
        } else {

            return back()->withInput()->with('error', "Unsuccessful Entry");
        }

        return view('auth.login');
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
