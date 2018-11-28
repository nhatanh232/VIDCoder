<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Viễn Đông</title>
        <meta name="keywords" content="" />
		<meta name="description" content="" />
<!--

Urbanic Template

http://www.templatemo.com/tm-395-urbanic

--> 
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
@yield('js')
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
                                 <form id="trangchu-form" action="{{ route('trangchu') }}" method="get" style="display: none;"> 
                                    </form>
                                    <li><a href="#"  onclick="event.preventDefault();
                                                     document.getElementById('qstt-form').submit();">QUAY SỐ TRÚNG THƯỞNG</a></li>
                                     <form id="qstt-form" action="{{URL('getRe')}}" method="get" style="display: none;"> 
                                    </form>
                              <!--   <li><a href="#templatemo-about">GIỚI THIỆU</a></li>
                                <li><a href="#templatemo-portfolio">HÌNH ẢNH</a></li>
                                <li><a href="#templatemo-blog">TIN TỨC</a></li> -->
                                <!-- <li><a href="{{route('dangkyan')}}" target="_blank"  onclick="event.preventDefault();
                                                     document.getElementById('dagnkyan-form').submit();">ĐĂNG KÝ SUẤT ĂN</a></li> -->
                                
<!-- @if(Auth::user()->Authen=='Admin')
                                <li><a href="{{route('thongke')}}"  onclick="event.preventDefault();
                                                     document.getElementById('thongke-form').submit();">THỐNG KÊ</a></li>
                                @endif -->

                                 <li><a href="#" onclick="event.preventDefault();
                                                     document.getElementById('datlich-form').submit();">ĐẶT LỊCH</a></li>

                               <!--   <li><a href="#templatemo-contact">LIÊN HỆ </a></li> -->
                                 <li><a href="{{ route('logout')}}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        LOG OUT</a></li>
