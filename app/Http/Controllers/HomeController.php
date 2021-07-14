<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    //logout
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
       //show layout product
    public function ViewProduct()
    {
        $product = DB::table('product')->get();
        return view('layouts.product')->with(compact('product'));
    }
    //show layout add product
    public function ViewAddProduct()
    {
        return view('layouts.addProduct');
    }
    //save data 
    public function getSaveProduct(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['protype'] = $request->protype;
        DB::table('product')->insert($data);
        return Redirect::to('/product');
    }
    //delete product
    public function DeleteProduct($id)
    {
     
  
        DB::table('product')->where('id', $id)->delete();
        return Redirect::to('/product');
    }

    public function ViewEditProduct($id)
    {
        $product = DB::table('product')->where('id',$id)->get();
        return view('layouts.editProduct')->with(compact('product'));
    }
    public function getSaveEdit(Request $request,$id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['protype'] = $request->protype;
        DB::table('product')->where('id',$id)->update($data);
        return Redirect::to('/product');
    }
}
