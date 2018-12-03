<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	
	<title>Lịch sử</title>
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="{{asset('Admin/favicon.ico')}}">
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/organicfoodicons.css')}}" />
	<!-- demo styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/demo.css')}}" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/component.css')}}" />
	<script src="{{asset('Admin/js/modernizr-custom.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- datatables -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<!-- end -->

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- end -->

	<!-- script for button made by me: -->
	<!-- <link rel="stylesheet" type="text/css" href="{{asset('Admin/css/modal.css')}}"> -->
	<script type="text/javascript" src="{{asset('Admin/js/Module.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/information.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/jquery.elevatezoom.js')}}"></script>
	<!-- end -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/modal.css')}}">
	<!-- autocomplete -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- endautocomplete -->
</head>

<body>
	<div class="container-fluid">
	 <div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" id="title">CHI TIẾT</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
          <form action="{{route('DieuchuyenDetail')}}" method="post" id="formdc">
          		<button name="Thuhoi" hidden id="btnthuhoi"></button>

		<table id="lichsu1" class="display table  table-bordered" style="width:100%;">
			
		
				<input type="date" name="Ngaydieuchuyen" id="Ngaydieuchuyenform" hidden>
          	<input type="Text" name="NguoiphutrachBP2" id="NguoiphutrachBPform" hidden >
          	<input type="Text" name="Bophannhan" id="Bophannhanform" hidden>
          		<input type="Text" name="location2" id="location2" hidden>
					@csrf
			<thead>
		            <tr>
		            	<th>Chọn</th>
		            	<th>STT</th>		            	 
		            	<th>Mã vật tư</th>
		            	<th>Mã thiết bị</th>
		            	<th>Giá trị</th>
		            	<th>Số hợp đồng</th>
		            	<th>Phiếu giao nhận</th>
		                <th>Bộ phận nhận</th>
		                <th>Ngày nhận</th>
		                <th>Người nhận</th>
		                <th>Vị trí</th>
		         		<th>Tình trạng</th>
		                <th>Người thực hiện</th>
		              
		          	 </tr>
        	</thead>
        	<tbody>
        		<?php $i = 1; $y = 0;?>
        		
        		
        		@foreach($his as $key)

        		<tr>
        		<td><input type="checkbox" name="MTB[]" value="{{$key->MTB}}"></td>
        		<td>{{$i++}}</td>
    			<td>{{$key->MVT}}</td>
    			<td class="Showhis">{{$key->MTB}}</td>
    			<td>{{$key->Giatri}}</td>
    			<td>{{$key->Sohopdong}}</td>
    			<td>{{$key->Phieugiaonhan}}</td>
    			<td>{{$key->Bophan}}</td>
    			<td>{{$key->Ngaynhan ? date('d-m-Y', strtotime($key->Ngaynhan)) : ""}}</td>  			
    			<td>{{$key->Nguoiphutrach}}</td>
    			<td>{{$key->Location}}</td>
    			<td>{{($key->Trangthai)==0 ? 'Xuất kho' : "Điều chuyển"}}</td>
    			<td>{{$key->Nguoithuchien}}</td>
   
        		</tr>

        		@endforeach
		
	
		
      	  </tbody>
      	  	<tfoot>
		            <tr>
		            	<th>Chọn</th>
		            	<th>STT</th>
		            	 
		            	  <th>Mã vật tư</th>
		            	  <th>Mã thiết bị</th>
		            	
		                <th>Bộ phận nhận</th>
		                <th>Ngày nhận</th>
		                
		                <th>Người nhận</th>
		                <th>Vị trí</th>
		                  <th>Tình trạng</th>
		                <th>Người thực hiện</th>
		                
		          	 </tr>
        	</tfoot>
        	
        </table>
        </form>
</div>
<div class="row">
        	<div class="col-md-4"><button class="btn btn-primary" onclick="ModalDCSLL(this)">Điều chuyển</button></div>
        	<div class="col-md-4"><button class="btn btn-primary" onclick="document.getElementById('btnthuhoi').click()" >Thu hồi</button></div>
        </div>
