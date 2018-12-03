function createCalendar(){
	var date = new Date();
	var month = new Date(date.setMonth(date.getMonth()));
	var fmonth = (month.getMonth()+1).toString();	
	var year = date.getFullYear();
	var check3Days = new Date(addDate(date,2));
	var daysOfMonth = daysInMonth(fmonth,year);	
	var calendar = "<table class='tRegis'><tr><td><b>Thứ Hai</b></td><td><b>Thứ Ba</b></td><td><b>Thứ Tư</b></td><td><b>Thứ Năm</b></td><td><b>Thứ Sáu</b></td></tr><tr>";
	var firstDay = new Date(fmonth+" 1 "+year);
	var fix = firstDay.getDay();
	if(fix !== 6 && fix!== 0){
		fix = fix-1;
	} else {
		fix = 0;
	}
	var textFix = "<td></td>";
	calendar+=textFix.repeat(fix);
	//Tạo lịch ở đây nè ^^
	for (var i = 1; i <= daysOfMonth; i++) {
		var checkDate = new Date(fmonth+" "+i+" "+ year);
		var checkDay = checkDate.getDay();
		if(checkDay !== 0 && checkDay !== 6){
			if(checkDate<check3Days){
				if(checkDay === 1){
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
				} else if(checkDay === 5){
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
				} else{
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
				}	
			} else{
				if(checkDay === 1){
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' ><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
				} else if(checkDay === 5){
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' ><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
				} else{
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' ><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
				}
			}		
		}
	}
	calendar+="</table>";
	document.getElementById("daTitle").innerHTML = "Bạn Đã Đăng Kí Suất Ăn Tháng "+fmonth;
	document.getElementById("title").innerHTML = "ĐĂNG KÍ ĂN THÁNG "+fmonth;
	document.getElementById("calendar").innerHTML = calendar;

}

function daysInMonth (month, year) {
	return new Date(year, month, 0).getDate();
}

function getRegisTime(){
	var date = new Date();
	var month = new Date(date.setMonth(date.getMonth()));
	var fmonth = (month.getMonth()+1).toString();
	var year = date.getFullYear();
	$('input[name="ThangDK"]').val(fmonth);
	$('input[name="NamDK"]').val(year);
	$('input[name="thang"]').val(fmonth);
	$('input[name="nam"]').val(year);
}

function checkDK(){
	window.onload = function(){
		var MaNV =   $('input[name="Manv"]').val();
		var thang =  $('input[name="thang"]').val();
		var nam =  $('input[name="nam"]').val();		
		$.ajax({
			type:'get',
			url:'checkDK',
			data:{
				MaNV:MaNV,
				ThangDK:thang,
				NamDK:nam,
			},
			dataType:"json",            
			success:function(data){
				if(data.length !== 0){
					var date = new Date();
					var cDate = new Date();
					var month = new Date(date.setMonth(date.getMonth()+1));
					var fmonth = (month.getMonth()+1).toString();	
					var year = date.getFullYear();					
					$('input[name="ThangDK"]').val(fmonth);
					$('input[name="NamDK"]').val(year);
					var nthang = $('input[name="ThangDK"]').val();
					var nnam = $('input[name="NamDK"]').val();
					$.ajax({
						type:'get',
						url:'checkDK',
						data:{
							MaNV:MaNV,
							ThangDK:nthang,
							NamDK:nnam,
						},
						dataType:"json",
						success:function(data){
							if(data.length !== 0){
								document.getElementById('chuaDK').style.display="none";
								document.getElementById('daDK').style.display="block";
							} else {
								var check3Days = new Date(addDate(cDate,2));
								var daysOfMonth = daysInMonth(fmonth,year);	
								var calendar = "<table class='tRegis'><tr><td><b>Thứ Hai</b></td><td><b>Thứ Ba</b></td><td><b>Thứ Tư</b></td><td><b>Thứ Năm</b></td><td><b>Thứ Sáu</b></td></tr><tr>";
								var firstDay = new Date(fmonth+" 1 "+year);
								var fix = firstDay.getDay();
								if(fix !== 6 && fix!== 0){
									fix = fix-1;
								} else {
									fix = 0;
								}
								var textFix = "<td></td>";
								calendar+=textFix.repeat(fix);
	//Tạo lịch ở đây nè ^^
	for (var i = 1; i <= daysOfMonth; i++) {
		var checkDate = new Date(fmonth+" "+i+" "+ year);
		var checkDay = checkDate.getDay();
		if(checkDay !== 0 && checkDay !== 6){
			if(checkDate<check3Days){
				if(checkDay === 1){
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
				} else if(checkDay === 5){
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
				} else{
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
				}	
			} else{
				if(checkDay === 1){
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' ><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
				} else if(checkDay === 5){
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' ><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
				} else{
					calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' ><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
				}
			}		
		}
	}
	calendar+="</table>";
	document.getElementById("daTitle").innerHTML = "Bạn Đã Đăng Kí Suất Ăn Tháng "+(thang);
	document.getElementById("title").innerHTML = "ĐĂNG KÍ ĂN THÁNG "+fmonth;
	document.getElementById("calendar").innerHTML = calendar;
	document.getElementById('daDK').style.display="block";
}
}
})
					
				}else {
					document.getElementById('chuaDK').style.display="block";
					document.getElementById('daDK').style.display="none";
				}
			}       
		})
	}
}

