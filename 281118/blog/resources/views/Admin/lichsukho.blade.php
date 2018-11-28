<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Viễn Đông</title>
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="{{asset('Admin/favicon.ico')}}">
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/organicfoodicons.css')}}" />
	<!-- demo styles -->
	
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/component.css')}}" />
	<script src="{{asset('Admin/js/modernizr-custom.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- autocomplete -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- endautocomplete -->
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
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/modal.css')}}">
	<script type="text/javascript" src="{{asset('Admin/js/Module.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/information.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/Taisantlcn.js')}}"></script>
	<script type="text/javascript" src="{{asset('Admin/js/quanlytaisan.js')}}"></script>
	<!-- end -->
	
</head>

<body>

	<div class="container-fluid">
	 <div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" >Chi tiết</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
		<table id="chitiet" class="display table  table-bordered" style="width:100%;">
			<thead>
		            <tr>
		            	<th>Chọn</th>
		            	<th>Số lần nhập</th>
		            	 
		            	  <th>Mã vật tư</th>
		            	  <th>Mã thiết bị</th>
		            
		                <th>Số hóa đơn</th>
		              
		                <th>Số lượng</th>
		                <th>Người mua</th>
		                <th>Ngày nhập</th>
		                  <th>Ngày mua</th>
		                  <th>Ghi chú</th>
		         		
		          	 </tr>
        	</thead>
        	<tbody>
        		<?php $z = 1;?>
        		
        		@foreach($detail as $key)

        		<tr>
        			<td><input type="radio" name="Id" data-Xuatkho="{{$key->id}}"></td>
        		<td>{{$z++}}</td>
    			<td  data-action="edit" name="{{$key->id}}">{{$key->MVT}}</td>
    			<td>{{$key->MTB}}</td>
    			<td>{{$key->Sohopdong}}</td>
    			<td>{{$key->Sl}}</td>
    			<td>{{$key->Nguoimua}}</td>
    			<td>{{$key->Ngaynhap ? date('d-m-Y',strtotime($key->Ngaynhap)) : ""}}</td>
    			<td>{{$key->Ngaymua ? date('d-m-Y',strtotime($key->Ngaymua)) : ""}}</td>
    			<td>{{$key->Ghichu}}</td>
        		</tr>
        		@endforeach
	
	
		
      	  </tbody>
      	  	<tfoot>
		            <tr>
		            	<th>Chọn</th>
		            <th>Số lần nhập</th>
		            	 
		            	  <th>Mã vật tư</th>
		            	  <th>Mã thiết bị</th>
		            
		                <th>Số hóa đơn</th>
		              
		                <th>Số lượng</th>
		                <th>Người mua</th>
		                <th>Ngày nhập</th>
		                  <th>Ngày mua</th>
		                  <th>Ghi chú</th>
		         		
		          	 </tr>
        	</tfoot>
        </table>
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
		<li>
			<h4>Ghi chú</h4>
			<p>{{$ten->Ghichu}}</p>
		</li>
	</div>
	</div>
					<li><h4>Tên</h4>
			<p>{{$ten->Ten}}</p></li>
			<li><h4>Thông số</h4>
			<p>{{$ten->Thongso}}</p></li>
			<li><h4>Giá trị</h4>
			<p>{{$ten->Giatri}}</p></li>
			<li><h4>Lưu ý</h4>
			<p>{{$ten->Luuy}}</p></li>
			<li><h4>Nhà cung cấp</h4>
			<p>{{$ten->Nhacungcap}}</p></li>
			</ul>
		</div>
	</div>
</div>

<div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" id="title">BẢNG ĐIỀU CHUYỂN</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
		<table id="lichsu" class="display table  table-bordered" style="width:100%;">
			<thead>
		            <tr>
		            	
		            	<th>Lần giao dịch</th>
		            	 
		            	  <th>Mã vật tư</th>
		            	  <th>Mã thiết bị</th>
		            
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

        		<td>{{$i++}}</td>
    			<td>{{$key->MVT}}</td>
    			<td class="Showhis">{{$key->MTB}}</td>
    			
    			<td>{{$key->History}}</td>
    			<td>{{$key->Ngaychuyen ? date('d-m-Y', strtotime($key->Ngaychuyen)) : ""}}</td>
    			
    			<td>{{$key->Nguoiphutrach}}</td>
    			<td>{{$key->Location}}</td>
    			<td>{{($key->Trangthai)==0 ? 'Xuất kho' : "Điều chuyển"}}</td>
    			<td>{{$key->Nguoithuchien}}</td>
    			
        		</tr>
        		@endforeach
	
	
		
      	  </tbody>
      	  	<tfoot>
		            <tr>
		            
		            	<th>Lần giao dịch</th>
		            	 
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
</div>

