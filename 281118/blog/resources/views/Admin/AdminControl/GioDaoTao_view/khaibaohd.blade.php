<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="container" style="border: 1px solid black; background: #EEEEEE;">
	
	
		<div class="col-md-12">
			<h1 style="text-align: center; border-bottom: 1px solid black">KHAI BÁO SỰ KIỆN</h1>
		</div>	
		
		<label>Mã hoạt động </label>
		<input type="text" name="Mahoatdong" required="" />
		<br/>		
		<label>Tên hoạt động: </label>
		<input type="text" name="Tenhoatdong" required="" />
		<br/>
		<label>Ngày diễn ra hoạt động: </label>
		<input type="datetime-local" name="Ngaydienra" required="" />
		<br/>	
		<label>Ngày đề xuất: </label>
		<input type="date" name="Ngaydexuat" required=""  />
		<br/>		
		<label>Người đề xuât: </label>	
		<input type="text" name="Nguoidexuat" required=""  />	
		<br/>
		<label>Thời gian bắt đầu: </label>	
		<input type="datetime-local" name="Thoigianbd" required=""  />	
		<br/>
		<label>Thời gian kết thúc: </label>	
		<input type="datetime-local" name="Thoigiankt" required=""  />	
		<br/>
		<label>Ngân sách dự tính: </label>	
		<input type="text" name="Ngansachdutinh"  />	
		<br/>
		<label>Số người tham gia: </label>	
		<input type="number" name="Songuoithamdu"  />	
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

	</div>

	<br/>
		<button class="btn btn-primary float-right" style="margin-bottom: 10px;" id="FormKhaiBao">Xác Nhận</button>
	</div>
	
</div>

<br/>

<div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title">DANH SÁCH HOẠT ĐỘNG</h3>
          </div>
         <table class="table table-border" id="DSHD">
         	<thead>
         		<tr>
         			<th>Mã Hoạt Động</th>
         			<th>Tên Hoạt Động</th>
         			<th>Ngày Diễn Ra</th>
         			<th>Thời Gian Bắt Đầu</th>
         			<th>Thời Gian Kết Thúc</th>
         			<th>Tâm Lý</th>
         			<th>Kiến Thức</th>
         			<th>Kỹ Năng</th>
         			<th>Chuyên Môn</th>
         			<th>Cộng Đồng</th>
         			<th>Thể Chât</th>
         		</tr>
         	</thead>
         	<tbody>
         		@foreach($data as $key)
         		<tr>
         			<td>{{$key->Mahoatdong}}</td>
         			<td>{{$key->Tenhoatdong}}</td>
         			<td>{{date('d-m-Y H:i:s',strtotime($key->Ngaydienra))}}</td>
         			<td>{{date('d-m-Y H:i:s',strtotime($key->Thoigianbd))}}</td>
         			<td>{{date('d-m-Y H:i:s',strtotime($key->Thoigiankt))}}</td>
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
<div id="divIntro" style="width:auto;display:none; height: auto;"></div>
      <div class="modal" id="myModalFormXuat">
      	<div class="modal-content">
      		
      	</div>
      </div>
</body>
</html>
