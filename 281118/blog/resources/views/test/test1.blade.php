@extends('kethua')
@section('body')
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.dev.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
</head>
<body>




	
	<form action="postRe" method="post"> 
		@csrf
		<input type="text" name="id">
		<button>submit</button>
	</form>

	<div class="container-fluid" id="ShowContent">

	</div>

	<script type="text/javascript">
		var socket = io('http://localhost:6001');
		socket.on('chat:mess',function(){
			Refesh();
		});

	
	function Refesh(){
		$.ajax({
			type:'get',
			url:'Refesh',
			success:function(data){

				$('#ShowContent').html(data);
			}


		})
	}
	</script>
</body>
</html>
@endsection