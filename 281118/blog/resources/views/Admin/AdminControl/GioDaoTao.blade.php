<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="container" style="border: 1px solid black; background: #EEEEEE;">
	
	
		<div class="col-md-12">
			<h1 style="text-align: center; border-bottom: 1px solid black">ĐIỂM DANH</h1>
		</div>	
		
		<label>Mã Nhân Viên: </label>
		<input type="text" name="Staff_ID" required="" />
		<br/>		
		<label>Họ Tên: </label>
		<input type="text" name="Full_name" required="" autocomplete="on" onkeyup="getDataDiemDanh_Ten(this)" />
		<br/>
		<label>Mã hoạt động: </label>
		<input type="text" name="Mahoatdong" required="" />
		<br/>	
		<label>Tên hoạt động: </label>
		<input type="text" name="Event_Name" required="" autocomplete="on" onkeyup="getMahoatdong_Ten(this)" />
		<br/>		
		<label>Số giờ theo phân loại: </label>		
		<br/>
		<div class="row">
		<div class="col-md-2">
			<label class="col-md-12">Tâm lý</label>
			<input type="double" name="TL" class="col-md-12" value="0">
		</div>
		<div class="col-md-2">
			<label class="col-md-12">Kiến thức</label>
			<input type="double" name="KT" class="col-md-12" value="0">
		</div>
		<div class="col-md-2">
			<label class="col-md-12">Kỹ năng</label>
			<input type="double" name="KN" class="col-md-12" value="0">
		</div>
		<div class="col-md-2">
			<label class="col-md-12">Chuyên môn</label>
			<input type="double" name="CM" class="col-md-12" value="0">
		</div>
		<div class="col-md-2">
			<label class="col-md-12">Cộng đông</label>
			<input type="double" name="CD" class="col-md-12" value="0">
		</div><div class="col-md-2">
			<label class="col-md-12">Thể chất</label>
			<input type="double" name="TC" class="col-md-12" value="0">
		</div>
				<!-- <input type="double" name="KN" class="col-md-1">
		<input type="double" name="KT" class="col-md-1">
		<input type="double" name="CM" class="col-md-1">
		<input type="double" name="CD" class="col-md-1">
		<input type="double" name="TC" class="col-md-1"> -->
		</div>
		<br/>
		<label>Ngày Tham Gia: </label>
		<input type="date" name="Event_Date" required="" />
		<br/>
		
		<button class="btn btn-primary float-right" style="margin-bottom: 10px;" id="FormNhapLieu">Xác Nhận</button>
	
</div>

<br/>

<div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title">LỊCH SỬ ĐIỂM DANH <span>- (</span><span><a href="" class="panel-title bold">Hôm nay</a></span>
            	/ <span><a href="" class="panel-title">Tất cả)</a></span>
            </h3>
      
          </div>
<div id="show-table">
<table id="formNhapCH" class="table table-bordered panel">
	<thead>
		<tr>
			<th >Mã Nhân Viên</th>
			<th >Họ Tên</th>
			<th >Tên Sự Kiện</th>
			<th >Ngày Tham Gia</th>
			<th >TL</th>
			<th >KT</th>
			<th >KN</th>
			<th >CM</th>
			<th >CĐ</th>
			<th >TC</th>
		</tr>
	</thead>

	<tbody>
		@foreach($detailDD as $key)
		<tr>
			<td>{{$key->Staff_ID}}</td>
			<td>{{$key->Full_name}}</td>
			<td>{{$key->Tenhoatdong}}</td>
			<td>{{date('d-m-Y',strtotime($key->Ngayhoatdong))}}</td>			
			<td>{{$key->TL}}</td>
			<td>{{$key->KT}}</td>
			<td>{{$key->KN}}</td>
			<td>{{$key->CM}}</td>
			<td>{{$key->CD}}</td>
			<td>{{$key->TC}}</td>

		</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
</div>
<div id="divIntro" style="width:auto;display:none; height: auto;"></div>
      <div class="modal" id="myModalFormXuat">
      	<div class="modal-content">
      		
      	</div>
      </div>
</body>
</html>
