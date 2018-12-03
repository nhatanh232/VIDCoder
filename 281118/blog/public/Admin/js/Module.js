function closeBTN(e){
	var modal = document.getElementById('myModal');
	modal.style.display ="none";
}
 function ModalPopup(e) {
 var modal = document.getElementById('myModal');

    modal.style.display = "block";
 $('[data-button="ButtonNhap"]').css({'display':'block'});
 $('[data-button="ButtonChinhsua"]').css({'display':'none'});
  $.ajax({
            type:"GET",
            url:"MVTtt",
            dataType:'text',
            success:function(data){
                
                $('input[name="MVT"]').val(data);
            }
          });
}
 function closeModal(event) {
 	var modal = document.getElementById('myModal');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}
// 
function closeBTNed(e){
    var modal = document.getElementById('myModaled');
    modal.style.display ="none";
}
 function ModalPopuped(e) {
 var modal = document.getElementById('myModaled');

    modal.style.display = "block";
   
 $('[data-button="ButtonNhap"]').css({'display':'block'});
 $('[data-button="ButtonChinhsua"]').css({'display':'none'});
  
}
 function closeModaled(event) {
    var modal = document.getElementById('myModaled');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}
// Version 1
function closeBTNXuatkho(e){
	var modal = document.getElementById('myModalXuatkho');
	modal.style.display ="none";
}
 function ModalPopupXuatkho(e) {
 var modal = document.getElementById('myModalXuatkho');

    modal.style.display = "block";
 
}
 function closeModalXuatkho(event) {
 	var modal = document.getElementById('myModalXuatkho');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}
// Version 2
function closeBTNXuatkhoV2(e){
    var modal = document.getElementById('myModalXuatkhoV2');
    modal.style.display ="none";
}
 function ModalPopupXuatkhoV2(e) {
 var modal = document.getElementById('myModalXuatkhoV2');

    modal.style.display = "block";
 
}
 function closeModalXuatkhoV2(event) {
    var modal = document.getElementById('myModalXuatkhoV2');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}



function closeBTNNK(e){
	var modal = document.getElementById('myModalNK');
	modal.style.display ="none";
}
 function ModalNK(e) {
 var modal = document.getElementById('myModalNK');

    modal.style.display = "block";
 
}
 function closeModalNK(event) {
 	var modal = document.getElementById('myModalNK');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}

function closeBTNDC(e){
	var modal = document.getElementById('myModalDC');
	modal.style.display ="none";
}
 function ModalDC(e) {
 var modal = document.getElementById('myModalDC');

    modal.style.display = "block";
 
}
 function closeModalDC(event) {
 	var modal = document.getElementById('myModalDC');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}


 function ModalDCSLL(e) {
 var modal = document.getElementById('myModalFormXuat');

    modal.style.display = "block";
 
}
function closeBTNDCSLL(e){
    var modal = document.getElementById('myModalFormXuat');
    modal.style.display ="none";
}
 function closeModalDCSLL(event) {
    var modal = document.getElementById('myModalDC');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}

function ModalImport(e){
    var modal = document.getElementById('myModalImport');

    modal.style.display = "block";
}

function closeBTNImport(e){
    var modal = document.getElementById('myModalImport');
    modal.style.display ="none";
}

 function closeModalImport(event) {
    var modal = document.getElementById('myModalImport');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}
function ModalExport(e){
    var modal = document.getElementById('myModalExport');

    modal.style.display = "block";
}

function closeBTNExport(e){
    var modal = document.getElementById('myModalExport');
    modal.style.display ="none";
}

 function closeModalExport(event) {
    var modal = document.getElementById('myModalExport');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}

