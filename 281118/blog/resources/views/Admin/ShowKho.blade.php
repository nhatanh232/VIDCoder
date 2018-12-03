<div class="container-fluid">

	 <div class="panel panel-primary">
          <div class="panel-heading" >
          <h3  class="panel-title" id="title">DANH SÁCH TÀI SẢN CÔNG TY</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
    
           
          </div>
		<table id="tablekho" class="display table  table-bordered" style="width:100%;">
			<thead>
		            <tr>
		            	<th>Chọn</th>
		                <th>Mã vật tư</th>
		               <!--  <th>Mã thiết bị</th> -->
		              <!--   <th>Ngày nhập</th>
		           
		                <th>Công ty</th> -->
		                <th>Tên</th>
		                
		          <!--       <th>Thông số</th> -->
		                 <th>Số lượng</th>
		                <th>Ghi chú </th>
		              
		          	 </tr>
		          	 <th></th>
		          	         <th>Mã vật tư</th>
		               <!--  <th>Mã thiết bị</th> -->
		              <!--   <th>Ngày nhập</th>
		           
		                <th>Công ty</th> -->
		                <th>Tên</th>
		                
		          <!--       <th>Thông số</th> -->
		                 <th>Số lượng</th>
		                <th>Ghi chú</th>
		              
        	</thead>
        	<tbody>
        			@foreach($kho as $key)
			            <tr>
			            	<td></td>
			                <td data-action="edit" class="showHinh">{{$key->MVT}}</td>
			     
			        
			                <td class="ShowImage" id="{{$key->MVT}}">{{$key->Ten}}</td>
			             
			            
			                <td>{{$key->Sl}}</td>
			                 <td>{{$key->Ghichu}}</td>
			         
			               
			            </tr>
			        @endforeach
      	  </tbody>
      	  	<tfoot>
		            <tr>
		            	<th>Chọn</th>
		                <th>Mã vật tư</th>
		              <!--   <th>Mã thiết bị</th> -->
		               <!--  <th>Ngày mua</th>
		                <th>Công ty</th> -->
		                <th>Tên</th>
		               <!--  <th>Thông số</th> -->
		                 <th>Số lượng</th>
		                <th>Ghi chú</th>
		               
		          	 </tr>
        	</tfoot>
        </table>
</div>
        	<h1 style="color: yellow">Chức năng</h1>
        	<div class="row">
        		<div class="col-md-2"><button class="btn btn-primary" onclick="ModalPopup(this)">Nhập kho</button></div>
        		<div class="col-md-2"><button class="btn btn-primary xuatkho">Xuất kho</button></div>
        		<div class="col-md-2"><form action="{{Route('ExportKho')}}" method="POST">{{ csrf_field() }}
<button class="btn btn-primary" type="submit">Xuất file Excel</button></form>
			</div>
				<div class="col-md-4">
					

						<form action="{{route('ExportPhieuXuat')}}" method="get" id="FormXuatKho">
								<button class="btn btn-primary" id="BtnXuat"> Phiếu xuất</button>
						<input type="text" name="Sophieu" placeholder="Nhập số phiếu xuất">
							
							
						
						</form>
					</div>
				</div>
        	</div>

</div>
</div>     


<!-- Nhập kho -->
<div id="myModal" class="modal" onclick="closeModal(this)">
	  <div class="modal-content">
    <span class="" onclick="closeBTN(this)"  style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
        <h1>Nhập kho</h1>

        <form action="{{Route('nhapkho')}}" method="post" enctype="multipart/form-data" id="form" autocomplete="on">
          <fieldset>
{{ csrf_field() }}
	
