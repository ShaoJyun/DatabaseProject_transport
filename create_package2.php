<?php
	header('Content-Type: text/html; charset=utf-8');
    $fragile=$_POST['fragile'];
    $size=$_POST['size'];
    $weight=$_POST['weight'];
    $type=$_POST['type'];
    $s_name=$_COOKIE['sender_name'];

	require("conn_mysql.php");

    $sql_query1="UPDATE package SET fragile='$fragile',size='$size',weight='$weight',type='$type' WHERE s_name='$s_name'";


    $result1=mysqli_query($db_link,$sql_query1);
    if($result1){
        header("refresh:0;url=show_create_package_result.php");
    }
    else{
        echo"<center><font size=\"8\" color=\"ForestGreen\">失敗，請重新輸入<br>即將跳轉回輸入頁面<br></font></center>";
        header("refresh:3;url=create_package1.html");
        exit;
    }
?>
