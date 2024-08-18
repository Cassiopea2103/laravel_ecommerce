<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use App\Models\Category ; 
use App\Models\Product ;

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
        return redirect() -> route('admin.categories_list');
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

        flash() -> success ("Category updated successfully!") ;

        return redirect () -> route ('admin.categories_list') ;
    }



    // Products : 

    public function view_products () {

        // retrieve all products : 
        $products = Product::paginate ( 3 ) ; 

        return view ('admin.products_list' , compact('products')  ) ;
    }

    public function add_product ( ) {

        $categories = Category::all() ; 


        return view ( 'admin.add_product' , compact ('categories') ) ; 
    }


    public function upload_product ( Request $request ) {

        // retrieve request data : 
        $name = $request -> name ; 
        $description = $request -> description ; 
        $price = $request -> price ; 
        $quantity = $request -> quantity ;
        $category = $request -> category ; 
        $image = $request -> image ;

        // processing on the image data : 
        if ( $image ) {
                $image_name = time().'.'.$image-> getClientOriginalExtension  () ; 

                // move the image file data : 
                $request -> image -> move ('products' , $image_name ) ; 
        }

        // create the product item : 
        Product::create ([
            'name' => $name , 
            'description' => $description , 
            'quantity' => $quantity , 
            'price' => $price , 
            'category' => $category ,
            'image' => $image_name , 
        ]);

        flash () -> success ('Product created successfully!') ; 

        return redirect () -> route ('admin.add_product')  ;
    }
   

    public function delete_product ( $id ) {
        // retrieve product with id : 
        $product = Product::find ( $id ); 

        // delete product:
        $product -> delete () ; 

        return redirect () -> route ('admin.view_products' ) ; 
    }
}
