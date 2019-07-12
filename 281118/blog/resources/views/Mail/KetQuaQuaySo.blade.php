<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<p><center>Giải thưởng tuần {{$data['Kyquay']->Ki+1}} - Ngày {{date('d-m-Y',strtotime($data['Kyquay']->Ngay))}}</center></p>
	<p><h4><b>Giải thưởng may mắn tuần này thuộc về</b><h4></p>
	<ul>
		@if(empty($data['Giaimayman']))
			<p><h4><b>Giải thưởng MAY MẮN tuần này: Chúc các bạn may mắn lần sau nhé </b><h4></p>
		@else
			@foreach($data['Giaimayman'] as $key )
			<li>{{$key->Hoten}} - {{$key->Bophan}}</li>
			@endforeach
		@endif
		
	</ul>
	<p><h4><b>Giải thưởng khuyến khích tuần này thuộc về</b><h4></p>
	<ul>
			@if(empty($data['Giaikhuyenkhich']))
			<p><h4><b>Giải thưởng KHUYẾN KHÍCH tuần này: Chúc các bạn may mắn lần sau nhé </b><h4></p>
		@else
			@foreach($data['Giaikhuyenkhich'] as $key )
			<li>{{$key->Hoten}} - {{$key->Bophan}}</li>
			@endforeach
		@endif
	</ul>
	<p><h4><b>Giải thưởng ĐẶC BIỆT tuần này thuộc về</b><h4></p>
	<ul>
			@if(empty($data['Giaidacbiet']))
			<p><h4><b>Giải thưởng ĐẶC BIỆT tuần này: Chúc các bạn may mắn lần sau nhé </b><h4></p>
		@else
			@foreach($data['Giaidacbiet'] as $key )
			<li>{{$key->Hoten}} - {{$key->Bophan}}</li>
			@endforeach
		@endif
	</ul>
    <p>Trân trọng cảm ơn</p>
</div>
</body>
</html>