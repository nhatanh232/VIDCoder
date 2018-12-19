
<table id="formNhapCH" class="table table-bordered ">
<thead>
		<tr>
			<th >Mã Nhân Viên</th>
			<th >Họ Tên</th>
			<th >Tên Sự Kiện</th>
			<th >Ngày Tham Gia</th>
			<th >TL</th>
			<th >KT</th>
			<th >KN</th>
			<th >CM</th>
			<th >CĐ</th>
			<th >TC</th>
		</tr>
	</thead>
	<tbody>
		@foreach($detailDD as $key)
		<tr>
			<td>{{$key->Staff_ID}}</td>
			<td>{{$key->Full_name}}</td>
			<td>{{$key->Tenhoatdong}}</td>
			<td>{{date('d-m-Y',strtotime($key->Ngayhoatdong))}}</td>			
			<td>{{$key->TL}}</td>
			<td>{{$key->KT}}</td>
			<td>{{$key->KN}}</td>
			<td>{{$key->CM}}</td>
			<td>{{$key->CD}}</td>
			<td>{{$key->TC}}</td>

		</tr>
		@endforeach
	</tbody>
</table>