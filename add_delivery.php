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
                                    <input type="button" name="typeA" value="物流人員" onclick="location.href='dlogin.html'">
                                    <input type="button" name="typeB" value="管理者" onclick="location.href='mwelcome.html'">
                                </ul>
                            </center>
                        </nav>
                    </header>
                </div>
            </div>


            <div class="row" id="leftcontain">
                <div class="col-md-2">
                    <aside>
                        <h3> &nbsp;&nbsp;管理者 </h3>
                        <nav id="administrator">
                            <!--login頁這裡全都要導回login頁 不允許後續功能-->
                            <ul>
                                <li><a href="scheduling.php">查詢排班</a></li><br>
                                <li><a href="">管理物流人員排班</a>
                                    <ul>
                                        <li><a href="add_delivery.html">新增排班</a></li>
                                        <li><a href="delete_delivery.html">刪除排班</a></li>
                                        <li><a href="update_delivery.html">更新排班</a></li>
                                    </ul>
                                </li><br>
                                <li><a href="">管理貨車排班</a>
                                    <ul>
                                        <li><a href="add_truck.html">新增排班</a></li>
                                        <li><a href="delete_truck.html">刪除排班</a></li>
                                        <li><a href="update_truck.html">更新排班</a></li>
                                    </ul>
                                </li><br>

                            </ul>
                        </nav>
                    </aside>
                </div>
                <div class="col-md-10" id="maincontain">
                    <br><br>
                    <center>
                        <p style="font-size: 30px">新增結果</p>
                        <?php
                            header('Content-Type: text/html; charset=utf-8');
                            $d_ssn=$_POST['d_ssn'];
                            $d_no=$_POST['d_no'];
                            $area_no=$_POST['area_no'];
                            $worktime=$_POST['worktime'];

                            require("conn_mysql.php");
                            $insert="INSERT INTO delivery_man VALUES('$d_ssn','$d_no','$area_no','$worktime')";
                            $result1=mysqli_query($db_link,$insert);
                            if($result1)
                            {//d_no not exist
                                $data="SELECT d_no,area_no,worktime FROM delivery_man WHERE d_no='$d_no'";
                                $result2=mysqli_query($db_link,$data);
                                if(mysqli_num_rows($result2))
                                {
                                        echo "<table name=revise>";
                                        echo "<tr>
                                            <th>員工編號</th>
                                            <th>工作區域</th>
                                            <th>時間</th>
                                            </tr>";
                                        while($row=mysqli_fetch_array($result2))
                                        {
                                            echo "<tr>
                                                    <td>$row[0]</td>
                                                    <td>$row[1]</td>
                                                    <td>$row[2]</td>
                                                  </tr>";
                                        }
                                        echo"</table>";
                                   }




                            }
                            else
                            {
                                echo "<script>alert('資料重複，請重新輸入'); location.href='add_delivery.html'</script>";
                            }

                        ?>
                        <br><br><br><br><br><br><br><br>
                    </center>
                    <br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </body>

    </html>
