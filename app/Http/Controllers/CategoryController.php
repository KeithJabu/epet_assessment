<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('name')->get();

        return view('categories.all',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::check()) {
            return view('categories.create');
        }

        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if (Auth::check()) {
            if ($request['submit'] == NULL) {
                return redirect('catagories');
            } else if ($request['submit'] == 'add') {
                $data = DB::table('categories')->insertGetId([
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'user_id' => Auth::user()->id
                ]);

                if ($data) {
                    return redirect("/categories/$data")
                        ->with('success', 'New Category Added Successfully!')
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
     * @param  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        //
        $categories = Category::where('id', $category)->first();
        $products = Category::find($category)->getProducts;

        return view('categories.show', ['category' => $categories, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
