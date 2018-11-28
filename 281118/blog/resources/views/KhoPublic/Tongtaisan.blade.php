@extends('Admin.Thanhlygiatri.kethuahome')
@section('body')

	
	<script src="{{asset('Admin/js/modernizr-custom.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- autocomplete -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- endautocomplete -->
	<!-- datatables -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<!-- end -->

	<!-- bootstrap -->

<!-- Latest compiled and minified CSS -->


<!-- Optional theme -->


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- end -->

	<!-- script for button made by me: -->
	
	<script type="text/javascript" src="{{asset('Admin/js/Module.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/information.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/Taisantlcn.js')}}"></script>
	<!-- end -->
<br class="clearfix"/>



<div class="container">
	<h1></h1>
	 <div class="panel panel-primary">
          <div class="panel-heading" >
          <h3  class="panel-title" id="title">DANH SÁCH TÀI SẢN CÔNG TY</h3>
            <!-- <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
              <i class="glyphicon glyphicon-filter"></i>
               </span>
            </div> --> 
    
           
          </div>
		<table id="tabletong" class="display table-bordered" style="width:100%;">
			<thead>
				 <tr>
		          	         <th>Mã vật tư</th>
		               <!--  <th>Mã thiết bị</th> -->
		              <!--   <th>Ngày nhập</th>
		           
		                <th>Công ty</th> -->
		                <th>Tên thiết bị</th>
		                
		          <!--       <th>Thông số</th> -->
		                 <th>Số lượng</th>
		                 <th>Bộ phận</th>
		                 <th>Vị trí</th>
		                <th>Công ty</th>
		              </tr>
		           <tr>
		          	         <th>Mã vật tư</th>
		               <!--  <th>Mã thiết bị</th> -->
		              <!--   <th>Ngày nhập</th>
		           
		                <th>Công ty</th> -->
		                <th>Tên thiết bị</th>
		                
		          <!--       <th>Thông số</th> -->
		                 <th>Số lượng</th>
		                 <th>Bộ phận</th>
		                 <th>Vị trí</th>
		                <th>Công ty</th>
		              </tr>
        	</thead>
        	<tbody>
        			@foreach($data1 as $key)
			            <tr>
			                <td data-action="edit" class="showHinh">{{$key->MVT}}</td>
			     
			        
			                <td class="ShowImage" id="{{$key->MVT}}">{{$key->Ten}}</td>
			             
			            
			                <td>{{$key->Sl}}</td>
						  <td>{{$key->Bophan}}</td>
						  <td>{{$key->Location}}</td>
			                 <td>{{$key->Congty}}</td>
			         
			               
			            </tr>
			        @endforeach
			     
      	  </tbody>
      	  	<tfoot>
		            <tr>
		                <th>Mã vật tư</th>
		              <!--   <th>Mã thiết bị</th> -->
		               <!--  <th>Ngày mua</th>
		                <th>Công ty</th> -->
		                <th>Tên thiết bị</th>
		               <!--  <th>Thông số</th> -->
		                 <th>Số lượng</th>
		                 <th>Bộ phận</th>
		                  <th>Vị trí</th>
		                <th>Công ty</th>
		               
		          	 </tr>
        	</tfoot>
        </table>
</div>
</div>
  <div id="divIntro" style="width:auto;display:none;  "></div>

	<script type="text/javascript">
	$('#tabletong').DataTable({
						"autoWidth": false,

						  initComplete: function () {
            var api = this.api();

            api.columns().indexes().flatten().each( function ( i ) {
                var column = api.column( i );

                var select = $('<select><option value="">Fliter</option></select>').css('width','100%').css('color','red')        
                    .appendTo( $(column.header()).empty().removeClass('sorting').removeClass('sorting_asc').removeClass('sorting_desc') )
                	.on( 'change', function () {
                     var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column

                            .search( val ? '^'+val+'$' : '', true, false )
                          
                            .draw();
                            
                    } );

                column.data().unique().sort().each( function ( d, j ) {

                    select.append( '<option value="'+d+'">'+d+'</option>' ).css('width','100%');
                } );
            } );
        },

        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tất cả"]],


					});

</script>
<script type="text/javascript"> 
	$('.sorting').removeClass('sorting');
	$('.sorting_asc').removeClass('sorting_asc');
	$('.sorting_desc').removeClass('sorting_desc');
	$('.ShowImage').click(function (e) {
           
                var x = this.id;
            $.ajax({
                type:"GET",
                url:'{{URL("detailTaisan?MVT=")}}'+x,
                success:function(data){
                    $('#divIntro')
                .show()
                .html(data)
                .css({ position: 'absolute', color: '#000',
                    left: e.pageX+100, top: e.pageY-50
            });
                }
            });
            
        });
        $('.ShowImage').mouseleave(function (e) {
           
            setTimeout($('#divIntro').hide(),3000);
        });
$('#tabletong').on( 'draw.dt', function () {
	$('.sorting').removeClass('sorting');
	$('.sorting_asc').removeClass('sorting_asc');
	$('.sorting_desc').removeClass('sorting_desc');
						$('.ShowImage').click(function (e) {
           
                var x = this.id;
            $.ajax({
                type:"GET",
                url:'{{URL("detailTaisan?MVT=")}}'+x,
                success:function(data){
                    $('#divIntro')
                .show()
                .html(data)
                .css({ position: 'absolute', color: '#000',
                    left: e.pageX+100, top: e.pageY-50
            });
                }
            });
            
        });
        $('.ShowImage').mouseleave(function (e) {
           
             setTimeout($('#divIntro').hide(),3000);
        });
    });
    </script>
@endsection