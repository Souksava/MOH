<?php 
            require '../../ConnectDB/connectDB.php';
                $id = $_GET['id'];
                $sqlck = "select * from training where user_id='$id';";
                $resultck = mysqli_query($link, $sqlck);
                if(mysqli_num_rows($resultck) > 0){
                    echo"<script>";
                    echo"window.location.href='username.php?delf2=flase2';";
                    echo"</script>";
                }
               else{
                    $sqldel = "delete from username where user_id='$id';";
                    $resultdel = mysqli_query($link, $sqldel);
                    if(!$resultdel)
                    {
                        echo"<script>";
                        echo"window.location.href='username.php?delf1=flase';";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"window.location.href='username.php?delt=true';";
                        echo"</script>";
                    } 
               }
?>

