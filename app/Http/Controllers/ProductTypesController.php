<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTypes;

class ProductTypesController extends Controller
{
    public function index(){
        $product_type = ProductTypes::all();
        return view('product_type.index',['product_type'=>$product_type]);
    }
    public function create(){
        return view('product_type.create');
    }
    public function edit(ProductTypes $product_type){
        return view('product_type.edit',['product_type'=>$product_type]);
    }
    public function update(ProductTypes $product_type, Request $request){
        
        $data = $request->validate([
            "type_title"=>'required',
            'interval'=>'required|numeric'
        ]
        );

        $product_type->update($data);
        return redirect(route('product_type.index'))->with('succ','ptype succ text');
    }
    public function delete(ProductTypes $product_type){
        $product_type->delete();
        return redirect(route('product_type.index'))->with('delte','ptype delte succ text');
    }
    public function store(Request $request){
        $data = $request->validate([
            "type_title"=>'required',
            'interval'=>'required|numeric'
        ]
        );

        $newProduct = ProductTypes::create($data);

        return redirect(route('product_type.index'));
    }
}
