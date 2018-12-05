<?php $i=1;?>
<head>  
  <link rel="stylesheet" type="text/css" href="{{asset('Admin/css/adminSuatAn.css')}}">
</head>
<div class="container" id="showConfirm" style="margin-top: 10px;">  
 <div class="panel panel-primary">
  <div class="panel-heading">
    <h3  class="panel-title" id="title">Suất Ăn</h3>
  </div> 
  <div>
    <h1 class="hTitle" id="hTitle"></h1>
    <!-- bắt đầu tạo lịch ở đây nè -->
    <div class="calendar">
    <table class="tada">
      <tr>
        <td>Hôm Nay</td>
        <td>Món Mặn:<input type="text" name="tMan" readonly="true"></td>
        <td>Món Chay:<input type="text" name="tChay" readonly="true"></td>
      </tr>
      <tr>
        <td>Ngày Mai</td>
        <td>Món Mặn:<input type="text" name="nMan" readonly="true"></td>
        <td>Món Chay:<input type="text" name="nChay" readonly="true"></td>
      </tr>
    </table>   
    </div> 
    <!-- tới đây là tạo lịch xong rồi nè -->
    <!-- chổ này dành cho nội bộ nè -->
    <div>
      <div class="noibo">
        <h1 class="hTitle">SUẤT ĂN CỦA PHÒNG</h1>
        <div id="noibo"></div>
      </div>
    </div>
    <!-- tới đây là kết thúc nè -->
  </div>
</div>
</div>