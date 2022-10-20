<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request){


        $rules = [

            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required|confirmed|min:6',
            'address'=>'required',
            'phone'=>'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
           // dd("errors");
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }else{

            if($request['user_type']=='farmer'){
                $role_id=1;
            }else if($request['user_type']=='retailor'){
                $role_id=2;
            }else if($request['user_type']=='supplier'){
                $role_id=3;
            }else if($request['user_type']='customer'){
                $role_id=4;
            }
            $user = new User();
            $user->fk_role_id = $role_id;
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->address = $request['address'];
            $user->phone = $request['phone'];
            $user->password = Hash::make($request['password']);
            $user->lat=$request['lat'];
            $user->lng=$request['lng'];
            if($user->save()){
                return back()
                    ->with('success','User Registered');
            }


        }

    }
}
