
<?php $trangthai = array("0"=>"Đã nghĩ","1"=>"Đang làm việc"); ?>
 
	<!-- endautocomplete -->
	<!-- datatables -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<!-- end -->
	<div>
		<h1 class="title">THÔNG TIN NHÂN VIÊN</h1>			
	</div>
	<div class="container">
		<div class="image">
			<img src="{{asset('layouts/images/Profile/profile.jpg')}}">
			<input type="text" name="Name" value="{{$data->Full_name}}" readonly="true">
		</div>
		<div class="info">
			<div class="user-info">
				<label>Mã Nhân Viên:</label>
				<input type="text" name="StaffID" value="{{$data->Staff_ID}}" readonly="true">
				<br/>
				<label>DOB:</label>
				<input type="date" name="DOB" value="{{date('Y-m-d', strtotime($data->DOB))}}" readonly="true">
				<br/>
				<label>Ngày Làm Việc:</label>
				<input type="date" name="Start_WK_Date" value="{{date('Y-m-d', strtotime($data->Start_work))}}" readonly="true">
				<br/>
				<label>Ngày Kết Thúc:</label>
				<label>{{$data->End_work}}</label>
				<br/>
				<label>Công Ty:</label>
				<input type="text" name="Company" value="{{$data->Company}}" readonly="true">
				<br/>
				<label>Trạng Thái Làm Việc:</label>
				<input type="text" name="Working_Status" value="{{$trangthai[$data->Status_WK]}}" readonly="true">
				<!--  -->
				<hr/>
				<p>THÔNG TIN CÁ NHÂN</p>
				<label>Nơi Sinh:</label>
				<input type="text" name="Noisinh" value="{{$data->Birthplace}}" readonly="true">
				<br/>
				<label>Chổ Ở Hiện Tại:</label>
				<h6>{{$data->Current_Address}}</h6>
				<br/>
				
				<div class="row">
				<label class="col-md-3">Điểm Cống Hiến:</label>
				<div class="col-md-1"><input type="number" name="Point" value="{{$data->Contribute_point}}" readonly="true" style="font-weight: bold;">
				</div>
				<div class="col-md-4">Điểm</div>	
				<div class="col-md-4"><a href="" id="HistoryCH">Xem lịch sử</a></div>
				</div>
				<div id="tableHistoryCH"></div>
				<br/>
				<div class="row">
				<label class="col-md-3">Điểm Đào Tạo:</label>
				<div class="col-md-1">
					@if(!empty($diemdanh))<input type="number" name="Diemdanh" value="{{$diemdanh[0]->point}}" readonly="true" style="font-weight: bold;">@endif
				</div>
				<div class="col-md-4">Giờ</div>	
				<div class="col-md-4"><a href="" id="HistoryDiemdanh">Xem lịch sử</a></div>
				</div>
				<div id="tableHistoryDiemdanh"></div>
				
			</div>

		</div>

	</div>



