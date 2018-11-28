@extends('thunghiemkethua')
@section('body')
<div class="container" style="font-size: 22px">
	<div class="row">
		<form action="{{route('AddPosts')}}}" method="GET">
	<h1><span class="label label-success">Đăng Thông Báo</span></h1>

		<p>	<div class="row">
			 <div class="col-sm-12">
			 	<div class="col-sm-2"></div>
			 	<div class="col-sm-2"></div>
			 	<div class="col-sm-2"><span class="label label-danger">Tiêu đề:</span></div>
			 		<div class="col-xl-6"><input type="text" name="Title"></div>
			 		</div>
			</p>
			 <div class="form-group">
      <label for="comment">Nội dung tổng quát:</label>
      <textarea class="form-control" rows="5" id="Des"></textarea>
    </div>
				<div class="form-group">
      <label for="comment">Nội dung chi tiết:</label>
      <textarea class="form-control" rows="5" id="Cont"></textarea>
    </div>
    <button type="button" class="btn btn-primary btn-lg" >Đăng</button>
		</form>
	</div>
</div>
@endsection