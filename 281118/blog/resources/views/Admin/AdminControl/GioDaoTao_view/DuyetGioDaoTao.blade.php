<div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" >BẢNG CHỞ DUYỆT</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
<table id="DuyetDT" class="table table-bordered">
	<?php $Categories = array('TL'=>'Tâm Lý','KN'=>'Kỹ Năng','KT'=>'Kiến Thức','CM'=>'Chuyên Môn','CĐ'=>'Cộng Đồng','TC'=>'Thể Chất'); ?>
<thead>

		<tr>
			<th>Mã Nhân Viên</th>
			<th>Họ Tên</th>
			<th>Tên Sự Kiện</th>
			<th>Phân Loại</th>
			<th>Ngày Tham Gia</th>
			<th>Số Giờ</th>
			<th>Phê Duyệt</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $key)
		<tr>
			<td>{{$key->Staff_ID}}</td>
			<td>{{$key->Full_name}}</td>
			<td>{{$key->Event_Name}}</td>
			<td>{{$Categories[$key->Categories]}}</td>			
			<td>{{date('d-m-Y',strtotime($key->Event_Date))}}</td>
			<td>{{$key->Hours}}</td>
			<td><button class="btn btn-success duyetdt" value="{{$key->Id}}">Duyệt</button>
				<button class="btn btn-danger huyduyet" value="{{$key->Id}}">Không duyệt(XÓA)</button>
			</td>
		</tr>
		@endforeach
	</tbody>
	</tbody>
</table>
<div id="divIntro" style="width:auto;display:none; height: auto;"></div>
      <div class="modal" id="myModal">
      	<div class="modal-content">
      		<span class="close" style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
        <h1>Comment phản hồi</h1>
        <textarea name="Comment"></textarea>
        <button class="btn btn-danger float-right" name="Phanhoi">Phản hồi</button>
        </div></div></div>