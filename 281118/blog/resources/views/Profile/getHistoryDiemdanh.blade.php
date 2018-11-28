<?php $i = 1 ; ?>
<div class="panel panel-primary">
          <div class="panel-heading">
          	<div class="row">
          	<h5 class="col-md-2 float-left">Chi tiết điểm tham gia đào tạo</h5>
          	<span class="btn close btn-default">close</span>
          	</div>
          </div>
<table id="HistoyDiemdanhtable" >
	<thead>
		<th>STT</th>
		<th>Sự kiện</th>
		<th>Phân loại</th>
		<th>Ngày tham gia</th>
		<th>Số giờ</th>
	</thead>
	<tbody>
		@foreach($data as $key)
		<tr>
			<td>{{$i++}}</td>
			<td>{{$key->Event_Name}}</td>
			<td>{{$key->Categories}}</td>
			<td>{{date('d-m-Y',strtotime($key->Event_Date))}}</td>
			<td>{{$key->Hours}}</td>
		</tr>
		@endforeach
	</tbody>
</table>