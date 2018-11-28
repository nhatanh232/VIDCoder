<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js">
  </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .baophu{
    float:left;
  }
    .sortableItem {
      height: 50px;
      width: 300px;
      border: 1px solid rgba(0, 0, 0, 0.1);
      padding-top: 10px;
      text-align: center;
      font-weight: bold;
      border-radius: 0 10px 10px 0;
      background-color: #e7f0fe;
      color:#00FF40;
      margin: 3px;
  


               background-image: url("{{asset('layouts/images/background.jpg')}}");
            background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }

    .sortableItem:hover {
      cursor: pointer;
    }

    #sortable {
      float: left;
    }

    #times {
      float: left;
    }

    .day {
      display: inline-block;
      background-color: #4285f4;  
      height: 50px;
      width: 300px;
        font-family: Arial;
      border: 1px solid rgba(0, 0, 0, 0.1);
       font-weight: bold;
       text-align: center;
       padding-top: 10px;
     margin: 3px;
      border-radius: 0 10px 10px 0;
      color: white;
 background-color: black;
  
    /* Webkit */
    background-image:
        -webkit-gradient(radial, 50% 50%, 2, 50% 50%, 40, from(white), color-stop(0.1, rgba(248,255,128,.5)), to(transparent)),
        -webkit-gradient(radial, 50% 50%, 1, 50% 50%, 30, from(white), color-stop(0.1, rgba(255,186,170,.4)), to(transparent)),
        -webkit-gradient(radial, 50% 50%, 1, 50% 50%, 40, from(rgba(255,255,255,.9)), color-stop(0.05, rgba(251,255,186,.3)), to(transparent)),
        -webkit-gradient(radial, 50% 50%, 0, 50% 50%, 30, from(rgba(255,255,255,.4)), color-stop(0.03, rgba(253,255,219,.2)), to(transparent));
  
    /* Firefox */
    background-image:
        -moz-radial-gradient(circle, #FFFFFF 2px, rgba(248,255,128,.5) 4px, transparent 40px),
        -moz-radial-gradient(circle, #FFFFFF 1px, rgba(255,186,170,.4) 3px, transparent 30px),
        -moz-radial-gradient(circle, rgba(255,255,255,.9) 1px, rgba(251,255,186,.3) 2px, transparent 40px),
        -moz-radial-gradient(circle, rgba(255,255,255,.4), rgba(253,255,219,.2) 1px, transparent 30px);
  
    /* Background images size */
    background-size: 550px 550px, 350px 350px, 250px 270px, 220px 200px;
  
    /* Background images position*/
    background-position: 0 0, 30px 60px, 130px 270px, 70px 150px;


    }
  </style>
  <script>
  		
    $(function() {
    var batdau, kethuc , MVT , sl;
    MVT =    $('.sortableItem').hover(function(){
                 MVT = this.id;
             });
     
      $("#Khotong ,#CSVC , #Thuongmai").sortable({
       
      	connectWith:'.connect',
      	start:function(event,ui){
      		batdau = event.target.id;
         
        },
      	change:function(event,ui){
      		kethuc = event.target.id;      	
      	
      	},
      	stop:function(){
     		if (batdau != kethuc){
     		        sl = prompt("nhập số lượng chuyển:"); 
             
                $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':'{{csrf_token()}}'
    }
});
        $.ajax({
          type:"POST",
          url:"{{URL('MoveEdit')}}",
          data:{
       
            Sl:sl,
            MVT:MVT,
            Bophan:kethuc,
            Bophanchuyen:batdau,
          },
    
          success:function(data){
           window.location.href = "{{URL('QLKho')}}";

          }
        });
     
      }
        }
      });
      	
    });

   
  </script>
</head>
<body>
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
    
   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js">
  </script>
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
        <link href="js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>

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
                            <img src="images/phone.png" alt="phone"/>
                            (028)-3842-8633
                    </div>
                    <div id="email" class="pull-right">
                            <img src="images/email.png" alt="email"/>
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
                                <a href="#" class="navbar-brand"><img src="{{URL::asset('layouts/images/logo.png')}}" alt="Urbanic Template" title="Urbanic Template" style="height: 52px;" /></a>
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
                    <p><button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Nhập tài sản</button></p>
  </div>
</div>
                </div> 
 @if(session('message'))
    <div class="alert alert-success">
   <script>    alert("{{ session('message') }}");</script> 
    </div>
@endif

 
	<!-- kho tổng -->
 

<div class="container-fluid" id ="show" >
  <div class="row">
    <div class="col-sm-3" style="font-size: 30px;font-family: Arial;font-weight: bold;">Tìm kiếm tài sản:</div>
    <div class="col-md-6" style="padding-top: 6px"><input type="text" class="form-control" id="dev-table-filter" data-action="filter3" data-filters=".connect" placeholder="Tìm kiếm" /></div>
 
  </div>
  <div class="rows">
    <div class="col-md-12">
<div class="baophu">
	 <div class="day" style="width: 1430px">DANH SÁCH TỔNG TÀI SẢN CÔNG TY</div>
 
  <div id="Khotong" class="connect" style="height: 100px">  
<!--       <span class="glyphicon glyphicon-hand-up" style="margin-left:150px; height: 30px; "></span> -->
  	@foreach($data as $key)
    <div class="sortableItem" id="{{$key->MVT}}" style="display: inline-block; float: left;">{{$key->Ten}} <p><span> Số lượng:{{$key->Sl}}</span></p></div>
 @endforeach
</div>
</div></div>
<h1>KHU VỰC 1</h1>
 <div class="col-md-12">
<!-- Cơ sở vật chất -->

