//Version 1 Xuất kho - lịch sử - bảng điều chuyển
function getInformation(e){
	var Bophan = e.value;

	$.ajax({
		type:"GET",
		dataType:"json",
		data:{
			'phongban':Bophan
		},
		url:'NV',
		success:function(data){

			$('#NguoiphutrachBP option').remove();
			$('#NguoiphutrachBP').append('<option value="">Người phụ trách</option>')
			for(i in data){

				$('#NguoiphutrachBP').append('<option value="'+data[i].Hoten+'">'+data[i].Hoten+'</option');
			}
		},
		
	})
}
function bangdieuchuyen(e){
	if (e.value != ""){
		var MTBnext ;
		var MVT = $('[data-action="MVT"]').val();
		$('#MTBX input').remove();
		$.ajax({
			type:'GET',
			url:'MTB2',
			data:{
				MVT:MVT,
			},
			dataType:'json',
			success:function(data){
				if(data[0]==null)
				{
					for(var i = 0 ; i < e.value ; i++)
						$('#MTBX').append('<input type="text" name="MTBX[]" class="form-control" required="" onkeyup="getInformationKho(this)" />');
				}
				else{
					MTBnext = data[0].MTB;
					if(MTBnext!=null)
						for(var i = 0 ; i < e.value ; i++)
							$('#MTBX').append('<input type="text" value="'+(++MTBnext)+'"name="MTBX[]" class="form-control" required="" onkeyup="getInformationKho(this)" />');
					}
				},


			});


	}
}
// version 2  Xuất kho - lịch sử - bảng điều chuyển

function getInformationV2(e){
	var Bophan = e.value;

	$.ajax({
		type:"GET",
		dataType:"json",
		data:{
			'phongban':Bophan
		},
		url:'NV',
		success:function(data){

			$('#NguoiphutrachBPV2 option').remove();
			$('#NguoiphutrachBPV2').append('<option value="">Người phụ trách</option>')
			for(i in data){

				$('#NguoiphutrachBPV2').append('<option value="'+data[i].Hoten+'">'+data[i].Hoten+'</option');
			}
		}
	})
}
function bangdieuchuyenV2(e){
	
	if (e.value != ""){
		var MTBnext ;
		var MVT = $('[data-action="MVT"]').val();
		$('#MTBXV2 input').remove();
		$.ajax({
			type:'GET',
			url:'MTB2',
			data:{
				MVT:MVT,
			},
			dataType:'json',
			success:function(data){
				if(data[0]==null)
				{
					for(var i = 0 ; i < e.value ; i++)
						$('#MTBXV2').append('<input type="text" name="MTBX[]" class="form-control" required="" onkeyup="getInformationKho(this)" />');
				}
				else{
					MTBnext = data[0].MTB;
					if(MTBnext!=null)
						for(var i = 0 ; i < e.value ; i++)
							$('#MTBXV2').append('<input type="text" value="'+(++MTBnext)+'"name="MTBX[]" class="form-control" required="" onkeyup="getInformationKho(this)" />');
					}
				},


			});


	}
}
// end
function getInformation2(e){
	var Bophan = e.value;

	$.ajax({
		type:"GET",
		dataType:"json",
		data:{
			'phongban':Bophan
		},
		url:'NV',
		success:function(data){
			$('#NguoiphutrachBP2').change(function(){
				$('#NguoiphutrachBPform').attr('value',$('#NguoiphutrachBP2').val());
			});
			$('#NguoiphutrachBP2 option').remove();
			$('#NguoiphutrachBP2').append('<option value="">Người phụ trách</option>')
			for(i in data)
				$('#NguoiphutrachBP2').append('<option value="'+data[i].Hoten+'">'+data[i].Hoten+'</option');

			$('#Bophannhanform').attr('value',$('#Bophannhan').val());
		}
	})
}
function getInformation3(e){
	var Bophan = e.value;

	$.ajax({
		type:"GET",
		dataType:"json",
		data:{
			'phongban':Bophan
		},
		url:'NV',
		success:function(data){
			$('#NguoiphutrachBP3').change(function(){
				$('#NguoiphutrachBPform').attr('value',$('#NguoiphutrachBP3').val());
			});
			$('#NguoiphutrachBP3 option').remove();
			$('#NguoiphutrachBP3').append('<option value="">Người phụ trách</option>')
			for(i in data)
				$('#NguoiphutrachBP3').append('<option value="'+data[i].Hoten+'">'+data[i].Hoten+'</option');


		}
	})
}

function getMVT(e){
	var MVT = e.value;
	$.ajax({
		type:"GET",
		data:{
			MVT:MVT
		},
		url:'getMVT',
		dataType:'json',
		success:function(data){
			$('[data-action="getMVT"]').css({'display':'none'});
			$('.alert-warning li').remove();
			if(data[0].MVT!= ""){
				$('.alert-warning ul').append('<li>Đã có Mã vật tư:'+data[0].MVT+' Kiểm tra lại trước khi nhập</li> ');
				$('[data-action="getMVT"]').css({'display':'block'});
			}	
		}

	})
}

