<?php

namespace App\Http\Controllers\retailor;
use App\Http\Controllers\Controller;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\ProductCategories;
use App\Models\ProductItems;
class ProductItemsController extends Controller
{
    public function index(){
        $items = (new ProductItems())->getCategoryWithItems(auth()->user()->id);
        return view('retailor.items',['items'=>$items]);
    }
    public function addItems(){
        $categories = ProductCategories::where('fk_user_id',auth()->user()->id)->where('isActive',1)->get();
        return view('retailor.addItems',['categories'=>$categories]);
    }

    public function create(Request $request){
//        dd($request->file('file'));
        $rules = [

            'name' => 'required',
            'price'=>'required',
            'quantity'=>'required',
            'category'=>'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }else{
            $fileName = null;
            if ($request->hasFile('file')) {

                $file = request()->file('file');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move(public_path('images/items'), $fileName);
            }
            $validate = ProductItems::where('name', '=',$request['name'])
                        ->where('fk_category_id','=',$request['category'])
                        ->first();
            if(!$validate){
            $data = new ProductItems();
            $data->fk_category_id = $request['category'];
            $data->name = $request['name'];
            $data->price = $request['price'];
            $data->quantity = $request['quantity'];
            $data->image = $fileName;
            if($data->save()){
                return back()
                    ->with('success','Item Addedd Successfully');
                }
            }else{
                return back()
                    ->with('error','Item Already Exist');
            }
        }
    }

    public function editItem($id){
        $categories = ProductCategories::where('fk_user_id',auth()->user()->id)->get();
        $item = ProductItems::findOrFail($id);
        $category = $item->categories()->first();
        //dd($item->name);


        return view('retailor.editItem')
            ->with('categories',$categories)
            ->with('category_id',$category->id)
            ->with('item_id',$item->id)
            ->with('name',$item->name)
            ->with('price',$item->price)
            ->with('quantity',$item->quantity)
            ->with('image',$item->image);
    }

    public function update(Request $request){
        $data = ProductItems::findOrFail($request['item_id']);
        $data->fk_category_id = $request['category'];
        $data->name = $request['name'];
        $data->price = $request['price'];
        $data->quantity = $request['quantity'];
        if($data->save()){
            return back()
                ->with('success','Item Updated Successfully');
        }
    }

    public function deleteItem($itemId){
        ProductItems::where('id', $itemId)->delete();
        return back()->with("success","Item Deleted");

    }
}
