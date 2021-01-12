<?php 
            require '../../ConnectDB/connectDB.php';
                $id = $_GET['id'];
                $sqlck = "select * from personality where eth_id='$id';";
                $resultck = mysqli_query($link, $sqlck);
                if(mysqli_num_rows($resultck) > 0){
                    echo"<script>";
                    echo"window.location.href='ethnicity.php?delf2=flase2';";
                    echo"</script>";
                }
               else{
                    $sqldel = "delete from ethnicity where eth_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                        echo"<script>";
                        echo"window.location.href='ethnicity.php?delf1=flase';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"window.location.href='ethnicity.php?delt=true';";
                        echo"</script>";
                    } 
               }
?>