function Dieuchuyensll(e){


}


function getInformationKho(e){
	var MTB = e.value;
	var MVT = $('[data-action="MVT"]').val();
	$.ajax({
		type:'GET',
		data:{
			MTB:MTB,
			MVT:MVT,
		},
		dataType:'json',
		url:'MTB',
		success:function(data){
			$('[data-button="ButtonXuat"]').removeAttr('disabled');
			$('[data-action="hasMTB"]').css({'display':'none'});
			$('[data-action="hasMTB"] strong').remove();
			for(i in data)
				if(data[i].MTB!=null){
					$('[data-button="ButtonXuat"]').prop('disabled',true);
					$('[data-action="hasMTB"]').css({'display':'block'});
					$('[data-action="hasMTB"]').append('<strong>Đã có mã thiết bị:'+data[i].MTB+'</strong>');
				}



			}
		})

}

function getMVTXK(e){
	var MVT = e.value;
	$.ajax({
		type:"GET",
		url:'getMVT',
		data:{
			MVT:MVT,
		},
		dataType:'json',
		success:function(data){
			$('[data-button="ButtonXuat"]').prop('disabled',true);

			$('[data-action="hasMVT"]').css({'display':'none'});
			$('[data-action="hasMVT"] li').remove();
			if(data[0].MVT != null)
			{
				$('[data-button="ButtonXuat"]').removeAttr('disabled');
				$('[data-action="hasMVT"]').css({'display':'block'});
				$('[data-action="hasMVT"] ul').append('<li>'+data[0].MVT+'</li>');
			}
		}
	})
}


function conditionNgayNhapNgayMua(e){
	var ngaynhap = e.value;;
	var ngaymua = $('#Ngaymua').val();
	if(ngaynhap<ngaymua)
		$('[data-button="ButtonNhap"]').prop('disabled',true);
	else
		$('[data-button="ButtonNhap"]').removeAttr('disabled');
}

function conditionNgayMuaNgayNhap(e){
	var ngaymua = e.value;;
	var ngaynhap = $('#Ngaynhap').val();
	if(ngaynhap<ngaymua)
		$('[data-button="ButtonNhap"]').prop('disabled',true);
	else
		$('[data-button="ButtonNhap"]').removeAttr('disabled');
}

function LocationShow(e){
	var Location = e.value;
	$('#autocompleteLC').autocomplete({
		source: function(request,respone){
			$.ajax({
				type:"GET",
				url:'getLocation',
				data:{
					Location:Location
				},
				dataType:'json',
				success:function(data){
					var array = new Array();

					for (var i = 0 ; i<data.length ; i++)
						array.push(data[i].Location);		
					respone(array);

				},

			});
		}

	});
}
function Tenshow(e){
	var  Ten = e.value;
	var  availableTags = new Array();

	$('#autocomplete').autocomplete({
		source: function(request,respone){
			$.ajax({
				type:"GET",
				url:'getTen',
				data:{
					Ten:Ten,
				},
				dataType:'json',
				success:function(data){
					var array = new Array();

					for (var i = 0 ; i<data.length ; i++)
						array.push(data[i].Ten);		
					respone(array);

				},

			});
		},
		select:function( event, ui ) {
			var getMVT = ui.item.value;

			$.ajax({
				type:'GET',
				url:'getMVTTen',
				data:{
					Ten:getMVT,
				},
				cache:false,
				dataType:'json',
				success:function(data){
					console.log(data.MVT);
					$('#img img').remove();
					$('input[name="MVT"]').val(data.MVT);
					$('#img').css({'display':'block'});
					$('#img').append('<img src="layouts/images/QLKho/'+data.Hinh+'"  style="width: 100%; height: 100%">');
					$('select[name=Congty]').val(data.Congty);
					$('input[name=MVT]').val(data.MVT);

					$('textarea[name=Thongso]').val(data.Thongso);
					$('input[name=dvt]').val(data.dvt);



					$('input[name=Giatri]').val(data.Giatri);
				}
			});
       	// end ajax select
       },
   });
	$("#autocomplete").attr('autocomplete', 'on');


}


// GetInforamtion
function Thongtinhansu(e){
	var x = e.value;

	$.ajax({
		type:"GET",
		data:{
			id:x,
		},
		url:'GetInfo',
		success:function(data){
			
			$('#show2 p').remove();
			$('#show2').append('<p></p>');			
			$('#show2 p').html(data);
			if(data == "")
				$('#show2 p').remove();

		},
		error:function(){
			$('#show2 p').remove();
		},
		complete:function(){
			tscn();
			
		}
	})
}

