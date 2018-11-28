<?php $i=1;?>
<div class="container-fluid" id="showConfirm">  
   <div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" id="title">Bảo Dưỡng</h3>
          </div>    
  <table id="lichsu" class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Vật Tư</th>
        <th>Mã Thiết Bị</th>
        <th>Tên</th>
        <th>Người Thực Hiện</th>
        <th>Ngày Thực Hiện</th>
        <th>Chi Phí Phát Sinh</th>
        <th>Loại</th>
        <th>Nội Dung</th>
      </tr>
    </thead>
      <tbody>
        @foreach($data as $key)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$key->MVT}}</td>
          <td>{{$key->MTB}}</td>
          <td>{{$key->Ten}}</td>
          <td>{{$key->Nguoibd}}</td>
          <td>{{$key->Ngaythuchien ? date('d-m-Y', strtotime($key->Ngaythuchien)) : ""}}</td>
          <td>{{$key->chiphi}}</td>
          <td>{{$key->Phanloai}}</td>
          <td>{{$key->Noidung}}</td>
        </tr>        
        @endforeach
      </tbody>
  </table>
  </div>
</div>