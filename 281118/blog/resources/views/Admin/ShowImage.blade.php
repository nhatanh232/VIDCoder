<div class="container-fluid" style="width: 70%; height: 70%;background-color:#EEEEEE;">
	<div class="row">
		<div class="col-md-6"><img src="{{URL::asset('layouts/images/QLKho')}}/{{$key->Hinh}}"  style="width: 100%; height: 100%"></div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="Số hợp đồng">Số hợp đồng:{{$key->Sohopdong}}</label>
				<p><label >Người mua:{{$key->Nguoimua}}</label></p>
				<p><label>Ngày mua:{{$key->Ngaymua ? date('d-m-Y', strtotime($key->Ngaymua)) : ""}}</label></p>
			</div>

		</div>
</div></div>