<div id="myModaled" class="modal" onclick="closeModaled(this)">
	  <div class="modal-content">
    <span class="close" onclick="closeBTNed(this)">&times;</span>
        <h1>Nhập kho</h1>

        <form action="{{Route('nhapkho')}}" method="post" enctype="multipart/form-data" id="form" autocomplete="on">
          <fieldset>
{{ csrf_field() }}
	
<!-- Form Name -->
<div class="form-group">
	<div class="row">
		<div class="col-md-6"  style="border-right:1px solid black; ">
	 <label for="Congty">Công ty</label>
	<select name="Congty" class="form-control" style="height: 35px">
		<option value="Viễn Đông">Viễn Đông</option>
		<option value="Hồn Việt">Hồn Việt</option>
		<option value="Toàn Lực">Toàn Lực</option>
	</select>
	 <label for="MVT">Mã vật tư</label>
	 <input type="text" name="MVT" placeholder="Mã vật tư:" class="form-control" required="" id="MVT" onkeyup="getMVT(this)"  pattern="[A-Za-z0-9]{10}" title="Nhập 10 kí tự ">
		<div class="alert alert-warning" data-action="getMVT" style="display: none;">
  <strong><ul></ul></strong>
</div>
	
	  <label for="Ten">Tên thiết bị</label>
	 <input type="text" name="Ten" placeholder="Tên thiết bị:" class="form-control" required="" onkeyup="Tenshow(this)" id="autocomplete" >

	 <label for="Thongso">Thông số kĩ thuật</label>
	 <textarea name='Thongso' class='form-control' rows="4" cols="50"></textarea>
	 <label for="dvt">Đơn vị tính</label>
	 <input type="text" name="dvt" placeholder="Đơn vị tính:" class="form-control" required="">
	 <label for="Hinh">Hình ảnh:</label>
	 <input type="file" name="Hinh" >
	  <label for="Hinh">Hình ảnh1:</label>
	 <input type="file" name="Hinh1" >
	  <label for="Hinh">Hình ảnh2:</label>
	 <input type="file" name="Hinh2" >
	  <label for="Hinh">Hình ảnh3:</label>
	 <input type="file" name="Hinh3" >
	 <label for="Ngaynhap">Ngày nhập:</label>
	 <input type="date" name="Ngaynhap" required="" onchange=" conditionNgayNhapNgayMua(this)" id="Ngaynhap" class="form-control">
	 <label for="Sl">Số lượng:</label>
	 <input type="number" name="Sl" required="" class="form-control">
	
 </div>	<!-- end col-md-4 -->
 	<div class="col-md-6"  style="border-right:1px solid black; ">
 		
 		<div class="form-group">
 			<label for="Sohopdong">Số hợp đồng</label>
 			<input type="text" name="Sohopdong" class="form-control" >
 			<label for="Nguoimua">Người mua</label>
 			<input type="text" name="Nguoimua" class="form-control" >
 			<label for="Ngaymua">Ngày mua</label>
 			<input type="date" name="Ngaymua" class="form-control"  id="Ngaymua" onchange=" conditionNgayMuaNgayNhap(this)">
 			<label for="Thoigianbh">Thời gian bảo hành (Tháng)</label>
 			<input type="number" name="Thoigianbh" class="form-control" >
 			<label for="Thoigiankh">Thời gian khấu hao (Tháng)</label>
 			<input type="number" name="Thoigiankh" class="form-control" >
 			<label for="Thoigiankh">Thời gian bão dưỡng định kì (Tháng)</label>
 			<input type="number" name="Thoigianbd" class="form-control" >
 			<label for="Thoigiankh">Ngày kiểm kê</label>
 			<input type="date" name="Ngaykiemke" class="form-control" >
 			<label for="Giatri">Giá trị</label>
            <input id="amount" name="Giatri" type="text" class="form-control" />
            <label for="Nhacungcap">Nhà cung cấp</label>
            <input  name="Nhacungcap" type="text" class="form-control" />
            <label for="Luuy">Lưu ý nhà cung cấp</label>
            <input type="text" name="Luuy" class="form-control">
            <label for="Ghichu">Ghi chú</label>
            <input  name="Ghichu" type="text" class="form-control" />
            <div id="img" style="margin-top: 10px; border: 1px solid black;width: 300px; height: 150px"></div>

 	</div>
 	</div> <!-- end Row -->
 <!-- 	<div class="col-md-4"></div> -->