<!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">MỤC THÊM <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{URL('QLKhoPublic')}}" target="_blank">Tài sản công ty</a></li>
                <li><a href=>Đặt xe</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Đặt xe</a>
                                <ul class="dropdown submenu" style="display: none;">
                                    <li class="kopie"><a href="{{route('events.indexmazda')}}">Mazda</a></li>
                                    <li><a href="{{route('events.indexzinger')}}">Zinger</a></li>
                                  
                                                                      
                                </ul>
                            </li>

              </ul>
            </li> -->
          </ul>  
          <script type="text/javascript">
              $('.dropdown-menu li a').click(function(){
                    var href = $(this).attr('href');
                    window.open(href,'_blank');
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
                                    	<h1 ">SỨ MỆNH</h1>
                                     <p style="font-size: 15px;">Thông điệp "VIDON - VÌ CỘNG ĐỒNG" muốn nhắn gửi rằng công ty vốn chưa bao giờ là một cá thể độc lập. Chúng tôi tồn tại để lan tỏa và cộng hưởng các giá trị nhằm tạo ra những điểm tác động lớn hơn, nhắm đến những vấn đề nhức nhối hơn và mong muốn góp phần gầy dựng một thế hệ người trẻ Việt Nam sống đoàn kết và đầy thao thức phụng sự đất nước.</p>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                    	<h1>TẦM NHÌN</h1>
                                        <p style="font-size: 15px">Công ty Cổ phần Đầu tư Phát triển Thương mại Viễn Đông phấn đấu trở thành một tổ chức đầu tư có uy tín nhất trong lĩnh vực phát triển hạ tầng và công nghệ có liên quan đến Giáo Dục. Chúng tôi tin rằng giá trị lớn nhất của xã hội nằm ở Con Người, sự tương tác quan trọng nhất là giữa người với người và tương lai của một Đất Nước phụ thuộc vào những con người trẻ.</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="item">
                            <div class="container">
                                <div class="carousel-caption">
                                	<h1>VIDON - VÌ CỘNG ĐỒNG</h1>
                                    <p>CHÍNH TRỰC - TỬ TẾ - KIẾN TẠO</p>
                                    <p>Dù ở trong bất kỳ bối cảnh xã hội nào, chúng tôi vẫn tin tưởng một cách xác tín rằng Doanh nghiệp vẫn luôn có thể kinh doanh bằng sự TỬ TẾ, giữ vững tâm thế người KIẾN TẠO và dựa trên một nền tảng CHÍNH TRỰC. </p>
                              <!--       <p><a class="btn btn-lg btn-orange" href="#" role="button">Read More</a></p> -->
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
                    <span class="txt_darkgrey">Welcome to </span><span class="txt_orange">VIỄN ĐÔNG</span>
                 <!--    <p class="txt_slogan"><i>Lorem ipsum dolor sit amet, consect adipiscing elit. Etiam metus libero mauriec ignissim fermentum.</i></p> -->
                </div>	
            </div>
        </div>
        
       @yield('body')

        

        <div class="templatemo-partners" >
            <div class="container">
                <div class="row">


                    <div class="templatemo-line-header" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">THÀNH VIÊN</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="text-center">

                        <div style="margin-top:60px;">
                            <ul class="list-inline">
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                
                                </li>
                                <li class="col-sm-2 col-md-3 templatemo-partner-item">
                                    <a href="http://honviet.com.vn" target="_blank"><img src="{{URL::asset('layouts/images/hon-viet-logo.png')}}" class="img-responsive" alt="partner 1" /></a>
                                </li>
                                <li class="col-sm-2 col-md-6 templatemo-partner-item" style="width: 20%;
                              ">
                                    <a href="http://toanluc.com.vn" target="_blank"><img src="{{URL::asset('layouts/images/toanluc-logo.png')}}" class="img-responsive" alt="partner 2" /></a>
                                </li>
                                <li class="col-sm-2 col-md-6 templatemo-partner-item" style="width: 20%;
                              ">
                                  
                                </li>
                                 <li class="col-sm-2 col-md-3 templatemo-partner-item"  style="padding: 0 30px 0px 150px">
                                        <a href="http://vaschools.edu.vn"><img src="{{URL::asset('layouts/images/logo-vaschool.png')}}" class="img-responsive" alt="partner 3"  style="height:100px;" /></a>
                                </li>
                               <!--  <li class="col-sm-2 col-md-4 templatemo-partner-item" >
                                  
                                </li> -->
                               <!--  <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="{{URL::asset('layouts/images/partner4.jpg')}}" class="img-responsive" alt="partner 4" /></a>
                                </li> -->
                                <!-- <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="{{URL::asset('layouts/images/partner5.jpg')}}" class="img-responsive" alt="partner 5" /></a>
                                </li> -->
                               <!--  <li class="col-sm-2 col-md-2 templatemo-partner-item">
                               
                                </li> -->
                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>


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
                            <a class="btn btn-lg btn-orange" href="#" role="button" id="btn-back-to-top">Back To Top</a>
                            <div class="height30"></div>
                        </div>
                        <div class="footer_bottom_content">
                   			<span id="footer-line">CÔNG TY CỔ PHẦN ĐẦU TƯ PHÁT TRIỂN THƯƠNG MẠI VIỄN ĐÔNG</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

       
        <script src="{{URL::asset('layouts/js/bootstrap.min.js')}}"  type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/stickUp.min.js')}}"  type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/colorbox/jquery.colorbox-min.js')}}"  type="text/javascript"></script>
        <script src="{{URL::asset('layouts/js/templatemo_script.js')}}"  type="text/javascript"></script>
		<!-- templatemo 395 urbanic -->
       <!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKPRoPBTR7I1wFPlt9FH0Af_1SnK9jePA&callback=initialize"></script> -->
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
<script>
// Set the date we're counting down to
$('[data-countdown]').each(function() {
   var $this = $(this), finalDate = $(this).data('countdown');
    console.log($this.text());
    var countDownDate = new Date($this.text()).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    $this.html(days + " Ngày " + hours + "h"
    + minutes + "m" + seconds+"s");
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        $this.html("Hết hạn");
    }
}, 1000);
});

</script>     
<script type="text/javascript">
    $(document).on('click','.pagination a', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
       
         getProducts(page);
    });

    function getProducts(page){
        $.ajax({
            type:'GET',
            url:'detailtlgt?page='+page,
            success:function(data){
                $('#pagination').html(data);
                location.hash = page;
            }

        })
    }
detailTLGT();
</script>                   
    </body>
</html>