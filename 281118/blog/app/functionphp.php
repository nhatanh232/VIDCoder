<?php
 function login($user,$pass){
	$conn = mysqli_connect("localhost","root","","lanweb");
	$sql = "SELECT * FROM login WHERE Username='".$user."' AND Password='".$pass."'";
	$result = $conn->query($sql);
		if($result->num_rows >0)
			return true;
		else 
			return false;
		
}
function register($Manhanvien , $email, $pass){
		$conn = new PDO("mysql:host=localhost;dbname=lanweb;charset=utf8","root","");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO login VALUES (:email, :pass, :Manhanvien)";
		try{
			$result1 = $conn -> prepare($sql);
			$result1 -> bindParam(':Manhanvien',$Manhanvien);
			$result1 -> bindParam(':email',$email);
			$result1 -> bindParam(':pass',$pass);
			if($result1 -> execute())
				echo  '<h1 class="w3ls">Đăng ký thành công</h1>';
		}
		catch (PDOException $e )
		{
			echo '<h1 class="w3ls">Error 404 </h1>';
		}
}
// function showds(){
// 	$conn = new PDO("mysql:host=localhost;dbname=lanweb;charset=utf8","root","");
// 	$result2 = $conn->query("SELECT Manhanvien,Hoten , Phongban,Congty FROM danhsachnv");
// 	$i = 1;
// 	foreach ($result2 as $key) {
// 		$data = '<tr><th scope="row">'.$i++.'</th>';
// 		$data.= '<td>'.$key['Hoten'].'</td>';
// 		$data.= '<td>'.$key['Phongban'].'</td>';
// 		$data.='<td>'.$key['Congty'].'</td>';
// 		$data.=' <td>
// 		<select class="'.$key['Manhanvien'].'" name="thu2" disabled>
//       			<option value="Chay">Chay</option>
// 		     		 	<option value="Mặn">Mặn </option>
// 		     		 	<option value="Nghĩ">nghĩ</option>
// 		  </select>
// 		  </td>
// 		   <td>
// 		 <select class="'.$key['Manhanvien'].'" name="thu3"  disabled>
// 		      <option value="Chay">Chay</option>
// 		     <option value="Mặn">Mặn </option>
// 		    		  	<option value="Nghĩ"> Nghĩ</option>
// 		      </select></td>
// 		      <td class="cuong">
// 		  <select class="'.$key['Manhanvien'].'" name="thu4"  disabled>
// 		      	<option value="Chay">Chay</option>
// 		      	<option value="Mặn">Mặn </option>
// 		      	<option value="Nghĩ"> Nghĩ</option>
// 		      </select></td>
// 		      <td>
// 		      <select class="'.$key['Manhanvien'].'" name="thu5" disabled>
// 		      	<option value="Chay">Chay</option>
// 		      	<option value="Mặn">Mặn </option>
// 		      	<option value="Nghĩ"> Nghĩ</option>
// 		      </select></td>
// 		      <td>
// 		      <select class="'.$key['Manhanvien'].'" name="thu6"  disabled>
// 		      	<option value="Chay">Chay</option>
// 		      	<option value="Mặn">Mặn </option>
// 		      	<option value="Nghĩ"> Nghĩ</option>
// 		   		 				  </select></td>
// 		   		   <td>
	
// 				    </tr>';
		   
// 		echo $data;
// 	}
// }
function laypassword($email){
	$conn = mysqli_connect("localhost","root","","lanweb");
	$sql = "SELECT Username,Password FROM login WHERE Username='".$email."'";
	$result4 = $conn->query($sql);
	foreach ($result4 as $key) {
		$user = $key['Username'];
		$pass = $key['Password'];
	}

}
function Chayulybuttondk($h){
	date_default_timezone_get('Asia/Ho_Chi_Minh');
	$ngaythg = new Datetime("now",new DatetimeZone('Asia/Ho_Chi_Minh'));
 $button = '<button type="button" class="btn btn-primary btn-lg">Đăng ký</button>';
 $button2 = '<button type="button" class="btn btn-primary btn-lg" hidden>Đăng ký</button>';
 if ($h > 10)
 	echo $button2;
 else
 	echo $button;
	}
