@extends('kethua')
@section('body')
@foreach($tintuc as $key)
<style type="text/css">
	p{
		font-family: Arial;
		font-size: 18px;
	}
</style>
<div class="container">
	<div class="row">
		 <ul class="templatemo-project-gallery" >
                       
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-graphic" >
                            <a class="colorbox" href="{{URL::asset('layouts/images/thongbao')}}{{$key->Images}}" data-group="gallery-graphic">
                                <div class="templatemo-project-box">

                                    <img src="{{URL::asset('layouts/images/thongbao')}}{{$key->Images}}" class="img-responsive" alt="gallery" />

                                    <div class="project-overlay">
                                  
                                    </div>
                                </div>
                            </a>
                        </li></ul>
 
                       
		  <!-- <div class="col-xs-4"><img src="{{URL::asset('layouts/images/thongbao/')}}{{$key->Images}}" style="width: 370px;padding-top: 30px;"></div> -->
			<div class="col-sm-8"><h2><b>{{$key->Titile}}</b></h2> 
				<p><a href="{{$key->url}}" target="_blank">{{$key->url}}</p></a>
				<h4><b>{{$key->Titlep1}}</b></h4>
				<p>{{$key->Content}}</p>
				<h4><b>{{$key->Titlep2}}</b></h4></div>
				<p>{{$key->Content2}}</p>
	</div>

</div>
@endforeach
@endsection