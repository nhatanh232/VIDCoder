@extends('master')
@section('body')
<div class="content-header">
			<h1 style="float: right;"><i class="glyphicon glyphicon-search"></i>
			<input type="text" name="Search" placeholder="Search"></h1>
	
</div>
	<div class="clearfix"></div>
<div class="navigator-left">
		<i class="glyphicon glyphicon-chevron-left"></i>
	</div>
	<div class="navigator-right"><i class="glyphicon glyphicon-chevron-right"></i></div>
<div class="show-product">
	
	<!-- 6 product in page -->
	@foreach($data as $key)
	<div class="product-sort">
		<img src="{{URL::asset('layouts\images\QLKho')}}\{{$key->Hinh}}" style="height: 100%;width: 100%">
		<h5><b>{{$key->Ten}}</b></h5>
		<div class="detail-product">
			<div class="detail-content">
				<div class="detail-img">
					<img src="{{URL::asset('layouts\images\QLKho')}}\{{$key->Hinh}}"/>
				</div>
				<div class="detail-parameter">
					<h2>Thông Số Kỹ Thuật</h2>
						<table class="table table-bordered thead-dark">
							<thead>
								<tr>
									<td>Mã Vật Tư</td>
									<td>{{$key->MVT}}</td>
								</tr>
								<tr>
									<td>Thông số:</td>
									<td>{{$key->Thongso}}</td>
								</tr>
								<tr>
									<td>Đơn vị tính</td>
									<td>{{$key->Donvitinh}}</td>
								</tr>
							</thead>
						</table>
				</div>
		
			</div>
		</div>
	</div>
	@endforeach
</div>

@endsection

@section('js')
	<script type="text/javascript" src="{{URL::asset('CuaHang\js\module.js')}}"></script>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('CuaHang\css\component.css')}}">
@endsection
