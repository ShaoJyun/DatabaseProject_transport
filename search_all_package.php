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
			th {
				text-align: center;
				background-color: darkturquoise;
				padding: 10px;
				border: 1px solid #666666;
				color: #fff;
				white-space: nowrap;
	    }
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
						<p><font size="6" color="#008080">包裹資訊</font></p>


<?php
	require("conn_mysql.php");
    $sql_query="SELECT * FROM package ORDER BY p_no";
    $result=mysqli_query($db_link,$sql_query) or die("查詢失敗");


    if(mysqli_num_rows($result)){

        echo "<table name='normal'>";
        //border:邊框粗細 width:寬度 cellpadding:元素與邊框間的距離 align:表格靠左靠置中(left/right/center)
        echo "<tr>
                <th>貨物編號</td>
                <th>倉庫編號</td>
                <th>退貨時間</td>
                <th>寄件人</td>
                <th>收件人</td>
                <th>寄件門市</td>
				<th>收件門市</td>
				<th>寄件時間</td>
                <th>是否易碎</td>
                <th>尺寸</td>
                <th>重量</td>
				<th>物品種類</td>
                <th>運送狀況</td>
                <th>貨車編號</td>
                </tr>";
        while($row=mysqli_fetch_array($result)){
            echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
				<td>$row[6]</td>
                <td>$row[7]</td>
                <td>$row[8]</td>
                <td>$row[9]</td>
                <td>$row[10]</td>
                <td>$row[11]</td>
				<td>$row[12]</td>
                <td>$row[13]</td>
              </tr>";
        }

    }
?>
