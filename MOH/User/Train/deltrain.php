<?php 
            require '../../ConnectDB/connectDB.php';
                $id = $_GET['id'];
               
                    $sqldel = "delete from listtranddetail where detail_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                        echo"<script>";
                        echo"window.location.href='train2.php?delf1=flase';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"window.location.href='train2.php?delt=true';";
                        echo"</script>";
                    } 
               
?>

