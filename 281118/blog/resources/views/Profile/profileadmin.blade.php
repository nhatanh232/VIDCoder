<?php $i = 1; 
	$Trangthai = array("0"=>"Đã nghỉ việc","1"=>"Đang làm việc");
?>
<h1 class="text-default">INFORMATION & COMMUNICATION TECHNOLOGIES</h1>

	<div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" id="title">Thông tin nhân sự</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
	<table id="ICT" class="table table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Mã nhân viên</th>
				<th>Họ tên</th>
				<th>Công ty</th>
				<th>Ngày vào làm</th>
				<th>Điểm cống hiến</th>
				
			</tr>
		</thead>
			<tbody>
				@foreach($data as $key)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$key->Staff_ID}}</td>
					<td>{{$key->Full_name}}</td>
					
					<td>{{$key->Company}}</td>
					
					<td>{{$key->Start_work ? date('d-m-Y',strtotime($key->Start_work)): ""}}</td>
					<td>{{$key->Total_point}}</td>
				</tr>
				@endforeach
			</tbody>
	</table>
	</div>
<div class="row">
	<div class="col-md-4">
		<h1 class="text-success">Import dữ liệu nhân viên</h1>

		<form action="{{Route('importamis')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="file" name="file">
		<button class="btn btn-primary" name="Import">Import</button>
		<button class="btn btn-primary" name="file_mau">Tải file mẫu</button>
		</form>
		
	</div>
</div>