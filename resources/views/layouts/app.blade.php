<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'White Dashboard') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('white') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('white') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('white') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('white') }}/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('white') }}/css/theme.css" rel="stylesheet" />
    </head>
    <body class="white-content {{ $class ?? '' }}">
        @auth()
            <div class="wrapper">
                    @include('layouts.navbars.sidebar')
                    @php
                    $colorsidebar="";
                    @endphp
                    @switch(Auth::user()->ColorUser)
                        @case(0)
                            @php
                            $colormainpanel="primary";
                            @endphp
                            @break
                        @case(1)
                            @php
                            $colormainpanel="blue";
                            @endphp
                            @break
                        @case(2)
                            @php
                            $colormainpanel="green";
                            @endphp
                            @break
                        @case(3)
                            @php
                            $colormainpanel="red";
                            @endphp
                            @break
                        @case(4)
                            @php
                            $colormainpanel="yellow";
                            @endphp
                            @break
                        @default
                            @php
                            $colormainpanel="green";
                            @endphp
                    @endswitch

                <div class="wrapper">
                        @include('layouts.navbars.sidebar')
                    <div class="main-panel" data="{{$colormainpanel}}">
                        @include('layouts.navbars.navbar')

                        <div class="content">
                            @yield('content')
                        </div>

                        @include('layouts.footer')
                    </div>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            @include('layouts.navbars.navbar')
            <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        @endauth
        <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-primary @auth {{ Auth::user()->ColorUser === 0 ? "active" : "" }} @endauth" data-color="primary"></span>

                        <span class="badge filter badge-info @auth {{ Auth::user()->ColorUser === 1 ? "active" : "" }} @endauth" data-color="blue"></span>

                        <span class="badge filter badge-success @auth {{ Auth::user()->ColorUser === 2 ? "active" : "" }} @endauth" data-color="green"></span>

                        <span class="badge filter badge-danger @auth {{ Auth::user()->ColorUser === 3 ? "active" : "" }} @endauth" data-color="red"></span>

                        <span class="badge filter badge-warning @auth {{ Auth::user()->ColorUser === 4 ? "active" : "" }} @endauth" data-color="yellow"></span>
                    </div>
                    <div class="clearfix"></div>
                    </a>
                </li>
                <li>
                </li>
                {{-- <li class="button-container">
                    <a href="https://www.creative-tim.com/product/white-dashboard-laravel" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
                    <a href="https://white-dashboard-laravel.creative-tim.com/docs/getting-started/laravel-setup.html" target="_blank" class="btn btn-default btn-block btn-round">
                    Documentation
                    </a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
                    <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
                    <br>
                    <br>
                    <a class="github-button" href="https://github.com/creativetimofficial/white-dashboard-laravel" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li> --}}
                </ul>
            </div>
        </div>
        <script src="{{ asset('white') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('white') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('white') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('white') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script> --}}
        <!--  Notifications Plugin    -->
        <script src="{{ asset('white') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('white') }}/js/white-dashboard.min.js?v=1.0.0"></script>
        <script src="{{ asset('white') }}/js/theme.js"></script>
        {{-- incluido el secript de app.js para el codigo de laravel echo --}}
        <script src="{{ asset('js') }}/app.js"></script>

        @stack('js')

        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');
                    $navbar = $('.navbar');
                    $main_panel = $('.main-panel');

                    $full_page = $('.full-page');
                    $colors1 = $('#colors1');
                    $colors2 = $('#colors2');
                    $colors3 = $('#colors3');
                    $colors4 = $('#colors4');
                    $iconolapiz = $('#iconolapiz');

                    $sidebar_responsive = $('body > .navbar-collapse');
                    sidebar_mini_active = true;
                    white_color = false;

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    $('.fixed-plugin a').click(function(event) {
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .background-color span').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data', new_color);
                        }

                        if ($main_panel.length != 0) {
                            $main_panel.attr('data', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data', new_color);
                        }

                        $colors1.removeClass(); 
                        $colors1.addClass('block');
                        $colors1.addClass('block-one-'+new_color);

                        $colors2.removeClass(); 
                        $colors2.addClass('block');
                        $colors2.addClass('block-two-'+new_color);

                        $colors3.removeClass(); 
                        $colors3.addClass('block');
                        $colors3.addClass('block-three-'+new_color);

                        $colors4.removeClass(); 
                        $colors4.addClass('block');
                        $colors4.addClass('block-four-'+new_color);

                        switch(new_color) {
                            case "primary":
                            $iconolapiz.css('background',"#fc4fff");
                            break;
                            case "blue":
                            $iconolapiz.css('background',"#359fe9");
                            break;
                            case "green":
                            $iconolapiz.css('background',"#42e7ab");
                            break;
                            case "red":
                            $iconolapiz.css('background',"red");
                            break;
                            case "yellow":
                            $iconolapiz.css('background',"orange");
                            break;
                          default:
                            // code block
                        }


                        // if (new_color == "primary") {
                        //     $iconolapiz.css('background',"pink");
                        // }else{
                        //     $iconolapiz.css('background',new_color);
                        // }

                        var colorespa??ol ="";

                        switch(new_color) {
                          case "primary":
                            colorespa??ol ="lila";                                
                            break;
                          case "blue":
                            colorespa??ol ="azul";
                            break;
                          case "green":
                            colorespa??ol ="verde";                                
                            break;
                          case "red":
                            colorespa??ol ="rojo";                                
                            break;
                          case "yellow":
                            colorespa??ol ="amarillo";                                
                            break;
                          default:
                            colorespa??ol ="";
                        } 
                        @auth
                          $.notify({
                            icon: "tim-icons icon-palette",
                            message: "Su color a sido actualizado correctamente por el color "+colorespa??ol

                          }, {
                            type: 'info',
                            timer: 8000,
                            placement: {
                              from: 'top',
                              align: 'left'
                            }
                          });
                        @endauth
                    }); 

                    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            sidebar_mini_active = false;
                            whiteDashboard.showSidebarMessage('Sidebar mini deactivated...');
                        } else {
                            $('body').addClass('sidebar-mini');
                            sidebar_mini_active = true;
                            whiteDashboard.showSidebarMessage('Sidebar mini activated...');
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });

                    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                            var $btn = $(this);

                            if (white_color == true) {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').removeClass('white-content');
                                }, 900);
                                white_color = false;
                            } else {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').addClass('white-content');
                                }, 900);

                                white_color = true;
                            }
                    });

                    $('.light-badge').click(function() {
                        $('body').addClass('white-content');
                    });

                    $('.dark-badge').click(function() {
                        $('body').removeClass('white-content');
                    });
                });
            });
        </script>
        <script type="text/javascript">
            // Echo.private('user-login').notification((notification) => {
            //    console.log(notification.type);
            // });
            
            Echo.private(`user-login`)
                .listen('Userlogin', (e) => {
                    console.log(e.user.name);
                    $.notify({
                        icon: "tim-icons icon-single-02",
                        message: "El Usuario <b>"+e.user.name+" - "+e.user.email+"</b> - a ha iniciado sesi??n."

                      }, {
                        type: 'info',
                        timer: 4000,
                        placement: {
                          from: 'top',
                          align: 'left'
                        }
                      });
            });

            Echo.channel(`channel-message`)
                .listen('NewMessage', (e) => {
                    console.log(e.message);
            });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $(".fixed-plugin .background-color span").click(function(e){
                var new_color = $(this).data('color');
                console.log(new_color);
                e.preventDefault();
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });

                @auth
                    $.ajax({
                        url: "{{url('/cambiodecolor')}}/"+{{Auth::user()->id}}+"/color/"+new_color,
                        method: 'GET',
                        data:{},
                        beforeSend: function(){
                            $(this).prop('disabled', true);
                        },
                        success: function(res){
                            console.log(res);
                        },
                        complete: function(){
                        }
                    });
                @endauth
            });
        });
        </script>
        <script>
            $('#iconolapiz').on('click', function(){
                $('#Avatar').click();
            });
        </script>
        
        @stack('js')
    </body>
</html>
