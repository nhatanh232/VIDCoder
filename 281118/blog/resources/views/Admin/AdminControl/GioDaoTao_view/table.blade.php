<table id="formNhapCH" class="table table-bordered ">
<thead>
		<tr>
			<th>Mã Nhân Viên</th>
			<th>Họ Tên</th>
			<th>Tên Sự Kiện</th>
			<th>Phân Loại</th>
			<th>Ngày Tham Gia</th>
			<th>Số Giờ</th>
		</tr>
	</thead>
	<tbody>
		@foreach($detailDD as $key)
		<tr>
			<td>{{$key->Staff_ID}}</td>
			<td>{{$key->Full_name}}</td>
			<td>{{$key->Event_Name}}</td>
			<td>{{$key->Categories}}</td>			
			<td>{{date('d-m-Y',strtotime($key->Event_Date))}}</td>
			<td>{{$key->Hours}}</td>
		</tr>
		@endforeach
	</tbody>
</table>