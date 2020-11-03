<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $product = Product::orderBy('created_at', 'desc')->get();
        return view('admin/product/index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin/product/tambah',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'price_buy' => 'required|numeric',
            'category_id' => 'required',
            'qty' => 'required|numeric',
            'description' => 'required',
            'image'  => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->image;
        $new_image = time().'.'.$image->getClientOriginalExtension();

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'price_buy' => $request->price_buy,
            'category_id' => $request->category_id,
            'qty' => $request->qty,
            'description' => $request->description,
            'image' => 'assets/products/'.$new_image,
            'slug' => Str::slug($request->name)
        ]);

        $image->move('assets/products/', $new_image);

        return redirect()->route('product.index')->with('status', 'Add Data Product Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorfail($id);
        $category = Category::all();
        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'price_buy' => 'required|numeric',
            'category_id' => 'required',
            'qty' => 'required|numeric',
            'description' => 'required',
            'image'  => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $product = Product::findorfail($id);

        if($request->has('image')) {
            File::delete($product->image);
            $image = $request->image;
            $new_image = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/products/', $new_image);
            $product_data = [
                'name' => $request->name,
                'price' => $request->price,
                'price_buy' => $request->price_buy,
                'category_id' => $request->category_id,
                'qty' => $request->qty,
                'description' => $request->description,
                'image' => 'assets/products/'.$new_image,
                'slug' => Str::slug($request->name)
            ];
        } else {
            $product_data = [
                'name' => $request->name,
                'price' => $request->price,
                'price_buy' => $request->price_buy,
                'category_id' => $request->category_id,
                'qty' => $request->qty,
                'description' => $request->description,
                'slug' => Str::slug($request->name)
            ];
        }

        $product->update($product_data);

        return redirect()->route('product.index')->with('status', 'Update Data Product Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);
        File::delete($product->gambar);
        $product->delete();

        return redirect()->route('product.index')->with('status', 'Delete Data Product Success');
    }
}
