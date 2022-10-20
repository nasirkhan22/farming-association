<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $rules = [

            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            // dd("errors");
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }else {
            $inputVal = $request->all();
            if (auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password'], 'fk_role_id' => $inputVal['role']))) {
                if (auth()->user()->fk_role_id == 1) {
                    return redirect()->route("farmer.productCategories");
                } elseif (auth()->user()->fk_role_id == 2) {
                    return redirect()->route("retailor.home");
                } elseif (auth()->user()->fk_role_id == 4) {
                    return redirect()->route("customer.farmer.products");
                }elseif (auth()->user()->fk_role_id == 3) {
                    return redirect()->route("supplier.home");
                } else {
                    return redirect()->back();
                }
            } else {
                return back()->with('error', 'Username or Password invalid');
            }
        }
    }
}
