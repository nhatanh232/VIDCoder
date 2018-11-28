@extends('datlich.honviet.kethuahv')
@section('body')
     <div class="panel panel-primary">

             <div class="panel-heading"><div class="dropdown" style="text-align: center;">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background:#4CAF50" ><h1>DANH SÁCH CÔNG VIỆC CÁC PHÒNG</h1>
  <span class="caret"></span></button>
<ul class="dropdown-menu" style="width: 100%;
    padding: 0px 10px;
    text-align: left;
    background: #e6e6e6;
    border-bottom: 1px solid white; 
   ">
    <li><a href="{{ route('events.indexhvdt')}}">ĐÀO TẠO</a></li>
    <li><a href="{{ route('events.indexhvh')}}">PHÒNG HỌP</a></li>
        <li><a href="{{ route('events.indexhvtv1')}}">TƯ VẤN 1</a></li>
    <li><a href="{{ route('events.indexhvtv2')}}">TƯ VẤN 2</a></li>
    <li><a href="{{ route('events.indexhvtv3')}}">TƯ VẤN 3</a></li>

  </ul>
</div></div></div>
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
						<h3  class="panel-title" id="title">Phòng Kai</h3>
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
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongkai as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
<!-- 2 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title" id="title">Phòng ZEN</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongzen as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
<!-- 3 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title" id="title">Phòng Nonself 1</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongnons1 as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>			
<!-- 4 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Nonself 2</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongnons2 as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 4-->
					<!-- 5 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Hội Trường</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongHT as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 5-->
					<!-- 6 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Sân Bóng</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($SBong as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 6-->
					<!-- 7 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Sinh Hoạt Giải Trí</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongSHGT as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 7-->
					<!-- 8 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Kid</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongKid as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 8-->
					<!-- 9 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Yoga</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongYoga as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 9-->
					<!-- 10 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Bếp</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongBep as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 10-->
					<!-- 11 -->
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Mini Gym</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongMinigym as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end11-->
			</div>
		</div>

<!-- Kết thúc danh sách Viễn ĐÔng -->
		<div class="col-md-6">
			<h1>Danh sách Hồn Việt </h1>
			<p><input type="text" class="form-control" id="dev-table-filter" data-action="filter2" data-filters="#title2" placeholder="Tìm kiếm" /></p> 
		<div class="row" id="title2">
<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Đào Tạo</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongdt as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 6-->
					<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng họp</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phonghophv as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 6-->
					<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Tư Vấn 1</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongtv1 as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 6-->
					<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Tư Vấn 2</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongtv2 as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 6-->
					<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Phòng Tư Vấn 3</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<!-- 	<i class="glyphicon glyphicon-filter"></i> -->
							</span>
						</div>
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên công việc</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($phongtv3 as $keykai)
							<tr>
								<td>{{$i=$i+1}}</td>
								<td>{{substr($keykai->title,6)}}</td>
								<td>{{$keykai->start}}</td>
								<td>{{$keykai->end}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
					<!-- end 6-->

					
</div>
</div></div>
	
	<script src="{{URL::asset('layouts/js/tongviec.js')}}"></script>
	<script src="{{URL::asset('layouts/js/timbang.js')}}"></script>
@endsection