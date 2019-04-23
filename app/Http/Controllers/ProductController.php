<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
class ProductController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $products = Product::all();
    return view('products.index', [
      'products' => $products,
    ]);
  }

  public function import(Request $request){
    if($request->post()){
      if($request->file('ProductsFileInput')){
        Excel::import(new ProductsImport, $request->file('ProductsFileInput'));
        return back();
      }else{
        abort(404);
      }
    }else{
      abort(404);
    }
  }

  public function create(Request $request){
    if($request->post()){
      Product::new($request);
      return back();
    }
  }
}
