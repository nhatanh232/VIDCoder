<?php $i = 1 ; 
$lydo=array('0'=>'Bắt đầu làm','1'=>'Tăng định kì','2'=>'Tăng theo quyết định')?>

	 <div class="panel panel-primary">
          <div class="panel-heading">
          	<div class="row">
          	<h5 class="col-md-2 float-left">Chi tiết điểm cống hiến</h5>
          	<span class="btn close btn-default">close</span>
          	</div>
          </div>
<table id="HistoryCHtable"  class="table table-bordered">
	<thead>
		<th>STT</th>
		<th>Opening_Balance</th>
		<th>Increase_Decrease</th>
		<th>Closing_Balance</th>
		<th>Reason</th>
		<th>Decision_Date</th>
		<th>Decision_Number</th>
	</thead>
	<tbody>
		@foreach($data as $key)
		<tr>
			<td>{{$i++}}</td>
			<td>{{$key->Opening_Balance}}</td>
			<td>{{$key->Increase_Decrease}}</td>
			<td>{{$key->Closing_Balance}}</td>
			<td>{{$lydo[$key->Reason]}}</td>
			<td>{{date('d-m-Y',strtotime($key->Decision_Date))}}</td>
			<td>{{$key->Decision_Number}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

