<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use File;

class CategoryController extends Controller
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
        $category = Category::all();
        return view('admin/category/index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category/create');
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
            'name' => 'required|min:3',
            'image'  => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->image;
        $new_image = time().'.'.$image->getClientOriginalExtension();

        $category = Category::create([
            'name' => $request->name,
            'image' => 'assets/category/'.$new_image,
            'slug' => Str::slug($request->name)
        ]);

        $image->move('assets/category/', $new_image);

        return redirect()->route('category.index')->with('status', 'Add Data Category Success');
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
        $category = Category::findorfail($id);
        return view('admin.category.edit', compact('category'));
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
        //
    }

    public function perbarui(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $category = Category::findorfail($id);

        if($request->has('image')) {
            File::delete($category->image);
            $image = $request->image;
            $new_image = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/category/', $new_image);
            $category_data = [
                'name' => $request->name,
                'image' => 'assets/category/'.$new_image,
                'slug' => Str::slug($request->name)
            ];
        } else {
            $category_data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ];
        }

        $category->update($category_data);

        return redirect()->route('category.index')->with('status', 'Update Data Category Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);
        File::delete($category->gambar);
        $category->delete();
        return redirect()->route('category.index')->with('status', 'Delete Data Category Success');
    }
}