function addDate(date, days){
	var result = new Date(date);
	result.setDate(result.getDate()+days);
	return result;
}

function getSuatAnData(){
	var date = new Date();
	var month = date.getMonth()+1;
	var year = date.getFullYear();

	var check3Days = new Date(addDate(date,2));

	var daysOfMonth = daysInMonth(month,year);	
	var calendar = "<table class='tRegis'><tr><td><b>Thứ Hai</b></td><td><b>Thứ Ba</b></td><td><b>Thứ Tư</b></td><td><b>Thứ Năm</b></td><td><b>Thứ Sáu</b></td></tr><tr>";
	var firstDay = new Date(month+" 1 "+year);
	var fix = firstDay.getDay();
	if(fix !== 6 && fix!== 0){
		fix = fix-1;
	} else {
		fix = 0;
	}
	var textFix = "<td></td>";
	calendar+=textFix.repeat(fix);
	var MaNV = $('input[name="Manv"]').val();
	var thang = month.toString();
	var nam = year.toString();

	$.ajax({		
		type:'get',
		url:'checkDK',
		data:{
			MaNV:MaNV,
			ThangDK:thang,
			NamDK:nam,
		},
		dataType:"json",            
		success:function(data){
			var ngay1 = data[0].Ngay1;
			var ngay2 = data[0].Ngay2;
			var ngay3 = data[0].Ngay3;
			var ngay4 = data[0].Ngay4;
			var ngay5 = data[0].Ngay5;
			var ngay6 = data[0].Ngay6;
			var ngay7 = data[0].Ngay7;
			var ngay8 = data[0].Ngay8;
			var ngay9 = data[0].Ngay9;
			var ngay10 = data[0].Ngay10;
			var ngay11 = data[0].Ngay11;
			var ngay12 = data[0].Ngay12;
			var ngay13 = data[0].Ngay13;
			var ngay14 = data[0].Ngay14;
			var ngay15 = data[0].Ngay15;
			var ngay16 = data[0].Ngay16;
			var ngay17 = data[0].Ngay17;
			var ngay18 = data[0].Ngay18;
			var ngay19 = data[0].Ngay19;
			var ngay20 = data[0].Ngay20;
			var ngay21 = data[0].Ngay21;
			var ngay22 = data[0].Ngay22;
			var ngay23 = data[0].Ngay23;
			var ngay24 = data[0].Ngay24;
			var ngay25 = data[0].Ngay25;
			var ngay26 = data[0].Ngay26;
			var ngay27 = data[0].Ngay27;
			var ngay28 = data[0].Ngay28;
			var ngay29 = data[0].Ngay29;
			var ngay30 = data[0].Ngay30;
			var ngay31 = data[0].Ngay31;
			var dateData = [];
			dateData.push(ngay1);
			dateData.push(ngay2);
			dateData.push(ngay3);
			dateData.push(ngay4);
			dateData.push(ngay5);
			dateData.push(ngay6);
			dateData.push(ngay7);
			dateData.push(ngay8);
			dateData.push(ngay9);
			dateData.push(ngay10);
			dateData.push(ngay11);
			dateData.push(ngay12);
			dateData.push(ngay13);
			dateData.push(ngay14);
			dateData.push(ngay15);
			dateData.push(ngay16);
			dateData.push(ngay17);
			dateData.push(ngay18);
			dateData.push(ngay19);
			dateData.push(ngay20);
			dateData.push(ngay21);
			dateData.push(ngay22);
			dateData.push(ngay23);
			dateData.push(ngay24);
			dateData.push(ngay25);
			dateData.push(ngay26);
			dateData.push(ngay27);
			dateData.push(ngay28);
			dateData.push(ngay29);
			dateData.push(ngay30);
			dateData.push(ngay31);
			for (var i = 1; i <= daysOfMonth; i++) {
				var checkDate = new Date(month+" "+i+" "+ year);
				var checkDay = checkDate.getDay();
				if(checkDay !== 0 && checkDay !== 6){
					if(dateData[i-1] == "M"){
						if(checkDate<check3Days){
							if(checkDay === 1){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
							} else if(checkDay === 5){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
							} else{
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
							}	
						} else{
							if(checkDay === 1){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
							} else if(checkDay === 5){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
							} else{
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
							}
						}
					} else if(dateData[i-1] == "C"){
						if(checkDate<check3Days){
							if(checkDay === 1){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
							} else if(checkDay === 5){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td></tr>";
							} else{
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
							}
						}else{
							if(checkDay === 1){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
							} else if(checkDay === 5){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td></tr>";
							} else{
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
							}
						}						
					} else{
						if(checkDate<check3Days){
							if(checkDay === 1){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
							} else if(checkDay === 5){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td></tr>";
							} else{
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
							}
						}else{
							if(checkDay === 1){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
							} else if(checkDay === 5){
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td></tr>";
							} else{
								calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
							}
						}
					}				
				}
			}
			calendar+="</table>";
			document.getElementById("title").innerHTML = "ĐĂNG KÍ ĂN THÁNG "+month;
			document.getElementById("calendar").innerHTML = calendar;
		}
	})
}

