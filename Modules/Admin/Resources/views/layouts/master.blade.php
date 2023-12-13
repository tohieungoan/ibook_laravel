
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/dashboard/">

    <title>Admin system</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    <link href="{{ asset('theme_admin/css/dashboard.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <script src="https://kit.fontawesome.com/fbdb677fe0.js" crossorigin="anonymous"></script>
    
  <script src="{{ asset('js/loadimg.js') }}"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Quản lí cửa hàng</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="{{ \Request::route()->getName()=='admin.home'?'active':'' }}"><a href="{{ route('admin.home') }}">Trang tổng quan <span class="sr-only">(current)</span></a></li>
            <li class="{{ \Request::route()->getName()=='admin.get.list.category'?'active':'' }}"><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
            <li class="{{ \Request::route()->getName()=='admin.get.list.product'?'active':'' }}"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
            <li class="{{ \Request::route()->getName()=='admin.get.list.article'?'active':'' }}"><a href="{{ route('admin.get.list.article') }}">Tin tức</a></li>

            <li class="{{ \Request::route()->getName()=='admin.get.list.transaction'?'active':'' }}"><a href="{{route('admin.get.list.transaction')  }}">Đơn hàng</a></li>
            <li class="{{ \Request::route()->getName()=='admin.get.list.user'?'active':'' }}"><a  href="{{route('admin.get.list.user')  }}">Thành viên</a></li>

          </ul>
        
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         
          @yield('content')

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('theme_admin/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#out_img').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
    
      $("#input_img").change(function() {
        readURL(this);
      });
    </script>
    @yield('script')
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
