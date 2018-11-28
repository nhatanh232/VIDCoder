<div class="container-fluid" style="background-image: url('{{asset("layouts/backgroundinfo.jpg")}}');">
<h1 class="d-flex justify-content-center" style="font-family: Comic Sans MS;">Thông tin cá nhân</h1>
<div class="row">
	<div class="col-md-2 border border-success" style="height:200px; background-position: center;
    background-repeat: no-repeat;
    background-size: cover;background-image: url('{{asset("layouts/images/QLKho/$key->Hinh")}}');">
	
	</div>
	<div class="col-md-10">
		<div class="col-md-12">
		<h3 style="font-weight: bold;">HỌ TÊN:<span class="text-primary" > {{$key->Hoten}}<span></h3>
		<h3 style="font-weight: bold;">MÃ NHÂN VIÊN:<span class="text-success" id="Manv" > {{$key->Manv}}<span></h3>
		</div>
		<div class="col-md-6">
			<h3 class="btn-link">Tiền mặt:{{number_format($key->Tienmat)}}<span> VNĐ</span></h3>
		<h3 class="btn-link" id="voucher">Voucher:{{number_format($key->Vouncher)}}<span> VNĐ</span></h3>
		<h3 class="btn-link" id="tscn">Tài sản cá nhân</h3></button>
		</div>
		<div class="col-md-6">
		<h3>Điểm tích lũy:<span style="margin-left: 37px">{{$key->Diemtichluy}} </span><span>điểm</span></h3>
		<h3>Giờ đào tạo:	<span style="margin-left: 43px">{{$key->Giodaotao}}</span><span> giờ</span></h3>
		<h3>Điểm cống hiến:<span style="margin-left: 5px">	{{$key->Diemconghien}}</span><span> giờ</span></h3>
		</div>

	</div>
</div>
	<div id="showtlcn">
	<p></p>
	</div>
</div>