</div>
 

<!-- Text input-->
	<!-- <h1>Điều chuyển tức thời</h1>
	<label for="Bophannhan">Bộ phận chuyển</label>
	<select type="select" name="Bophannhan" onchange="getInformation(this)">
		<option value="CSVC">Cơ sở vật chất</option>
		<option value="Thương mại">Thương mại</option>
		<option value="Lễ tân">Lễ tân</option>
		</select>
		<label for="NguoiphutrachBP">Người nhận phụ trách</label>
		<select type="select" name="NguoiphutrachBP" id="NguoiphutrachBP">

			
		</select>

		<label for="Slc" style="margin-left: 25px">Số lượng chuyển:</label>
	 <input type="number" name="Slc" required="" onkeyup="bangdieuchuyen(this)">
	 	<label for="MTBC" style="margin-left: 25px">Mã thiết bị chuyển:</label>
	 <input type="text" name="MTBC" required="" id="MTBC">
	 -->
	 	
		 <button class="btn btn-primary float-right ml-3" data-button="ButtonChinhsua" name="edit">Chỉnh sửa cập nhật</button>
	 <button class="btn btn-success float-right"  data-button="ButtonNhap">Nhập</button>
		
</fieldset>
       
    
  
 
        </form>
     
      </div></div>

<div id="myModalXuatkho" class="modal" onclick="closeModalXuatkho(this)">
	  <div class="modal-content">
    <span class="" onclick="closeBTNXuatkho(this)"  style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
    <form action="{{Route('xuatkho')}}" method="post" >
        <div class="row">
        	<div class="col-md-4"><h1>Phiếu xuất kho số:<input type="text" name="PXK" value="PXK 18-" class="Phieuxuat"></h1></div>
        	
        </div>
        
          <fieldset>
{{ csrf_field() }}

<!-- Form Name -->
<div class="form-group">

	 <label for='MVT'>Mã vật tư:</label>
	 <input type="text" name="MVT" class="form-control" data-action='MVT' onkeyup="getMVTXK(this)" pattern="[A-Za-z0-9]{10}">
	 <label for="location">Vị trí</label>
	 <input type="text" name="location" class="form-control">
	 <label for="location">Lý do xuất</label>
	 <input type="text" name="lydo" class="form-control" >
	<div class="alert alert-success" style="display: none;" data-action="hasMVT">
		<ul></ul>
	</div>
	 <label for='Ngaynhan'>Ngày nhận:</label>
	 <input type="date" name="Ngaynhan" class="form-control" required="">
	<label for="Bophannhan">Bộ phận nhận</label>
	<select type="select" name="Bophannhan" onchange="getInformation(this)">
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
		<option value="Phòng Kinh Doanh - Xuất Nhập Khẩu - Nhân Sự Toàn Lực">Phòng Kinh Doanh - Xuất Nhập Khẩu - Nhân Sự Toàn Lực</option>
		<!-- <option value="Kế Toán Toàn Lực">Kế Toán Toàn Lực</option>
		<option value="Nhập Khẩu Toàn Lực">Nhập Khẩu Toàn Lực</option>
		<option value="Kinh Doanh Toàn Lực">Kinh Doanh Toàn Lực</option> -->
		<option value="PROCI">PROCI</option>
		</select>
		<label for="NguoiphutrachBP">Người nhận phụ trách</label>
		<input type="text" name="NguoiphutrachBP">
		<select type="select"  id="NguoiphutrachBP" required="">
				<!-- <input type="text" name="NguoiphutrachBP" required="">
			 -->
		</select>

		<label for="Slc" style="margin-left: 25px">Số lượng xuất:</label>
	 <input type="number" name="Slc" required="" onfocusout="bangdieuchuyen(this)">
	 <div  id="MTBX">
	 	<label for="MTB">Mã thiết bị:</label>
	 	<div class="alert alert-danger" style="display: none" data-action='hasMTB'>
 		 <strong></strong>
				</div>
	 </div>

	 	
</div>
 

<!-- Text input-->
	
	
		 <button class="btn btn-primary" style="padding-top: 15px; float: right;" data-button='ButtonXuat'>Xuất</button>
