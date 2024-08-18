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
            <h2 class="h5 no-margin-bottom">Products List</h2>
          </div>
        

          <div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($products  as $product ) 
                        <tr>
                            <td>{{ $product -> name }}</td>
                            <td>{!!Str::limit( $product -> description, 40 )!!}</td>
                            <td>{{ $product -> quantity }}</td>
                            <td>{{ $product -> price }}</td>
                            <td>{{ $product -> category }}</td>
                            <td>
                                <img src="/products/{{ $product -> image }}" alt="{{ $product -> name }}" width="100" height="100"/>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
          </div>

          {{$products-> links()}}

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