<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Component;
use App\Models\Product;
use App\Services\DestroyService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{

    public function index()
    {
        return Inertia::render('Products/Index', [
            'products' => Product::withTrashed()->paginate(20)
        ]);
    }
    public function create()
    {
        // $categories = Category::whereRelation('parent', 'name', 'Components');
        // dd($categories);
        return Inertia::render('Products/Create', [
            'categories' => Category::all(),
            'producers' => DB::table('producers')->select('id', 'name')->get(),
            'processors' => Component::whereRelation('category', 'name', 'Intel')->get()
        ]);
    }
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->back();
    }
    public function show(Product $product)
    {
        return Inertia::render('Products/Show', [
            'categories' => DB::table('categories')->select('id', 'name')->get(),
            'components' => DB::table('categories')->select('id', 'name')->get(),
            'product' => $product
        ]);
    }
    public function edit($id)
    {
        return Redirect::route('products.show', $id);
    }
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect::route('products.show', $product->id);
    }
    public function destroy(Product $product, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($product);
        return redirect()->back();
    }

    public function getProductsCategory($id){
        return response()->json(Product::where('category_id', $id)->get());
    }
}
