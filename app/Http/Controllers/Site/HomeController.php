<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (Request $request)
    {
        $categories = Category::all();
        $products = Product::query();
        if ($request->cat){
            $products->whereHas('category',function($q)use($request){
               $q->whereSlug($request->cat);
            });
        }
        if($request->search){
            $products->where(function($q)use($request){
                $q->where('name','LIKE','%'.$request->search)
                    ->orWhere('name','LIKE',$request->search.'%')
                    ->orWhere('name','LIKE','%'.$request->search.'%');
            });
        }
        $products = $products->get();
        return view('site.home',compact('categories','products'));
    }

    public function singlePage($id)
    {
        $product = Product::find($id);
        return view('site.singlePage',compact('product'));
      }
}
