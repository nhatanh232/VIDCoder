@if(isset($data))
<div class="container-fluid">
	<div class="row text-center">
		<h3 class="col-md-12">CÔNG TY CỔ PHẦN ĐẦU TƯ PHÁT TRIỂN THƯƠNG MẠI VIỄN ĐÔNG</h3>
		<h3 class="col-md-12">VIEN DONG INVESTMENT DEVELOPMENT TRADING CORPORATION</h3>
	</div>
	<br/>
	<div class="row text-center">
			<h2 class="col-md-12">PHIẾU XUẤT KHO</h2>
			<h5 class="col-md-12">Số:{{$data[0]->Sophieu}}</h5>
	</div>
	<br/>
	<div class="row text-left">
			<h5 class="col-md-8">Họ tên và người nhận: <span style="font-weight: bold;">{{$data[0]->Nguoinhan}}</span></h5>
			<h5 class="col-md-4">Phòng ban: <span style="font-weight: bold;">{{$data[0]->Bophan}}</span></h5>
			<h5 class="col-md-8">Xuất tại kho:CSVC</h5>
			<h5 class="col-md-4">Địa chỉ: 806 Âu Cơ P.14 Q.Tân Bình</h5>
			<h5 class="col-md-12">Lý do xuất:<span style="font-weight: bold;"> {{$data[0]->Lydoxuat}}</span></h5>

	</div>

	<div class="col-md-12">
			<table id="ViewFormXuat" class="table table-bordered">
				<thead>
					<tr>
						<th>STT</th>
						<th>Mã vật tư</th>
						<th>Tên tài sản</th>
						<th>Thông số</th>
						<th>Đơn vị tính</th>
						<th>Số lượng</th>
						<th>Vị trí</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					@foreach($data as $key)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$key->MVT}}</td>
						<td>{{$key->Ten}}</td>
						<td>{{$key->Thongso}}</td>
						<td>{{$key->dvt}}</td>
						<td>{{$key->Sl}}</td>
						<td>{{$key->Location}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		
</br>
	<div class="row float-right">
				<button class="btn btn-default" id="btnXuatPhieu">Xuất phiếu</button>
	</div>

</div>
</div>
</div>

@endif