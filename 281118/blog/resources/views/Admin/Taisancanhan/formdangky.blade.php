<div class="container-fluid" style="border: 1px solid black; background: #EEEEEE;">
	
		<h1>FORM ĐĂNG KÝ TÀI SẢN CÁ NHÂN</h1>
		
		<form action="{{route('dangkycn')}}" method="post" enctype="multipart/form-data">
	<fieldset>
					{{ csrf_field() }}
		<div class="form-group">
			<label for="">Tên thiết bị</label>
			<input type="text" name="Ten" class="form-control">
			<label for="Mota">Mô tả</label>
			<textarea name="Mota" class="form-control" rows="5"></textarea>
			<label for="dvt">Đơn vị tính</label>
			<input type="text" name="dvt" class="form-control">

			<label for="Ngaydangky">Ngày đăng ký</label>
			<input type="date" name="Ngaydangky" class="form-control">
			<label for="Hinh">Hình</label>
			<input type="file" name="Hinh">
			 <label for="Congty">Công ty</label>
			<select name="Congty" class="form-control" style="height: 35px">
		<option value="Viễn Đông">Viễn Đông</option>
		<option value="Hồn Việt">Hồn Việt</option>
		<option value="Toàn Lực">Toàn Lực</option>
	</select>
			<label for="Bophan">Bộ phận:</label>
		<select type="select" name="Bophan" onchange="getInformation(this)">
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
		<label for="NguoiphutrachBP">Chủ tài sản</label>
		<select type="select" name="Chutaisan" id="NguoiphutrachBP">

			
		</select>

		</div>
	</fieldset>
	<button class="btn btn-success float-right">Đăng ký</button>
		</form>
</div>