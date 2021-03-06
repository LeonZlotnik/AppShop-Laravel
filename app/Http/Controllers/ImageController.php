<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ImageController extends Controller
{
    public function index($id){

    	$products = Product::find($id);
    	$images = $products->images;
    	return view('admin.products.images.index')->with(compact('product','images'));
    }

    public function store(){

    }

    public function destroy(){

    }
}
