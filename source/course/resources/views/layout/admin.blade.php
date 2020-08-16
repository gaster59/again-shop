<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin</title>

        <link href="{{ URL::asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/css/datepicker3.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/css/bootstrap-table.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/css/styles.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/css/admin.css') }}" rel="stylesheet">

        <!--Icons-->
        <script src="{{ URL::asset('admin/js/lumino.glyphs.js') }}"></script>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        @section('css')
        @show
    </head>

    <body>
        
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>Page</span>Admin</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                                <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                                <li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                                
            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <!-- <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form> -->
            @include('admin._partial.nav_menu')

        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            @yield('content')
        </div>

        <script src="{{ URL::asset('admin/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ URL::asset('admin/js/bootstrap.min.js') }}"></script>
        <!-- <script src="{{ URL::asset('js/chart.min.js') }}"></script> -->
        <script src="{{ URL::asset('admin/js/bootstrap-notify.min.js') }}"></script>
        <script src="{{ URL::asset('admin/js/bootstrap-datepicker.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            !function ($) {
                $(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
                    $(this).find('em:first').toggleClass("glyphicon-minus");	  
                }); 
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
            })

            @if(session('alertType') && session('alertMessage'))
            $.notify({
                // options
                message: "{{ session('alertMessage') }}" 
            },{
                // settings
                type: "{{ session('alertType') }}"
            });
            @endif
        </script>
        @section('js')
        @show

    </body>

</html>