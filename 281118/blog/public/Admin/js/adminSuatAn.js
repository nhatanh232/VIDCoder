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
	console.log(month +" "+year);
	var first = cDate.getDate() - cDate.getDay() + 1;
	var last = first + 4;
	var firstDay = new Date(cDate.setDate(first));
	var lastDay = new Date(cDate.setDate(last));
	var table = "<table class='tNoiBo'><tr><td>Tên</td>";
	var lastDayOfMonth = (new Date(year, month, 0)).getDate();
	var check = lastDayOfMonth - firstDay.getDate();
	var cDay = new Date();
	var checkDay = addDate(cDay,-7);
	var cfirst = checkDay.getDate() - checkDay.getDay() + 1;
	var cfirstDay = new Date(checkDay.setDate(cfirst));
	if(check < 5){
		for(var i = 0; i < (5 + check + 7); i++){
			var checkDate = addDate(cfirstDay,i);
			if(checkDate.getDay() === 0 || checkDate.getDay() === 6){
				continue;
			} else if((cfirst+i)===31){
				table += "<td>Ngày "+(cfirst+i)+"</td>";
				break;
			} else{
				table += "<td>Ngày "+(cfirst+i)+"</td>";
			}
		}
	} else {
		for(var i = 0; i < 5; i++){
			table += "<td>Ngày "+(firstDay.getDate()+i)+"</td>";
		}
	}	
	table += "</tr>"
	$.ajax({
		type:'get',
		url:'getSuatAnTmp',
		data:{
			thang: month,
			nam: year,
		},
		dataType:'json',
		success:function(data){
			for(var j = 0; j < data.length; j++){				
				table+= "<tr>";
				table+="<td>"+data[j].Full_name+"</td>"				
				if(check < 5){
					for(var f = 0; f < (5 + check + 7); f++){
						var checkDate1 = addDate(cfirstDay,f);
						var mon = "data[j].Ngay"+(cfirst+f);
						if(checkDate1.getDay() === 0 || checkDate1.getDay() === 6){
							continue;
						} else if((cfirst+f)===31){
							table += "<td>"+eval(mon)+"</td>";
							break;
						} else{
							table += "<td>"+eval(mon)+"</td>";
						}
					}
				} else {
					for(var k = 0; k < 5; k++){
						var ngay = "data[j].Ngay"+(firstDay.getDate()+k);
						if(eval(ngay)!==null){
							table += "<td>"+eval(ngay)+"</td>";
						} else{
							table += "<td>O</td>";
						}
					}
				}
				table+="</tr>";
			}
			table+="</table>";
			document.getElementById("noiboCalendar").innerHTML = table;
		}
	})
}

function getSuatAnPhongNext(){	
	var cDate = new Date();
	var fDate = addDate(cDate,7);		
	var first = fDate.getDate() - fDate.getDay() + 1;
	var last = first + 4;
	var firstDay = new Date(fDate.setDate(first));
	var lastDay = new Date(fDate.setDate(last));
	console.log(firstDay);
	var month = firstDay.getMonth()+1;
	var year = firstDay.getFullYear();
	var table = "<table class='tNoiBo'><tr><td>Tên</td>";
	var lastDayOfMonth = (new Date(year, month, 0)).getDate();
	var check = lastDayOfMonth - firstDay.getDate();
	var cDay = new Date();
	var checkDay = addDate(cDay,-7);
	var cfirst = checkDay.getDate() - checkDay.getDay() + 1;
	var cfirstDay = new Date(checkDay.setDate(cfirst));
	if(check < 5){
		for(var i = 0; i < (5 + check + 7); i++){
			var checkDate = addDate(cfirstDay,i);
			if(checkDate.getDay() === 0 || checkDate.getDay() === 6){
				continue;
			} else if((cfirst+i)===31){
				table += "<td>Ngày "+(cfirst+i)+"</td>";
				break;
			} else{
				table += "<td>Ngày "+(cfirst+i)+"</td>";
			}
		}
	} else {
		for(var i = 0; i < 5; i++){
			table += "<td>Ngày "+(firstDay.getDate()+i)+"</td>";
		}
	}	
	table += "</tr>"
	$.ajax({
		type:'get',
		url:'getSuatAnTmp',
		data:{
			thang: month,
			nam: year,
		},
		dataType:'json',
		success:function(data){
			for(var j = 0; j < data.length; j++){				
				table+= "<tr>";
				table+="<td>"+data[j].Full_name+"</td>"				
				if(check < 5){
					for(var f = 0; f < (5 + check + 7); f++){
						var checkDate1 = addDate(cfirstDay,f);
						var mon = "data[j].Ngay"+(cfirst+f);
						if(checkDate1.getDay() === 0 || checkDate1.getDay() === 6){
							continue;
						} else if((cfirst+f)===31){
							table += "<td>"+eval(mon)+"</td>";
							break;
						} else{
							table += "<td>"+eval(mon)+"</td>";
						}
					}
				} else {
					for(var k = 0; k < 5; k++){
						var ngay = "data[j].Ngay"+(firstDay.getDate()+k);
						if(eval(ngay)!==null){
							table += "<td>"+eval(ngay)+"</td>";
						} else{
							table += "<td>O</td>";
						}
					}
				}
				table+="</tr>";
			}
			table+="</table>";
			document.getElementById("noiboCalendar").innerHTML = table;
		}
	})
}

