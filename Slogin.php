<?php
	header('Content-Type: text/html; charset=utf-8');
	$s_phone=$_POST['s_phone'];
	setcookie('sender_phone',$s_phone);
	require("conn_mysql.php");
	$sql_query_login="SELECT * FROM sender where s_phone='$s_phone'";
	$result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
	if(mysqli_num_rows($result1)){

		header("refresh:0;url=Swelcome.html");//如果成功跳轉至welcome.html頁面
        exit;
		echo"</table>";
	}else{
		echo"登入失敗";
	}

?>
