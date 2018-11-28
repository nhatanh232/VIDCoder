@extends('Admin.Thanhlygiatri.kethuahome')
@section('body')
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
	
	<script src="{{asset('Admin/js/modernizr-custom.js')}}"></script>
	
	<!-- datatables -->



	<!-- bootstrap -->
	
<!-- Latest compiled and minified CSS -->


<!-- Optional theme -->

<!-- Latest compiled and minified JavaScript -->

	<!-- end -->

	<!-- script for button made by me: -->

	<script type="text/javascript" src="{{asset('Admin/js/Module.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/information.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/jquery.elevatezoom.js')}}"></script>
<div class="container-fluid" style="font-family: Arial">
	<div class="row">
		<div class="col-md-4"><h1>Chi tiết sản phẩm</h1></div>
		<div class="col-md-7" ><h1 style="text-align: right;"><label style="color: #FF3333;">{{$data->Giadexuat}} ₫</label><label><img src="{{URL::asset('layouts/images/icon-price.png')}}" ></label></h1></div>
	
		


	</div>
	<div class="row">
		<div class="col-md-4" id="showzoom">
			<img src="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh}}" style="width: 100%" id="zoomshow" data-zoom-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh}}">
			<div class="row" id="gallery_01">
				@if($data->Hinh !=null)
				<div class="col-md-3">
					 <a href="#" data-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh}}"  data-zoom-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh}}" >
					 	<img src="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh}}" alt="..." class="img-thumbnail" data-zoom-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh}}" id="zoomshow" >
					</a> </div>
				@endif
				@if($data->Hinh1 !=null)
				<div class="col-md-3">
					 <a href="#" data-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh1}}"  data-zoom-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh1}}" >
					 	<img src="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh1}}" alt="..." class="img-thumbnail" data-zoom-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh1}}" id="zoomshow" >
					 </a>
					 </div>
					 
				@endif
				@if($data->Hinh2 !=null)
				<div class="col-md-3">
					<a href="#" data-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh2}}"  data-zoom-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh2}}" >
						<img src="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh2}}" alt="..." class="img-thumbnail" data-zoom-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh2}}" id="zoomshow">
					</a>
					</div>
					
				@endif
				@if($data->Hinh3 !=null)
				<div class="col-md-3">
					 <a href="#" data-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh3}}"  data-zoom-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh3}}" >
						<img src="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh3}}" alt="..." class="img-thumbnail" data-zoom-image="{{URL::asset('layouts/images/thanhly')}}/{{$data->Hinh3}}" id="zoomshow">
					</a>
				</div>
					
				@endif
			</div>
			

		</div>
		<div class="col-md-8">
			<ul class="list-group">
				
	<div class="row">		

	<div class="col-md-12">
		<li>
			<h4>Mã tài sản</h4>
			<p>{{$data->MTS}}</p>
		</li>
	</div>
	</div>
					<li><h4>Tên</h4>
			<p>{{$data->Ten}}</p></li>
			<li><h4>Mô tả sản phẩm</h4>
			<p>{{$data->Mota}}</p></li>
			<li><h4>Các giấy tờ kèm theo</h4>
			<p>{{$data->Giayto}}</p></li>
		
			
			</ul>
			<div class="col-md-2">
			</div>
			<div class="col-md-2">
			</div>
			<div class="col-md-2">
			</div>
			<div class="col-md-2">
			</div>

			<div class="col-md-2"><img src="{{URL::asset('layouts/mua-ngay.gif')}}" style="width: 130%;height: 130%" class="btn"></div>
		</div>
		
		</div>
	</div>
	

</div>
 <br class="clearfix"/>



<style type="text/css">
	h4{
		font-weight: bold;
	}
	p{
		font-family: Arial;
		font-size: 13px;

	}
	img.active{
		border: 3px solid green;

	}
</style>
 <script type="text/javascript">
	clickSlider();
	$("#zoomshow").elevateZoom({
		lensShape : "round",
		
		gallery:'gallery_01',
		scrollZoom:'true',
		 galleryActiveClass: 'active', 
		
	})
	$("#zoomshow").bind("click", function(e) {  
  var ez =   $('#zoomshow').data('elevateZoom');	
	$.fancybox(ez.getGalleryList());
  return false;
});

</script>
<style type="text/css">
	
</style>


@endsection