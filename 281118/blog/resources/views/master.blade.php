<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Viễn Đông</title>
        <meta name="keywords" content="" />
    <meta name="description" content="" />
<style type="text/css">
    .submenu > li {
        list-style-type: none;
    }
    .submenu > li > a{
           display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.428571429;
    color: #333333;
    white-space: nowrap;
    }
</style>    
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
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
        @yield('css')
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
                                <li class="active"><a href="#templatemo-top">TRANG CHỦ</a></li>
                                <li><a href="#templatemo-about">GIỚI THIỆU</a></li>
                                <li><a href="#templatemo-portfolio">HÌNH ẢNH</a></li>
                                <li><a href="#templatemo-blog">TIN TỨC</a></li>
                                <li><a href="#templatemo-contact">LIÊN HỆ </a></li>
                                
<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">MỤC THÊM <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{URL('item')}}" target="_blank">Tài sản công ty</a></li>
                <li class="divider"></li>
                <li><a href="{{URL('getRe')}}" target="_blank">Quay số trúng thưởng</a></li>
                <li class="divider"></li>
                
                <li><a href="{{URL('viewAn')}}">Đăng kí suất ăn</a></li>
                <li class="divider"></li>
                <li><a href="{{URL('suatancanhan')}}">Thông tin suất ăn</a></li>
                <li class="divider"></li>
                <li><a href="{{URL('Information')}}" target="_blank">Thông tin nhân viên</a></li>
                <li class="divider"></li>
                <li><a href="{{Route('ProfileId')}}" target="_blank">Your Profile</a></li>
                <li class="divider"></li>
                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Đặt xe</a>
                                <ul class="dropdown submenu" style="display: none;">
                                    <li class="kopie"><a href="{{route('events.indexmazda')}}">Mazda</a></li>
                                    <li><a href="{{route('events.indexzinger')}}">Zinger</a></li>
                                  
                                                                      
                                </ul>
                            </li>
                                    <li class="divider"></li>
                             <li><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        LOG OUT</a></li>

              </ul>
            </li>
          </ul>  
          <script type="text/javascript">
              $('.dropdown-menu li a').click(function(){
                    var href = $(this).attr('href');
                    window.open(href);
              });
          </script>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    

                                    </form>
                                     <form id="dagnkyan-form" action="{{ route('dangkyan') }}" method="get" style="display: none;">
                                          <input name="Thang" value="">
                                           <input name="Tuan" value="">
                                    </form>
                                     <form id="thongke-form" action="{{route('thongke')}}" method="get" style="display: none;">
                                          
                                    </form>
                                     <form id="datlich-form" action="{{ route('events.index')}}" method="get" name="db" values="event_models_phongkai" style="display: none;" >
                                        
                                    </form>
                            
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>
        
        <div>
            <!-- Carousel -->
          
        <div class="templatemo-welcome" id="templatemo-welcome">
            <div class="container">
                <div class="templatemo-slogan text-center">
                    <span class="txt_darkgrey">Welcome to </span><span class="txt_orange">Kho Cơ Sở Vật Chất</span>
                 <!--    <p class="txt_slogan"><i>Lorem ipsum dolor sit amet, consect adipiscing elit. Etiam metus libero mauriec ignissim fermentum.</i></p> -->
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="templatemo-service">
            <div class="container">
              @yield('body')
            </div>
        </div><!-- /.templatemo-team -->
    

               

<!-- Row thong bao -->

    
       @yield('js')
    
        <script src="{{URL::asset('layouts/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/bootstrap.min.js')}}"  type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/stickUp.min.js')}}"  type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/colorbox/jquery.colorbox-min.js')}}"  type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/templatemo_script.js')}}"  type="text/javascript"></script>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
   <script type="text/javascript">
        $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

 $('ul.nav li.dropdown-submenu').hover(function() {
  $(this).find('.submenu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.submenu').stop(true, true).delay(200).fadeOut(500);
});

</script>    
             
    </body>
</html>