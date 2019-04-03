@extends('kethua2')
@section('body')
<!DOCTYPE html>
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
				<td><input type="text" name="name" readonly="true" autocomplete="on" onkeyup="getNVDKAn(this)" /></td>
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
		<!-- nếu đã đăng kí -->
		<div id="daDK">
			<b><p id="daTitle"></p></b>
			<p style="text-align: center; font-size: 20px;">click vào <a href="suatancanhan">đây</a> để xem lại thông tin đăng kí ăn</p>
		</div>
		<!-- end -->		
		<div id ="chuaDK">
			<div class="container">
				<b><p id="title"></p></b>
				<div id = "dangki">
					<p class="subTitle"><b>Đăng kí</b></p>
					<form action="{{Route('postDangKiAn')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="MaNV" value="{{$user}}">
						<input type="hidden" name="ThangDK">
						<input type="hidden" name="NamDK">
						<div id="calendar"></div>
						<button class="btn btn-primary float-right" style="margin-top: 10px;">Đăng kí</button>
					</form>
				</div>
			</div>
		</div>
	</div>
		<script type="text/javascript">
			getNVInfo();
			createCalendar();
			getRegisTime();
			checkDK();
			checkDelegate();
		</script>
	</body>
	</html>
	@endsection