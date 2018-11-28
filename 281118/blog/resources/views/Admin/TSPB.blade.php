<div class="container-fluid">
	<h1>Tài sản phòng ban</h1>
	 <div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" id="title">DANH SÁCH TÀI SẢN CÔNG TY</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>

          <form action="{{route('Dieuchuyensll')}}" method="POST"  id="dieuchuyentheocheckbox">
          	{{ csrf_field() }}
          	<input type="date" name="Ngaydieuchuyen" id="Ngaydieuchuyenform" hidden>
          	<input type="Text" name="NguoiphutrachBP2" id="NguoiphutrachBPform" hidden >
          	<input type="Text" name="Bophannhan" id="Bophannhanform" hidden>
          		<input type="Text" name="location2" id="location2" hidden>
          		<button type="submit" name="thuhoi" id="btnthuhoi" hidden></button>

	<table id="taisanphongban" class="table  table-bordered" >
		<thead>
			<tr>
						
				 		<th>MVT</th>
		               
		             <!--    <th>Công ty</th>
		                <th>Ngày nhận</th>  -->   
		                <th>Tên</th>
		                 <th style="width: auto;">Số lượng</th>	
		                         
		                <th>Bộ phận</th>
		                 <th>Vị trí</th>
		            
			</tr>
				<tr>
						
				 		<th>MVT</th>
		                
		             <!--    <th>Công ty</th>
		                <th>Ngày nhận</th>  -->   
		                <th>Tên</th>	
		                <th style="width: auto;">Số lượng</th>	
		                         
		                <th>Bộ phận</th>
		                 <th>Vị trí</th>
		                 
			</tr>
		</thead>
		<tbody>
        			@foreach($data as $key)
			            <tr>
			            	
			                <td class="showHinhPB" id="{{$key->MVT}}">{{$key->MVT}}</td>
			              
			          
			                <td class="ShowImageTSPB" id="{{$key->MVT}}" data-his="{{$key->Bophan}}" data-loc="{{$key->Location}}">{{$key->Ten}}</td>
			             	<td >{{$key->Sl}}</td>
			               
			                 <td>{{$key->Bophan}}</td>
			                  <td>{{$key->Location}}</td>
			                 
			            </tr>
			        @endforeach
      	  </tbody>
      	<!--   <tfoot>
			<tr>
						
				 		<th>MVT</th>
		                <th>MTB</th>
		                <th>Công ty</th>
		                <th>Ngày nhận</th>    
		                <th>Tên</th>	                
		              	 
		                <th>Người phụ trách</th>
		                  <th>Bộ phận</th>
		                     <th>Vị trí</th>
		                     <th>Tình trạng</th>
		                     <th>Người thực hiện</th>
			</tr>
		</tfoot> -->
	</table>
	</form>
</div>
<div class="container-fluid">
	<h1>Chức năng</h1>
	<div class="row">
	
	   <div class="col-md-2"><button class="btn btn-primary" onclick="ModalImport(this)">Import File</button></div>
	    <div class="col-md-2"><button class="btn btn-primary" onclick="ModalExport(this)">Export File</button></div>

	</div>

</div>
<!-- Modal Import -->
<div id="myModalImport" class="modal" onclick="closeModalImport(this)">
	 <div class="modal-content">
	 	 <span class="" onclick="closeBTNImport(this)" style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
        <h1>Import file</h1>
        		<form action="postImportPB" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="Import">File excel Theo form Tài sản phòng ban</label>
			<input type="file" name="file" >
		</div>
		<button class="btn btn-success">Import</button>
	</form>
    </div></div>
<!-- end -->
<!-- Modal Export -->
<div id="myModalExport" class="modal" onclick="closeModalExport(this)">
	 <div class="modal-content">
	 	 <span class="" onclick="closeBTNExport(this)" style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
        <h1>Export file</h1>
        		<form action="postExportPB" method="POST" >
		{{ csrf_field() }}
		<div class="form-group">
			<h3>Điều kiện xuất</h3>
				<label>Ngày:</label>
				<input type="date" name="Ngay" class="form-control">
				<label>Phòng ban</label>
	<select type="select" name="Bophan" class="form-control" style="height: 100%;">
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
		<option value="Procie">Procie</option>
		</select>
				<label>Mã vật tư</label>
				<input type="Text" name="MVT" class="form-control">
				<label id="demo">Vị trí</label>
				
		</div>
		<button class="btn btn-success">Export</button>
	</form>
    </div></div>
<!-- end -->

<div id="myModalNK" class="modal" onclick="closeModalNK(this)">
	  <div class="modal-content">
    <span class="" onclick="closeBTNNK(this)" style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
        <h1>Nhập kho</h1>
        <form action="{{Route('Thuhoi')}}" method="post" >
          <fieldset>
{{ csrf_field() }}

<!-- Form Name -->
<div class="form-group">
		<label for="MVT">Mã vật tư:</label>
		<input type="Text" name="MVT" onkeyup="Thuhoi(this)" class="form-control">
		<label for="MTB" >Mã thiết bị:</label>
		<input type="Text" name="MTB" class="form-control">
		<label for="Ngaythuhoi">Ngày nhập kho</label>
		<input type="date" name="Ngaythuhoi" class="form-control">
	 	
	 	
</div>
 

<!-- Text input-->
	
	
		 <button class="btn btn-primary" style="padding-top: 15px; float: right;">Nhập kho</button>
