<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Viễn Đông</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
<!--

Urbanic Template

http://www.templatemo.com/tm-395-urbanic

-->     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

   <script src="{{asset('fullcalendar-3.9.0/*.css')}}"></script>
   <script media="print" src="{{asset('fullcalendar-3.9.0/fullcalendar.print.css')}}"></script>
   <script media="print" src="{{asset('fullcalendar-3.9.0/fullcalendar.print.min.css')}}"></script>
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
                                <li class="active"><a href="#templatemo-top"
                                        onclick="event.preventDefault();
                                                     document.getElementById('trangchu-form').submit();">TRANG CHỦ</a></li>
                               
                                <li><a href="#templatemo-contact" onclick="event.preventDefault();
                                                     document.getElementById('datlich-form').submit();">ĐẶT LỊCH</a></li>
                                <li><a href="{{route('dangkyan')}}" target="_blank"  onclick="event.preventDefault();
                                                     document.getElementById('dagnkyan-form').submit();">ĐĂNG KÝ SUẤT ĂN</a></li>
                                
@if(Auth::user()->Authen=='Admin')
                                <li><a href="{{route('thongke')}}"  onclick="event.preventDefault();
                                                     document.getElementById('thongke-form').submit();">THỐNG KÊ</a></li>
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
                                    <form id="dagnkyan-form" action="{{ route('dangkyan') }}" method="get" style="display: none;">
                                          <input name="Thang" value="">
                                           <input name="Tuan" value="">
                                    </form>
                                     <form id="thongke-form" action="{{route('thongke')}}" method="get" style="display: none;">
                                          
                                    </form>
                                    <script type="text/javascript">
                                        var d = new Date();
                                        var ng = d.getDate();
                                        var ngay = d.toLocaleDateString();
                                        var thang = d.getMonth() + 2 ;
                                        document.getElementsByName('Thang')[0].value = thang;
                                        var x ;
                                        // switch(ngay){
                                        //     default : document.getElementsByName('Tuan')[0].value = x ;
                                        //     break;
                                        //     case '6/29/2018':
                                        //     x =1;
                                        //        document.getElementsByName('Tuan')[0].value = 1;
                                        //         break;
                                        //     case '6/20/2018':
                                        //     x=2;
                                        //         document.getElementsByName('Tuan')[0].value = 2;
                                        //         break;
                                        //      case '7/6/2018':
                                        //      x=2;
                                        //      document.getElementsByName('Tuan')[0].value = 2;
                                        //         break;
                                        //     case '7/13/2018':
                                        //     x=3;
                                        //         document.getElementsByName('Tuan')[0].value = 3;
                                        //         break;
                                        //     case '7/27/2018':
                                        //     x=4;
                                        //         document.getElementsByName('Tuan')[0].value = 4;
                                        //         break;
                                        // }
                                        if(ng>29 && thang == 6 || (ng >1 && ng < 6 )  && thang== 7 )
                                            x= 1;
                                        if(ng > 20  && thang==6)  //chạy thử
                                            x= 2;
                                        if((ng >13 && ng < 20 )  && thang== 7)
                                            x= 2;
                                        if((ng >20 && ng < 27 )  && thang== 7)
                                            x= 3;
                                        // if((ng >27 && thang== 7) && ((ng>1 && ngay <3) && thang == 8 ))
                                        //     x= 4;
                                        document.getElementsByName('Tuan')[0].value = x ;
                                    </script>
                            </ul>

                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>
        
        <div>
            <!-- Carousel -->
            <div id="templatemo-carousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#templatemo-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#templatemo-carousel" data-slide-to="1"></li>
                    <li data-target="#templatemo-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>WELCOME TO VIỄN ĐÔNG</h1>
                                <p>806 ÂU CƠ , PHƯỜNG 14 , QUẬN TÂN BÌNH TPHCM</p>
                             
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="container">
                                <div class="carousel-caption">
                                    <div class="col-sm-6 col-md-6">
                                        <h1>SỨ MỆNH</h1>
                                        <p style="font-size: 15px;">Thông điệp "VIDON - VÌ CỘNG ĐỒNG" muốn nhắn gửi rằng công ty vốn chưa bao giờ là một cá thể độc lập. Chúng tôi tồn tại để lan tỏa và cộng hưởng các giá trị nhằm tạo ra những điểm tác động lớn hơn, nhắm đến những vấn đề nhức nhối hơn và mong muốn góp phần gầy dựng một thế hệ người trẻ Việt Nam sống đoàn kết và đầy thao thức phụng sự đất nước.</p>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <h1>TẦM NHÌN</h1>
                                        <p style="font-size: 15px;">Công ty Cổ phần Đầu tư Phát triển Thương mại Viễn Đông phấn đấu trở thành một tổ chức đầu tư có uy tín nhất trong lĩnh vực phát triển hạ tầng và công nghệ có liên quan đến Giáo Dục. Chúng tôi tin rằng giá trị lớn nhất của xã hội nằm ở Con Người, sự tương tác quan trọng nhất là giữa người với người và tương lai của một Đất Nước phụ thuộc vào những con người trẻ.</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="item">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>VIDON - VÌ CỘNG ĐỒNG</h1>
                                    <p>CHÍNH TRỰC - TỬ TẾ - KIẾN TẠO.</p>
                                    <p>Dù ở trong bất kỳ bối cảnh xã hội nào, chúng tôi vẫn tin tưởng một cách xác tín rằng Doanh nghiệp vẫn luôn có thể kinh doanh bằng sự TỬ TẾ, giữ vững tâm thế người KIẾN TẠO và dựa trên một nền tảng CHÍNH TRỰC. </p>
                                   <!--  <p><a class="btn btn-lg btn-orange" href="#" role="button">Read More</a></p> -->
                                </div>
                            </div>
                        </div>
                </div>
                <a class="left carousel-control" href="#templatemo-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#templatemo-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div><!-- /#templatemo-carousel -->
        </div>

        <div class="templatemo-welcome" id="templatemo-welcome">
            <div class="container">
                <div class="templatemo-slogan text-center">
                    <span class="txt_darkgrey">Welcome to </span><span class="txt_orange" >VIỄN ĐÔNG</span>
  </div>
</div>
                <!--     <p class="txt_slogan"><i>Lorem ipsum dolor sit amet, consect adipiscing elit. Etiam metus libero mauriec ignissim fermentum.</i></p> -->
                </div>  
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
                            <a class="btn btn-lg btn-orange" href="#"  role="button" id="btn-back-to-top">Back To Top</a>
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
        
                          
    </body>
</html>