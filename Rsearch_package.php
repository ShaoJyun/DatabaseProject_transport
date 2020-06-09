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
                                    <input type=\"button\" name=\"typeA\" value=\"寄件人\" onclick=\"location.href='Slogi n.html'\">
                                    <input type=\"button\" name=\"typeB\" value=\"收件人\" onclick=\"location.href='Rlogin.html'\">
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
                            <h3> &nbsp;&nbsp;收件人 </h3>
                            <nav id=\"sender\">
                                    <li><a href=\"Rsearch_package.php\"style=\"color:forestgreen\">我的包裹</a></li> <br>
                                </ul>
                            </nav>
                        </aside>
                    </div>
                    <div class=\"col-md-10\" id = \"maincontain\">
                        <br><br>
                         <center>
                            <p><font size =\"6\">[您的所有包裹]</font></p>
            ";

    $r_phone=$_COOKIE["recipient_phone"];
	require("conn_mysql.php");
    $sql_query="SELECT p_no,s_name,s_store,r_name,r_store,shipping_status FROM package where r_name = (SELECT r_name FROM recipient where r_phone='$r_phone')";
    $result=mysqli_query($db_link,$sql_query);
    if(mysqli_num_rows($result)){
        echo "<CENTER><br><h3><font size=\"6\" color=\"#008080\">包裹資訊<h3></CENTER>";
        echo "<table name='normal'>";
        //border:邊框粗細 width:寬度 cellpadding:元素與邊框間的距離 align:表格靠左靠置中(left/right/center)
        echo "<tr>
                <th>包裹編號</td>
                <th>寄件人</td>
                <th>寄件門市</td>
                <th>收件人</td>
                <th>收件門市</td>
                <th>運送狀態</td>
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
        echo"<font size=\"5\" color=\"#008080\">輸入包裹編號看詳細資訊<br>
        <form method=\"POST\" action=\"Rsearch_package_byp_no.php\">
        <input type=/=\"text\" placeholder=\"包裹編號\"style=\"font-size:25px ;border-radius: 10px;border:3px lightseagreen solid\"name=\"p_no\"/>&nbsp;
        <input type=\"submit\" value=\"送出\" style=\"font-size:25px;width:80px;height:40px;\" name = \"typeB\"/>
        </form><br><br><br>";
        echo"</center></div></div> </div></body></html>";


    }
    else{
        echo"<center><font size=\"8\" color=\"#008080\">您目前沒有包裹<br><br><br><br><br><br><br><br></font></center>";
        echo"</center></div></div> </div></body></html>";
        exit;
    }





?>