<!-- Form Name -->
<div class="form-group">
	<div class="row">
		<div class="col-md-6"  style="border-right:1px solid black; ">
	 <label for="Congty">Công ty</label>
	<select name="Congty" class="form-control" style="height: 35px">
		<option value="Viễn Đông">Viễn Đông</option>
		<option value="Hồn Việt">Hồn Việt</option>
		<option value="Toàn Lực">Toàn Lực</option>
			<option value="Cá nhân">Cá nhân</option>
	</select>
	 <label for="MVT">Mã vật tư</label>
	 <input type="text" name="MVT" placeholder="Mã vật tư:" class="form-control" required="" id="MVT" onkeyup="getMVT(this)"  pattern="[A-Za-z0-9]{10}" title="Nhập 10 kí tự ">
		<div class="alert alert-warning" data-action="getMVT" style="display: none;">
  <strong><ul></ul></strong>
</div>

	
	  <label for="Ten">Tên thiết bị</label>
	 <input type="text" name="Ten" placeholder="Tên thiết bị:" class="form-control" required="" onkeyup="Tenshow(this)" id="autocomplete" >

	 <label for="Thongso">Thông số kĩ thuật</label>
	 <textarea name='Thongso' class='form-control' rows="1" cols="50"></textarea>
	 <label for="dvt">Đơn vị tính</label>
	 <input type="text" name="dvt" placeholder="Đơn vị tính:" class="form-control" required="">
	 <label for="Hinh">Hình ảnh:</label>
	 <input type="file" name="Hinh" >
	   <label for="Hinh">Hình ảnh1:</label>
	 <input type="file" name="Hinh1" >
	  <label for="Hinh">Hình ảnh2:</label>
	 <input type="file" name="Hinh2" >
	  <label for="Hinh">Hình ảnh3:</label>
	 <input type="file" name="Hinh3" >
	 <label for="Ngaynhap">Ngày nhập:</label>
	 <input type="date" name="Ngaynhap" required="" onchange=" conditionNgayNhapNgayMua(this)" id="Ngaynhap" class="form-control">
	 <label for="Sl">Số lượng:</label>
	 <input type="number" name="Sl" required="" class="form-control">
	
 </div>	<!-- end col-md-4 -->
 	<div class="col-md-6"  style="border-right:1px solid black; ">
 		
 		<div class="form-group">
 			<label for="Sohopdong">Số hợp đồng</label>
 			<input type="text" name="Sohopdong" class="form-control" >
 			<label for="Nguoimua">Người mua</label>
 			<input type="text" name="Nguoimua" class="form-control" >
 			<label for="Ngaymua">Ngày mua</label>
 			<input type="date" name="Ngaymua" class="form-control"  id="Ngaymua" onchange=" conditionNgayMuaNgayNhap(this)">
 			<label for="Thoigianbh">Thời gian bảo hành (Tháng)</label>
 			<input type="number" name="Thoigianbh" class="form-control" >
 			<label for="Thoigiankh">Thời gian khấu hao (Tháng)</label>
 			<input type="number" name="Thoigiankh" class="form-control" >
 			<label for="Thoigiankh">Thời gian bão dưỡng định kì (Tháng)</label>
 			<input type="number" name="Thoigianbd" class="form-control" >
 			<label for="Thoigiankh">Ngày kiểm kê</label>
 			<input type="date" name="Ngaykiemke" class="form-control" >
 			<label for="Giatri">Giá trị</label>
            <input id="amount" name="Giatri" type="text" class="form-control" />
            <label for="Nhacungcap">Nhà cung cấp</label>
            <input  name="Nhacungcap" type="text" class="form-control" />
             <label for="Ghichu">Lưu ý của nhà cung cấp</label>
            <input  name="Luuy" type="text" class="form-control" />
            <label for="Ghichu">Ghi chú</label>
            <input  name="Ghichu" type="text" class="form-control" />

            <div id="img" style="margin-top: 10px; border: 1px solid black;width: 300px; height: 150px"></div>

 	</div>
 	</div> <!-- end Row -->
 <!-- 	<div class="col-md-4"></div> -->
</div>
 

