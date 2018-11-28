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
			if(data[0].Mon === "M"){
				$('input[name="tMan"]').val(data[0].Soluong);
			} else {
				$('input[name="tMan"]').val(0);
			}
			if(data[0].Mon === "C"){
				$('input[name="tChay"]').val(data[0].Soluong);
			} else{
				$('input[name="tChay"]').val(0);
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
	console.log(day);
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
			console.log(data);
			if(data[0].Mon === "M"){
				$('input[name="nMan"]').val(data[0].Soluong);
			} else {
				$('input[name="nMan"]').val(0);
			}
			if(data[0].Mon === "C"){
				$('input[name="nChay"]').val(data[0].Soluong);
			} else{
				$('input[name="nChay"]').val(0);
			}		}
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