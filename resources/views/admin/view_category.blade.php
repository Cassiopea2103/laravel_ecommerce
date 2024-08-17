<!DOCTYPE html>
<html>
  <head> 
    @include ('admin.css' )

    <style type="text/css">
        input [type='text']{
            width:  400px ;
            height: 50px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          
            <div >
                <form method="post" action="{{route('admin.create_category')}}">
                    @csrf
                    <div>
                        <input class="" type="text" name="category_name" />
                        <input class="btn btn-primary" type="submit" value="Add category" />
                    </div>
    
                </form>
            </div>

            <div>
                <table>

                    <thead>
                        <tr>
                            <th>Category</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $data )
                            <tr>
                                <td>{{$data-> name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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