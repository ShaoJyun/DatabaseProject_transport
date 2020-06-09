<?php
	header('Content-Type: text/html; charset=utf-8');
	$d_ssn=$_POST['d_ssn'];
    $d_no=$_POST['d_no'];
	setcookie('d_no',$d_no);
	require("conn_mysql.php");
	$sql_query_login="SELECT * FROM delivery_man where d_ssn='$d_ssn' AND d_ssn!='S123123456' AND d_no='$d_no' AND d_no!='123'";
	$result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
	if(mysqli_num_rows($result1)){

		header("refresh:0;url=Dwelcome.html");//如果成功跳轉至welcome.html頁面
        exit;
		echo"</table>";
	}else{
        echo"<script>alert('登入失敗啦哈哈哈')</script>";
    	header("refresh:1;url=dlogin.html");
	}

?>
