<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="container" style="border: 1px solid black; background: #EEEEEE;">
	
	
		<div class="col-md-12">
			<h1 style="text-align: center; border-bottom: 1px solid black">Giờ Đào Tạo</h1>
		</div>	
		
		<label>Mã Nhân Viên: </label>
		<input type="text" name="Staff_ID" required="" />
		<br/>		
		<label>Họ Tên: </label>
		<input type="text" name="Full_name" required="" autocomplete="on" onkeyup="getDataDiemDanh_Ten(this)" />
		<br/>
		<label>Tên Sự Kiện: </label>
		<input type="text" name="Event_Name" required="" />
		<br/>		
		<label>Phân Loại: </label>		
		<select name='Categories'>
			<option value="TL">Tâm Lý</option>
			<option value="KN">Kỹ Năng</option>
			<option value="KT">Kiến Thức</option>
			<option value="CM">Chuyên Môn</option>
			<option value="CĐ">Cộng Đồng</option>
			<option value="TC">Thể Chất</option>
		</select>
		<br/>
		<label>Ngày Tham Gia: </label>
		<input type="date" name="Event_Date" required="" />
		<br/>
		<label>Số Giờ: </label>
		<input type="double" name="Hours" required="" />
		<br/>
		<button class="btn btn-primary float-right" style="margin-bottom: 10px;" id="FormNhapLieu">Xác Nhận</button>
	
</div>

<br/>
<div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title">LỊCH SỬ ĐIỂM DANH <span> </span><span><a href="" class="panel-title">Hôm nay</a></span>
            	/<span><a href="" class="panel-title">Tất cả</a></span>
            </h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
<table id="formNhapCH" class="table table-bordered ">
	<thead>
		<tr>
			<th>Mã Nhân Viên</th>
			<th>Họ Tên</th>
			<th>Tên Sự Kiện</th>
			<th>Phân Loại</th>
			<th>Ngày Tham Gia</th>
			<th>Số Giờ</th>
		</tr>
	</thead>
	<tbody>
		@foreach($detailDD as $key)
		<tr>
			<td>{{$key->Staff_ID}}</td>
			<td>{{$key->Full_name}}</td>
			<td>{{$key->Event_Name}}</td>
			<td>{{$key->Categories}}</td>			
			<td>{{date('d-m-Y',strtotime($key->Event_Date))}}</td>
			<td>{{$key->Hours}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div id="divIntro" style="width:auto;display:none; height: auto;"></div>
      <div class="modal" id="myModalFormXuat">
      	<div class="modal-content">
      		
      	</div>
      </div>
</body>
</html>
