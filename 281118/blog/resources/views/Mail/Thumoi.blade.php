<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
    <p>Trân trọng kính mời anh/chị , ông/bà: </p>
    <p>Tham dự cuộc họp.</p>
    <p>Chủ đề: {{$tenhop}}</p>
    <p>Thời gian bắt đầu: <?php echo str_replace("T"," ",$startdate) ?> và kết thúc vào lúc <?php echo str_replace("T"," ",$enddate) ?></p>
    <p>Địa điểm: {{$diadiem}}</p>
    <p>Nội dung: {{$noidung}}</p>
    <p>Trân trọng cảm ơn</p>
    <div style="text-align: right;margin-right: 200px">
    <p style="margin-right: 47px">Ký tên</p>
    <p>{{$name}}</p>
	</div>
</div>
</body>
</html>