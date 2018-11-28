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
                                <li class="active"><a href="#templatemo-top">TRANG CHỦ</a></li>
                                <li><a href="#templatemo-about">GIỚI THIỆU</a></li>
                                <li><a href="#templatemo-portfolio">HÌNH ẢNH</a></li>
                                <li><a href="#templatemo-blog">TIN TỨC</a></li>
                                <!-- <li><a href="{{route('dangkyan')}}" target="_blank"  onclick="event.preventDefault();
                                                     document.getElementById('dagnkyan-form').submit();">ĐĂNG KÝ SUẤT ĂN</a></li> -->
                                
<!-- @if(Auth::user()->Authen=='Admin')
                                <li><a href="{{route('thongke')}}"  onclick="event.preventDefault();
                                                     document.getElementById('thongke-form').submit();">THỐNG KÊ</a></li>
                                @endif -->

                                 <li><a href="#" onclick="event.preventDefault();
                                                     document.getElementById('datlich-form').submit();">ĐẶT LỊCH</a></li>

                                 <li><a href="#templatemo-contact">LIÊN HỆ </a></li>
                                
<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">MỤC THÊM <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{URL('Taisancongty')}}" target="_blank">Tài sản công ty</a></li>
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
                <!-- <li><a href="{{URL('QLKhoPublic')}}" target="_blank">Thông tin tài khoản</a></li> -->
               <!--  <li><a href=>Đặt xe</a></li> -->
                <!-- <li class="divider"></li> -->
                <!-- <li><a href="#">Separated link</a></li> -->
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
                                    <script type="text/javascript">
                                        var d = new Date();
                                        var ng = d.getDate();
                                        var ngay = d.toLocaleDateString();
                                        var thang = d.getMonth() + 1 ;
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
                                        if(ng>29 && thang == 6 || (ng >=1 && ng <= 6 )  && thang== 7 )
                                            x= 1;
                                        if(ng > 20  && thang==6)  //chạy thử
                                            x= 2;
                                        if((ng >6 && ng <= 20 )  && thang== 7)
                                            x= 2;
                                        if((ng >20 && ng <= 27 )  && thang== 7)
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
        
        <div class="templatemo-service">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="templatemo-service-item">
                            <div>
                                <img src="{{URL::asset('layouts/images/tamnhin.png')}}" alt="icon" style="width: 20%" />
                                <span class="templatemo-service-item-header">TẦM NHÌN</span>
                            </div>
                            <p>Công ty Cổ phần Đầu tư Phát triển Thương mại Viễn Đông phấn đấu trở thành một tổ chức đầu tư có uy tín nhất trong lĩnh vực phát triển hạ tầng và công nghệ có liên quan đến Giáo Dục. Chúng tôi tin rằng giá trị lớn nhất của xã hội nằm ở Con Người, sự tương tác quan trọng nhất là giữa người với người và tương lai của một Đất Nước phụ thuộc vào những con người trẻ.</p>
                            <div class="text-center">
                            	<a href="http://vidon.com.vn/tam-nhin-3.html" target="_blank" 
                                	class="templatemo-btn-read-more btn btn-orange">READ MORE</a>
                            </div>
                            <br class="clearfix"/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="templatemo-service-item">
                            <div>
                                <img src="{{URL::asset('layouts/images/giatricotloi.png')}}" alt="icon" style="width: 20%" />
                                <span class="templatemo-service-item-header">GIÁ TRỊ CỐT LÕI</span>
                            </div>
							<p>Trên tinh thần đề cao sự cộng tác, tính chuyên nghiệp và thể hiện được thông điệp sứ mệnh quan trọng của công ty: “Vì Cộng Đồng”, tất cả những hoạt động của chúng tôi nhấn mạnh vào 4 giá trị cốt lõi: - Rèn luyện thân thể: Dẻo dai, khỏe mạnh. 

- Tôn vinh giá trị gia đình: Chia sẻ và trách nhiệm. 

