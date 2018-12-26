<?php $i=1;?>
<?php $k=1;?>
<?php $z=1;?>
<?php $x=1;?>
<?php $a=1;?>
<?php $b=1;?>
<?php $o = 1;?>
<!-- <br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/> -->
		<div>
			<h1 class="title">CƠ HỘI BẤT NGỜ</h1>			
		</div>
		<div>
			
			<h1 class="info">Kỳ quay thưởng: #@if(!empty($Sodcchon)){{++$Sodcchon->Ki}} @endif| Ngày quay thưởng: @if(!empty($Sodcchon)){{date('d-m-Y',strtotime($Sodcchon->Ngay))}} @else Kì quay được cập nhật vào ngày mai @endif </h1>
		</div>
		<div class="giaithuong">
			<p class="giaithuong1">Giá Trị Giải Thưởng:</p><p class="value">@if(!empty($Sodcchon)) {{number_format($Sodcchon->Giaithuongdb)}}@endif đồng</p>
		</div>

		<div class="container" style="margin-left: 25%; margin-bottom: 10px;">
			@if(!empty($Sodcchon))					
			<div class="luckyNumber">
				<div class="number"  ><STRONG id="Solan1">{{$Sodcchon->Solan1}}</STRONG></div>
			</div>
			<div class="luckyNumber">
				<div class="number" ><STRONG id="Solan2">{{$Sodcchon->Solan2}}</STRONG></div>
			</div>
			<div class="luckyNumber">
				<div class="number"><STRONG id="Solan3">{{$Sodcchon->Solan3}}</STRONG></div>
			</div>
			
			@endif
		</div>	
		<div class="container" id="ShowContent">
			<div class="rows">				
				<!-- Lần 1 -->
				<div class="col-md-3">
					<div class="subTitle">LẦN QUAY 1</div>		
					
					<!-- start for -->			
					@foreach($Lichsu1 as $Lichsu1)	
					<?php $a++ ?>
					@if($a%2 ==0)	
					<br/>
					<div class="t1">{{$Lichsu1->Hoten}}</div>
					<div class="t1-num"><span>{{$Lichsu1->Lan1}}</span></div>
					<div class="t1-num"><span>{{$Lichsu1->Lan2}}</span></div>
					<div class="t1-num"><span>{{$Lichsu1->Lan3}}</span></div>
					
					@else
					<div class="t2">{{$Lichsu1->Hoten}}</div>
					<div class="t2-num"><span>{{$Lichsu1->Lan1}}</span></div>
					<div class="t2-num"><span>{{$Lichsu1->Lan2}}</span></div>
					<div class="t2-num"><span>{{$Lichsu1->Lan3}}</span></div>

					@endif

					@endforeach
				</div>
				<!-- Lần 2 -->
				<div class="col-md-3">
					<div class="subTitle">LẦN QUAY 2</div>
					
					
					<!-- start for -->			
					@foreach($Lichsu2 as $Lichsu2)	
					<?php $b++ ?>
					@if($b%2 ==0)	
					<br/>
					<div class="t1">{{$Lichsu2->Hoten}}</div>
					<div class="t1-num"><span>{{$Lichsu2->Lan1}}</span></div>
					<div class="t1-num"><span>{{$Lichsu2->Lan2}}</span></div>
					<div class="t1-num"><span>{{$Lichsu2->Lan3}}</span></div>
					
					@else
					<div class="t2">{{$Lichsu2->Hoten}}</div>
					<div class="t2-num"><span>{{$Lichsu2->Lan1}}</span></div>
					<div class="t2-num"><span>{{$Lichsu2->Lan2}}</span></div>
					<div class="t2-num"><span>{{$Lichsu2->Lan3}}</span></div>

					@endif

					@endforeach
				</div>
				<div class="col-md-3">
					<div class="subTitle" >ĐẶC BIỆT</div>
					<br/>
					<div id="Nguoidb">	
						@foreach($Giaidacbiet as $Nguoidb)	
						<?php $x++ ?>
						@if($x%2 ==0)
						<div class="t1">{{$Nguoidb->Hoten}}</div>
						<div class="t1-num">{{$Nguoidb->Lan1}}</div>
						<div class="t1-num">{{$Nguoidb->Lan2}}</div>
						<div class="t1-num">{{$Nguoidb->Lan3}}</div>
						
						@else
						<div class="t2">{{$Nguoidb->Hoten}}</div>
						<div class="t2-num">{{$Nguoidb->Lan1}}</div>
						<div class="t2-num">{{$Nguoidb->Lan2}}</div>
						<div class="t2-num">{{$Nguoidb->Lan3}}</div>

						@endif

						@endforeach
					</div>
				</div>
				<div class="col-md-3">
					<div class="subTitle">KHUYẾN KHÍCH</div>			
					<!-- start for -->			
					@foreach($Giaikhuyenkhich as $Nguoikk)	
					<?php $z++ ?>
					@if($z%2 ==0)	
					<br/>
					<div class="t1">{{$Nguoikk->Hoten}}</div>
					<div class="t1-num"><span>{{$Nguoikk->Lan1}}</span></div>
					<div class="t1-num"><span>{{$Nguoikk->Lan2}}</span></div>
					<div class="t1-num"><span>{{$Nguoikk->Lan3}}</span></div>
					
					@else
					<div class="t2">{{$Nguoikk->Hoten}}</div>
					<div class="t2-num"><span>{{$Nguoikk->Lan1}}</span></div>
					<div class="t2-num"><span>{{$Nguoikk->Lan2}}</span></div>
					<div class="t2-num"><span>{{$Nguoikk->Lan3}}</span></div>

					@endif

					@endforeach
					<!-- t2 -->
					
					<!-- end for -->
				</div>
			</div>						
		</div>
	</div>