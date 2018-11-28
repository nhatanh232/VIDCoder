@extends('kethua')
@section('body')
<form action="{{route('Xuat')}}">
	<h3>Nhập tháng -> Tính tổng phần ăn </h3>
	<input type="text" name="Thang">
	<button type="submit">Thống kê, Xuất file</button>
</form>
<form action="{{route('Xuattong')}}">
	<h3>Nhập tháng -> xuất danh sách nhân viên ăn trong tháng</h3>
	<input type="text" name="Thang">
	<button type="submit">Danh sách tổng</button>
</form>
@endsection