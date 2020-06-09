 <?php
            header('Content-Type: text/html; charset=utf-8');
            $d_no=$_POST['d_no'];
            $area_no=$_POST['area_no'];

            require("conn_mysql.php");
            $sql_query_check="SELECT * FROM delivery_man Where d_no='$d_no' AND area_no='$area_no'";
            $result1=mysqli_query($db_link,$sql_query_check);
            if(mysqli_num_rows($result1)==0){//d_no not exist
                echo "<script>alert('查無資料，請重新輸入'); location.href='delete_delivery.html'</script>";
                exit;
            }
            else
            {
               $delete="DELETE FROM delivery_man Where d_no='$d_no' AND area_no='$area_no'";
               $result2=mysqli_query($db_link,$delete);
               if($result2)
               {
                   echo "<script>alert('刪除成功'); location.href='delete_delivery.html'</script>";
               }

            }
?>