function btnNextWeek(){
	$('#btnSANext').click(function(e){
		getSuatAnPhongNext();
	})
}

// function getSuatAnPhongPre(){	
// 	var cDate = new Date();
// 	var fDate = addDate(cDate,-7);
// 	console.log(fDate);
// 	var month = fDate.getMonth()+1;
// 	var year = fDate.getFullYear();
// 	var first = fDate.getDate() - fDate.getDay() + 1;
// 	var last = first + 4;
// 	var firstDay = new Date(fDate.setDate(first));
// 	var lastDay = new Date(fDate.setDate(last));
// 	var table = "<table class='tNoiBo'><tr><td>Tên</td>";
// 	var lastDayOfMonth = (new Date(year, month, 0)).getDate();
// 	var check = lastDayOfMonth - firstDay.getDate();
// 	var cDay = new Date();
// 	var checkDay = addDate(cDay,-7);
// 	var cfirst = checkDay.getDate() - checkDay.getDay() + 1;
// 	var cfirstDay = new Date(checkDay.setDate(cfirst));
// 	if(check < 5){
// 		for(var i = 0; i < (5 + check + 7); i++){
// 			var checkDate = addDate(cfirstDay,i);
// 			if(checkDate.getDay() === 0 || checkDate.getDay() === 6){
// 				continue;
// 			} else if((cfirst+i)===31){
// 				table += "<td>Ngày "+(cfirst+i)+"</td>";
// 				break;
// 			} else{
// 				table += "<td>Ngày "+(cfirst+i)+"</td>";
// 			}
// 		}
// 	} else {
// 		for(var i = 0; i < 5; i++){
// 			table += "<td>Ngày "+(firstDay.getDate()+i)+"</td>";
// 		}
// 	}	
// 	table += "</tr>"
// 	$.ajax({
// 		type:'get',
// 		url:'getSuatAnTmp',
// 		data:{
// 			thang: month,
// 			nam: year,
// 		},
// 		dataType:'json',
// 		success:function(data){
// 			for(var j = 0; j < data.length; j++){				
// 				table+= "<tr>";
// 				table+="<td>"+data[j].Full_name+"</td>"				
// 				if(check < 5){
// 					for(var f = 0; f < (5 + check + 7); f++){
// 						var checkDate1 = addDate(cfirstDay,f);
// 						var mon = "data[j].Ngay"+(cfirst+f);
// 						if(checkDate1.getDay() === 0 || checkDate1.getDay() === 6){
// 							continue;
// 						} else if((cfirst+f)===31){
// 							table += "<td>"+eval(mon)+"</td>";
// 							break;
// 						} else{
// 							table += "<td>"+eval(mon)+"</td>";
// 						}
// 					}
// 				} else {
// 					for(var k = 0; k < 5; k++){
// 						var ngay = "data[j].Ngay"+(firstDay.getDate()+k);
// 						if(eval(ngay)!==null){
// 							table += "<td>"+eval(ngay)+"</td>";
// 						} else{
// 							table += "<td>O</td>";
// 						}
// 					}
// 				}
// 				table+="</tr>";
// 			}
// 			table+="</table>";
// 			document.getElementById("noiboCalendar").innerHTML = table;
// 		}
// 	})
// }

// function btnPreWeek(){
// 	$('#btnSAPre').click(function(e){
// 		getSuatAnPhongPre();
// 	})
// }