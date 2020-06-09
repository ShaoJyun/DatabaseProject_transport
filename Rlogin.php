<?php
	header('Content-Type: text/html; charset=utf-8');
	$r_phone=$_POST['r_phone'];
	setcookie('recipient_phone',$r_phone);
	require("conn_mysql.php");
	$sql_query_login="SELECT * FROM recipient where r_phone='$r_phone'";
	$result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
	if(mysqli_num_rows($result1)){

		header("refresh:0;url=Rwelcome.html");//如果成功跳轉至welcome.html頁面
        exit;
		echo"</table>";
	}else{
		echo"登入失敗";
	}

?>
