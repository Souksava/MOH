<?php
    session_start();
    include("../ConnectDB/connectDB.php");
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
     //$pass = md5($_POST['pass']);


    $sql1 = "select * from username where email='$email' and pass='$pass';";
    $resultck = mysqli_query($link, $sql1);
   //$num1 = MYSQLI_NUM_ROWS($sql1);
         if($email == "")
         {
                 echo"<script>";
                 echo"window.location.href='../index.php?email=not';";
                 echo"</script>";
         }
             else if($pass == "")
             {
                 echo"<script>";
                 echo"window.location.href='../index.php?pass=not';";
                 echo"</script>";
             }
             else if(!mysqli_num_rows($resultck))
             {
                 echo"<script>";
                 echo"window.location.href='../index.php?found=true';";
                 echo"</script>";
             }
             else 
             {
                 $sql = "select * from username where email = '$email' and pass = '$pass';";
                 $resultget = mysqli_query($link, $sql);
                 
                 if(mysqli_num_rows($resultget) <= 0){
                     echo"<meta http-equiv-'refress' content='1;URL=../index.php'>";
                 }
                 else{
                    
                     while($user = mysqli_fetch_array($resultget))
                     {
                         if($user['status'] == 1)
                         {
                             $_SESSION['ses_id'] = session_id();
                             $_SESSION['email'] = $user['email'];
                             $_SESSION['user_name'] = $user['user_name'];
                             $_SESSION['user_id'] = $user['user_id'];
                             $_SESSION['status'] = 1;
                             echo"<meta http-equiv='refresh' content='1;URL=../Admin/main.php?login=true'>";
                         }
                         else if($user['status'] == 2)
                         {
                             $_SESSION['ses_id'] = session_id();
                             $_SESSION['email'] = $user['email'];
                             $_SESSION['user_name'] = $user['user_name'];
                             $_SESSION['user_id'] = $user['user_id'];
                             $_SESSION['status'] = 2;
                             echo"<meta http-equiv='refresh' content='1;URL=../User/main.php?login=true'>";
                         }
                         else if($user['status'] == 3)
                         {
                             $_SESSION['ses_id'] = session_id();
                             $_SESSION['email'] = $user['email'];
                             $_SESSION['user_name'] = $user['user_name'];
                             $_SESSION['user_id'] = $user['user_id'];
                             $_SESSION['status'] = 3;
                             echo"<meta http-equiv='refresh' content='1;URL=../User_view/main.php?login=true'>";
                         }
                         else
                         {
                             $_SESSION['ses_id'] = session_id();
                             echo"<script>";
                             echo"alert('ທ່ານບໍ່ມີສິດໃຊ້ລະບົບ');";
                             echo"window.location.href='logout.php';";
                             echo"</script>";
                         }

                     }
                 }
             }    
?>