</fieldset>
         
    
  
 
        </form>
     
      </div></div>

<div id="myModalXuatkhoV2" class="modal" onclick="closeModalXuatkhoV2(this)">
	  <div class="modal-content">
    <span class="" onclick="closeBTNXuatkhoV2(this)"  style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
     <form action="{{Route('xuatkhov2')}}" method="post" >
         <div class="row">
        	<div class="col-md-4"><h1>Phiếu xuất kho số:<input type="text" name="PXK" value="PXK 18-" class="Phieuxuat"></h1></div>
        	
        </div>
       
          <fieldset>
{{ csrf_field() }}

<!-- Form Name -->
<div class="form-group">
	<input type="text" name="id" id="idxk" hidden="true">
	 <label for='MVT'>Mã vật tư:</label>
	 <input type="text" name="MVT" class="form-control" data-action='MVT' onkeyup="getMVTXK(this)" pattern="[A-Za-z0-9]{10}">
	 <label for="location">Vị trí</label>
	 <input type="text" name="location" class="form-control" id="autocompleteLC" onkeyup="LocationShow(this)">
	  <label for="location">Lý do xuất</label>
	 <input type="text" name="lydo" class="form-control" >
	<div class="alert alert-success" style="display: none;" data-action="hasMVT">
		<ul></ul>
	</div>
	 <label for='Ngaynhan'>Ngày nhận:</label>
	 <input type="date" name="Ngaynhan" class="form-control" required="">
	<label for="Bophannhan">Bộ phận nhận</label>
	<select type="select" name="Bophannhan" onchange="getInformationV2(this)">
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
		<option value="Phòng Kinh Doanh - Xuất Nhập Khẩu - Nhân Sự Toàn Lực">Phòng Kinh Doanh - Xuất Nhập Khẩu - Nhân Sự Toàn Lực</option>
		<!-- <option value="NS-HC Toàn Lực">NS-HC Toàn Lực</option>
		<option value="Kế Toán Toàn Lực">Kế Toán Toàn Lực</option>
		<option value="Nhập Khẩu Toàn Lực">Nhập Khẩu Toàn Lực</option>
		<option value="Kinh Doanh Toàn Lực">Kinh Doanh Toàn Lực</option> -->
		<option value="PROCI">PROCI</option>
		</select>
		<label for="NguoiphutrachBP">Người nhận phụ trách</label>
		<input type="text" name="NguoiphutrachBP">
		<select type="select"  id="NguoiphutrachBPV2">
				<!-- 	<input type="text" name="NguoiphutrachBP" required=""> -->
			
		</select>

		<label for="Slc" style="margin-left: 25px">Số lượng xuất:</label>
	 <input type="number" name="Slc" required="" onfocusout="bangdieuchuyenV2(this)" >
	 <div  id="MTBXV2">
	 	<label for="MTB">Mã thiết bị:</label>
	 	<div class="alert alert-danger" style="display: none" data-action='hasMTB'>
 		 <strong></strong>
				</div>
	 </div>

	 	
</div>
 

<!-- Text input-->
	
	
		 <button class="btn btn-primary" style="padding-top: 15px; float: right;" data-button='ButtonXuat'>Xuất</button>
</fieldset>
         
    
  
 
        </form>
     
      </div></div>


<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" hidden id="buttonmodal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal" style="width: auto;">
  <div class="modal-dialog float-left"  style="width: auto;">

    <!-- Modal content-->
    <div class="modal-content"   style="width: 1500px;">
      <div class="modal-header">
        
        <h4 class="modal-title">Lịch sử</h4>
      </div>
      <div class="modal-body" id="Showhis" >
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="buttonclose">Close</button>
      </div>
    </div>

  </div>
</div>
   <div id="divIntro" style="width:auto;display:none; height: auto;"></div>
      <div class="modal ModalisC">
      	<div class="modal-content">
      		
      	</div>
      </div>
      <script type="text/javascript">
	$('#lichsu').DataTable();
	$('#chitiet').DataTable();
	$('#lichsu').on('draw.dt',function(){
		historyTSPB2();
	});
	$('#lichsu').on('draw.dt',function(){
		editkho();
	});
	editkho();
	Xuatkhov2();
	quanlytaisan();
		historyTSPB2();
	clickSlider();
	NhapTen();
</script>
<style type="text/css">
	.active{
		border: 3px solid green;

	}
</style>
</body>
</html>