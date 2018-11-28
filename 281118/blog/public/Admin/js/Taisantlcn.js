function tscn(){
	$('#tscn').click(function(){
	var Manv = $('#Manv').text();
		$.ajax({
			type:'GET',
			url:'GetTstlcn',
			data:{
				Manv:Manv
			},
			success:function(data){
				$('#showtlcn p').remove();
				$('#showtlcn').append('<p></p>');
				$('#showtlcn p').append(data);
			},
			complete:function(){
				$('#tabletstlcn').DataTable();
			}
		});
	});
}