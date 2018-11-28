<div class="panel panel-primary">
          <div class="panel-heading">
            <h3  class="panel-title" >LỊCH SỬ</h3>
     
          </div>    
		<table id="lichsu2" class="display table  table-bordered" style="width:100%;">
			<thead>
		            <tr>
		            	<th>Lần giao dịch</th>
		            	 
		            	  <th>Mã vật tư</th>
		            	  <th>Mã thiết bị</th>
		            
		                <th>Bộ phận nhận</th>
		                <th>Ngày nhận</th>
		                <th>Ngày trả</th>
		                <th>Người nhận</th>
		                <th>Vị trí</th>
		         		  <th>Tình trạng</th>
		                <th>Người thực hiện</th>
		                
		          	 </tr>
        	</thead>
        	<tbody>
        		<?php $i = 1; $y = 0;?>
        		
        		@foreach($his as $key)

        		<tr>
        		<td>{{$i++}}</td>
    			<td>{{$key->MVT}}</td>
    			<td>{{$key->MTB}}</td>
    			

    			<td>{{$key->History}}</td>
    			<td>{{$key->Ngaychuyen ? date('d-m-Y', strtotime($key->Ngaychuyen)) : ""}}</td>
    			
    			<td>{{$i <= sizeof($his) ? date('d-m-Y',strtotime($his[++$y]->Ngaychuyen)) : ""}}</td>
    			<td>{{$key->Nguoiphutrach}}</td>
    			<td>{{$key->Location}}</td>
    			<td>{{($key->Trangthai)==0 ? 'Xuất kho' : "Điều chuyển"}}</td>
    			<td>{{$key->Nguoithuchien}}</td>
        		</tr>
        		@endforeach
	
	
		
      	  </tbody>
      	  	<tfoot>
		            <tr>
		            	<th>Lần giao dịch</th>
		            	 
		            	  <th>Mã vật tư</th>
		            	  <th>Mã thiết bị</th>
		            	
		                <th>Bộ phận nhận</th>
		                <th>Ngày nhận</th>
		                <th>Ngày trả</th>
		                <th>Người nhận</th>
		                <th>Vị trí</th>
		                  <th>Tình trạng</th>
		                <th>Người thực hiện</th>
		                 
		          	 </tr>
        	</tfoot>
        </table>

<script type="text/javascript">
	$('#lichsu2').DataTable({});
	
</script>