function editkho(){
     $('[data-action="edit"]').click(function(e){
            var id = $(this).attr('name');

            ModalPopuped();
            $('[data-button="ButtonNhap"]').css({'display':'none'});
            
            $.ajax({
                type:"GET",
                url:'editKho',
                data:{
                    id:id,
                },
                dataType:'json',
                success:function(data){
                        $('select[name=Congty]').val(data[0].Congty);
                        $('input[name=MVT]').val(data[0].MVT);
                        $('input[name=Ten]').val(data[0].Ten);
                        $('textarea[name=Thongso]').val(data[0].Thongso);
                        $('input[name=dvt]').val(data[0].dvt);
                        $('input[name=Nhacungcap]').val(data[0].Nhacungcap);
                        $('input[name=Ngaynhap]').val(data[0].Ngaynhap);
                        $('input[name=Ngaymua]').val(data[0].Ngaymua);
                        $('input[name=Sl]').val(data[0].Sl);
                        $('input[name=Sohopdong]').val(data[0].Sohopdong);
                        $('input[name=Nguoimua]').val(data[0].Nguoimua);
                        $('input[name=Thoigianbh]').val(data[0].Thoigianbh);
                        $('input[name=Thoigiankh]').val(data[0].Thoigiankh);
                        $('input[name=Thoigianbd]').val(data[0].Thoigianbd);
                        $('input[name=Ngaykiemke]').val(data[0].Ngaykiemke);
                        $('input[name=Giatri]').val(data[0].Giatri);
                        $('input[name=Ghichu]').val(data[0].Ghichu);
                        $('[data-button="ButtonChinhsua"]').val(id);
                        $('[data-button="ButtonChinhsua"]').css({'display':'block'});
                }
            })
        });


}
function Xuatkhov2(){
    $('input[name=Id]').click(function(e){
    var id = $(this).data('xuatkho');
        $.ajax({
            type:"GET",
            url:"xuatkhov2",
          
            data:{
                id:id,
            },
            dataType:'json',
            success:function(data){
              
              if(data.MTB!= null){
                  ModalPopupXuatkho();
                  $('input[name=MVT]').val(data.MVT);
                 $('input[name=Slc]').val(data.Sl).prop('disabled',true);
                 $('#MTBX input').remove();
                $('#MTBX').append('<input type="text" name="MTBX[]" '+'value="'+data.MTB +'" class="form-control" required="" onkeyup="getInformationKho(this)" />');
           }else{
           
              ModalPopupXuatkhoV2();
              $('#idxk').val(id);
            $('input[name=Slc]').val(data.Sl).prop('disabled',false);
                 $('input[name=MVT]').val(data.MVT);
                 $('#MTBX input').remove();
           }

            }
        });
    });
    
}

function clickSlider(){

   
    $('.img-thumbnail').css('cursor','pointer').click(function(e){
        $('.active').removeClass('active');
        var src = $(this).attr('src');
        $(this).addClass("active");
           $('#zoomshow').attr('src',src);
        
               });
   
        }

function XuatfileExcelKho(){

        $.ajax({
                type:"Get",
                url:'ExportKho',
                success:function(data){
            
                },
     
    });
}

function getSelectColumn(){
   $(document).ready(function(){
        $('#taisanphongban thead tr:gt(0) th:nth-child(5)').each(function(e){
            // console.log($(this).find('td:eq(6)').text());
           var tag =  $(this).html();
          
            $('#demo').append(tag);
            $('#demo select').attr('name','Vitri').css({'color':'#222222'});
        })
   })
}

// Bảo dưỡng 
function BaoDuongPopup(e) {
 var modal = document.getElementById('baoDuongModel'); 
    modal.style.display = "block";
   
 $('[data-button="ButtonNhap"]').css({'display':'block'});
 $('[data-button="ButtonChinhsua"]').css({'display':'none'});
  
}

function getBDInfo(){
     $('[data-action="showBDInfo"]').click(function(e){
            var MTB = $(this).attr('name');

            BaoDuongPopup();
            $('[data-button="ButtonNhap"]').css({'display':'block'});
            
            $.ajax({
                type:"GET",
                url:'baoDuong',
                data:{
                    MTB:MTB,
                },
                dataType:'json',
                success:function(data){
                        $('input[name="MVT"]').val(data[0].MVT);
                        $('input[name="MTB"]').val(data[0].MTB);
                        $('input[name="Ten"]').val(data[0].Ten);
                        $('input[name="Nguoiphutrach"]').val(data[0].Nguoiphutrach);
                        $('input[name="Bophan"]').val(data[0].Bophan);
                        $('input[name="Vitri"]').val(data[0].Location);
                }
            })
        });
}
function closeBaoDuong(event) {
    var modal = document.getElementById('baoDuongModel');
    if (event.id == modal) {
        modal.style.display = "none";
    }
}

function closeBD(e){
    var modal = document.getElementById('baoDuongModel');
    modal.style.display ="none";
}

// Bảo Trì
function getDataBaoTri(){
    $('input[name="MTB"]').focusout(function(e){        
        var MTB = this.value;
        console.log(MTB);
        $.ajax({
                type:"GET",
                url:'baoDuong',
                data:{
                    MTB:MTB,
                },
                dataType:'json',
                success:function(data){
                    console.log(data)
                        $('input[name="MVT"]').val(data[0].MVT);
                        $('input[name="Ten"]').val(data[0].Ten);
                        $('input[name="Nguoiphutrach"]').val(data[0].Nguoiphutrach);
                        $('input[name="Bophan"]').val(data[0].Bophan);
                        $('input[name="Vitri"]').val(data[0].Location);
                        $('input[name="tgbh"]').val(data[0].tgbh);
                }
            })
    });
}