<div class="container-fluid">
	<h1>Chi tiết sản phẩm</h1>
		<div class="row">
		<div class="col-md-4" id="showzoom"><img src="{{URL::asset('layouts/images/QLKho')}}/{{$ten->Hinh}}" style="width: 100%" id="zoomshow">
			<div class="row">
				@if($ten->Hinh !=null)
				<div class="col-md-3"><img src="{{URL::asset('layouts/images/QLKho')}}/{{$ten->Hinh}}" alt="..." class="img-thumbnail"></div>
				@endif
				@if($ten->Hinh1 !=null)
				<div class="col-md-3"><img src="{{URL::asset('layouts/images/QLKho')}}/{{$ten->Hinh1}}" alt="..." class="img-thumbnail"></div>
				@endif
				@if($ten->Hinh2 !=null)
				<div class="col-md-3"><img src="{{URL::asset('layouts/images/QLKho')}}/{{$ten->Hinh2}}" alt="..." class="img-thumbnail"></div>
				@endif
				@if($ten->Hinh3 !=null)
				<div class="col-md-3"><img src="{{URL::asset('layouts/images/QLKho')}}/{{$ten->Hinh3}}" alt="..." class="img-thumbnail"></div>
				@endif
			</div>
			

		</div>
		<div class="col-md-8">
			<ul class="list-group">
				<li>
			<h4>Công ty</h4>
			<p>{{$ten->Congty}}</p>
		</li>
	<div class="row">		
	<div class="col-md-6">
		<li>
			<h4>Mã vật tư</h4>
			<p>{{$ten->MVT}}</p>
		</li>
	</div>
	<div class="col-md-6">
		<li>
			<h4>Mã thiết bị</h4>
			<p>{{$ten->MTB}}</p>
		</li>
		
	</div>
	</div>
					<li><h4>Tên</h4>
			<p>{{$ten->Ten}}</p></li>
			<li><h4>Thông số</h4>
			<p>{{$ten->Thongso}}</p></li>
		<form action="{{route('EditTSPB')}}" method="get" class="EditTSPB">
			<li><h4>Ngày mua</h4>
			<p><input type="date" name="Ngaymua" value="{{$ten->Ngaymua}}"></p></li>
			<!-- {{$ten->Ngaymua ? date("d-m-Y",strtotime($ten->Ngaymua)) : ""}} -->
			<li><h4>Số hóa đơn</h4>
			<p><input type="text" name="Sohopdong" value="{{$ten->Sohopdong}}"></p></li>
			<li><h4>Nhà cung cấp</h4>
			<p><input type="text" name="Nhacungcap" value="{{$ten->Nhacungcap}}"></p></li>
			<li><h4>Trị giá</h4>
			<p><input type="text" name="Giatri" value="{{$ten->Giatri}}"></p></li>
			<li><h4>Ghi chú</h4>
			<p><input type="text" name="Ghichu" value="{{$ten->Ghichu}}"></p></li>
			<input type="text" name="id" value="{{$ten->id}}" hidden="true">
			<button class="btn btn-primary">Sửa</button>
		</form>
			</ul>
		</div>
	</div>
</div>


<div id="myModalDCSLL" class="modal" onclick="closeModalDCSLL(this)">
         <div class="modal-content">
    
  
      </div></div>

<div id="divIntro" style="width:auto;display:none; height: auto;"></div>
      <div class="modal" id="myModalFormXuat">
      	<div class="modal-content">
      		<span class="" onclick="closeBTNDCSLL(this)" style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
        <h1>Điều chuyển</h1>

<div class="form-group">
		<label for="Ngaydieuchuyen">Ngày chuyển</label>
		<input type="date" name="Ngaydieuchuyen" class="form-control" id="Ngaydieuchuyen"  required="">
		<label for="location">Vị trí chuyển đến</label>
		<input type="Text" name="location" class="form-control" onkeyup="locationTSPB(this)" required="" id="autocompleteLC">
	 	<label for="Bophannhan">Bộ phận sử dụng</label>
	<select type="select" name="Bophannhan" onchange="getInformationV2(this)" id="Bophannhan" required="">
		<option value="">Bộ phận</option>
		<option value="CSVC">Cơ sở vật chất</option>
		<option value="Thương mại">Thương mại</option>
		<option value="Ban giám đốc">Ban giám đốc</option>
		<option value="Nhân sự hành chánh">Nhân sự hành chánh</option>
		<option value="Kế toán">Kế toán</option>
		<option value="Hồn Việt">Hồn Việt</option>
		<option value="Dự án cộng đồng">Dự án cộng đồng</option>

		<option value="Ban dự án">Ban dự án</option>
		<option value="Ban trợ lý">Ban trợ lý</option>
		<option value="NS-HC Toàn Lực">NS-HC Toàn Lực</option>
		<option value="Kế Toán Toàn Lực">Kế Toán Toàn Lực</option>
		<option value="Nhập Khẩu Toàn Lực">Nhập Khẩu Toàn Lực</option>
		<option value="Kinh Doanh Toàn Lực">Kinh Doanh Toàn Lực</option>
		<option value="Procie">Procie</option>
		</select>
		<label for="NguoiphutrachBP">Người nhận phụ trách:</label>
		<!-- <select type="select" name="NguoiphutrachBP" id="NguoiphutrachBP">

			
		</select> -->
		<input type="text" name="NguoiphutrachBP" >
		<select type="select"  id="NguoiphutrachBPV2" > 
				<!-- 	<input type="text" name="NguoiphutrachBP" required=""> -->
			
		</select>
	 	
</div>

		 <button class="btn btn-primary" style="padding-top: 15px; float: right;" onclick="document.getElementById('formdc').submit();">Điều chuyển</button>
      	</div>
      </div>
<script type="text/javascript">
	$('#lichsu1').DataTable({

	});
	$('#lichsu1').on('draw.dt',function(){
		historyTSPB3();
	});

	clickSlider();
	historyTSPB3();
	$('#Ngaydieuchuyen').keyup(function(){


		var value = $(this).val();

		$('#Ngaydieuchuyenform').val(value);
	})
	NhapTen();
</script>
<style type="text/css">
	.active{
		border: 3px solid green;

	}
</style>
</body>
</html>