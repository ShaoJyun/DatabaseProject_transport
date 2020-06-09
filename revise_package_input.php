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

    $p_no=$_POST['p_no'];
	require("conn_mysql.php");
    setcookie('revise_p_no',$p_no);
    $sql_query1="SELECT shipping_status FROM package where p_no = '$p_no'";
    $result1=mysqli_query($db_link,$sql_query1);
    if(mysqli_num_rows($result1)){
        while($row1=mysqli_fetch_array($result1)){
            if($row1[0]=="已寄件"){
                $sql_query="SELECT r_name,r_store FROM package where p_no = '$p_no'";
                $result=mysqli_query($db_link,$sql_query);
                if(mysqli_num_rows($result)){
                    echo "<CENTER><br><h3><font size=\"6\" color=\"#008080\">包裹'$p_no'<h3></CENTER>";
                    echo "<table width=300 name='revise'>";
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
                    echo"<CENTER><h3><font size=\"5\" color=\"#008080\">請輸入更改資訊<h3></CENTER>";
                    echo"<form method=\"POST\" action=\"revise_package.php\">
                        <input type=\"text\" placeholder=\"收件人姓名\" style=\"font-size:25px ;border-radius: 10px;border:3px lightseagreen solid\" name=\"r_name\" /><br><br>
                        <input type=\"text\" placeholder=\"收件門市\" style=\"font-size:25px ;border-radius: 10px;border:3px lightseagreen solid\" name=\"r_store\" /><br><br>

                        <input type=\"submit\" value=\"確定\" style=\"font-size:30px;width:100px;height:50px;\" name=\"typeB\" />
                        </form>";
                    echo"</center></div></div> </div></body></html>";
                }
                else{
                    echo"<center><font size=\"8\" color=\"#008080\">沒有這個包裹喔</font><br><br><br><br><br><br><br><br></center>";
                    echo"</center></div></div> </div></body></html>";
                    exit;
                }
            }else{
                echo"<CENTER><h3><font size=\"5\" color=\"#008080\">此包裹已離開寄件門市，無法修改<h3></CENTER><br><br><br><br><br>";
            }
        }
    }
    else{
        echo"<center><font size=\"8\" color=\"#008080\">沒有這個包裹喔</font><br><br><br><br><br><br><br><br></center>";
        echo"</center></div></div> </div></body></html>";
        exit;
    }




?>
