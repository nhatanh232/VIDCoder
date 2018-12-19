

<table id="formNhapCH" class="table table-bordered" style="width: auto">
<thead>

		<tr>
			<th style="width: 15%">Mã Nhân Viên</th>
			<th style="width: 23%">Họ Tên</th>
			<th style="width: 14%">Tên Sự Kiện</th>
			<th style="width: 0.01%">Ngày Tham Gia</th>
			<th style="width: 7%">TL</th>
			<th style="width: 7%">KT</th>
			<th style="width: 7%">KN</th>
			<th style="width: 7%">CM</th>
			<th style="width: 7%">CĐ</th>
			<th style="width: 7%">TC</th>
			
			<th >Chỉnh sửa</th>
		</tr>
	</thead>
	<tbody>	
		@foreach($detailDD as $key)
		<tr>
			<td  ><input type="text"  value="{{$key->Staff_ID}}"  class="form-control"></td>
			<td>{{$key->Full_name}}</td>
			<td ><input type="text"  value="{{$key->Tenhoatdong}}"   class="form-control"></td>
				
			<td ><input type="date"  value="{{$key->Ngayhoatdong}}"  class="form-control" > </td>
			@if($key->TL > 0 )
			<td ><input type="double" name="TL" value="{{$key->TL}}"  class="form-control text-success"></td>	
			@else
			<td ><input type="double" name="TL" value="{{$key->TL}}"  class="form-control"></td>	
			@endif

			@if($key->KT > 0 )
			<td ><input type="double" name="KT" value="{{$key->KT}}"  class="form-control text-success"></td>	
			@else
			<td ><input type="double" name="KT" value="{{$key->KT}}"  class="form-control"></td>	
			@endif

			@if($key->KN > 0 )
			<td ><input type="double" name="KN" value="{{$key->KN}}" class="form-control text-success"></td>	
			@else
			<td ><input type="double" name="KN" value="{{$key->KN}}" class="form-control"></td>	
			@endif

			@if($key->CM > 0 )
			<td ><input type="double" name="CM" value="{{$key->CM}}" class="form-control text-success"></td>	
			@else
			<td ><input type="double" name="CM" value="{{$key->CM}}" class="form-control"></td>	
			@endif

			@if($key->CD > 0 )
			<td ><input type="double" name="CD" value="{{$key->CD}}" class="form-control text-success"></td>	
			@else
			<td ><input type="double" name="CD" value="{{$key->CD}}" class="form-control"></td>	
			@endif

			@if($key->TC > 0 )
			<td ><input type="double" name="TC" value="{{$key->TC}}" class="form-control text-success"></td>	
			@else
			<td ><input type="double" name="TC" value="{{$key->TC}}" class="form-control"></td>	
			@endif
			
			<td ><button class="btn btn-default editData" value="{{$key->id}}" >Chỉnh sửa</button>
				<button class="btn btn-danger deleteData" value="{{$key->id}}">XÓA</button>
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>
