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

        $categories = Category::all() ;
        return view ( 'admin.view_category' , compact ('categories') ) ; 
    }


    // Add a new category : 
    public function create_category ( Request $request ) {
        

        Category::create ([
            'name' => $request -> input ( 'category_name' ) ,
        ]);


        // display a success create toast message : 
        flash() -> success ('Category created successfully!') ; 
        return redirect() -> route('admin.view_category');
    }   
}
