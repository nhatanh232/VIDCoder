<div class="container-fluid" style="width: 100%; height: 100%;background-color:#EEEEEE;font-family: Arial;font-size: 13px">
	<div class="row" style="height: 100%">
			<div class="col-md-3" style="height: 100%;width: 30%"><img src="{{URL::asset('layouts/images/QLKho')}}/{{$key[0]->Hinh}}"  style="width: 100%; height: 100%">
			</div>
			<div class="col-md-9" style="height: 70%;width: 70%">
				<ul class="list-group" >
					<li><h4>Thông số:</h4><p>{{$key[0]->Thongso}}</p></li>
					<li><h4>Người mua:</h4><p>{{$key[0]->Nguoimua}}</p></li>
					<li><h4>Số hóa đơn:</h4><p>{{$key[0]->Sohopdong}}</p></li>
				</ul>
			</div>
	</div>
</div>
<style type="text/css">
h4{
color:#550808;
}
	p{
		font-size: 13px;
		font-family: Arial;
		color: green;
	}
</style>