function getUpdateTime(){
	var date = new Date();
	var month = new Date(date.setMonth(date.getMonth()));
	var fmonth = (month.getMonth()+1).toString();
	var year = date.getFullYear();
	$('input[name="ThangDK"]').val(fmonth);
	$('input[name="NamDK"]').val(year);
	$('input[name="thang"]').val(fmonth);
	$('input[name="nam"]').val(year);
}

function nextMonth(){
	var test = parseInt($('input[name="ThangDK"]').val(),10);
	var MaNV = $('input[name="MaNV"]').val();
	var date = new Date();
	var cDate = new Date();
	date.setMonth(test-1); //current month
	date.setMonth(date.getMonth()+1); // next month
	var fmonth = date.getMonth()+1;
	var fyear = date.getFullYear();
	var check3Days = new Date(addDate(cDate,2));
	var daysOfMonth = daysInMonth(fmonth,fyear);	
	var calendar = "<table class='tRegis'><tr><td><b>Thứ Hai</b></td><td><b>Thứ Ba</b></td><td><b>Thứ Tư</b></td><td><b>Thứ Năm</b></td><td><b>Thứ Sáu</b></td></tr><tr>";
	var firstDay = new Date(fmonth+" 1 "+fyear);
	var fix = firstDay.getDay();
	if(fix !== 6 && fix!== 0){
		fix = fix-1;
	} else {
		fix = 0;
	}
	var textFix = "<td></td>";
	calendar+=textFix.repeat(fix);
	$.ajax({		
		type:'get',
		url:'checkDK',
		data:{
			MaNV:MaNV,
			ThangDK:fmonth,
			NamDK:fyear,
		},
		dataType:"json",            
		success:function(data){
			if(data.length == 0){
				alert("Bạn chưa đăng kí ăn tháng "+ fmonth);
			}else {
				$('input[name="ThangDK"]').val(fmonth);	
				$('input[name="NamDK"]').val(fyear);				
				var ngay1 = data[0].Ngay1;
				var ngay2 = data[0].Ngay2;
				var ngay3 = data[0].Ngay3;
				var ngay4 = data[0].Ngay4;
				var ngay5 = data[0].Ngay5;
				var ngay6 = data[0].Ngay6;
				var ngay7 = data[0].Ngay7;
				var ngay8 = data[0].Ngay8;
				var ngay9 = data[0].Ngay9;
				var ngay10 = data[0].Ngay10;
				var ngay11 = data[0].Ngay11;
				var ngay12 = data[0].Ngay12;
				var ngay13 = data[0].Ngay13;
				var ngay14 = data[0].Ngay14;
				var ngay15 = data[0].Ngay15;
				var ngay16 = data[0].Ngay16;
				var ngay17 = data[0].Ngay17;
				var ngay18 = data[0].Ngay18;
				var ngay19 = data[0].Ngay19;
				var ngay20 = data[0].Ngay20;
				var ngay21 = data[0].Ngay21;
				var ngay22 = data[0].Ngay22;
				var ngay23 = data[0].Ngay23;
				var ngay24 = data[0].Ngay24;
				var ngay25 = data[0].Ngay25;
				var ngay26 = data[0].Ngay26;
				var ngay27 = data[0].Ngay27;
				var ngay28 = data[0].Ngay28;
				var ngay29 = data[0].Ngay29;
				var ngay30 = data[0].Ngay30;
				var ngay31 = data[0].Ngay31;
				var dateData = [];
				dateData.push(ngay1);
				dateData.push(ngay2);
				dateData.push(ngay3);
				dateData.push(ngay4);
				dateData.push(ngay5);
				dateData.push(ngay6);
				dateData.push(ngay7);
				dateData.push(ngay8);
				dateData.push(ngay9);
				dateData.push(ngay10);
				dateData.push(ngay11);
				dateData.push(ngay12);
				dateData.push(ngay13);
				dateData.push(ngay14);
				dateData.push(ngay15);
				dateData.push(ngay16);
				dateData.push(ngay17);
				dateData.push(ngay18);
				dateData.push(ngay19);
				dateData.push(ngay20);
				dateData.push(ngay21);
				dateData.push(ngay22);
				dateData.push(ngay23);
				dateData.push(ngay24);
				dateData.push(ngay25);
				dateData.push(ngay26);
				dateData.push(ngay27);
				dateData.push(ngay28);
				dateData.push(ngay29);
				dateData.push(ngay30);
				dateData.push(ngay31);
				for (var i = 1; i <= daysOfMonth; i++) {
					var checkDate = new Date(fmonth+" "+i+" "+ fyear);
					var checkDay = checkDate.getDay();
					if(checkDay !== 0 && checkDay !== 6){
						if(dateData[i-1] == "M"){
							if(checkDate<check3Days){
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
								}	
							} else{
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
								}
							}
						} else if(dateData[i-1] == "C"){
							if(checkDate<check3Days){
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
								}
							}else{
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
								}
							}						
						} else{
							if(checkDate<check3Days){
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
								}
							}else{
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
								}
							}
						}				
					}
				}
				calendar+="</table>";
				document.getElementById("title").innerHTML = "ĐĂNG KÍ ĂN THÁNG "+fmonth;
				document.getElementById("calendar").innerHTML = calendar;							
			}	}	
		})
}

