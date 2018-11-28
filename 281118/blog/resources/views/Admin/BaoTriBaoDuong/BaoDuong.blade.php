<?php $i=1;?>
<div class="container-fluid" id="showConfirm">  
   <div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" id="title">Bảo Dưỡng</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
          </div>    
  <table id="baoduong" class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Vật Tư</th>
        <th>Mã Thiết Bị</th>
        <th>Tên</th>
        <th>Người Phụ Trách</th>
        <th>Bộ Phận</th>
        <th>Vị Trí</th>
        <th>Thời Gian Bảo Dưỡng</th>
      </tr>
    </thead>
      <tbody>
        @foreach($data as $key)
        @if($key->thoigianbd < today())
        <tr style="color: red; font-weight: bold;">
          <td>{{$i++}}</td>
          <td>{{$key->MVT}}</td>
          <td data-action="showBDInfo" name="{{$key->MTB}}">{{$key->MTB}}</td>
          <td>{{$key->Ten}}</td>
          <td>{{$key->Nguoiphutrach}}</td>
          <td>{{$key->Bophan}}</td>
          <td>{{$key->Location}}</td>
          <td>{{$key->thoigianbd ? date('d-m-Y', strtotime($key->thoigianbd)) : ""}}</td>
        </tr>
        @elseif($key->thoigianbd < (today()->modify('+7 day')))
        <tr style="color: blue; font-weight: bold;">
          <td>{{$i++}}</td>
          <td>{{$key->MVT}}</td>
          <td data-action="showBDInfo" name="{{$key->MTB}}">{{$key->MTB}}</td>
          <td>{{$key->Ten}}</td>
          <td>{{$key->Nguoiphutrach}}</td>
          <td>{{$key->Bophan}}</td>
          <td>{{$key->Location}}</td>
          <td>{{$key->thoigianbd ? date('d-m-Y', strtotime($key->thoigianbd)) : ""}}</td>
        </tr>
        @else
        <tr>
          <td>{{$i++}}</td>
          <td>{{$key->MVT}}</td>
          <td>{{$key->MTB}}</td>
          <td>{{$key->Ten}}</td>
          <td>{{$key->Nguoiphutrach}}</td>
          <td>{{$key->Bophan}}</td>
          <td>{{$key->Location}}</td>
          <td>{{$key->thoigianbd ? date('d-m-Y', strtotime($key->thoigianbd)) : ""}}</td>
        </tr>
        @endif
        @endforeach
      </tbody>
  </table>
  </div>
</div>
<div id="baoDuongModel" class="modal" onclick="closeBaoDuong(this)">
    <div class="modal-content">
    <span class="" onclick="closeBD(this)"  style="font-weight: bold; font-size: 30px;cursor: pointer;">&times;</span>
        <h1>Bảo Dưỡng</h1>
        <!-- đang xem -->
        <form action="{{Route('updateBaoDuong')}}" method="post" enctype="multipart/form-data" id="form" autocomplete="on">
          <fieldset>
{{ csrf_field() }}
  
<!-- Form Name -->
<div class="form-group">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">   
      <!-- Mã vật tư -->
   <label for="MVT">Mã vật tư</label>
   <input type="text" name="MVT" class="form-control" required="" id="MVT" onkeyup="getMVT(this)"  pattern="[A-Za-z0-9]{10}" title="Nhập 10 kí tự " readonly="true">
    <div class="alert alert-warning" data-action="getMVT" style="display: none;">
  <strong><ul></ul></strong>
</div>
<!-- Mã thiết bị -->
  <label for="MTB">Mã thiết bị</label>
   <input type="text" name="MTB" class="form-control" required="" id="MTB" onkeyup="getMTB(this)"  pattern="[A-Za-z0-9]{10}" title="Nhập 10 kí tự " readonly="true">
    <div class="alert alert-warning" data-action="getMTB" style="display: none;">
  <strong><ul></ul></strong>
</div>

    <!-- Tên thiết bị -->
    <label for="Ten">Tên thiết bị</label>
   <input type="text" name="Ten" class="form-control" required="" onkeyup="Tenshow(this)" id="autocomplete" readonly="true">

   
   <label for="Nguoiphutrach">Người phụ trách:</label>
   <input type="text" name="Nguoiphutrach" class="form-control" required="" readonly="true">
   <label for="Bophan">Bộ phận:</label>
   <input type="text" name="Bophan" readonly="true">
   <label for="Vitri">Vị trí:</label>
   <input type="text" name="Vitri" readonly="true">
   <label for="Ngaybd">Thời gian bảo dưỡng (Tháng):</label>
   <input type="number" name="Ngaybd" required="" id="Ngaybd" class="form-control">
   <label for="Noidung">Nội Dung:</label>
   <textarea name="Noidung" required="" rows="5" cols="50" onchange=" id="Ngaybd" class="form-control"></textarea>
 </div> 
 <div class="col-md-3"></div>
</div>
   <button class="btn btn-success float-right"  data-button="ButtonNhap">Xác Nhận</button>    
</fieldset>
  </form>

      