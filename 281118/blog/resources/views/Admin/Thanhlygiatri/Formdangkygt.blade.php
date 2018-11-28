<div class="container-fluid" style="border: 1px solid black; background: #EEEEEE;">
	<form action="{{route('postForm')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
	<div class="row"><div class="col-md-12"><h1 style="text-align: center; border-bottom: 1px solid black">PHIẾU TIẾP NHẬN </h1></div></div>
	<div class="form-group">	
		<br>
	<div class="col-md-6" style="border-right: 1px solid black;">
			<h3>Bên giao</h3>
		<div class="row">
			<div class="col-md-12"><label for="Bophan">Bộ phận:</label>
			
		<select type="select" name="Bophan" onchange="getInformation(this)" style="height: auto;">
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
	</div>
		</div>
		<div class="row">
			<div class="col-md-12"><label>Người bàn giao:</label>
				<select type="select" name="Chutaisan" id="NguoiphutrachBP">

			
				</select>
			</div>
		
		</div>
		<div class="row">
			<div class="col-md-12"><label>Mã nhân viên:</label>
				<input type="text" name="Manv">
			</div>
		
		</div>
		<div class="row">
			<div class="col-md-12"><label>Thời gian gửi tới ngày:</label>
				<input type="date" name="Thoihan">
			</div>
			
		</div>

		<div class="row">
			<div class="col-md-12"><label>SĐT người gửi:</label>
				<input type="text" name="Sdtg" placeholder="">
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12"><label>Giá kì vọng:</label>
				<input type="text" name="Giakivong" placeholder="" class="amount"> (VNĐ)
			</div>
			
		</div>
		
		</div><!-- end ben Giao -->
		<!-- Bên nhận -->
		<div class="col-md-6" >
			<h3>Bên nhận</h3>
			<div class="row">
				<div class="col-md-6"><label>Người nhận: {{Auth::user()->name}}</label></div>
				<div class="col-md-6"><label>Bộ phận nhận: CSVC</label></div>
			</div>
			<div class="row">
				<div class="col-md-12"><label>Ngày tiếp nhận:</label>
					<input type="date" name="Ngaytiepnhan">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12"><label>SĐT người nhận:</label>
				<input type="text" name="Sdtn">
			</div>

			</div>
			<div class="row">
				<div class="col-md-12"><label>Đánh giá tình trạng:</label>
				<input type="text" name="Tinhtrangdanhgia">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12"><label>Các chứng từ liên quan:</label>
				<input type="text" name="Chungtu">
				</div>
			</div>
			<div class="row">
			<div class="col-md-12"><label>Định giá:</label>
				<input type="text" name="Dinhgia" placeholder="" class="amount"> (VNĐ)
			</div>
			
		</div>
		</div>
		<!-- end bên nhận -->

		<div class="col-md-12">
			<div class="row">
			<div class="col-md-12">
				<br>
				<br>
				<label for="Tentaisan">Tên tài sản:</label>
				<input type="text" name="Tentaisan" class="form-control">
			</div>
			<div class="col-md-12">
				<label for="Tentaisan">Giới thiệu sản phẩm:</label>
				<textarea class="form-control" rows="3" name="Mota"></textarea>
			</div>
			<div class="col-md-12">
				<label >Hình ảnh:</label>
				<input type="file" name="Hinh">
			</div>
			<div class="col-md-12">
				<label>Hình ảnh1:</label>
				<input type="file" name="Hinh1">
			</div>
			<div class="col-md-12">
				<label >Hình ảnh2:</label>
				<input type="file" name="Hinh2">
			</div>
			<div class="col-md-12">
				<label>Hình ảnh3:</label>
				<input type="file" name="Hinh3">
			</div>
		</div>
		</div>
		<button class="btn btn-success float-right">Nhập</button>
	</div>	

</form>
</div>
<script type="text/javascript">
	
</script>