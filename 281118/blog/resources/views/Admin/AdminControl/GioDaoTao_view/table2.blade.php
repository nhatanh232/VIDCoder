

<table id="formNhapCH" class="table table-bordered">
	<?php $Categories = array('TL'=>'Tâm Lý','KN'=>'Kỹ Năng','KT'=>'Kiến Thức','CM'=>'Chuyên Môn','CĐ'=>'Cộng Đồng','TC'=>'Thể Chất'); ?>
<thead>

		<tr>
			<th>Mã Nhân Viên</th>
			<th>Họ Tên</th>
			<th>Tên Sự Kiện</th>
			<th>Phân Loại</th>
			<th>Ngày Tham Gia</th>
			<th>Số Giờ</th>
			<th>Comment Người duyệt</th>
			<th>Chỉnh sửa</th>
		</tr>
	</thead>
	<tbody>
		@foreach($detailDD as $key)
		<tr>
			<td ><input type="text"  value="{{$key->Staff_ID}}" ></td>
			<td  >{{$key->Full_name}}</td>
			<td ><input type="text"  value="{{$key->Event_Name}}" ></td>
			<td ><select>
				<option value="{{$key->Categories}}">{{$Categories[$key->Categories]}}</option>
				<option value="TL">Tâm Lý</option>
				<option value="KN">Kỹ Năng</option>
				<option value="KT">Kiến Thức</option>
				<option value="CM">Chuyên Môn</option>
				<option value="CĐ">Cộng Đồng</option>
				<option value="TC">Thể Chất</option>
			</select></td>			
			<td><input type="date"  value="{{$key->Event_Date}}" > </td>
			<td><input type="double"  value="{{$key->Hours}}" ></td>
			<td class="text-danger" >{{$key->Comment}}</td>
			@if($key->Status == 0 )
			<td><button class="btn btn-default editData" value="{{$key->id}}">Chỉnh sửa</button>
				<button class="btn btn-danger deleteData" value="{{$key->id}}">XÓA</button>
			</td>
			@else
				<td class="text-success">Đã duyệt &radic;</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>