</fieldset>
         
    
  
 
        </form>
     
      </div></div>

      <div id="myModalDC" class="modal" onclick="closeModalDC(this)">
	  <div class="modal-content">
    <span class="" onclick="closeBTNDC(this)" style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
        <h1>Điều chuyển</h1>
        <form action="{{Route('Dieuchuyen')}}" method="post">
          <fieldset>
{{ csrf_field() }}

<!-- Form Name -->
<div class="form-group">
		<label for="MVT">Mã vật tư:</label>
		<input type="Text" name="MVT"  class="form-control" >
		<label for="MTB" >Mã thiết bị:</label>
		<input type="Text" name="MTB" class="form-control">
		<label for="Ngaythuhoi">Ngày chuyển</label>
		<input type="date" name="Ngaychuyen" class="form-control">
	 	<label for="Bophannhan">Bộ phận chuyển</label>
	<select type="select" name="Bophannhan" onchange="getInformation(this)">
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
		<label for="NguoiphutrachBP">Người nhận phụ trách</label>
		<select type="select" name="NguoiphutrachBP" id="NguoiphutrachBP">

			
		</select>
	 	
</div>
 

<!-- Text input-->
	
	
		 <button class="btn btn-primary" style="padding-top: 15px; float: right;">Điều chuyển</button>
</fieldset>
         
    
  
 
        </form>
     
      </div></div>



         <div id="myModalDCSLL" class="modal" onclick="closeModalDCSLL(this)">
         <div class="modal-content">
    <span class="" onclick="closeBTNDCSLL(this)" style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
        <h1>Điều chuyển theo checkbox</h1>

<div class="form-group">
		<label for="Ngaydieuchuyen">Ngày chuyển</label>
		<input type="date" name="Ngaydieuchuyen" class="form-control" id="Ngaydieuchuyen">
		<label for="location">Vị trí</label>
		<input type="Text" name="location" class="form-control" onkeyup="locationTSPB(this)">
	 	<label for="Bophannhan">Bộ phận chuyển</label>
	<select type="select" name="Bophannhan" onchange="getInformation2(this)" id="Bophannhan">
		<option value="">Bộ phận</option>
		<option value="CSVC">Cơ sở vật chất</option>
		<option value="Thương mại">Thương mại</option>
		<option value="Ban giám đốc">Ban giám đốc</option>
		<option value="Nhân sự hành chánh">Nhân sự hành chánh</option>
		<option value="Kế toán">Kế toán</option>
		<option value="Hồn Việt">Hồn Việt</option>
		<option value="Dự án cộng đồng">Dự án cộng đồng</option>

		<option value="Ban dự án">Ban dự án</option>
		<option value="Ban trợ lý">Ban trợ lý</option>
		<option value="NS-HC Toàn Lực">NS-HC Toàn Lực</option>
		<option value="Kế Toán Toàn Lực">Kế Toán Toàn Lực</option>
		<option value="Nhập Khẩu Toàn Lực">Nhập Khẩu Toàn Lực</option>
		<option value="Kinh Doanh Toàn Lực">Kinh Doanh Toàn Lực</option>
		<option value="Procie">Procie</option>
		</select>
		<label for="NguoiphutrachBP">Người nhận phụ trách</label>
		<select type="select" name="NguoiphutrachBP" id="NguoiphutrachBP2">
			
			
		</select>
	 	
</div>

		 <button class="btn btn-primary" style="padding-top: 15px; float: right;" onclick="document.getElementById('dieuchuyentheocheckbox').submit();">Điều chuyển</button>
  
      </div></div>

      
      <div id="divIntro" style="width:auto;display:none;"></div>

      <div id="formedit" class="form-group" style="width:auto;display:none;background-image: url('../../layouts/images/hinhnen2.jpg');
       background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 350px">
    <button type="button" class="btn btn-primary " aria-label="Close" onclick="clickClose(this)">
  <span aria-hidden="true" >&times;</span>
</button>
<input type="Text" name="idCS" hidden>
<p><label for="location">Vị trí</label>
		<input type="Text" name="locationCS"></p>
      		<p><label for="Ngay">Ngày Nhận</label>
      		<input type="date" name="NgaynhanCS">
      		</p>
      		
	 	<label for="Bophannhan">Bộ phận chuyển</label>
	<select type="select" name="BophannhanCS" onchange="getInformation3(this)" id="Bophannhan">
		<option value="">Bộ phận</option>
		<option value="CSVC">Cơ sở vật chất</option>
		<option value="Thương mại">Thương mại</option>
		<option value="Ban giám đốc">Ban giám đốc</option>
		<option value="Nhân sự hành chánh">Nhân sự hành chánh</option>
		<option value="Kế toán">Kế toán</option>
		<option value="Hồn Việt">Hồn Việt</option>
		<option value="Dự án cộng đồng">Dự án cộng đồng</option>

		<option value="Ban dự án">Ban dự án</option>
		<option value="Ban trợ lý">Ban trợ lý</option>
		<option value="NS-HC Toàn Lực">NS-HC Toàn Lực</option>
		<option value="Kế Toán Toàn Lực">Kế Toán Toàn Lực</option>
		<option value="Nhập Khẩu Toàn Lực">Nhập Khẩu Toàn Lực</option>
		<option value="Kinh Doanh Toàn Lực">Kinh Doanh Toàn Lực</option>
		<option value="Procie">Procie</option>
		</select>
			<p><label for="NguoiphutrachBP">Người nhận phụ trách</label>
	<select type="select" name="NguoiphutrachBP" id="NguoiphutrachBP3">
			
			
		</select></p>
		<button class="btn btn-success float-right" name="editTSPB" onclick="Chinhsua()">Edit</button>
      </div>