- Chuyên nghiệp trong công tác: Đoàn kết, chỉn chu. 

- Tạo giá trị cho xã hội: Cống hiến, nhiệt tâm.</p>
                            <div class="text-center">
                                <a href="http://vidon.com.vn/gia-tri-cot-loi-2.html" target="_blank" 
                                	class="templatemo-btn-read-more btn btn-orange">READ MORE</a>
                            </div>
                            <br class="clearfix"/>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                        <div class="templatemo-service-item">
                            <div>
                                <img src="{{URL::asset('layouts/images/kientao.png')}}" alt="icon" style="width: 20%" />
                                <span class="templatemo-service-item-header">SỨ MỆNH</span>
                            </div>
                            <p>Dù ở trong bất kỳ bối cảnh xã hội nào, chúng tôi vẫn tin tưởng một cách xác tín rằng Doanh nghiệp vẫn luôn có thể kinh doanh bằng sự TỬ TẾ, giữ vững tâm thế người KIẾN TẠO và dựa trên một nền tảng CHÍNH TRỰC. Thông điệp "VIDON - VÌ CỘNG ĐỒNG" muốn nhắn gửi rằng công ty vốn chưa bao giờ là một cá thể độc lập. Chúng tôi tồn tại để lan tỏa và cộng hưởng các giá trị nhằm ....</p>
                            <div class="text-center">
                                <a href="http://vidon.com.vn/su-menh-4.html" target="_blank" 
                                	class="templatemo-btn-read-more btn btn-orange">READ MORE</a>
                            </div>
                            <br class="clearfix"/>
                        </div>
                        <br class="clearfix"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="templatemo-team" id="templatemo-about">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header">
                        <div class="text-center">
                            <hr class="team_hr team_hr_left"/><span>GIÁ TRỊ CỐT LÕI</span>
                            <hr class="team_hr team_hr_right" />
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                    <ul class="row row_team">
                        <li class="col-lg-3 col-md-3 col-sm-6 " style="width: 20%">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="{{URL::asset('layouts/images/tamnhin.png')}}" class="img-responsive" alt="member 1" />
                                    <div class="thumb-overlay">

                                        <a href="https://facebook.com.vn/tapdoanVIDON" target="_blank" >
                                            <span class="social-icon-fb" style="text-align: center;"></span></a>
                                     
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header"><h1 style="color:green">TẦM NHÌN</h1></p>
                                   <!--  <p class="team-inner-subtext">Designer</p> -->
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 " style="width: 20%">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="{{URL::asset('layouts/images/Tute.png')}}" class="img-responsive" alt="member 2" />
                                  <!--   <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div> -->
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header"><h1 style="color:green">TỬ TẾ</h1></p>
                               <!--      <p class="team-inner-subtext">Developer</p> -->
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3 col-md-3 col-sm-6 " style="width: 20%">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="{{URL::asset('layouts/images/Chinhtruc.png')}}" class="img-responsive" alt="member 3" />
                                    <!-- <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div> -->
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header"><h1 style="color:green">CHÍNH TRỰC</h1></p>
                                <!--     <p class="team-inner-subtext">Director</p> -->
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3 col-md-3 col-sm-6 " style="width: 20%">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="{{URL::asset('layouts/images/kientao.png')}}" class="img-responsive" alt="member 4" />
                                   <!--  <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div> -->
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header"><h1 style="color:green">KIẾN TẠO</h1></p>
                                    <!-- <p class="team-inner-subtext">Manager</p> -->
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3 col-md-3 col-sm-6 " style="width: 20%">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="{{URL::asset('layouts/images/kientao.png')}}" class="img-responsive" alt="member 4" />
                                    <div class="thumb-overlay">
                                        <a href="https://facebook.com.vn/tapdoanVIDON" target="_blank"><span class="social-icon-fb"></span></a>
                                     
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header"><h1 style="color:green">SỨ MỆNH</h1></p>
                                    <!-- <p class="team-inner-subtext">Manager</p> -->
                                </div>
                            </div>
                        </li>
                    </ul>
            </div>
        </div><!-- /.templatemo-team -->

        <div id="templatemo-portfolio" >
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">HOẠT ĐỘNG </span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="templatemo-gallery-category" style="font-size:16px; margin-top:80px;">
                        <!-- <div class="text-center">
                            <a class="active" href=".gallery">All</a> / <a href=".gallery-design">Tử tế </a>/ <a href=".gallery-graphic">Graphic</a> / <a href=".gallery-inspiration">Chính trực</a> / <a href=".gallery-creative">Creative</a>							
                        </div> -->
                    </div>
                </div> <!-- /.row -->


                <div class="clearfix"></div>
                <div class="text-center">
                    <ul class="templatemo-project-gallery" >
                        @foreach($hoatdong as $key)
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-graphic" >
                            <a class="colorbox" href="{{URL::asset('layouts/images/hoatdong')}}{{$key->Images}}" data-group="gallery-graphic">
                                <div class="templatemo-project-box">

                                    <img src="{{URL::asset('layouts/images/hoatdong')}}{{$key->Images}}" class="img-responsive" alt="gallery" />

                                    <div class="project-overlay">
                                        <h5>{{$key->Title}}</h5>
                                        <hr />
                                        <h4>{{date('d-m-Y',strtotime($key->Ngay))}}</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                       
                <div class="clearfix"></div>
                <!-- <div class="row text-center">
                    <a class="btn_loadmore btn btn-lg btn-orange" href="#" role="button">LOAD MORE</a>
                </div> -->
            </div><!-- /.container -->
        </div> <!-- /.templatemo-portfolio -->
        <!-- Thanh lý -->
         <div id="templatemo-portfolio" >
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">THANH LÝ GIÁ TRỊ </span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="templatemo-gallery-category" style="font-size:16px; margin-top:80px;">
                        <!-- <div class="text-center">
                            <a class="active" href=".gallery">All</a> / <a href=".gallery-design">Tử tế </a>/ <a href=".gallery-graphic">Graphic</a> / <a href=".gallery-inspiration">Chính trực</a> / <a href=".gallery-creative">Creative</a>                         
                        </div> -->
                    </div>
                </div> <!-- /.row -->


                <div class="clearfix"></div>
                <div class="text-center"  id="pagination">
                    <ul class="templatemo-project-gallery" >
                       @foreach($thanhly as $key)
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-graphic" >
                            <!-- <a class="colorbox" href="{{URL::asset('layouts/images/thanhly')}}/{{$key->Hinh}}" data-group="gallery-graphic"> -->
                                <div class="templatemo-project-box tlgt">

                                    <img src="{{URL::asset('layouts/images/thanhly')}}/{{$key->Hinh}}" class="img-responsive" alt="gallery" />

                                    <div class="project-overlay countdown">
                                        <h5>{{$key->MTS}}</h5>
                                         <p>{{str_limit($key->Mota,60,'....')}}</p>
                                     
                                        <hr/>
                                        <h5  data-countdown="{{$key->Thoihan}}">{{$key->Thoihan}}</h5>
                                    </div> 
                                </div>
                            </a>
                        <div class="row">
                            <div class="col-md-12">
                                <h6><span style="font-weight: bold;">{{$key->Ten}}</span></h6>
                            </div>

                            <div class="col-md-12">
                                <h4>
                                    <span class="txt_orange">Giá:</span>
                                    <span>{{number_format($key->Giadexuat)}} VNĐ</span>
                                </h4>
                            </div>
                         
                            <div class="col-md-12 text-right">
                                <span style="color: white; background: red; font-weight: bold;"><h7 data-countdown="{{$key->Thoihan}}">{{$key->Thoihan}}</h7></span>
                            </div>
                        </div>
                     </li>
                     @endforeach
                 </ul>
                   <div class="col-sm-6 text-left">{{$thanhly->links()}}</div>
             </div>
                       <div class="clearfix"></div>
                       
                           </div> <!-- /.container -->
        </div><!-- /.templatemo-portfolio -->
        <!-- ennd thanhly -->
        <div id="templatemo-blog">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header" style="margin-top: 0px;" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey">THÔNG BÁO</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <br class="clearfix"/>
                </div>
               
                 <div class="blog_box">
                 @if(Auth::user()->Authen=='ThongBao') <div> <form action="{{route('EditThongBao')}}"><button type="submit" >Đăng Thông Báo</button></form></div>@endif
  @foreach($tintuc as $key)            
                      <div class="col-sm-5 col-md-10 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                               <div class="container">
    <div class="row">
         <ul class="templatemo-project-gallery" >
                       
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-graphic" >
                            <a class="colorbox" href="{{URL::asset('layouts/images/thongbao')}}{{$key->Images}}" data-group="gallery-graphic">
                                <div class="templatemo-project-box">

                                    <img src="{{URL::asset('layouts/images/thongbao')}}{{$key->Images}}" class="img-responsive" alt="gallery" / style="height: 100% ; width: 100%">

                                    <div class="project-overlay">
                                  
                                    </div>
                                </div>
                            </a>
                        </li></ul>
 
                            </li>
                            <li  class="col-md-8">
                              
                                <div class="pull-left">
                                    <span class="blog_header">{{$key->Titile}}</span><br/>
                                    <!-- <span>Posted by : <a class="link_orange" href="#"><span class="txt_orange">Tracy</span></a></span> -->
                                </div>
                                <div class="pull-right">
                                  <form action="{{route('detail')}}" method="get">
                                    <button class="btn btn-orange" value="{{$key->id}}" role="button" name='tintuc' type="submit">{{date('d-m-Y',strtotime($key->Date))}}</button></a></form>
           <!--                    <form style="display: none;" id="detail-form" action="" method="get" value=></form> -->
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                    {{$key->Description}}
                                </p>
                            </li>
                        </ul>
                    </div> <!-- /.blog_post 1 -->
     
                    <div class="templatemo_clear">
                    </div>
                

 @endforeach</div>
