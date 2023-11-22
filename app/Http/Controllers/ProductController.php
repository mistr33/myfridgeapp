<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductTypes;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $product_types = ProductTypes::all();
        $keyed = $product_types->keyBy('id');
        return view('products.index',['products'=>$products,'ptype'=>$keyed]);
    }
    public function create(){
        $product_types = ProductTypes::all();
        $keyed = $product_types->keyBy('id');
        return view('products.create',['ptype'=>$keyed]);
    }
    public function edit(Product $product){
        $product_types = ProductTypes::all();
        $keyed = $product_types->keyBy('id');
        return view('products.edit',['product'=>$product,'ptypes'=>$keyed]);
    }
    public function update(Product $product, Request $request){
        $data = $request->validate([
            "title"=>'required',
            'ptype'=>'required|numeric',
            'rating'=>'required|numeric'
        ]
        );

        $product->update($data);
        return redirect(route('product.index'))->with('succ','succ text');
    }
    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('delte','delte succ text');
    }
    public function store(Request $request){
        $data = $request->validate([
            "title"=>'required',
            'ptype'=>'required|numeric',
            'rating'=>'required|numeric',
            'barcode'=>'sometimes',
        ]
        );

        $newProduct = Product::create($data);

        return redirect(route('product.index'));
    }
}
