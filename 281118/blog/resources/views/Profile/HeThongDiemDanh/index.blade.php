@extends('kethua2')
@section('libary')
	<script type="text/javascript" src="{{asset('Admin/js/HeThongDiemDanh/Diemdanh.js')}}"></script>
@endsection 
@section('body')


	
	<script type="text/javascript" src="{{asset('Admin/js/Quayso.js')}}"></script>	
	<link rel="stylesheet" type="text/css" href="{{asset('Profile/Profile.css')}}">
	<script type="text/javascript" src="{{asset('Profile/Profile.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/profile.css')}}">
<div class="row">
	<div class="col-md-6"></div><div class="col-md-6 float-right">
		<div class="row">
			<div class="col-md-6"><input type="text" name="idcard" class="form-control"></div>
			<div class="col-md-6"><button class="btn btn-default">Điểm danh</button></div>
		</div>
	</div>
</div>

<div id='ShowInfo'></div>



@endsection