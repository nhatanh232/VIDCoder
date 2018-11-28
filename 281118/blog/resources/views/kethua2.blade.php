<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Viễn Đông</title>
          <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="keywords" content="" />
		<meta name="description" content="" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="{{URL::asset('layouts/js/colorbox/colorbox.css')}}"  rel='stylesheet' type='text/css'>
        <link href="{{URL::asset('layouts/css/templatemo_style.css')}}"  rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   
   <!-- datatables -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- end -->
<!-- Script include -->
    @yield('libary')
<!-- end -->


  
    </head>
    
    <body>
        <div class="templatemo-top-bar" id="templatemo-top">
            <div class="container">
                <div class="subheader">
                    <div id="phone" class="pull-left">
                            <img src="{{URL::asset('layouts/images/phone.png')}}" alt="phone"/>
                            (028)-3842-8633
                    </div>
                    <div id="email" class="pull-right">
                            <img src="{{URL::asset('layouts/images/email.png')}}" alt="email"/>
                           vidon@vidon.com.vn
                    </div>
                </div>
            </div>
        </div>
        <div class="templatemo-top-menu">
            <div class="container">
                <!-- Static navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a href="#" class="navbar-brand"><img src="{{URL::asset('layouts/images/logovd.png')}}" alt="Urbanic Template" title="Urbanic Template" style="height: 52px;" /></a>
                        </div>
                        <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                                <li class="active"><a href="{{ route('home')}}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('trangchu-form').submit();">TRANG CHỦ</a></li>
                               
                                <li><a href="#templatemo-contact" onclick="event.preventDefault();
                                                     document.getElementById('datlich-form').submit();">ĐẶT LỊCH</a></li>
                                <li><a href="{{route('dangkyan')}}" target="_blank"  onclick="event.preventDefault();
                                                     document.getElementById('tsct-form').submit();">TÀI SẢN CÔNG TY</a></li>
                                
@if(Auth::user()->Authen=='Admin')
                                <!-- <li><a href="{{route('thongke')}}"  onclick="event.preventDefault();
                                                     document.getElementById('thongke-form').submit();">THỐNG KÊ</a></li> -->
                                @endif

                                 <li><a href="{{ route('logout')}}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        LOG OUT</a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="trangchu-form" action="{{ route('trangchu') }}" method="get" style="display: none;">
                                        
                                    </form>
                                      <!-- {!! Form::model(array('route' => 'events.index','method'=>'get','id'=>'datlich-form','style'=>'display:none;')),'EventModel' !!}
                                      {!! Form::close() !!} -->
                                    <form id="datlich-form" action="{{ route('events.index')}}" method="get" name="db" values="event_models_phongkai" style="display: none;" >
                                        
                                    </form>
                                    <form id="tsct-form" action="{{URL('Taisancongty')}}" method="get" style="display: none;">
                                     
                                    </form>
                                     <form id="thongke-form" action="{{route('thongke')}}" method="get" style="display: none;">
                                          
                                    </form>
                                    
                            </ul>

                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>  
        
        </div>
        @yield('body')
       
        <div class="templatemo-footer" >
            <div class="container">
                <div class="row">
                    <div class="text-center">

                        <div class="footer_container">
                            <ul class="list-inline">
                                <li>
                                   <a href="https://www.facebook.com/tapdoanVIDON/" target="_blank">
                                        <span class="social-icon-fb"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-rss"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-linkedin"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-dribbble"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="height30"></div>
                            <a class="btn btn-lg btn-orange" href="#" role="button" id="btn-back-to-top" >Back To Top</a>
                            <div class="height30"></div>
                        </div>
                        <div class="footer_bottom_content">
                   			<span id="footer-line">CÔNG TY CỔ PHẦN ĐẦU TƯ PHÁT TRIỂN THƯƠNG MẠI VIỄN ĐÔNG</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <script src="{{URL::asset('layouts/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/bootstrap.min.js')}}"  type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/stickUp.min.js')}}"  type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/colorbox/jquery.colorbox-min.js')}}"  type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/templatemo_script.js')}}"  type="text/javascript"></script>
		<!-- templatemo 395 urbanic -->
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           


             
    </body>
</html>