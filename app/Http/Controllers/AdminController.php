<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use App\Models\Category ; 

class AdminController extends Controller
{
    // Dashbord
    public function dashboard () {
        return view ( 'admin.index' ) ;
    }

    // View category : 
    public function view_category () {
        return view ( 'admin.view_category' ) ; 
    }


    // Add a new category : 
    public function create_category ( Request $request ) {
        

        Category::create ([
            'name' => $request -> input ( 'category_name' ) ,
        ]);

        return redirect() -> route('admin.view_category');
    }   
}
