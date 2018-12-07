function thongtinsuatantrongngay(){
	var cDate = new Date();
	var month = cDate.getMonth()+1;
	var year = cDate.getFullYear();
	var day = cDate.getDate();

	$.ajax({
		type:'get',
		url:'getSuatAn',
		data:{
			ngay: "Ngay"+day,
			thang: month,
			nam: year,
		},
		dataType:'json',
		success:function(data){
			for(var i = 0; i < data.length; i++){
				if(data[i].Mon === "M"){
					$('input[name="tMan"]').val(data[i].Soluong);
					break;
				} else {
					$('input[name="tMan"]').val(0);
				}
			}
			for(var j = 0; j < data.length; j++){				
				if(data[j].Mon === "C"){
					$('input[name="tChay"]').val(data[j].Soluong);
					break;
				}else {
					$('input[name="tChay"]').val(0);
				}
			}
		}
	})
}

function thongtinsuatanngaymai(){
	var cDate = new Date();
	var nDate = addDate(cDate,1);
	var month = nDate.getMonth()+1;
	var year = nDate.getFullYear();
	var day = nDate.getDate();
	$.ajax({
		type:'get',
		url:'getSuatAn',
		data:{
			ngay: "Ngay"+day,
			thang: month,
			nam: year,
		},
		dataType:'json',
		success:function(data){
			for(var i = 0; i < data.length; i++){
				if(data[i].Mon === "M"){
					$('input[name="nMan"]').val(data[i].Soluong);
					break;
				} else {
					$('input[name="nMan"]').val(0);
				}
			}
			for(var j = 0; j < data.length; j++){				
				if(data[j].Mon === "C"){
					$('input[name="nChay"]').val(data[j].Soluong);
					break;
				}else {
					$('input[name="nChay"]').val(0);
				}
			}
		}
	})
}

function daysInMonth (month, year) {
	return new Date(year, month, 0).getDate();
}

function addDate(date, days){
	var result = new Date(date);
	result.setDate(result.getDate()+days);
	return result;
}

function getSuatAnPhong(){	
	var cDate = new Date();
	var month = cDate.getMonth()+1;
	var year = cDate.getFullYear();
	var table = "<table><tr>";
	$.ajax({
		type:'get',
		url:'getSuatAnTmp',
		data:{
			thang: month,
			nam: year,
		},
		dataType:'json',
		success:function(data){
		}
	})
}
