function Nhapso(){
	var n1 = $('#Sobanh').find('h1:first-child').find('strong').text();
	var n2 = $('#Sobanh').find('h1:last-child').find('strong').text();
	var n3 = $('#Sobanh').find('h1:nth-child(2)').find('strong').text();
	if(n1==""){
		$('#Nhapso').html("Nhập số lần 1:");
	}
	else if(n1!=='' && n3 == ""){
		$('#Nhapso').html("Nhập số lần 2:");
	}
	else{
		$('#Nhapso').html("Nhập số lần 3:");
	}
postNhapso();
Hienthi();
}
function Kiemtraval(){
	var i = 1;
	for(i ; i <= 3 ; i++){
	var n = $('#Sobanh').find('h1:nth-child('+i+')').find('strong').text();
	if(n=="")
	return 'Solan'+i;
}
}

function postNhapso(){
	
 	$('#postSo').click(function(){
 		var n = Kiemtraval();
 	
 		var value = $('input[name="postSo"]').val();
 		$.ajax({
 			type:'get',
 			url:'postSo',
 			data:{ 				
 				n:Kiemtraval,
 				value:value,
 			},
 			success:function(){

 				$('input[name="postSo"]').val("");
 				$('[data-action="'+n+'"]').html(value);
 				if(n =="Solan3")
 				{
 					$('input[name="postSo"]').remove();
 					$('#postSo').remove();
 					$('#Nhapso').remove();

 					}
 			}
 		})
 	})
}

//Xóa số đã nhập
function deleteSo(){
	$('#xoaSo').click(function(){
		var value = "";
		$.ajax({
			type:'get',
			url: 'deleteSo',
			data:{
				value:value,
			},
			success:function(){
				$('strong').html(value);
			}
		})
	})
}

function Hienthi(){
	var n = $('#Sobanh').find('h1:last-child').find('strong').text();
	console.log(n);
			if(n !=="")
 				{
 					$('input[name="postSo"]').remove();
 					$('#postSo').remove();
 					$('#Nhapso').remove();
 					}
}
function Dacbiet(){
	var lan1 = $('.number:nth-child(1)').find('strong');
	var lan2 = $('.number:nth-child(2)').find('strong');
	var lan3 = $('.number:nth-child(3)').find('strong');


	var Solan1 =	$('#Solan1').text();
	var Solan2 = $('#Solan2').text();
	var Solan3 = $('#Solan3').text();

	var qr1 = 1;
	var qr2 = 2;
	var qr3 = 3;

	if(Solan1 !== "" && Solan2 =="")
	{
		
		
		$.ajax({
			type:'get',
			url:'Nguoidacbiet',
			data:{
				Solan:qr1,
			},
			success:function(data){
				$('#Nguoidb').html(data);
				
			}
		})
	}
	else if(Solan1 !== "" && Solan2 !=="" && Solan3 =="")
	{
		
		$.ajax({
			type:'get',
			url:'Nguoidacbiet',
			data:{
				Solan:qr2,
			},
			success:function(data){
				$('#Nguoidb').html(data);
				
			}
		})
	}
	else if(Solan1 !== "" && Solan2 !=="" && Solan3 !==""){
		console.log('lan3');
		$.ajax({
			type:'get',
			url:'Nguoidacbiet',
			data:{
				Solan:qr3,
			},
			success:function(data){
				$('#Nguoidb').html(data);

			}
		})
	}
}
function Tomau(){
		var Solan1 = $('#Solan1').text();
	var Solan2 = $('#Solan2').text();
	var Solan3 = $('#Solan3').text();
	document.getElementsByName(Solan1)[0].style.background = "red";
	document.getElementsByName(Solan1)[0].style.color = "white";
	document.getElementsByName(Solan2)[0].style.background = "red";
	document.getElementsByName(Solan2)[0].style.color = "white";
	document.getElementsByName(Solan3)[0].style.background = "red";
	document.getElementsByName(Solan3)[0].style.color = "white";
}
function Countdown(Time){
	var countDownDate = new Date(Time).getTime();
 
  	// cập nhập thời gian sau mỗi 1 giây
  	var x = setInterval(function() {
 
    // Lấy thời gian hiện tại
    var now = new Date().getTime();
 
    // Lấy số thời gian chênh lệch
    var distance = countDownDate - now;
 
    // Tính toán số ngày, giờ, phút, giây từ thời gian chênh lệch
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

   	var day = days.toString();
   	var hour = hours.toString();
   	var minute = minutes.toString();
   	var second = seconds.toString();
   	if(day.length == 1){
   		day = "0"+day;
   	}
   	if(hour.length == 1){
   		hour = "0"+hour;
   	}
   	if(minute.length == 1){
   		minute = "0"+minute;
   	}
   	if(second.length == 1){
   		second = "0"+second;
   	}
 
    // HIển thị chuỗi thời gian trong thẻ p
    document.getElementById("time").innerHTML ="<div class='bigdiv'><div><span class='text-time'>"+day +
     "</span><div class='div-description'>Ngày</div></div></div><div class='bigdiv'><div><span class='text-time'>"
     + hour + "</span><div class='div-description'>Giờ</div></div></div><div class='bigdiv'><div><span class='text-time'>"
    + minute + "</span><div class'div-description'>Phút</div></div></div><div class='bigdiv'><div><span class='text-time'>"
     + second + "</span><div class='div-description'>Giây</div></div></div>";
 
    // Nếu thời gian kết thúc, hiển thị chuỗi thông báo
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("time").innerHTML = "Thời gian đếm ngược đã kết thúc";
    }
  }, 1000);
}
function preResult(){
	var Ki = $('.info').text();
	var result = --Ki.split(" ")[3].split('#')[1];
	console.log(result);
	
	$.ajax({
		type:'get',
		url:'preKi',
		 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
		data:{
			Ki:result,
		},
		success:function(data){
			$('#His').html(data);
		}
	})
}
function nextResult(){
	var Ki = $('.info').text();
	var result = ++Ki.split(" ")[3].split('#')[1];
	console.log(result);
	
	$.ajax({
		type:'get',
		url:'preKi',
		 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
		data:{
			Ki:result,
		},
		success:function(data){
			$('#His').html(data);
		}
	})
}

