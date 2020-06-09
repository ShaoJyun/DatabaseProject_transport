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
                                    <li><a href=\"search_package.php\">我的包裹</a></li> <br>
                                    <li><a href=\"revise_package.html\"style=\"color:forestgreen\">修改訂單</a></li><br>
                                    <li><a href=\"cancel_package.html\">取消訂單</a></li><br>

                                </ul>
                            </nav>
                        </aside>
                    </div>
                    <div class=\"col-md-10\" id = \"maincontain\">
                        <br><br>
                         <center>

            ";
    $r_name=$_POST['r_name'];
    $r_store=$_POST['r_store'];
    $p_no=$_COOKIE['revise_p_no'];


	require("conn_mysql.php");
    $sql_query1="UPDATE package SET r_name='$r_name' WHERE p_no='1231'";

    $result1=mysqli_query($db_link,$sql_query1);
    if($result1){
            echo "<CENTER><br><h3><font size=\"6\" color=\"#008080\">[成功修改資訊]<h3></CENTER>";
            $sql_query="SELECT r_name,r_store FROM package WHERE p_no = '$p_no'";
            $result=mysqli_query($db_link,$sql_query);
            //$result针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。
            if(mysqli_num_rows($result)){
                echo "<table name='revise'>";
                //border:邊框粗細 width:寬度 cellpadding:元素與邊框間的距離 align:表格靠左靠置中(left/right/center)
                echo "<tr>
                    <th>收件人</td>
                    <th>收件門市</td>
                    </tr>";
                while($row=mysqli_fetch_array($result)){
                    echo "<tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                          </tr>";
                }
                echo"</table><br>";
                echo"</center></div></div> </div></body></html>";
            }
            else{
                echo"<center><font size=\"8\" color=\"RoyalBlue\">查詢失敗<br></font></center>";
                exit;
            }
            echo"</table><br>";
            echo"</center></div></div> </div></body></html>";
    }
    else{
        echo"<center><font size=\"8\" color=\"RoyalBlue\">修改失敗<br></font></center>";
        exit;
    }











?>
