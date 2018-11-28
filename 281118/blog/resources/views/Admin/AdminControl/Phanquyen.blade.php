
<?php $i=1;?>
<div class="container-fluid">
	<h1>Phân quyền</h1>
	 <div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" id="title">Danh sách nhân viên được phân quyền</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
	<table id="phanquyen" class="table table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Mã nhân viên</th>
				<th>Họ tên</th>
				<th>Bộ phận</th>
				<th>Công ty</th>
				<th style="color: red;">Admin</th>
				<th>Quản lý kho</th>
				<th>Thanh lý giá trị</th>
				<th>Thông báo</th>
				<th>Nhập liệu</th>
			</tr>
		</thead>
			<tbody>
				@foreach($data as $key)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$key->Manv}}</td>
					<td>{{$key->Hoten}}</td>
					<td>{{$key->Phongban}}</td>
					<td>{{$key->Congty}}</td>
					<td>@if($key->Authen == 'Admin')<input type="checkbox" name="AuthenAdmin" checked value="{{$key->Manv}}">@else <input type="checkbox" name="AuthenAdmin" value="{{$key->Manv}}">@endif</td>
					<td>@if($key->Quanlykho == 1 || $key->Authen == 'Admin' )<input type="checkbox" name="AuthenQLkho" value="{{$key->Manv}}" checked>@else <input type="checkbox" name="AuthenQLkho" value="{{$key->Manv}}"> @endif</td>
					<td>@if($key->Thanhlygt == 1 || $key->Authen == 'Admin')<input type="checkbox" name="AuthenThanhlygt" value="{{$key->Manv}}" checked> @else <input type="checkbox" name="AuthenThanhlygt" value="{{$key->Manv}}" > @endif</td>
					<td>@if($key->Thongbao ==1 || $key->Authen == 'Admin')<input type="checkbox" name="AuthenThongbao" value="{{$key->Manv}}" checked>@else <input type="checkbox" name="AuthenThongbao" value="{{$key->Manv}}" > @endif</td>
					<td>@if($key->Nhaplieu ==1 || $key->Authen == 'Admin')<input type="checkbox" name="AuthenNhapLieu" value="{{$key->Manv}}" checked>@else <input type="checkbox" name="AuthenNhapLieu" value="{{$key->Manv}}" > @endif</td>
				</tr>
				@endforeach
			</tbody>
	</table>
</div>
<form method="post" action="{{route('ImportFileDiemDanh')}}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<button>nhap</button>
</form>


<form method="post" action="{{route('ImportFileVD')}}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<button>nhap</button>
</form>