	<head>
		<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/adminQuayso.css')}}">
	</head>
	<div class="row" style="background-image: url('{{asset('images/lotte6.jpg')}}');">
		<div class="col-md-12">
			<div class="icon"><img src="{{asset('images/coin.jpg')}}" style="margin-left: 100px;"></div>
			<div class="title"><p>CƠ HỘI BẤT NGỜ</p></div>
			<div class="icon"><img src="{{asset('images/coin.jpg')}}"></div>
		</div>
		
		<div class="col-md-12">
			<h3 class="date"><b>Quay số ngày: </b><span style="color: red;">{{date('d-m-Y', strtotime($data[0]->Ngay))}}</span> | Kỳ quay: <span id="ki">{{$data[0]->Ki}}</span></h3>
		</div>
		
		<div class="col-md-12" id="Sobanh">
		@foreach($data as $key)
			<h1 class="col-md-4 ball1">Banh lần 1: <strong data-action="Solan1">{{$key->Solan1}}</strong></h1>
			
		
			<h1 class="col-md-4 ball2">Banh lần 2: <strong  data-action="Solan2">{{$key->Solan2}}</strong></h1></h1>
			
		
			<h1 class="col-md-4 ball3" >Banh lần 3: <strong data-action="Solan3">{{$key->Solan3}}</strong></h1>
			
		</div>
		@endforeach
		<div class="col-md-6">
			<h1 id="Nhapso">Nhập số:</h1>
		
			
			<input type="text" name="postSo">
			<button class="btn btn-primary" id="postSo">Nhập</button>
			<button class="btn btn-danger" id="xoaSo">Xóa</button>
		</div>
		<br class="clearfix">
	<div class="clearfix"></div>
		
			
			<div class="col-md-12">
				<h1>Danh sách người chơi</h1>
				 <div class="panel panel-primary">
          <div class="panel-heading">
                      
          </div>    
				<table id="player" class="table table-bodered">
					<thead>
						<?php $th = 1; ?>
						<th>STT</th>
						<th>Người chơi</th>
						<th>Số lần 1</th>
						<th>Số lần 2</th>
						<th>Số lần 3</th>
						<th>Bộ phận</th>
						<th>Công ty</th>
					</thead>
					<tbody>
						@foreach($player as $key)
						<tr>
							<td>{{$th++}}</td>
							<td>{{$key->Hoten}}</td>
							<td>{{$key->Lan1}}</td>
							<td>{{$key->Lan2}}</td>
							<td>{{$key->Lan3}}</td>
							<td>{{$key->Bophan}}</td>
							<td>{{$key->Congty}}</td>
						</tr>
						@endforeach
					</tbody>
					
				</table>
			</div>
		</div>

			<h1 class="import col-md-12">Import danh sách</h1>
			
			<div class="form-control ">
			<form action="{{route('ImportDSquay')}}" method="post" enctype="multipart/form-data">
				
				
				<div class="row">
					@csrf
				<div class="col-md-10"><input type="file" name="file" class="form-control"></div>
				<div class="col-md-2"><button class="btn btn-primary">IMPORT</button></div>
				</div>
			</form>
			</div>
	


<!-- 	<div class="row">
		<h1>Danh sách dữ liệu</h1>
	</div>
 -->
