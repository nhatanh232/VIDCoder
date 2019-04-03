
	<div class="content-body" style="border: 1px solid black; background: white;
	box-shadow: 0 2px 1px rgba(0, 0, 0, 0.05);
	">
	
	
		<div class="col-md-12 border-bottom " >
			<h1 >GHI NHẬN THAM GIA HOẠT ĐỘNG</h1>
		</div>	
		<br>
		<div class="clearfix"></div>
		<div class="row pt-3">
		<label for="Staff_ID" class="col-md-2 text-right">Mã Nhân Viên</label>
		<input type="text" name="Staff_ID" required=""  class="form-control col-md-2" placeholder="Mã nhân viên" />
		</div>
		<br/>	

		<div class="row">
		<label class="col-md-2 text-right">Họ và tên</label>
		<input type="text" name="Full_name" required="" autocomplete="on" onkeyup="getDataDiemDanh_Ten(this)"  class="form-control col-md-2" placeholder="Họ tên nhân viên" />
		</div>
		<br/>
		<div class="row">
		<label class="col-md-2 text-right">Mã hoạt động</label>
		<input type="text" name="Mahoatdong" required="" class="form-control col-md-2" placeholder="Mã hoạt động" />
		</div>
		<br/>	
		<div class="row">
		<label class="col-md-2 text-right">Tên hoạt động</label>
		<input type="text" name="Event_Name" required="" autocomplete="on" onkeyup="getMahoatdong_Ten(this)" class="form-control col-md-2" placeholder="Tên hoạt động" />
		</div>
		<br/>	
		<div class="row">
		<label class="col-md-2 text-right">Ngày Tham Gia: </label>
		<input type="date" name="Event_Date" required=""  class="col-md-2 form-control " />
		</div>
		<br/>
		<div class="row " >
		<label class="col-md-3 text-right"><h2>Số giờ theo phân loại:</h2> </label>
		</div>			
		<br/>
		<div class="row col-md-12">
		<div class="col-md-2">
			<label class="col-md-12">Tâm lý</label>
			<input type="double" name="TL" class="col-md-12 form-control " value="0">
		</div>
		<div class="col-md-2">
			<label class="col-md-12">Kiến thức</label>
			<input type="double" name="KT" class="col-md-12 form-control " value="0">
		</div>
		<div class="col-md-2">
			<label class="col-md-12">Kỹ năng</label>
			<input type="double" name="KN" class="col-md-12 form-control " value="0">
		</div>
		<div class="col-md-2">
			<label class="col-md-12">Nghệ thuật</label>
			<input type="double" name="NT" class="col-md-12 form-control" value="0">
		</div>
		<div class="col-md-2">
			<label class="col-md-12">Cộng đông</label>
			<input type="double" name="CD" class="col-md-12 form-control " value="0">
		</div><div class="col-md-2">
			<label class="col-md-12">Thể chất</label>
			<input type="double" name="TC" class="col-md-12 form-control " value="0">
		</div>

		</div>
		<br/>
		<div class="clearfix"></div>
		<div class="col-md-12 pb-2 pt-4">
		<button class="btn btn-primary float-right " id="FormNhapLieu">Xác Nhận</button>
		</div>
		<div class="clearfix"></div>

</div>

<br/>

<div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title">LỊCH SỬ ĐIỂM DANH <span>- (</span><span><a href="" class="panel-title bold">Hôm nay</a></span>
            	/ <span><a href="" class="panel-title">Tất cả)</a></span>
            </h3>
      
          </div>
<div id="show-table">
<table id="formNhapCH" class="table table-bordered panel">
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
</div>
</div>
</div>
<div id="divIntro" style="width:auto;display:none; height: auto;"></div>
      <div class="modal" id="myModalFormXuat">
      	<div class="modal-content">
      		
      	</div>
      </div>
