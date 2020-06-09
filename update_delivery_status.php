<! doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>小山貨運</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            @import "test.css";

        </style>
    </head>

    <body>
        <div class="container" id="main">
            <div class="row">
                <div class="col-md-12">
                    <header>

                        <center><a href="welcome.html"><img src="物流商標.png" class="img-responsive" width="100%" height="50%"></a></center>
                        <nav id="items">
                            <center>
                                <ul class="list-inline">
                                    <input type="button" name="typeA" value="寄件人" onclick="location.href='Slogin.html'">
                                    <input type="button" name="typeA" value="收件人" onclick="location.href='Rlogin.html'">
                                    <input type="button" name="typeB" value="物流人員" onclick="location.href='Dwelcome.html'">
                                    <input type="button" name="typeA" value="管理者" onclick="location.href='mlogin.html'">
                                </ul>
                            </center>
                        </nav>
                    </header>
                </div>
            </div>


            <div class="row" id="leftcontain">
                <div class="col-md-2">
                    <aside>
                        <h3> &nbsp;&nbsp;物流人員 </h3>
                        <nav id="delivery_man">
                            <!--login頁這裡全都要導回login頁 不允許後續功能-->
                            <ul>
                                <li><a href="Dscheduling.php">查詢排班</a></li><br>
                                <li><a href="search_all_package.php">查詢貨物狀況</a></li><br>
                                <li><a href="update_delivery_status.html">更新運送狀態</a></li><br>
                            </ul>
                        </nav>
                    </aside>
                </div>
                <div class="col-md-10" id="maincontain">
                    <br><br>
					<center>
						<p><font size="6" color="#008080">更新資訊</font></p>

<?php
	header('Content-Type: text/html; charset=utf-8');
	$p_no=$_POST['p_no'];
	$shipping_status=$_POST['shipping_status'];

	require("conn_mysql.php");
	$sql_query_check="SELECT * FROM package Where p_no='$p_no'";

	$result1=mysqli_query($db_link,$sql_query_check);
	if(mysqli_num_rows($result1)==0){//d_no not exist
		echo "<script>alert('查無此包裹')</script>";
		header("refresh:1;url=update_delivery_status.html");
		exit;
	}else{
	   $update="UPDATE package SET shipping_status='$shipping_status' WHERE p_no='$p_no'";

	   $result2=mysqli_query($db_link,$update);
	   if($result2)
	   {
		   $data="SELECT p_no,shipping_status FROM package WHERE p_no='$p_no'";
		   $result3=mysqli_query($db_link,$data);
		   if(mysqli_num_rows($result3))
		   {
				echo "<table name=normal>";
				echo "<tr>
						<th>貨物編號</th>
						<th>運送狀況</th>
					  </tr>";
				while($row=mysqli_fetch_array($result3))
				{
					echo "<tr>
							<td>$row[0]</td>
							<td>$row[1]</td>
						  </tr>";
				}
				echo"</table>";
		   }
		   else
		   {
				echo"查無資料";
		   }
	   }
	}
?>

					</center>
				</div>
			</div>
		</div>
		</body>
</html>
