<?php $x = 1 ?>
@foreach($Dacbiet as $Nguoidb)	
					<?php $x++ ?>
					@if($x%2 ==0)	
					<br/>
					<div>
					<div class="t1">{{$Nguoidb->Hoten}}</div>
					<div class="t1-num"><span>{{$Nguoidb->Lan1}}</span></div>
					<div class="t1-num"><span>{{$Nguoidb->Lan2}}</span></div>
					<div class="t1-num"><span>{{$Nguoidb->Lan3}}</span></div>
					</div>
					
					@else
					<div class="t2">{{$Nguoidb->Hoten}}</div>
					<div class="t2-num"><span>{{$Nguoidb->Lan1}}</span></div>
					<div class="t2-num"><span>{{$Nguoidb->Lan2}}</span></div>
					<div class="t2-num"><span>{{$Nguoidb->Lan3}}</span></div>

					@endif

					@endforeach

