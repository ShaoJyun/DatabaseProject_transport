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
                                    <input type="button" name="typeB" value="物流人員" onclick="location.href='dwelcome.html'">
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
                        <h3> &nbsp;&nbsp;物流人員</h3>
                        <nav id="administrator">
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
                        <p style="font-size: 30px">查詢排班</p>
                        <?php
                            header('Content-Type: text/html; charset=utf-8');
                            echo "<style name=test.css>
                            </style>";

							$d_no=$_COOKIE["d_no"];

                            require("conn_mysql.php");

                            $data="SELECT d_no,area_no,worktime FROM delivery_man where d_no='$d_no' ORDER BY area_no";
                            $result1=mysqli_query($db_link,$data) or die("查詢失敗");

                            if(mysqli_num_rows($result1))
                            {
                                echo "<table name=normal>";
                                echo "<tr>
                                    <th>員工編號</th>
                                    <th>工作區域</th>
                                    <th>日期</th>
                                    </tr>";
                                while($row=mysqli_fetch_array($result1))
                                {
                                    echo "<tr>
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[2]</td>
                                          </tr>";
                                }
                                echo"</table>";
                            }
                            else
                            {
                                echo"查無資料";
                            }

                        ?>
                        <br><br>
                    </center>
                </div>
            </div>

        </div>
    </body>

    </html>
