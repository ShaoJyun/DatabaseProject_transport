<?php
	header('Content-Type: text/html; charset=utf-8');
    $s_time=date("Y-m-d H:i:s",mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
    $return_time=date("Y-m-d H:i:s",mktime(date('H')+8, date('i'), date('s'), date('m'), date('d')+17, date('Y'))) ;
    $arrival_time=date("Y-m-d H:i:s",mktime(date('H')+8, date('i'), date('s'), date('m'), date('d')+10, date('Y'))) ;
    $s_name=$_POST['s_name'];
    $s_store=$_POST['s_store'];
    $r_name=$_POST['r_name'];
    $r_store=$_POST['r_store'];
    $p_no=rand(10000,99999);
    $depot_no=rand(1,10);
    $t_no=rand(1,50);
    setcookie('sender_name',$s_name);
    setcookie('no',$p_no);

	require("conn_mysql.php");

    $sql_query1="INSERT INTO package (p_no,depot_no,return_time,s_name,r_name,s_store,r_store,s_time,t_no,arrival_time)VALUE('$p_no','$depot_no','$return_time','$s_name','$r_name','$s_store','$r_store','$s_time','$t_no','$arrival_time')";


    $result1=mysqli_query($db_link,$sql_query1);
    if($result1){
        header("refresh:0;url=create_package2.html");
    }
    else{
        echo"<center><font size=\"8\" color=\"ForestGreen\">失敗，請重新輸入<br>即將跳轉回輸入頁面<br></font></center>";
        header("refresh:3;url=create_package1.html");
        exit;
    }
?>
