<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){

    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));
    }
    public function create(){

    	return view('admin.products.create');
    }
    public function store(Request $request){

        $messages = [
            'name.required' => 'Falto el nómbre bro!',
            'name.min' => 'Eso ni es una palabra!',
            'description.required' => 'Necesitamos un poco de background del producto',
            'description.max' => 'No te pasaste de rollero brother!',
            'price.required' => 'Cuanto cuenta?',
            'price.min' => 'Puras fallas',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0',
        ];

        $this->validate($request, $rules, $messages);
    	
        //dd($request->all());

        $product = new Product();

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');

        $product->save(); //INSERT

        return redirect('/admin/products');  
    }

    public function edit($id){

        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product'));

    }

    public function update(Request $request, $id){

         $messages = [
            'name.required' => 'Falto el nómbre bro!',
            'name.min' => 'Eso ni es una palabra!',
            'description.required' => 'Necesitamos un poco de background del producto',
            'description.max' => 'No te pasaste de rollero brother!',
            'price.required' => 'Cuanto cuenta?',
            'price.min' => 'Puras fallas',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0',
        ];

        $this->validate($request, $rules, $messages);

        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');

        $product->save(); //UPDATE

        return redirect('/admin/products');  
    }
    public function destroy($id){

        $product = Product::find($id);
        $product->delete(); //DELETE

        return back(); 
    }
}
