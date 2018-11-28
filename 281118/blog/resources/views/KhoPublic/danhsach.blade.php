@extends('thunghiemkethuavd')
@section('body')
     <div class="panel panel-primary">

             <div class="panel-heading">DANH SÁCH TÀI SẢN CÔNG TY </div></div>
<?php $i=0 ?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
    <h1>Danh sách Viễn Đông</h1>
    <p><input type="text" class="form-control" id="dev-table-filter" data-action="filter2" data-filters="#title" placeholder="Tìm kiếm" /></p> 

    	<div class="row" id="title">
			
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title" id="title">DANH SÁCH TỔNG</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					<!-- <div class="panel-body"> -->
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					<!-- </div> -->
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã vật tư</th>
								<th>Tên thiết bị</th>
								<th>Thông số kĩ thuật</th>
								<th>Số lượng</th>
								<th>Hình ảnh</th>
							</tr>
						</thead>
						
						<tbody style="font-family: Arial">
							@foreach($tong as $key)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{$key->MVT}}</td>
								<td>{{$key->Ten}}</td>
								<td style="width: 1500px">{{$key->Thongso}}</td>
								<td>{{$key->Sl}}</td>
								<td style="width: 200px"><img src="{{URL::asset('layouts/images/QLKho')}}/{{$key->Hinh}}" style="width: 100%; "></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
<!-- 3 -->


<!-- Kết thúc danh sách Viễn ĐÔng -->
		
					
</div>

	
	<script src="{{URL::asset('layouts/js/tongviec.js')}}"></script>
	<script src="{{URL::asset('layouts/js/timbang.js')}}"></script>
@endsection