</div>
</div>
                 

               

<!-- Row thong bao -->

    

        <div id="templatemo-contact">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header head_contact">
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">LIÊN HỆ</span>
                            <hr class="team_hr team_hr_right hr_gray"/>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="templatemo-contact-map" id="map-canvas"> </div>  
                        <div class="clearfix"></div>
                        <i>You can find us on 806 Au Co Street , <span class="txt_orange">14 sub-district , Tan Binh district</span> in TPHCM.</i>
                    </div>
                    <div class="col-md-4 contact_right">
                        <p>Công ty cổ phần đầu tư phát triển thương mại viễn đông</p>
                        <p><img src="{{URL::asset('layouts/images/location.png')}}" alt="icon 1" />806 Âu Cơ Phường 14 Quận Tân Bình TPHCM</p>
                        <p><img src="{{URL::asset('layouts/images/phone1.png')}}"  alt="icon 2" />  (028)-3842-8633</p>
                        <p><img src="{{URL::asset('layouts/images/globe.png')}}" alt="icon 3" /><a class="link_orange" href="http://vidon.com.vn" target="_blank"><span class="txt_orange">vidon.com.vn</span></a></p>
                        <form class="form-horizontal" action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Name..." maxlength="40" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email..." maxlength="40" />
                            </div>
                            <div class="form-group">
                                <textarea  class="form-control" style="height: 130px;" placeholder="Write down your message..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-orange pull-right">SEND</button>
                        </form>
                        	
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /#templatemo-contact -->



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

        <script src="{{URL::asset('layouts/js/jquery.min.js')}}" type="text/javascript"></script>
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

            },
            Complete:function(){
                detailTLGT();
            }
  
        })
    }
detailTLGT();
</script>                   
    </body>
</html>