function btnNextMonth(){
	$('button[id="btnNext"]').click(function(e){
		nextMonth();
	})
}

function preMonth(){
	var test = parseInt($('input[name="ThangDK"]').val(),10);
	var tyear = parseInt($('input[name="NamDK"]').val(),10);
	var MaNV = $('input[name="MaNV"]').val();
	var date = new Date();
	var cDate = new Date();
	date.setFullYear(tyear);
	date.setMonth(test-1); //current month
	date.setMonth(date.getMonth()-1); // pre month
	var fmonth = date.getMonth()+1;
	var fyear = date.getFullYear();	
	var check3Days = new Date(addDate(cDate,2));
	var daysOfMonth = daysInMonth(fmonth,fyear);	
	var calendar = "<table class='tRegis'><tr><td><b>Thứ Hai</b></td><td><b>Thứ Ba</b></td><td><b>Thứ Tư</b></td><td><b>Thứ Năm</b></td><td><b>Thứ Sáu</b></td></tr><tr>";
	var firstDay = new Date(fmonth+" 1 "+fyear);
	var fix = firstDay.getDay();
	if(fix !== 6 && fix!== 0){
		fix = fix-1;
	} else {
		fix = 0;
	}
	var textFix = "<td></td>";
	calendar+=textFix.repeat(fix);
	$.ajax({		
		type:'get',
		url:'checkDK',
		data:{
			MaNV:MaNV,
			ThangDK:fmonth,
			NamDK:fyear,
		},
		dataType:"json",            
		success:function(data){
			if(data.length == 0){
				alert("Bạn chưa đăng kí ăn tháng " + fmonth);
			}else {
				$('input[name="ThangDK"]').val(fmonth);	
				$('input[name="NamDK"]').val(fyear);			
				var ngay1 = data[0].Ngay1;
				var ngay2 = data[0].Ngay2;
				var ngay3 = data[0].Ngay3;
				var ngay4 = data[0].Ngay4;
				var ngay5 = data[0].Ngay5;
				var ngay6 = data[0].Ngay6;
				var ngay7 = data[0].Ngay7;
				var ngay8 = data[0].Ngay8;
				var ngay9 = data[0].Ngay9;
				var ngay10 = data[0].Ngay10;
				var ngay11 = data[0].Ngay11;
				var ngay12 = data[0].Ngay12;
				var ngay13 = data[0].Ngay13;
				var ngay14 = data[0].Ngay14;
				var ngay15 = data[0].Ngay15;
				var ngay16 = data[0].Ngay16;
				var ngay17 = data[0].Ngay17;
				var ngay18 = data[0].Ngay18;
				var ngay19 = data[0].Ngay19;
				var ngay20 = data[0].Ngay20;
				var ngay21 = data[0].Ngay21;
				var ngay22 = data[0].Ngay22;
				var ngay23 = data[0].Ngay23;
				var ngay24 = data[0].Ngay24;
				var ngay25 = data[0].Ngay25;
				var ngay26 = data[0].Ngay26;
				var ngay27 = data[0].Ngay27;
				var ngay28 = data[0].Ngay28;
				var ngay29 = data[0].Ngay29;
				var ngay30 = data[0].Ngay30;
				var ngay31 = data[0].Ngay31;
				var dateData = [];
				dateData.push(ngay1);
				dateData.push(ngay2);
				dateData.push(ngay3);
				dateData.push(ngay4);
				dateData.push(ngay5);
				dateData.push(ngay6);
				dateData.push(ngay7);
				dateData.push(ngay8);
				dateData.push(ngay9);
				dateData.push(ngay10);
				dateData.push(ngay11);
				dateData.push(ngay12);
				dateData.push(ngay13);
				dateData.push(ngay14);
				dateData.push(ngay15);
				dateData.push(ngay16);
				dateData.push(ngay17);
				dateData.push(ngay18);
				dateData.push(ngay19);
				dateData.push(ngay20);
				dateData.push(ngay21);
				dateData.push(ngay22);
				dateData.push(ngay23);
				dateData.push(ngay24);
				dateData.push(ngay25);
				dateData.push(ngay26);
				dateData.push(ngay27);
				dateData.push(ngay28);
				dateData.push(ngay29);
				dateData.push(ngay30);
				dateData.push(ngay31);
				for (var i = 1; i <= daysOfMonth; i++) {
					var checkDate = new Date(fmonth+" "+i+" "+ fyear);
					var checkDay = checkDate.getDay();
					if(checkDay !== 0 && checkDay !== 6){
						if(dateData[i-1] == "M"){
							if(checkDate<check3Days){
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
								}	
							} else{
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M' selected='selected'>Mặn</option><option value='C'>Chay</option><option value='O'>Không</option></select></td>";
								}
							}
						} else if(dateData[i-1] == "C"){
							if(checkDate<check3Days){
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
								}
							}else{
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C' selected='selected'>Chay</option><option value='O'>Không</option></select></td>";
								}
							}						
						} else{
							if(checkDate<check3Days){
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"' disabled='true'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
								}
							}else{
								if(checkDay === 1){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
								} else if(checkDay === 5){
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td></tr>";
								} else{
									calendar += "<td>Ngày "+i+": <select name='Ngay"+i+"'><option value='M'>Mặn</option><option value='C'>Chay</option><option value='O' selected='selected'>Không</option></select></td>";
								}
							}
						}				
					}
				}
				calendar+="</table>";
				document.getElementById("title").innerHTML = "ĐĂNG KÍ ĂN THÁNG "+fmonth;
				document.getElementById("calendar").innerHTML = calendar;							
			}		}
		})
}

function btnPreMonth(){
	$('button[id="btnPrevious"]').click(function(e){
		preMonth();
	})
}