function locationTSPB(e){
	var location = e.value;
	$('#location2').attr('value',location);
	LocationShow(this);
}


function clickClose(e){
	$('#formedit').hide();
}

function Chinhsua(){
	var Ngaynhan = $('input[name="NgaynhanCS"]').val();
	var Vitri = $('input[name="locationCS"]').val();
	var Bophan = $('select[name="BophannhanCS"]').val();
	var Nguoiphutrach = $('#NguoiphutrachBP3').val();
	var id = $('input[name="idCS"]').val();
	if(confirm('OK?'))
	{
		$.ajax({
			type:"GET",
			url:'ChinhsuaTSPB',
			data:{
				id:id,
				Ngaynhan:Ngaynhan,
				Bophan:Bophan,
				Nguoiphutrach:Nguoiphutrach,
				Vitri:Vitri
			},
			success:function(data){
				alert(data);
			}
		})
		
		clickClose(this);
	}
}

function GetMaNV(){
	$('#NguoiphutrachBP').change(function(e){
		var Ten = this.value;
		var Bophan = $('select[name="Bophan"]').val();

		$.ajax({
			type:"GET",
			url:"Manhanvien",
			dataType:'Text',
			data:{
				Ten:Ten,
				Bophan:Bophan
			},
			success:function(data){
				$('input[name="Manv"]').val(data);
			},
			error:function(){
				$('input[name="Manv"]').val('');
			}
		})
	})
}


function formatGiatri(){
	$('.amount').on( "keyup", function( event ) {


            // When user select text in the document, also abort.
            var selection = window.getSelection().toString();
            console.log(selection);
            if ( selection !== '' ) {
            	return;
            }
            
            // When the arrow keys are pressed, abort.
            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
            	return;
            }
            
            
            var $this = $( this );
            
            // Get the value.
            var input = $this.val();
            
            var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt( input, 10 ) : 0;

            $this.val( function() {
            	return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
            } );
        } );
}
function NhapTen(){
	$('#NguoiphutrachBPV2').click(function(e){
		var GT = this.value;

		$('input[name="NguoiphutrachBP"]').val(GT);
	})

}
function historyTSPB2(){
	

	$('.Showhis').click(function(){
		var MTB = $(this).text();
		$.ajax({
			type:'get',
			url:'historyTSPB2',
			data:{
				MTB:MTB
			},
			success:function(data){
				
				$('#myModal').css({'display':'block'});
				$('#Showhis').find('p').html(data);
				$('#buttonclose').click(function(){
					$('#myModal').css({'display':'none'});
				})
			}
		})

	})
}

function historyTSPB3(){


	$('.Showhis').click(function(){
		var MTB = $(this).text();
		$.ajax({
			type:'get',
			url:'historyTSPB2',
			data:{
				MTB:MTB
			},
			success:function(data){
				ModalChung(data);

			}
		})

	})
}
function ModalChung(Data){
	btnOpenModal(Data);
	closeModalChung();
}

function btnOpenModal(Data){
	$('.ModalisC').css({'display':'block'});
	$('.ModalisC').find('.modal-content').html(Data);
}
function closeModalChung(){
	$(document).ready(function(){
		window.onclick = function(event) {

			if ($(event.target).hasClass('ModalisC')){
				$('.ModalisC').css({'display':'none'});
			}
		}
	})
}
function getNVInfo(){
	var Manv =  $('input[name="Manv"]').val();
	$.ajax({
		type:'get',
		url:'getNVInfo',
		data:{
			Manv:Manv
		},
		dataType:'json',
		success:function(data){
			$('input[name="name"]').val(data[0].Name);
			$('input[name="bophan"]').val(data[0].Department);
		}
	})
}

function checkDelegate(){
	var maNV = $('input[name="Manv"]').val();
	$.ajax({
		type:'get',
		url:'checkDelegate',
		data:{
			Staff_ID: maNV,
		},
		dataType:'json',
		success:function(data){
			if(data.length != 0){ // nhớ chuyển thành !=0
				$('input[name="name"]').prop('readonly',false);
				$('input[name="name"]').focus();
			}
		}
	})
}

// autocomplete
function getNVDKAn(e){
	var name = e.value;
	var department = $('input[name="bophan"]').val();
	var nam = $('input[name="nam"]').val();
	var thang = $('input[name="thang"').val();
	$('input[name="name"]').autocomplete({
		source: function(request,respone){
			$.ajax({
				type:"GET",
				url:'getStaffNotRegis',
				data:{
					Department:department,
					ThangDK:thang,
					NamDK:nam,
					Name:name,
				},
				dataType:'json',
				success:function(data){
					var array = new Array();

					for (var i = 0 ; i<data.length ; i++)
						array.push(data[i].Name);		
					respone(array);
				},
			});
		}		
	});
}