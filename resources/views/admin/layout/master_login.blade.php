<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Admin Pisolution | Login</title>
    <link rel="icon" type="image/x-icon" href="" />
    <base href="{{asset('public/')}}">
    <!-- loader-->
    <link href="backend/css/pace.min.css" rel="stylesheet" />
    <script src="backend/js/pace.min.js"></script>
    <!--favicon-->
    <!-- Bootstrap core CSS-->
    <link href="backend/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="backend/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="backend/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="backend/css/app-style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">


    @if(isset($setting_page['google_analytic']))
    {!!$setting_page['google_analytic']!!}
    @endif

    @if(isset($setting_page['facebook_pixel']))
    {!!$setting_page['facebook_pixel']!!}
    @endif

    @if(isset($setting_page['tag_manager_head']))
    {!!$setting_page['tag_manager_head']!!}
    @endif
  </head>

  <body class="bg-theme bg-theme2">
    @if(isset($setting_page['tag_manager_body']))
    {!!$setting_page['tag_manager_body']!!}
    @endif
    @if(isset($setting_page['chat_script']))
    {!!$setting_page['chat_script']!!}
    @endif
    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
      <div class="loader-wrapper-outer">
        <div class="loader-wrapper-inner">
          <div class="loader"></div>
        </div>
      </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

      <div class="loader-wrapper">
        <div class="lds-ring">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      @yield('content')


    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="backend/js/jquery.min.js"></script>
    <script src="backend/js/popper.min.js"></script>
    <script src="backend/js/bootstrap.min.js"></script>

    <!-- sidebar-menu js -->
    <script src="backend/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="backend/js/app-script.js"></script>
    @yield('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
    <script>
      $(document).ready(function(){
        @if(Session::get('flash_level') == 'success')
        toastr.success('{{ Session::get('flash_message') }}', 'Thành công!', {timeOut: 3500})
        @elseif(Session::get('flash_level') == 'error')
        toastr.error('{{ Session::get('flash_message') }}', 'Lỗi!', {timeOut: 3500})
        @endif

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
          toastr.error('{{$error}}', 'Lỗi!', {timeOut: 3500})
          @endforeach
          @endif
        });
        @if(request()->route()->getPrefix() != '/admin')
          $("form").submit(function (e) {
            $('button[type="submit"]').attr('disabled', 'disabled');
          });
        @endif
    </script>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '{your-app-id}',
          cookie     : true,
          xfbml      : true,
          version    : '{api-version}'
        });

        FB.AppEvents.logPageView();   

      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
  </body>

</html>