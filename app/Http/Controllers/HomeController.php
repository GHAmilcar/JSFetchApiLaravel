<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $providers = Provider::all();
        $categories = Category::all();
        $products = Product::all();
        $contador = 1;
        return view('pages.HomePage.index', compact('providers', 'categories', 'products', 'contador'));
    }

    public function products(Request $request){
        if (isset($request->categories_id)) {
            $products = Product::where('categories_id', $request->categories_id)->get();

            return response()->json(
               [
                'products' => $products,
                'success' => 'true'
               ]
            );

        }
        
        else{
            return response()->json([
                'success' => false
            ]);
        }
    }

}
