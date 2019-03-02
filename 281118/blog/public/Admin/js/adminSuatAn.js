function thongtinsuatantrongngay(){
	var cDate = new Date();
	var month = cDate.getMonth()+1;
	var year = cDate.getFullYear();
	var day = cDate.getDate();	
	$.ajax({
		type:'get',
		url:'getSuatAn',
		dataType:'json',
		success:function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				if(data[i].Type === "M"){
					$('input[name="tMan"]').val(data[i].SL);
					break;
				} else {
					$('input[name="tMan"]').val(0);
				}
			}
			for(var j = 0; j < data.length; j++){				
				if(data[j].Type === "C"){
					$('input[name="tChay"]').val(data[j].SL);
					break;
				}else {
					$('input[name="tChay"]').val(0);
				}
			}
			for(var k = 0; k < data.length; k++){
				if(data[k].Type === "O"){
					$('input[name="tKhong"]').val(data[k].SL);
					break;
				}else {
					$('input[name="tKhong"]').val(0);
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
	var table = "<table class='tNoiBo'><tr><td>STT</td><td>Tên</td><td>Phòng Ban</td><td>Món</td>";
	table += "<tr/>";
	$.ajax({
		type:'get',
		url:'getSuatAnTmp',
		dataType:'json',
		success:function(data){
			for(var i = 0; i < data.length; i++){
				table += "<tr><td>"+(i+1)+"</td><td>"+data[i].Name+"</td><td>"+data[i].Department+"</td><td>"+data[i].Type+"</td></tr>"
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