<!-- Text input-->
	<!-- <h1>Điều chuyển tức thời</h1>
	<label for="Bophannhan">Bộ phận chuyển</label>
	<select type="select" name="Bophannhan" onchange="getInformation(this)">
		<option value="CSVC">Cơ sở vật chất</option>
		<option value="Thương mại">Thương mại</option>
		<option value="Lễ tân">Lễ tân</option>
		</select>
		<label for="NguoiphutrachBP">Người nhận phụ trách</label>
		<select type="select" name="NguoiphutrachBP" id="NguoiphutrachBP">

			
		</select>

		<label for="Slc" style="margin-left: 25px">Số lượng chuyển:</label>
	 <input type="number" name="Slc" required="" onkeyup="bangdieuchuyen(this)">
	 	<label for="MTBC" style="margin-left: 25px">Mã thiết bị chuyển:</label>
	 <input type="text" name="MTBC" required="" id="MTBC">
	 -->
	 	
		 <button class="btn btn-primary float-right ml-3" data-button="ButtonChinhsua" name="edit">Chỉnh sửa cập nhật</button>
	 <button class="btn btn-success float-right"  data-button="ButtonNhap">Nhập</button>
		
</fieldset>
       
    
  
 
        </form>
     
      </div></div>

  <!-- end nhập kho -->
  <!-- Xuất kho -->
      <div id="myModalXuatkho" class="modal" onclick="closeModalXuatkho(this)">
	  <div class="modal-content">
    <span class="" onclick="closeBTNXuatkho(this)"  style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
    <form action="{{Route('formXuatKhoV2')}}" method="post" >
        <h1>PHIẾU XUẤT KHO SỐ:<input type="text" name="PXK" style="border: none;color: red;"></h1>
        

        	
          <fieldset>
{{ csrf_field() }}

<!-- Form Name -->
<div class="form-group">

		<div class="row">
			<div class="col-md-12">
			<table id="formxk" class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>MÃ VẬT TƯ</th>
						<th>SỐ LƯỢNG</th>
						<th>NGÀY NHẬP</th>
					</tr>
				</thead>
				<tbody>
					<tr></tr>
				</tbody>
			</table>
			
			
		</div></div>
		
</div>

	 <label for="location">Vị trí</label>
	 <input type="text" name="location" class="form-control" id="autocompleteLC" onkeyup="LocationShow(this)">
	 <label for="location">Lý do xuất</label>
	 <input type="text" name="lydo" class="form-control" >
	<div class="alert alert-success" style="display: none;" data-action="hasMVT">
		<ul></ul>
	</div>
	 <label for='Ngaynhan'>Ngày nhận:</label>
	 <input type="date" name="Ngaynhan" class="form-control">
	<label for="Bophannhan">Bộ phận nhận</label>
	<select type="select" name="Bophannhan" onchange="getInformationV2(this)">
		<option value="">Bộ phận</option>
		<option value="CSVC">Cơ sở vật chất</option>
		<option value="Thương mại">Thương mại</option>
		<option value="Ban giám đốc">Ban giám đốc</option>
		<option value="Nhân sự hành chánh">Nhân sự hành chánh</option>
		<option value="Kế toán">Kế toán</option>
		<option value="R&D">R&D</option>
		<option value="Dự án cộng đồng">Dự án cộng đồng</option>

		<option value="Ban dự án">Ban dự án</option>
		<option value="Ban trợ lý">Ban trợ lý</option>
		
		</select>


		
		<label for="NguoiphutrachBP">Người nhận phụ trách:</label>
		<!-- <select type="select" name="NguoiphutrachBP" id="NguoiphutrachBP">

			
		</select> -->
		<input type="text" name="NguoiphutrachBP">
		<select type="select"  id="NguoiphutrachBPV2" > 
				<!-- 	<input type="text" name="NguoiphutrachBP" required=""> -->
			
		</select>

	 	 <button class="btn btn-primary" style="margin-top: 15px; float: right;" data-button='ButtonXuat'>Xuất</button>
	 	 
</div>
 

<!-- Text input-->
	
	
		
</fieldset>
         
    
  
 
        </form>
     
      </div></div>

<!-- chỉnh sửa -->

<!-- end chỉnh sửa -->
      <div id="divIntro" style="width:auto;display:none; height: auto;"></div>
      <div class="modal" id="myModalFormXuat">
      	<div class="modal-content">
      		
      	</div>
      </div>
