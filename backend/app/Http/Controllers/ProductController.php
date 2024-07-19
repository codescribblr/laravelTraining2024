<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $products = Product::all();
//        return view('products.index', compact('products'));
//        Gate::authorize('viewAny', Product::class);
//        $products = DB::table('products')
//            ->join('categories', 'products.category_id', '=', 'categories.id')
//            ->select('products.*', 'categories.name as category_name')
//            ->get();
        $products = Product::query()->with('category')
            ->get();

        return view('products.index', compact('products'));
    }

    public function expensiveProducts()
    {
//        $products = Product::expensive()->get();
        $products = DB::table('products')
            ->where('price', '>=', 100)
            ->get();
        $products = Product::hydrate($products->toArray());
        return view('products.expensive', compact('products'));
    }

    public function aggregateData()
    {
        $data = [
            'count' => DB::table('products')->count(),
            'max' => DB::table('products')->max('price'),
            'min' => DB::table('products')->min('price'),
            'avg' => DB::table('products')->avg('price'),
            'sum' => DB::table('products')->sum('price'),
        ];

        return view('products.aggregate', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        Gate::authorize('create', Product::class);
        $categories = Category::all();
        $tags = Tag::all();
        return view('products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $product = Product::create($validated);
        $product->tags()->sync($request->tags);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
//        Gate::authorize('view', $product);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
//        Gate::authorize('update', $product);
        $categories = Category::all();
        $tags = Tag::all();
        return view('products.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
//        Gate::authorize('update', $product);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $product->update($validated);
        $product->tags()->sync($request->tags);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
//        Gate::authorize('delete', $product);
        $product->delete();
        return redirect()->route('products.index');
    }
}
