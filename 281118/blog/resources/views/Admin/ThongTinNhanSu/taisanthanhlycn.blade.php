<div class="panel panel-primary">
          <div class="panel-heading" >
          <h3  class="panel-title" id="title">DANH SÁCH TÀI SẢN CÁ NHÂN</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
    
           
          </div>
		<table id="tabletstlcn" class="display table  table-bordered" style="width:100%;">
			<thead>
		            <tr>
		                <th>Mã tài sản</th>
		                <th>Tên thiết bị</th>
		            	<th>Mô tả</th>
		                 <th>Giá đề xuất</th>
		                <th>Trạng thái</th>
		                <th>Thời hạn</th>
		          	 </tr>
        	</thead>
        	<tbody>
        			@foreach($data as $key)
			            <tr>
			                <td>{{$key->MTS}}</td>
			                <td>{{$key->Ten}}</td>
			                <td>{{$key->Mota}}</td>
			         
			                 <td>{{$key->Giadexuat}}</td>
			                   <td class="Trangthai">@if($key->Trangthai==0)Đang bán @elseif($key->Trangthai==1)Đã bán @else Hết hạn @endif</td>
			                     <td>{{$key->Thoihan ? date('d-m-Y',strtotime($key->Thoihan)) : ''}}</td>
			            </tr>
			        @endforeach
      	  </tbody>
      	  	<tfoot>
		            <tr>
		        		 <th>Mã tài sản</th>
		                <th>Tên thiết bị</th>
		            	<th>Mô tả</th>
		                 <th>Giá đề xuất</th>
		                <th>Trạng thái</th>
		                <th>Thời hạn</th>
		          	 </tr>
        	</tfoot>
        </table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.Trangthai').each(function(){
			console.log($(this).text());
			if($(this).text()=="Đang bán ")
				$(this).css('color','green');
			else if($(this).text()=="Đã bán ")
				$(this).css('color','blue');
			else
				$(this).css('color','red');
		});
	});
</script>