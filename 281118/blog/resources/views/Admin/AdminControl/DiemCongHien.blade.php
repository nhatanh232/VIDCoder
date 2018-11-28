<div class="container" style="border: 1px solid black; background: #EEEEEE;">
	<form action="{{Route('postDiemCongHien')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
	
		<div class="col-md-12">
			<h1 style="text-align: center; border-bottom: 1px solid black">ĐIỂM CỐNG HIẾN</h1>
		</div>	
		
		<label>Mã Nhân Viên: </label>
		<input type="text" name="Staff_ID" required="" />
		<br/>		
		<label>Họ Tên: </label>
		<input type="text" name="Fullname" readonly="true"/>
		<br/>
		<label>Điểm Cống Hiến Hiện tại: </label>
		<input type="number" name="Opening_Balance" readonly="true"/>
		<br/>
		<label>Điểm Cống Hiến cộng thêm: </label>
		<input type="number" name="Increase_Decrease"/>
		<br/>
		<label>Lý Do: </label>
		
		<select name='Reason'>
			<!-- <option value="1">Tăng định kì</option> -->
			<option value="2">Tăng theo quyết định</option>
		</select>
		<br/>
		<label>Quyết Định Số: </label>
		<input type="text" name="Decision_Number"/>
		<br/>
		<label>Ngày Quyết Định</label>
		<input type="date" name="Decision_Date"/>
		<br/>
		<button class="btn btn-primary float-right" style="margin-bottom: 10px;">Xác Nhận</button>
	</form>

</div>
<br/>
<div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" >LỊCH SỬ</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
<table id="formNhapCH" class="table table-bordered ">
	<thead>
		<tr>
			<th>Staff_ID</th>
			<th>Decision_Number</th>
			<th>Opening_Balance</th>
			<th>Increase_Decrease</th>
			<th>Closing_Balance</th>
			<th>Decision_Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach($detailCH as $key)
		<tr>
			<td>{{$key->Staff_ID}}</td>
			<td>{{$key->Decision_Number}}</td>
			<td>{{$key->Opening_Balance}}</td>
			<td>{{$key->Increase_Decrease}}</td>
			<td>{{$key->Closing_Balance}}</td>
			<td>{{date('d-m-Y',strtotime($key->Decision_Date))}}</td>
		</tr>
		@endforeach
	</tbody>
</table>