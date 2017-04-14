<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>NecTech</title>

        <link rel="shortcut icon" type="image/x-icon" href="{{asset ('images/favicon.png')}}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}"/>
        
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}"/>
        <link href="{{ asset('css/master.css') }}" rel="stylesheet">    

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        
        <script src="{{ asset('js/api.js')}}"></script>
                <!--Main-->   
        <script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>
        <script src="{{ asset('js/jquery-ui.min.js')}}"></script>

    </head>
    <body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">      
        
        <header class="b-topBar wow slideInDown" data-wow-delay="0.7s">
            <div class="container containerHeader">
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="b-topBar__addr">
                            <span class="fa fa-map-marker"></span>
                             MIAMI, FLORIDA, USA
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <div class="b-topBar__tel">
                            <span class="fa fa-phone"></span>
                            (786) 877-8027
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">


                    <div class="b-nav__list menuH wow slideInRight" data-wow-delay="0.3s" >
                            <div class="navbar-collapse navbar-main-slide" style="color: #fff">
                                <ul class="navbar-nav-menu">
                                    <li><a style="color:#fff;" href="{{ route('cart-show') }}">Cart</a></li>
                                     @if (Auth::guest())
                                        <li><a style="color:#fff;" href="{{url('/register')}}">Register</a></li>
                                        <li><a style="color:#fff;" href="{{url('/login')}}">Sign in</a></li>

                                    @else    
                                    <li style="color:#fff;" class="dropdown">
                                        <a style="color:#fff;" class="dropdown-toggle" data-toggle='dropdown' href="#">{{ Auth::user()->name }} <span class="fa fa-caret-down"></span></a>
                                        <ul class="dropdown-menu h-nav">
                                            <li>
                                                <a href="{{ url('/logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    <i class="glyphicon glyphicon-log-out"></i>           
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                            
                                            <li>
                                                <a href="<?php echo url('/clientProfile').'/'.Auth::user()->id; ?>">
                                                    <i class="glyphicon glyphicon-cog"></i>  
                                                    Profile
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif 
                                </ul>
                            </div>
                        </div>


                       
                    </div>
                   
                </div>
            </div>
        </header><!--b-topBar-->


       <!-- <header class="b-topBar wow slideInDown" data-wow-delay="0.7s">
            <div class="containerHeader">
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="b-topBar__addr">
                            <span class="fa fa-map-marker"></span>
                            MIAMI, FLORIDA, USA
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="b-topBar__tel">
                            <span class="fa fa-phone"></span>
                            (786) 877-8027
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="b-topBar__nav" >
                                <ul>        
                                    <li><a href="#">Cart</a></li>
                                @if (Auth::guest())
                                    <li><a href="{{url('/register')}}">Register</a></li>
                                    <li><a href="{{url('/login')}}">Sign in</a></li>
                                @else
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle='dropdown' href="#">{{ Auth::user()->name }} <span class="fa fa-caret-down"></span></a>
                                        <ul class="dropdown-menu h-nav">
                                            <li>
                                                <a href="{{ url('/logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    <i class="glyphicon glyphicon-log-out"></i>           
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                            
                                            <li>
                                                <a href="<?php echo url('/clientProfile').'/'.Auth::user()->id; ?>">
                                                    <i class="glyphicon glyphicon-cog"></i>  
                                                    Profile
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                @endif 
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </header><!--b-topBar-->

        <nav class="b-nav">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-8">
                        <div class="wow slideInLeft" data-wow-delay="0.3s">
                            <div id="logo-container">
                            <a href="{{ url('/')}}"><img src="{{ asset('images/logo.png')}}"></a> 
                            </div>                          
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-8" style="margin-top:40px;">
                        <div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                                <ul class="navbar-nav-menu">
                                    <li><a href="{{ url('/')}}">Home</a></li>
                                    <li><a href="{{ url('/aboutus')}}">About Us</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle='dropdown' href="#">Services <span class="fa fa-caret-down"></span></a>
                                        <ul class="dropdown-menu h-nav">
                                            <li><a href="#">Automotive</a></li>
                                            <li><a href="#">Residential & Commercial</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Shop</a></li>
                                    <li><a href="{{ url('/contact')}}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav><!--b-nav-->

        
    <!-- Principal UNO-->


    <div class="wrappage">

        <div class="main-content">
            
        <!-- page content -->
         @yield('content')

        <!-- /page content -->
          
        <div id="back-to-top">
            <i class="fa fa-long-arrow-up"></i>
        </div>
        <footer id="footer" class="footer-v1">         
          <div class="container">
                <div class="footer-top">
                    <div class="logo-footer">
                        <a href="#" title="Logo">
                            <img src="{{ asset('images/logo.png')}}" alt="Logo">
                        </a>
                    </div>
                    <div class="menu-footer">
                        <ul>
                            <li><a href="#" title="Home">Home</a></li>
                            <li><a href="#" title="Product">About Us</a></li>
                            <li><a href="#" title="History">Automotive</a></li>
                            <li><a href="#" title="Showroom">Residential & Commercial</a></li>
                            <li><a href="#" title="Product">Shop</a></li>
                            <li><a href="#" title="Contact">Contact</a></li>
                        </ul>    
                    </div>
                    <!-- End menu-footer -->
                    <div class="social">
                        <a class="active" title="twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a title="facebook" href="#"><i class="fa fa-facebook"></i></a>
                        <a title="instagram" href="#"><i class="fa fa-instagram"></i></a>
                        
                    </div>
                    <!-- End social -->
                </div>
                <!-- End footer-top -->
                <div class="footer-bottom">
                    <p>&copy; 2016 </p>
                </div>
                <!-- End footer-bottom -->
          </div>
          <!-- End container -->
        </footer>
        </div>
    <!-- End wrappage -->



        <!-- Fin de principal UNO-->
        

        <script src="{{ asset('assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
        <script src="{{ asset('js/waypoints.min.js')}}"></script>
        <script src="{{ asset('js/jquery.easypiechart.min.js')}}"></script>
        <script src="{{ asset('js/classie.js')}}"></script>

        <!--Switcher-->
        <script src="{{ asset('assets/switcher/js/switcher.js')}}"></script>
        <!--Owl Carousel
        Viejo <script src="{{ asset('assets/owl-carousel/owl.carousel.min.js')}}"></script>-->
        
        <script src="{{ asset('assets/node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
        <!--bxSlider-->
        <script src="{{ asset('assets/bxslider/jquery.bxslider.js')}}"></script>
        <!-- jQuery UI Slider -->
        <script src="{{ asset('assets/slider/jquery.ui-slider.js')}}"></script>

        <!--Theme-->
        <script src="{{ asset('js/jquery.smooth-scroll.js')}}"></script>
        <script src="{{ asset('js/wow.min.js')}}"></script>
        <script src="{{ asset('js/jquery.placeholder.min.js')}}"></script>
        <script src="{{ asset('js/theme.js')}}"></script>

        <!--Uno-->
        
        <script type="text/javascript" src="{{ asset('assets/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/jquery.themepunch.plugins.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/engo-plugins.js')}}"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="{{ asset('assets/js/map-icons.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/store.js')}}"></script>

        <script type="text/javascript" src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>

        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/modernizr.custom.js')}}"></script>


<script type="text/javascript">
            
        $('#id_maker').change(function(event){
            
           $('#id_model').empty();
            $("#id_model").append("<option value='0'>Models</option>");
            var maker = event.target.value;
            $.get("product/modelMaker/"+maker+"", function(response , state)
                {
                    $("#id_model").removeAttr('disabled');
                    for(i=0; i<response.length; i++)
                    {
                        $("#id_model").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>"); 
                    }

                });   
            });

         $('#botonbcm').click(function(event){

            var bcm = $('#bcm').val();
            if(bcm!==""){
                       
                $('.old').text('');
                $('.new').text('');

                
               $.get("bcm/calculator/"+bcm+"", function(response , state)
                    {
                       if(typeof response[0] !== 'undefined'){
                        $('.old').text('BCM OLD: '+response[0].OLD);
                        $('.new').text('BCM NEW: '+response[0].NEW);
                       }
                       else{
                        $('.old').text('No found BCM!');
                       }

                    });  

                }else{
                    $('.old').text("BCM field is mandatory!");
                    alert("BCM field is mandatory!");
                }
            });
            
        </script>
    
    </body>
</html>