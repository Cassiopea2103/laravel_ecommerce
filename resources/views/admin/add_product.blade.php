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
            <h2 class="h5 no-margin-bottom">Add a new product</h2>
          </div>

            <div>
                <form action="{{route('admin.upload_product')}}" method="post" enctype="multipart/form-data">

                    @csrf 
                    
                    <div>
                        <label >Product title</label>
                        <input 
                            type="text"
                            name="name"
                            required
                        />
                    </div>


                    <div>
                        <label>Description</label>
                        <textarea 
                            name="description" 
                            cols="10" rows="5"
                        ></textarea>
                    </div>

                    <div>
                        <label >Price</label>
                        <input 
                            type="text"
                            name="price"
                        />
                    </div>

                    <div>
                        <label >Quantity</label>
                        <input 
                            type="number"
                            name="quantity"
                        />
                    </div>

                    <div>
                        <label >Category</label>
                        <select name="category">
                            <option>Select a category</option>

                            @foreach ($categories as $category  )
                                <option value="{{$category-> name}}">{{ $category -> name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label >Image</label>
                        <input 
                            type="file"
                            name="image"
                        />
                    </div>


                    <div>
                        <input type="submit" value="Add Product" />
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