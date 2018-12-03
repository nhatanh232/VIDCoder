function quanlytaisan(){
	$(document).ready(function(){
	   ViewFormXuat();
		DataTableKho();
		Phieuxuat();
       
	})
}


function DataTableKho(){
	var MVT = new Array();
var table = $('#tablekho').DataTable({

		columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        order: [[ 1, 'DESC' ]],
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
  table.on( 'select', function ( e, dt, type, indexes ) {
            var rowData = table.rows( indexes ).data().toArray();
            MVT.push(rowData[0][1]) ;
            
        } )
        .on( 'deselect', function ( e, dt, type, indexes ) {
            var rowData = table.rows( indexes ).data().toArray();
            for( var i=0 ; i <= MVT.length-1; i++){
				if ( MVT[i] === rowData[0][1]) MVT.splice(i, 1);
				}
 
             
          
        } );;

        $('.xuatkho').click(function(){
        	ModalPopupXuatkho();
         
             $('#formxk').find('tbody tr').remove();
       	for(var x=0 ; x <= MVT.length-1 ; x++){
                 $('#formxk').find('tbody')
        .append('<tr>'+'<td><input type="text" name="MVTX[]" class="form-control" value="'+MVT[x]+'"></td>'+
            '<td><input type="number" name="SLX[]" class="form-control" value=0></td>'+
            '<td><input name="NgayNhap[]" class="form-control" type="date"></td>'
            +'</tr>');
        	   
        	
        	} 
                 $('#formxk').DataTable();
                 
        });


}
function Phieuxuat(){
	$.ajax({
		type:'get',
		url:'getPX',
		success:function(data){

				$('input[name="PXK"]').val(data);
		}
	})

}

function ViewFormXuat(){
    $('#BtnXuat').click(function(){
        event.preventDefault();
        var PXK = $('input[name="Sophieu"]').val();
        
        $.ajax({
        type:'get',
        url:'ViewFormXuat',
        data:{
            Sophieu:PXK,
        },
        success:function(data){
            $('#myModalFormXuat').css({'display':'block'});
            $('#myModalFormXuat').find('.modal-content').html(data);
        closeModal();
            $('#ViewFormXuat').DataTable();
           btnXuatPhieu();
        },
        error:function(){

            alert('Không tồn tại phiếu');
        }
     
     
    });
    })


}
function btnXuatPhieu(){
    $('#btnXuatPhieu').click(function(){
         $('#FormXuatKho').submit();

    })
}
function closeModal(){
    $(document).ready(function(){
         window.onclick = function(event) {
            
                if (event.target.id == 'myModalFormXuat'){
                     $('#myModalFormXuat').css({'display':'none'});
                }
            }
    })
}

function getNgayNhap(){

}