function Manhanvien($user){
	$conn = mysqli_connect("localhost","root","","lanweb");
	$sqlid = 'SELECT IDNV FROM login WHERE Username="'.$user.'"';
	$id = $conn->query($sqlid);
	foreach ($id as $key ) {
		echo $key['IDNV'];
	}
} 
function showds2(){
	$conn = new PDO("mysql:host=localhost;dbname=lanweb;charset=utf8","root","");
	$result2 = $conn->query("SELECT Manhanvien,Hoten , Phongban,Congty,Thu2,Thu3,Thu4,Thu5,Thu6 FROM danhsachnv");
	$i = 1;
	foreach ($result2 as $key) {
		$data = '<tr><th scope="row">'.$i++.'</th>';
		$data.= '<td>'.$key['Hoten'].'</td>';
		$data.= '<td>'.$key['Phongban'].'</td>';
		$data.='<td>'.$key['Congty'].'</td>';
		$data.=' <td>
		<select class="'.$key['Manhanvien'].'" name="thu2" disabled>
				<option value="'.$key['Thu2'].'" Selected>'.$key['Thu2'].'</option>
      			<option value="Chay">Chay</option>
		     		 	<option value="Mặn">Mặn </option>
		     		 	<option value="Nghĩ">nghĩ</option>
		  </select>
		  </td>
		   <td>
		 <select class="'.$key['Manhanvien'].'" name="thu3"  disabled>
		 <option value="'.$key['Thu3'].'" Selected>'.$key['Thu3'].'</option>
		      <option value="Chay">Chay</option>
		     <option value="Mặn">Mặn </option>
		    		  	<option value="Nghĩ"> Nghĩ</option>
		      </select></td>
		      <td class="cuong">
		  <select class="'.$key['Manhanvien'].'" name="thu4"  disabled>
		  <option value="'.$key['Thu4'].'" Selected>'.$key['Thu4'].'</option>
		      	<option value="Chay">Chay</option>
		      	<option value="Mặn">Mặn </option>
		      	<option value="Nghĩ"> Nghĩ</option>
		      </select></td>
		      <td>
		      <select class="'.$key['Manhanvien'].'" name="thu5" disabled>
		      <option value="'.$key['Thu5'].'" Selected>'.$key['Thu5'].'</option>
		      	<option value="Chay">Chay</option>
		      	<option value="Mặn">Mặn </option>
		      	<option value="Nghĩ"> Nghĩ</option>
		      </select></td>
		      <td>
		      <select class="'.$key['Manhanvien'].'" name="thu6"  disabled>
		      	<option value="'.$key['Thu6'].'" Selected>'.$key['Thu5'].'</option>
		      	<option value="Chay">Chay</option>
		      	<option value="Mặn">Mặn </option>
		      	<option value="Nghĩ"> Nghĩ</option>
		   		 				  </select></td>
		   		   <td>
	
				    </tr>';
		   
		echo $data;
	}
}
function Manhanvien2($user){
	$conn = mysqli_connect("localhost","root","","lanweb");
	$sqlid = 'SELECT IDNV FROM login WHERE Username="'.$user.'"';
	$id = $conn->query($sqlid);
	foreach ($id as $key ) {
		return $key['IDNV'];
	}
} 
function Dangkyan($user,$thu2,$thu3,$thu4,$thu5,$thu6){
	$conn = mysqli_connect("localhost","root","","lanweb");
	mysqli_set_charset($conn,"utf8");
	$ma  = Manhanvien2($user);
	$sqldangky = 'UPDATE danhsachnv SET Thu2="'.$thu2.'", Thu3="'.$thu3.'", Thu4="'.$thu4.'", Thu5="'.$thu5.'", Thu6="'.$thu6.'" WHERE Manhanvien="'.$ma.'"';
	if($conn->query($sqldangky)==1)
		echo '<script> alert("đăng ký thành công")</script>';
	else
		echo '<script> alert("'.$sqldangky.'")</script>';
}
