$(document).ready(function(){
	$('input[name="idcard"]').focus();
	StatusDiemDanh();
})

function StatusDiemDanh(){
	$('input[name="idcard"]').keypress(function(e){
		var id_card = this.value;
			if(e.which == 13) {
			$.ajax({
			type:'post',
			url:'CheckDiemDanh',
			headers: {
       			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   			},
			data:{
				idcard:id_card,
			},
			success:function(data){
					$('#ShowInfo').html(data);	
					$('input[name="idcard"]').val("");
					$('input[name="idcard"]').focus();
				}
			})
		}
	})
	
}


