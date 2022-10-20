<?php

namespace App\Http\Controllers\retailor;

use App\Http\Controllers\Controller;
use App\Models\ProductItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\ProductCategories;



class ProductCategoriesController extends Controller
{
    public function index(){
    
        $categories = ProductCategories::where('fk_user_id',auth()->user()->id)->where('isActive',1)->get();
         return view('retailor.productCategories',['categories'=>$categories]);
    }
    public function addCategory(){
        return view('retailor.addCategory');
    }

    public function create(Request $request){

        $rules = [

            'name' => 'required',
            ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }else{
            $data = new ProductCategories();
            $data->fk_user_id = auth()->user()->id;
            $validate = ProductCategories::where('name', '=',$request['name'])
                        ->where('fk_user_id', '=',auth()->user()->id)
                        ->first();
            if(!$validate){
            $data->name=$request['name'];
            if($data->save()){
                return back()->with('success','Category Added Successfully');
                }
            }else{
                return back()->with('error','Category name already exist');
            }
        }
    }

    public function editCategory($id){
        $category = ProductCategories::findOrFail($id);

        return view('retailor.editCategory')
            ->with('category',$category);
    }

    public function update(Request $request){
        $data = ProductCategories::findOrFail($request['category_id']);
        $data->name = $request['name'];
        if($data->save()){
            return back()
                ->with('success','Category Updated Successfully');
        }

    }

     public function deleteCategory($id){
        $category = ProductCategories::findOrFail($id);
        $category->isActive=0;
        if($category->save()){
            return back()
                ->with('success','Category Deleted Successfully');
        }

    } 
}
