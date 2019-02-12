var slideIndex =15;
var show = 0;
	

$(document).ready(function(){
	detail();
	filter();
clickSliderNext(slideIndex);
clickSliderPre(slideIndex);
showSlides(slideIndex);




})
// function slidershow
function clickSliderNext(n){
	$('.navigator-right').click(function(){
		
		slideIndex = slideIndex + 15
		if(slideIndex < 0)
			slideIndex= 6;
		if(show < 0 )
			show = 0;
		showSlides(slideIndex);

	})
	
}
function clickSliderPre(n){
	$('.navigator-left').click(function(){
		slideIndex = slideIndex - 15;
		show = show - 30;
		if(slideIndex < 0)
		slideIndex= 6;
		if(show < 0 )
		show = 0;
		showSlides(slideIndex);

	})
	
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("product-sort");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) 
  	{
  		slideIndex = slides.length
  	}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for( show ; show < n ; show++){
  	$('.product-sort').eq(show).fadeOut(200);
  	$('.product-sort').eq(show).fadeIn(500);
  

  }
  
}
// end function

// function filter
function detail(){
	$('.product-sort').hover(function(event){
		var dialog = $(this).find('.detail-product').css({'display':'block',
			'top':'30%' , 'left':'30%'});
	},function(event){
		var dialog = $(this).find('.detail-product').css({'display':'none'});
	})
}

function filter(){
	var value;
	$('input[name="Search"]').keyup(function(){
		value = this.value.toLowerCase();
		var jquery  = $('.product-sort');
		jquery.filter(function(){
		var res = $(this).find('h5').text().toLowerCase().indexOf(value);
		var count = $(this).toggle(res >-1);
		
		})
	})
}