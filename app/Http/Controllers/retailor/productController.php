<?php

namespace App\Http\Controllers\retailor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\retailor_products;


class productController extends Controller
{
        public function index(){
            $retailorProducts = retailor_products::where('retailor_id',auth()->user()->id)->get();
            return view('retailor.products',['retailorProducts'=>$retailorProducts]);
        }

        public function addProduct(){
            return view('retailor.addproduct');
        }

        public function create(Request $request){
            $fileName = null;
            if ($request->hasFile('file')) {

                $file = request()->file('file');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move(public_path('images/retailor_products'), $fileName);
            }
            $retailor_products = new retailor_products();
            $retailor_products->name=$request['name'];
            $retailor_products->price = $request['price'];
            $retailor_products->perceptions = $request['use'];
            $retailor_products->image = $fileName;
            $retailor_products->retailor_id = auth()->user()->id;
            $retailor_products->save();
            return back()->with('success', 'Product Added successfully');

        }
}
