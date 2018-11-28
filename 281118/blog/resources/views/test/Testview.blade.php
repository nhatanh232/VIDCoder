<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.dev.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
	<title></title>
</head>
<body>
	<h1>Test</h1>

	<script type="text/javascript">
		var socket = io('http://localhost:6001');
		socket.on('chat:mess',function(){
			window.location.reload();
			
		});
	</script>
</body>
</html>