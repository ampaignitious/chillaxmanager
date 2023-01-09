<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = products::all();
        return view('products/allproductspage', compact('products'));
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
        $request->validate([
            'productname'=>'required',
            'productcode'=>'required',
            'productprice'=>'required',
            'expirydate'=>'required',
            'quantity'=>'required',
            'sellingprice'=>'required',
            'measurement'=>'required',
            'category'=>'required'
        ]);

                products::create($request->all());
                //redirect user and send friendly messgae
                return redirect()->route('product.index')->with('success','products saved successfully');
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
    public function edit(products $product)
    {
        return view('products/producteditpage', compact('product'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $product)
    {
        //
        $product->update($request->all());
        //
        return redirect()->route('product.index')->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $product)
    {
        $product->delete();
        //
        return redirect()->route('product.index')->with('success','product deleted successfully');

    }
}
