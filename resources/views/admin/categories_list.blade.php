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
                                <td>
                                    <a 
                                        class="btn btn-success ml-5 px-5"
                                        href="{{route('admin.edit_category' , $data-> id)}}"
                                    >Edit</a>
                                </td>
                                <td class="pl-2">
                                    <a 
                                        href="{{route('admin.delete_category', $data-> id)}}" 
                                        onclick="confirm_deletion ( event ) "
                                        class="btn btn-danger px-5">
                                        Delete
                                    </a>    
                                </td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <!-- JavaScript files-->
    <!-- sweet alert begin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- sweet alert end -->

    <!-- delete confirmation function  -->
    <script type="text/javascript">
        const confirm_deletion = ( event ) => {
            event.preventDefault () ;

            // get the current URL location :
            const urlToRedirect = event.currentTarget.getAttribute ( 'href' ) ; 

            swal ({
                title : 'Are you sure you want to delete this item ?',
                text : 'This action is irreversible' , 
                icon : 'warning' ,
                buttons : true ,
                dangerMode : true 
            })
                .then (( willCancel ) => {
                    if ( willCancel ) {
                        window.location.href =urlToRedirect ; 
                    }
                })
        }
    </script>
    <!-- end delete function -->

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