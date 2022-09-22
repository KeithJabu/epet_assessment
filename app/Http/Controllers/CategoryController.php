<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


    public function store(Request $request)
    {
        if (Auth::check()) {
            if ($request['submit'] == NULL) {
                return redirect('categories');
            } else if ($request['submit'] == 'add') {
                $data = DB::table('categories')->insertGetId([
                    'name'             => $request->input('name'),
                    'meta_title'       => $request->input('meta_title'),
                    'meta_description' => $request->input('meta_description'),
                    'meta_keywords'    => $request->input('meta_title'),
                    'created_at'       => date('Y-m-d'),
                    'updated_at'       => date('Y-m-d'),
                ]);

                if ($data) {
                    return redirect("/category")
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
    public static function show($category)
    {
        //
        $categories = Category::where('id', $category)->first();
        $products   = Category::find($category)->getProducts;

        return view('categories.show', ['category' => $categories, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        if (Auth::check()) {
            $category = Category::where('id', $category)->first();

            return view('categories.edit', [ 'category' => $category]);
        }

        return view('auth.login');
    }


    public function update(Request $request)
    {

        if (Auth::check()) {
            if ($request['submit'] == NULL) {
                return redirect('categories');
            } else if ($request['submit'] == 'Update') {

                $category = Category::find($request->category_id);

                $category->name             = $request->input('name');
                $category->meta_title       = $request->input('meta_title');
                $category->meta_description = $request->input('meta_description');
                $category->meta_keywords    = $request->input('meta_title');
                $category->updated_at       = date('Y-m-d H:m:s');

                $category->update();

                if ($category) {
                $id = intval($category['id']);

                return redirect("/products/$id")
                    ->with('success', 'Product updated Successfully!');
            } else {
                    return back()->withInput();
                }
            } else {
                return back()->withInput();
            }
        }

        return view('auth.login');
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
