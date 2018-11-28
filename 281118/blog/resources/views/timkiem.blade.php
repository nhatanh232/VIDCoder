@extends('kethua1')
@section('body')

     <div class="templatemo-slogan text-center">
           <span class="txt_darkgrey">Danh sách đăng ký </span><span class="txt_orange">Tuần 1 - Tháng 7 </span>
                   
       </div>	
           

	<form action="{{route('updateDKA')}}" method="POST" name="save">
	@csrf
	<table class="table table-dark">
	<thead>
	    <tr>
	      <th scope="col">STT</th>
	      <th scope="col">Họ tên</th>
	      <th scope="col">Bộ phận</th>
	      <th scope="col">Công ty</th>
	      <th scope="col">Thứ 2</th>
	      <th scope="col">Thứ 3</th>
	      <th scope="col">Thứ 4</th>
	      <th scope="col">Thứ 5</th>
	      <th scope="col">Thứ 6</th>
		 </tr>
	</thead>
	<tbody><?php $i=0 ?>
		@foreach($actor as $key)

		<tr><th scope="row">{{$i=$i+1}}</th>
			<td>{{$key->Hoten}}</td>
			<td>{{$key->Phongban}}</td>
			<td>{{$key->Congty}}</td>
		  <td >
			<select class="{{$key->Manv}}" name="Thu2" disabled>
					<option value="{{$key->Thu2}}" Selected >{{$key->Thu2}}</option>
	      			<option value="Chay" name="Thu2_op">Chay</option>
			     		 	<option value="Mặn" name="Thu2_op">Mặn </option>
			     		 	<option value="Nghỉ" name="Thu2_op">Nghỉ</option>
			  </select>
		 </td>
		 <td>
			 <select class="{{$key->Manv}}" name="Thu3"  disabled>
			 <option value="{{$key->Thu3}}" Selected   >{{$key->Thu3}}</option>
			      <option value="Chay" name="Thu3_op">Chay</option>
			     <option value="Mặn" name="Thu3_op">Mặn </option>
			    		  	<option value="Nghỉ" name="Thu3_op"> Nghỉ</option>
			      </select>
		</td>
		 <td class="cuong">
			  <select class="{{$key->Manv}}" name="Thu4"  disabled>
			  <option value="{{$key->Thu4}}" Selected  >{{$key->Thu4}}</option>
			      	<option value="Chay" name="Thu4_op"  >Chay</option>
			      	<option value="Mặn"  name="Thu4_op" >Mặn </option>
			      	<option value="Nghỉ" name="Thu4_op" > Nghỉ</option>
			      </select>
		</td>
			 <td>
			      <select class="{{$key->Manv}}" name="Thu5" disabled>
			      <option value="{{$key->Thu5}}" Selected >{{$key->Thu5}}</option>
			      	<option value="Chay" name="Thu5_op">Chay</option>
			      	<option value="Mặn" name="Thu5_op">Mặn </option>
			      	<option value="Nghỉ" name="Thu5_op"> Nghỉ</option>
			      </select>
			 </td>
			      <td>
			      <select class="{{$key->Manv}}" name="Thu6"  disabled>
			      	<option value="{{$key->Thu6}}" Selected >{{$key->Thu6}}</option>
			      	<option value="Chay" name="Thu6_op">Chay</option>
			      	<option value="Mặn"  name="Thu6_op">Mặn </option>
			      	<option value="Nghỉ" name="Thu6_op"> Nghỉ</option>
			   	 </select>
			   	</td>   		 
				    </tr>
			   </tbody>
	</table>
		<button type="submit" id="dangkyan" name="save">Đăng ký</button> 

	</form>

	<script type="text/javascript">
	function xulybutton(){
		var d = new Date();
		var h = d.getHours();

		if (h > 10 )
			document.getElementById("dangkyan").style.display = 'none';
		else
			document.getElementById("dangkyan").style.display = 'block';
	}
	function enablesl(){
		var i=0;
		for (i ; i < 5 ; i++ )
			document.getElementsByClassName("{{Auth::user()->Manv}}")[i].disabled = false;

	}
	function chotdanhsach(){
	
			var d = new Date();
			var day = d.getDay();
			var weekday = new Array(7);
			weekday[0] = "CN";
			weekday[1]="Thu2_op";
			weekday[2]="Thu3_op";
			weekday[3]="Thu4_op";
			weekday[4]="Thu5_op";
			weekday[5]="Thu6_op";
			weekday[6]="Thu7_op";
			var n = weekday[day];
			var i ,x1 , x2,x3 ,x4 ,x5 ;
			x1 = document.getElementsByName("Thu2_op");
				 x2 =document.getElementsByName("Thu3_op");
				 x3 = document.getElementsByName("Thu4_op");
				 x4 =document.getElementsByName("Thu5_op");
				 x5 = document.getElementsByName("Thu6_op");
			if (n=="Thu2_op")
			for (i =0; i < x1.length ; i++)
				{	x1[i].disabled = true;
					x2[i].disabled = true;
					x3[i].disabled = true;

				}
			if (n=="Thu3_op")
			for (i =0; i < x1.length ; i++)
				{			
					x2[i].disabled = true;
					x3[i].disabled = true;
					x4[i].disabled = true;

				}
				if (n=="Thu4_op")
			for (i =0; i < x1.length ; i++)
				{		
					x3[i].disabled = true;	
					x4[i].disabled = true;
					x5[i].disabled = true;

				}
			if (n=="Thu5_op")
			for (i =0; i < x1.length ; i++)
				{			
					
					x4[i].disabled = true;
					x5[i].disabled = true;

				}
		
	}
	function enablesl(){
		var i=0;
		for (i ; i < 6 ; i++ )
			document.getElementsByClassName("{{Auth::user()->Manv}}")[i].disabled = false;
			
	}
	xulybutton();	
 	chotdanhsach();
	enablesl();
	</script>

@endforeach
@endsection