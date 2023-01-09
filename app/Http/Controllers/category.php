<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = categories::latest()->paginate(3);
        return view('products/productcategory', compact('categories'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //create new product
        categories::create($request->all());
        //redirect user and send friendly messgae
        return redirect()->route('category.index')->with('success','details saved successfully');
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
    public function edit(categories $category)
    {
        //
        return view('products/productcategory_edit_page', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $category)
    {
        //
        $category->update($request->all());
        //
        return redirect()->route('category.index')->with('success','details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $category)
    {
        //
        $category->delete();
        return redirect()->route('category.index')->with('success','category and measurements deleted successfully ');
    }
}
