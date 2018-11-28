@extends('thunghiemkethuavd')
@section('body')
<style type="text/css">
	.hover_bkgr_fricc{
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:30%;
    position:fixed;
    text-align:center;
    top:0;
    width:30%;
    z-index:10000;
}

</style>
<div class="container">
	<div class="hover_bkgr_fricc">
   
    <div id="ShowProduct">
       
        
    </div>
</div>
	<div class="row">

		<div class="col-md-12">
    <h1>Danh sách Viễn Đông</h1>
    <p><input type="text" class="form-control" id="dev-table-filter" data-action="filter2" data-filters="#title" placeholder="Tìm kiếm" /></p> 
<div id="divtoshow" style="position: fixed;display:none;">test</div>
    	<div class="row" id="title">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3  class="panel-title" id="title">DANH SÁCH TÀI SẢN CÔNG TY</h3>
						<!-- <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
						 	<i class="glyphicon glyphicon-filter"></i>
							 </span>
						</div> --> 
					</div>
					
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Tìm kiếm" />
					<?php $i = 0 ; $trangthai = array('Kho','Mượn','Đã trả'); $Bophan = array('Khotong'=>'Kho tổng',
					'CSVC' => 'Cơ sở vật chất',
					'Thuongmai'=> 'Thương mại'); ?>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Công ty</th>
								<th>Bộ phận</th>
								<th>Mã vật tư</th>
								<th>Tên thiết bị</th>
								<th>Số lượng</th>
								<th>Ngày nhận</th>
								<th>Người phụ trách</th>
								<th>Trạng thái</th>
								<th>Ngày trả</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($data as $key)
							<tr  >
								<td>{{$i=$i+1}}</td>
								<td>{{$key->Congty}}</td>
								<td>{{$Bophan[$key->Bophan]}}</td>
								<td>{{$key->MVT}}</td>
								<td class="ShowImage" id="{{$key->MVT}}">{{$key->Ten}}</td>
								<td>{{$key->Sl}}</td>
								<td>{{$key->Ngaynhan}}</td>
								<td>{{$key->Nguoiphutrach}}</td>
								<td>{{$trangthai[$key->Trangthai]}}</td>
								<td>{{$key->Ngaytra}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
<!-- 2 --></div></div></div>
<script src="{{URL::asset('layouts/js/tongviec.js')}}"></script>
	<script src="{{URL::asset('layouts/js/timbang.js')}}"></script>
	<script type="text/javascript">
	
				$('.ShowImage').click(function(e){
					e.preventDefault();
					var x = this.id;
					window.open('{{URL("Showdetail?id=")}}'+x,"_blank");
					
				});
			
	
	</script>
@endsection