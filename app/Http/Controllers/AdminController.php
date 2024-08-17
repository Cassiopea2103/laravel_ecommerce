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
    public function categories_list () {

        $categories = Category::all() ;
        return view ( 'admin.categories_list' , compact ('categories') ) ; 
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


    // delete a category : 
    public function delete_category ( $id ) {
        
        // retrieve the cateogory by its id : 
        $category = Category::find( $id ) ; 

        $category -> delete () ; 

        flash() -> success ("Category {$category-> name} deleted successfully");

        return redirect() -> back () ; 
    }



    // edit category : 
    public function edit_category ( $id ) {

        $category = Category::find ( $id ) ; 
        return view ('admin.view_category' , compact ( 'category' ) ) ;
    }

    public function update_category (Request $request , $id ) {
        
        $category = Category::find ( $id ) ;

        $category -> name = $request -> input ( 'category_name' ) ; 
        $category -> save () ; 

        return redirect () -> route ('admin.categories_list') ;
    }

   
}
