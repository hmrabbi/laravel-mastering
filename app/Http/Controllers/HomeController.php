<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    //second
    public function index()
    {
       // $product = Product::all();
        $product = Product::paginate(6);
        return view('home.userpage',compact('product'));
    }

    //first
    public function redirect()
    {
        $usertype = Auth::user()->usertype;  //here usertype from database

        if($usertype == '1')
        {
            return view('admin.home');
        }
        else
        {
           // return view('dashboard'); //dashboard comes resources->view->dashboard
           // return view('home.userpage'); //dashboard comes resources->view->dashboard
           $product = Product::paginate(6);
           return view('home.userpage',compact('product'));
        }
    }
   
}