<div class="baophu">

     <div class="day" id='tieude'>CƠ SỞ VẬT CHẤT</div>
  <div id="CSVC" class="connect">  
    <span class="glyphicon glyphicon-hand-up" style="margin-left:150px;   height: 30px; "></span>
  @foreach($bophan as $key)
    <div class="sortableItem" id="{{$key->MVT}}" >{{$key->Ten}} <p><span> Số lượng:{{$key->Sl}}</span></p></div>
 @endforeach
</div>
    </div>
    <!-- Thương mại-->
<div class="baophu">
     <div class="day" id='tieude'>THƯƠNG MẠI</div>
  <div id="Thuongmai" class="connect">  
     <span class="glyphicon glyphicon-hand-up" style="margin-left:150px; height: 30px;  "></span>
  @foreach($thuongmai as $key)
    <div class="sortableItem" id="{{$key->MVT}}" >{{$key->Ten}}<p><span> Số lượng:{{$key->Sl}}</span></p> </div>
 @endforeach
</div>
</div>
</div></div>


</div>
 <!-- popup -->
    
   
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm tài sản</h4>
        </div>
        <div class="modal-body">
<form class="form-horizontal" method="POST" action="{{Route('NhapTaiSan')}}" enctype="multipart/form-data">
<fieldset>
{{ csrf_field() }}
<!-- Form Name -->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_id">Mã Vật Tư</label>  
  <div class="col-md-4">
  <input id="product_id" name="MVT" placeholder="Mã vật tư" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">Tên thiết bị</label>  
  <div class="col-md-4">
  <input id="product_name" name="Ten" placeholder="Tên thiết bị" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name_fr">Mã thiết bị</label>  
  <div class="col-md-4">
  <input id="product_name_fr" name="MTB" placeholder="Mã thiết bị" class="form-control input-md"  type="text">
    
  </div>
</div>

<!-- Select Basic -->

<!-- Textarea -->

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name_fr">Thông số kĩ thuật</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="product_name_fr" name="TSKT"></textarea>
  </div>
</div>

<!-- Text input-->

<!-- Text input-->


<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="stock_critical">Đơn vị tính</label>
  <div class="col-md-4">
    <input id="stock_critical" name="dvt" placeholder="Đơn vị tính" class="form-control input-md" required="" type="search">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="stock_critical">Công ty</label>
  <div class="col-md-4">
    <input id="stock_critical" name="Congty" placeholder="Công ty" class="form-control input-md"  type="search">
    
  </div>
</div>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tutorial">Số lượng tổng nhập</label>
  <div class="col-md-4">
    <input id="tutorial" name="sl" placeholder="Số lượng" class="form-control input-md" required="" type="number">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="tutorial">Số lượng chuyển</label>
  <div class="col-md-4">
    <input id="Soluongchuyen" name="SLC" placeholder="Số lượng" class="form-control input-md"  type="number" >
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
        $('#Soluongchuyen').keyup(function(e){
              e.preventDefault();
            if($(this).val() != ""){
              $("#Bophannhan").show();
              $('#Trangthai').show();
              $('#Nguoipt').show();
            }
            else{
              $("#Bophannhan").hide();
                $('#Trangthai').hide();
              $('#Nguoipt').hide();
            }
        });
       
  });

  function Ngaytra(e){
        var x = $('#TT').val();
        if (x == 0)
          $('#Ngaytra').hide();
          else  
             $('#Ngaytra').show();
       }
</script>
<div class="form-group" id = "Bophannhan" hidden="true">
  <label class="col-md-4 control-label" for="tutorial">Bộ phận nhận</label>
  <div class="col-md-4">
    <!-- <input id="tutorial" name="BPN" placeholder="Số lượng" class="form-control input-md" required="" type="search"> -->
    <select class="form-control" name="BPN">
      <option value="CSVC" >Cơ sở vật chất</option>
      <option value="Thuongmai">Thương mại</option>
    </select>
  </div>
</div>
<div class="form-group" id = "Trangthai" hidden="true" onchange="Ngaytra(this.value)">
  <label class="col-md-4 control-label" for="tutorial">Trạng Thái</label>
  <div class="col-md-4">
    <!-- <input id="tutorial" name="BPN" placeholder="Số lượng" class="form-control input-md" required="" type="search"> -->
    <select class="form-control" name="TT" id='TT'>
       <option value="0"></option>
      <option value="1">Mượn</option>
      <option value="2">Trả</option>
    </select>
  </div>
</div>
<div class="form-group" id = "Ngaytra" hidden="true">
  <label class="col-md-4 control-label" for="tutorial" >Ngày trả</label>
  <div class="col-md-4">
    <input id="tutorial" name="Ngaytra"  class="form-control input-md"  type="date">
  </div>
</div>

<div class="form-group" id = "Nguoipt" hidden="true">
  <label class="col-md-4 control-label" for="tutorial">Người phụ trách</label>
  <div class="col-md-4">
    <input id="tutorial" name="NPT" placeholder="Người phụ trách" class="form-control input-md"  type="search">
   
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="comment">Ghi chú</label>  
  <div class="col-md-4">
  <input id="comment" name="ghichu" placeholder="Ghi chú" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
    
 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Hình ảnh</label>
  <div class="col-md-4">
    <input id="filebutton" name="hinhanh" class="input-file" type="file">
  </div>
</div>
<!-- File Button --> 

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Nhập</label>
  <div class="col-md-4">
    <button id="singlebutton" name="add" class="btn btn-primary">Submit</button>
  </div>
  </div>

</fieldset>
</form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>
      
   <!--end popup  -->
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

</body>
<script src="{{URL::asset('layouts/js/QLtaisan.js')}}"></script>
<script type="text/javascript">
	$('.sortableItem').click(function(){
			var target = this.id;
		window.location.href = "{{URL('Showdetail?id=')}}"+target ;
	});
</script>
</html>
