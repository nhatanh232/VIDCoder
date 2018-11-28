@extends('kethua2')
@section('body')
<!DOCTYPE html>
<?php $i=1;?>
<html>
<head>
	<script type="text/javascript" src="{{asset('Admin/js/suatAn.js')}}"></script>
	<script type="text/javascript" src="{{asset('Admin/js/information.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/suatAn.css')}}">
</head>
<body>
	<div class="container">

		<table class="info">	
			<tr>
				<td><b><p>Mã Nhân Viên: </p></b></td>
				<td><input type="text" name="Manv" value="{{$user}}" readonly="true"/></td>
			</tr>
			<tr>
				<td><b><p>Họ & Tên: </p></b></td>
				<td><input type="text" name="name" readonly="true"/></td>
			</tr>
			<tr>
				<td><b><p>Bộ Phận: </p></b></td>
				<td><input type="text" name="bophan" readonly="true"/></td>
			</tr>
			<tr>
				<td><input type="hidden" name="nam"></td>
				<td><input type="hidden" name="thang"/></td>
			</tr>
		</table>
		<hr/>
		<!-- start -->
		<div id ="chuaDK">
			<div class="container">
				<b><p id="title"></p></b>
				<div id = "dangki">
					<p class="subTitle"><b>Cập Nhật</b></p>
					<form action="{{Route('updateSuatAn')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="MaNV" value="{{$user}}">
						<input type="hidden" name="ThangDK">
						<input type="hidden" name="NamDK">
						<div id="calendar"></div>
						<button class="btn btn-primary btnLeft" style="margin: 10px;">Cập Nhật</button>
					</form>
					<button class="btn btn-primary btnRight" style="margin: 10px;" id="btnNext">Tháng Kế</button>
					<button class="btn btn-primary btnRight" style="margin: 10px;" id="btnPrevious">Tháng Trước</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">	
		getNVInfo();
		getSuatAnData();
		getUpdateTime();
		btnNextMonth();
		btnPreMonth();
	</script>
</body>
</html>
@endsection