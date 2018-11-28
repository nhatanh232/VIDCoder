<?php $i = 1;?>
<div class="container-fluid">
	 <div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" id="title">Bảng tài sản cá nhân đang lưu trữ</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
	<table id="bangluutrucn" class="table table-bordered">

		<thead>
			
			<tr>
				<th>STT</th>
				<th>Tên thiết bị</th>
				<th>Mô tả</th>
				<th>Ngày đăng ký</th>
				<th>Chủ tài sản</th>
				<th>Bộ phận</th>
				<th>Công ty</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $key)
			<tr>
				<td>{{$i++}}</td>
				<td class="ShowImageTSCN" id="{{$key->id}}">{{$key->Ten}}</td>
				<td>{{$key->Mota}}</td>
				<td>{{$key->Ngaydangky ? date('d-m-Y', strtotime($key->Ngaydangky)) : ""}}</td>
				<td>{{$key->Chutaisan}}</td>
				<td>{{$key->Bophan}}</td>
				<td>{{$key->Congty}}</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<th>STT</th>
				<th>Tên thiết bị</th>
				<th>Mô tả</th>
				<th>Ngày đăng ký</th>
				<th>Chủ tài sản</th>
				<th>Bộ phận</th>
				<th>Công ty</th>
			</tr>
		</tfoot>
	</table>
</div>
  <div id="divIntro" style="width:auto;display:none; height: auto;"></div>