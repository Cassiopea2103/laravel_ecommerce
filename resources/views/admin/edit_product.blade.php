<!DOCTYPE html>
<html>
  <head> 
    @include ('admin.css' )
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Edit Product</h2>
          </div>
        
          <div>


             <form 
                method="post" 
                action="{{route('admin.edit_product', $product-> id)}}"
                enctype="multipart/form-data"
            >
                @csrf 
                
                 <div>
                        <label >Product title</label>
                        <input 
                            type="text"
                            name="name"
                            value ={{$product->name}}
                            required
                        />
                    </div>


                    <div>
                        <label>Description</label>
                        <textarea 
                            name="description" 
                            cols="10" rows="5"
                        >
                            {{$product->description}}
                        </textarea>
                    </div>

                    <div>
                        <label >Price</label>
                        <input 
                            type="text"
                            name="price"
                            value="{{$product->price}}"
                        />
                    </div>

                    <div>
                        <label >Quantity</label>
                        <input 
                            type="number"
                            name="quantity"
                            value ={{$product->quantity}}
                        />
                    </div>

                    <div>
                        <label >Category</label>
                        <select name="category">
                            <option>{{$product->category}}</option>

                            @foreach ($categories as $category  )
                                <option value="{{$category-> name}}">{{ $category -> name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label >Current Image</label>
                        <img src="/products/{{$product->image}}" width = "100" height = "80" />
                        <input 
                            type="file"
                            name="image"
                            
                        />
                    </div>


                    <div>
                        <input type="submit" class="btn btn-success" value="Update Product" />
                    </div>
            </form>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>