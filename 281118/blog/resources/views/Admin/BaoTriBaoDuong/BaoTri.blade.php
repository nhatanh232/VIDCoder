<div style="border: 1px solid black; background: #EEEEEE;">
	<div class="container">
		<h1 style="text-align: center; color: red;">PHIẾU BẢO TRÌ</h1>
	</div>
	<div>
		<form action="{{Route('updateBaoTri')}}" method="post" enctype="multipart/form-data" id="form" autocomplete="on">
          <fieldset>
{{ csrf_field() }}
  
<!-- Form Name -->
<div class="form-group">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">    
<!-- Mã thiết bị -->
  <label for="MTB">Mã thiết bị</label>
   <input type="text" name="MTB" class="form-control" required="" id="MTB" class="MTB" pattern="[A-Za-z0-9]{10}" title="Nhập 10 kí tự "> 

<!-- Mã vật tư -->
   <label for="MVT">Mã vật tư</label>
   <input type="text" name="MVT" class="form-control" required="" id="MVT" pattern="[A-Za-z0-9]{10}" title="Nhập 10 kí tự " readonly="true">
    
    <!-- Tên thiết bị -->
    <label for="Ten">Tên thiết bị</label>
   <input type="text" name="Ten" class="form-control" required="" id="autocomplete" readonly="true">

   
   <label for="Nguoiphutrach">Người phụ trách:</label>
   <input type="text" name="Nguoiphutrach" class="form-control" required="" readonly="true">
   <label for="Bophan">Bộ phận:</label>
   <input type="text" name="Bophan" readonly="true">
   <label for="Vitri">Vị trí:</label>
   <input type="text" name="Vitri" readonly="true">
   <label for="Ngaybd">Thời gian bảo hành:</label>
   <input type="date" name="tgbh" required="" id="tgbh" class="form-control" readonly="">
   <label>Chi phí phát sinh: </label>
   <input type="number" name="Chiphi" required="" id="chiphi" class="form-control">
   <label for="Noidung">Nội Dung:</label>
   <textarea name="Noidung" required="" rows="5" cols="50" onchange=" id="Ngaybd" class="form-control"></textarea>
 </div> 
 <div class="col-md-3"></div>
</div>
   <button class="btn btn-success float-right" style="margin: 5px;"  data-button="ButtonNhap">Xác Nhận</button>    
</fieldset>
  </form>
	</div>
	<script type="text/javascript">
		getDataBaoTri();
	</script>
</div>