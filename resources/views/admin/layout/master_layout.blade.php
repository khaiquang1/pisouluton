<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <title>Admin Pisolution</title>
   
    
    
  
    <base href="{{asset('/')}}"></base>
    <!-- loader-->
    <link href="{{asset('backend/css/pace.min.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
    <script src="{{asset('backend/js/pace.min.js')}}"></script>
    <!--favicon-->
    <!-- Vector CSS -->
    <!-- <link href="{{asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" /> -->
    <!-- simplebar CSS-->
    <link href="{{asset('backend/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{asset('backend/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{asset('backend/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{asset('backend/css/sidebar-menu.css')}}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{asset('backend/css/app-style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">
  	@if(isset($setting_page['chat_script']))
    {!!$setting_page['chat_script']!!}
    @endif

    @if(isset($setting_page['google_analytic']))
    {!!$setting_page['google_analytic']!!}
    @endif
    
    @if(isset($setting_page['facebook_pixel']))
    {!!$setting_page['facebook_pixel']!!}
    @endif

    @if(isset($setting_page['tag_manager_head']))
    {!!$setting_page['tag_manager_head']!!}
    @endif
    @yield('css')
    <style>
    .dropdown {
        position: relative;
    }
    .table td, .table th{
        vertical-align: middle;
    }
    .modal-title{
      font-size: 18px;
      margin: 0;
      padding: 0;
    }
    .modal-header .close{
      color: #fff!important;
    	margin: -0.5rem -1rem -1rem auto;
    }
    .dropdown-content {
        display: none;
    }
    .modal-content{
      	background: #025d86!important;
    	border: 0.7px #0b3950 solid;
    }
    .card .table td, .card .table th{
          vertical-align: middle;
    }
	.d_position{
      display: none;
    }
    .dropdown-content a {
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }
    </style>
	<style>
		.btn-sm{
          padding: 3px 6px;
        }
	</style>
</head>

<body class="bg-theme bg-theme2">
	@if(isset($setting_page['tag_manager_body']))
    {!!$setting_page['tag_manager_body']!!}
    @endif
  	@if(isset($setting_page['chat_script']))
    {!!$setting_page['chat_script']!!}
    @endif
    <!-- Start wrapper-->
    <div id="wrapper">
        @include('admin.layout.sidebar')
        @include('admin.layout.topbar')

        <div class="clearfix"></div>

        <div class="content-wrapper">
            @yield('content')
            <!-- End container-fluid-->

        </div>
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <footer class="footer">
            <div class="container">
                <div class="text-center">
                    Copyright © 2022 Pi Solution
                </div>
            </div>
        </footer>
        <!--End footer-->

        <!--start color switcher-->
        <!-- <div class="right-sidebar">
            <div class="switcher-icon">
                <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
            </div>
            <div class="right-sidebar-content">

                <p class="mb-0">Gaussion Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>

            </div>
        </div> -->
        <!--end color switcher-->

    </div>
    <!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>

    <!-- simplebar js -->
    <script src="{{asset('backend/plugins/simplebar/js/simplebar.js')}}"></script>
    <!-- sidebar-menu js -->
    <script src="{{asset('backend/js/sidebar-menu.js')}}"></script>
    <!-- loader scripts -->
    <!-- <script src="{{asset('public/backend/js/jquery.loading-indicator.js')}}"></script> -->
    <!-- Custom scripts -->
    <script src="{{asset('backend/js/app-script.js')}}"></script>
    <!-- Chart js -->

    <script src="{{asset('backend/plugins/Chart.js/Chart.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js')}}"></script>
    <!-- Index js -->
    <!-- <script src="{{asset('public/backend/js/index.js')}}"></script> -->
    @yield('script')
    <script>
        $(document).ready(function(){
            @if(Session::get('flash_level') == 'success')
            toastr.success('{{ Session::get('flash_message') }}', 'Success!', {timeOut: 3500})
            @elseif(Session::get('flash_level') == 'error')
            toastr.error('{{ Session::get('flash_message') }}', 'Error!', {timeOut: 3500})
            @endif

            @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            toastr.error('{{$error}}', 'Error!', {timeOut: 3500})
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
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn span')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
    </script>
    <script>
		$(document).ready(function() {
			"use strict";
			$('.dropify').dropify();
			$('.dropify-fr').dropify({
				messages: {
					default: 'Glissez-dĂ©posez un fichier ici ou cliquez',
					replace: 'Glissez-dĂ©posez un fichier ou cliquez pour remplacer',
					remove:  'Supprimer',
					error:   'DĂ©solĂ©, le fichier trop volumineux'
				}
			});
			var drEvent = $('#input-file-events').dropify();
	
			drEvent.on('dropify.beforeClear', function(event, element){
				return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
			});
	
			drEvent.on('dropify.afterClear', function(event, element){
				alert('File deleted');
			});
	
			drEvent.on('dropify.errors', function(event, element){
				console.log('Has Errors');
			});
	
			var drDestroy = $('#input-file-to-destroy').dropify();
			drDestroy = drDestroy.data('dropify')
			$('#toggleDropify').on('click', function(e){
				e.preventDefault();
				if (drDestroy.isDropified()) {
					drDestroy.destroy();
				} else {
					drDestroy.init();
				}
			});
			//
			$("input[name='checkall']").click(function() {
				var checked = $(this).is(':checked');
				$('.table-checkall tbody tr td input:checkbox').prop('checked', checked);
			});
		});
	</script>
</body>

</html>