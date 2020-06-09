<?php
	header('Content-Type: text/html; charset=utf-8');
    echo"<html>
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <title>小山貨運</title>
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">

        <style>
            @import \"test.css\";
        </style>
        </head>
        <body>
            <div class=\"container\" id = \"main\">
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <header>

                            <center><a href=\"welcome.html\"><img src=\"物流商標.png\" class=\"img-responsive\"  width=\"100%\" height=\"50%\"></a></center>
                               <nav id=\"items\">
                                <center><ul class=\"list-inline\">
                                    <input type=\"button\" name=\"typeB\" value=\"寄件人\" onclick=\"location.href='Slogin.html'\">
                                    <input type=\"button\" name=\"typeA\" value=\"收件人\" onclick=\"location.href='Rlogin.html'\">
                                    <input type=\"button\" name=\"typeA\" value=\"物流人員\" onclick=\"location.href='dlogin.html'\">
                                    <input type=\"button\" name=\"typeA\" value=\"管理者\" onclick=\"location.href='mlogin.html'\">
                                    </ul> </center>
                            </nav>
                        </header>
                    </div>
                </div>


                <div class=\"row\" id = \"leftcontain\">
                    <div class=\"col-md-2\">
                        <aside>
                            <h3> &nbsp;&nbsp;寄件人 </h3>
                            <nav id=\"sender\">
                                <!--login頁這裡全都要導回login頁 不允許後續功能-->
                                <ul><li><a href=\"create_package1.html\" > 寄件</a></li><br>
                                    <li><a href=\"search_package.php\"style=\"color:forestgreen\">我的包裹</a></li> <br>
                                    <li><a href=\"revise_package.html\">修改訂單</a></li><br>
                                    <li><a href=\"cancel_package.html\">取消訂單</a></li><br>

                                </ul>
                            </nav>
                        </aside>
                    </div>
                    <div class=\"col-md-10\" id = \"maincontain\">
                        <br><br>
                         <center>
            ";

    $p_no=$_POST['p_no'];;
	require("conn_mysql.php");
    $sql_query="SELECT p_no,s_name,s_store,r_name,r_store,s_time FROM package where p_no = '$p_no'";
    $result=mysqli_query($db_link,$sql_query);
    if(mysqli_num_rows($result)){
        echo "<CENTER><br><h3><font size=\"6\" color=\"#008080\">包裹'$p_no'詳細資訊<h3></CENTER>";
        echo "<table name='normal'>";
        //border:邊框粗細 width:寬度 cellpadding:元素與邊框間的距離 align:表格靠左靠置中(left/right/center)
        echo "<tr>
            <th>包裹編號</td>
            <th>寄件人</td>
            <th>寄件門市</td>
            <th>收件人</td>
            <th>收件門市</td>
            <th>收件時間</td>
            </tr>";
        while($row=mysqli_fetch_array($result)){
            echo "<tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                    <td>$row[5]</td>
                  </tr>";
        }
        echo"</table><br>";

    }
    else{
        echo"<center><font size=\"8\" color=\"#008080\">沒有這個包裹喔</font><br><br><br><br><br><br><br><br></center>";
        echo"</center></div></div> </div></body></html>";
        exit;
    }

    $sql_query1="SELECT fragile,size,weight,type,shipping_status,arrival_time,return_time FROM package where p_no = '$p_no'";
    $result1=mysqli_query($db_link,$sql_query1);
    if(mysqli_num_rows($result1)){
        echo "<table name='normal'>";
        echo "<tr>
            <th>易碎(是/否)</td>
            <th>尺寸</td>
            <th>重量</td>
            <th>內容物</td>
            <th>運送狀態</td>
            <th>預計送達時間</td>
            <th>預計退回時間</td>
            </tr>";
        while($row=mysqli_fetch_array($result1)){
            echo "<tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]kg</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                    <td>$row[5]</td>
                    <td>$row[6]</td>
                  </tr>";
        }
        echo"</table><br>";
        echo"</center></div></div> </div></body></html>";

    }
    else{
        echo"<center><font size=\"8\" color=\"#008080\">沒有這個包裹喔</font><br><br><br><br><br><br><br><br></center>";
        echo"</center></div></div> </div></body></html>";
        exit;
    }





?>
