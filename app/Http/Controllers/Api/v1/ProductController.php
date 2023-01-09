<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        if(!empty($products)){
            return response()->json(['result'=>$products]);
        }else{
            return response()->json(['result'=>'No Data Found']);
        }
        // return response()->json(['result'=>$products]);
        // return 'ss';
    }
}
