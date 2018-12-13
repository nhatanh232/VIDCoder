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
	var manv = $('input[name="Manv"]').val();
	var cDate = new Date();
	var month = cDate.getMonth() + 1;
	var year = cDate.getFullYear();
	var dayOfMonth = daysInMonth(month,year);

	var first = cDate.getDate() - cDate.getDay() + 1;
	var firstDay = new Date(cDate.setDate(first));
	var lastDay = addDate(cDate,5);

	var table = "<table class='tNoiBo'><tr><td>Tên &#8726; Ngày</td>";
	for(var i = 1; i <= dayOfMonth; i++){
		var checkDate = new Date(month+" "+i+" "+ year);
		var checkDay = checkDate.getDay();
		if(checkDay !== 0 && checkDay !== 6){
			table += "<td>"+i+"</td>";
		}
	}
	table += "<tr/>";
	$.ajax({
		type:'get',
		url:'getSuatAnTmp',
		data:{
			thang:month,
			nam:year,
			manv:manv,
		},
		dataType:'json',
		success:function(data){
			for(var j = 0; j < data.length; j++){
				table += "<td>"+data[j].Full_name+"</td>";
				for(var k = 1; k <= dayOfMonth; k++){
					var checkDate1 = new Date(month+" "+k+" "+ year);
					var checkDay1 = checkDate1.getDay();
					if(checkDay1 !== 0 && checkDay1 !== 6){
						var mon = "data[j].Ngay"+k;
						var checkCurrent = new Date(month+" "+k+" "+year);
						if(checkCurrent <= lastDay && checkCurrent >= addDate(firstDay,-1)){							
							if(eval(mon)===null){
								table += "<td class='highlight'>O</td>";
							}else {
								table += "<td class='highlight'>"+eval(mon)+"</td>";
							}	
						}else{
							if(eval(mon)===null){
								table += "<td>O</td>";
							}else {
								table += "<td>"+eval(mon)+"</td>";
							}	
						}

					}
				}
				table += "</tr>";
			}
			table += "</table>";
			document.getElementById("noiboCalendar").innerHTML = table;
		}		
	})
}

function getNextMonthData(){
	var manv = $('input[name="Manv"]').val();
	var cDate = new Date();	
	var month = cDate.getMonth() + 1;
	var year = cDate.getFullYear();	
	var nDate = cDate;
	nDate.setMonth(nDate.getMonth()+1);
	var fmonth= nDate.getMonth() + 1;
	var fyear = nDate.getFullYear();
	var dayOfMonth = daysInMonth(fmonth,fyear);

	var currentDay = new Date();
	var first = currentDay.getDate() - currentDay.getDay() + 1;
	var firstDay = new Date(currentDay.setDate(first));
	var lastDay = addDate(currentDay,5);

	var table = "<table class='tNoiBo'><tr><td>Tên &#8726; Ngày</td>";
	for(var i = 1; i <= dayOfMonth; i++){
		var checkDate = new Date(fmonth+" "+i+" "+ fyear);
		var checkDay = checkDate.getDay();
		if(checkDay !== 0 && checkDay !== 6){
			table += "<td>"+i+"</td>";
		}
	}
	table += "<tr/>";
	$.ajax({
		type:'get',
		url:'getSuatAnTmp',
		data:{
			thang:fmonth,
			nam:fyear,
		},
		dataType:'json',
		success:function(data){
			if(data.length===0){
				alert("Chưa có ai đăng kí ăn tháng "+fmonth+" hết đó!!!");
			}else{
				for(var j = 0; j < data.length; j++){
				table += "<td>"+data[j].Full_name+"</td>";
				for(var k = 1; k <= dayOfMonth; k++){
					var checkDate1 = new Date(fmonth+" "+k+" "+ fyear);
					var checkDay1 = checkDate1.getDay();
					if(checkDay1 !== 0 && checkDay1 !== 6){
						var mon = "data[j].Ngay"+k;
						var checkCurrent = new Date(fmonth+" "+k+" "+fyear);
						if(checkCurrent <= lastDay && checkCurrent >= addDate(firstDay,-1)){							
							if(eval(mon)===null){
								table += "<td class='highlight'>O</td>";
							}else {
								table += "<td class='highlight'>"+eval(mon)+"</td>";
							}	
						}else{
							if(eval(mon)===null){
								table += "<td>O</td>";
							}else {
								table += "<td>"+eval(mon)+"</td>";
							}	
						}

					}
				}
				table += "</tr>";
			}
			table += "</table>";
			document.getElementById("noiboCalendar").innerHTML = table;
			}
			
		}		
	})
}

function btnNextMonth(){
	$('button[id="btnSANext"]').click(function(e){
		getNextMonthData();
	})
}