// Giờ Đào Tạo
function getDataDiemDanh(){
    $('input[name="Staff_ID"]').focusout(function(e){        
        var Staff_ID = this.value;
        console.log(Staff_ID);
        $.ajax({
                type:"GET",
                url:'getDataDiemDanh',
                data:{
                    Staff_ID:Staff_ID,
                },
                dataType:'json',
                success:function(data){
                    console.log(data)
                        $('input[name="Full_name"]').val(data[0].Full_name);
                }
            })
    });
}

// Giờ đào tao get Tên
function getDataDiemDanh_Ten(e){
    var Ten =e.value;
    
    $('input[name="Full_name"]').autocomplete({
        autoFocus: true,
         source: function(request,respone){
        $.ajax({
        type:"GET",
        url:'getDataDiemDanh_Ten',
        data:{
            Ten:Ten,
        },
        dataType:'json',
        success:function(data){
            var array = new Array();
            
            for (var i = 0 ; i<data.length ; i++)
                array.push(data[i].Full_name);        
            respone(array);

        },
        
    });
      },
      select:function( event, ui ) {
        var successTen = ui.item.value;
        console.log(successTen);
        $.ajax({
            type:'GET',
            url:'getSuccessTen',
            data:{
                Ten:successTen,
            },
            cache:false,
            dataType:'json',
            success:function(data){
               
                $('input[name="Full_name"]').val(data.Full_name);
                $('input[name="Staff_ID"]').val(data.Staff_ID);
            }
        });
        // end ajax select
      },
    });
    
}
function FormNhapLieu(url){
    $('#FormNhapLieu').click(function(){
       var token = $('meta[name="csrf-token"]').attr('content');
        var Staff_ID = $('input[name="Staff_ID"]').val();
        var Event_Name = $('input[name="Event_Name"]').val();
        var Event_Date = $('input[name="Event_Date"]').val();
        var Categories = $('select[name="Categories"]').val();
        var Hours = $('input[name="Hours"]').val();
        $.ajax({
            type:'post',
            url:'pDiemDanh',
            headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                Staff_ID:Staff_ID,
                Event_Name:Event_Name,
                Event_Date:Event_Date,
                Categories:Categories,
                Hours:Hours
            },
             
            success:function(data){
                alert(data);
                $('input[name="Staff_ID"]').val('');
                $('input[name="Full_name"]').val('');
                $('input[name="Event_Name"]').val('');
                $('input[name="Event_Date"]').val('');
                
                  $('input[name="Hours"]').val('');
            },
            error:function(){
                alert("Nhập đầy đủ thông tin");
            }
            
        }) 
    });

}
function getViewDataToday(){
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();


  
    $('a').click(function(){
        event.preventDefault();
        var condition = $(this).text();
        
        if(condition == 'Hôm nay')
            var Datetime = year+'-'+month+'-'+day;
        else
            var Datetime = null;
    
        $.ajax({
            type:"post",
            url:'ShowDataTable',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                Datetime:Datetime,
            },
            success:function(data){
                $('#show-table').html(data);
                  $('#formNhapCH').dataTable();
                if(condition == 'Hôm nay')      
                   buttonEditData();
            }

        });
    });
}


function buttonEditData(){
   
 
    $('.editData').click(function(){
        event.preventDefault();     
        var id = this.value;
        // get Value
         var $row = jQuery(this).closest('tr');
            var $columns = $row.find('td');
             var Result = new Array();
          $.each($columns, function(i, item) {
          switch(i){
            case 0:
        Result['Staff_ID'] = $(this).find('input').val();   
          break;
         case 2:
                Result['Event_Name'] = $(this).find('input').val();
                break;
         case 4:
               Result['Event_Date'] = $(this).find('input').val();
                break;
         case 3:
                Result['Categories'] = $(this).find('select option:selected').val();
                break;
         case 5:
                Result['Hours'] = $(this).find('input').val();
                break;
           
       }
       
    });
    $(this).addClass('text-danger').html('Đã sửa');
        // end getValue
        $.ajax({
            type:'get',
            url:'editDataInDay',
            headers:{
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data:{
                Staff_ID:Result['Staff_ID'],
                Event_Date:Result['Event_Date'],
                Event_Name:Result['Event_Name'],
                Categories:Result['Categories'],
                Hours:Result['Hours'],
                id:id
            },
            success:function(data){

                alert(data);

            }
        })
    })
}
function void_main_Modulejs(){
    $(document).ready(function(){
         FormNhapLieu();
          getDataDiemDanh();
       getViewDataToday();
      
    })
}