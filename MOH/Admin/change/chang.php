<?php
    session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['status'] != 1){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/logout.php'>";
    }
    else{}
 require '../../ConnectDB/connectDB.php';
 date_default_timezone_set("Asia/Bangkok");
 $datenow = time();
 $Date = date("Y-m-d",$datenow);
?>
<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ປຽນລະຫັດ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <script src="../../js/sweetalert.min.js" ></script>
    </head>
    <body >
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="../main.php">
                        <img src="../../icon/back.ico" width="30px">
                    </a>
                </div>
                <div align="center" class="tapbar fonthead">
                    ປຽນລະຫັດ
                </div>
                <div class="tapbar" align="right">
                    <a href="../../Check/Logout.php">
                        <img src="../../icon/close.ico" width="30px">
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="clearfix"></div><br>
        <div class="container font14">
            <div class="row row-cols-1 row-cols-md-1">
                <div class="col mb-4">
                    <div class="card">
                        <a href="">
                            <img src="../../icon/MOH.jpg" class="card-img-top" alt="">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">ປ່ຽນລະຫັດຜ່ານ</h5>
                            <p class="card-text">
                                <form action="chang.php" id="form1" method="POST" enctype="multipart/form-data">
                                    <div class="row" align="left">
                                        <div class="col-md-12 form-group">
                                            <label>ລະຫັດຜ່ານເກົ່າ</label>
                                            <input type="password" name="oldpass" class="form-control" placeholder="ລະຫັດຜ່ານເກົ່າ">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label>ລະຫັດຜ່ານໃໝ່</label>
                                            <input type="password" name="newpass" class="form-control" placeholder="ລະຫັດຜ່ານໃໝ່">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label>ຢືນຢັນລະຫັດຜ່ານໃໝ່</label>
                                            <input type="password" name="requestpass" class="form-control" placeholder="ຢືນຢັນລະຫັດຜ່ານໃໝ່">
                                        </div>
                                        <div class="col-md-12 form-group">
                                             <button type="submit" name="btnChange" class="btn btn-outline-success" >
                                                ຢືນຢັນ
                                             </button>
                                        </div>
                                    </div>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                ?>
            </div>
        </div>
        <?php 
            if(isset($_POST['btnChange'])){
                $oldpass = $_POST['oldpass'];
                $email = $_SESSION['email'];
                $user_id = $_SESSION['user_id'];
                $newpass = $_POST['newpass'];
                $requestpass = $_POST['requestpass'];
                if(trim($oldpass) == ""){
                    echo"<script>";
                    echo"window.location.href='chang.php?oldpass=null';";
                    echo"</script>";
                }
                else if(trim($newpass) == ""){
                    echo"<script>";
                    echo"window.location.href='chang.php?newpass=null';";
                    echo"</script>";
                }
                else if(trim($requestpass) == ""){
                    echo"<script>";
                    echo"window.location.href='chang.php?requestpass=null';";
                    echo"</script>";
                }
                else {
                    $sqlckold = "select * from username where user_id='$user_id' and pass='$oldpass';";
                    $resulckold = mysqli_query($link,$sqlckold);
                    if(mysqli_num_rows($resulckold) == 0){
                        echo"<script>";
                        echo"window.location.href='chang.php?resulckold=null';";
                        echo"</script>";
                    }
                    else {
                        $newpass2 = $_POST['newpass'];
                        $oldpass2 = $_POST['oldpass'];
                        if(trim($oldpass2) == trim($newpass2)){
                            echo"<script>";
                                echo"window.location.href='chang.php?compare1=true1';";
                                echo"</script>";
                        }
                        else {
                            
                            if($newpass != $requestpass){
                                echo"<script>";
                                echo"window.location.href='chang.php?compare2=true2';";
                                echo"</script>";
                            }
                            else {
                                $sqlch = "update username set pass='$requestpass' where user_id='$user_id';";
                                $resultch = mysqli_query($link,$sqlch);
                                if(!$resultch){
                                    echo"<script>";
                                    echo"window.location.href='chang.php?changf=flase';";
                                    echo"</script>";
                                }
                                else {
                                    echo"<script>";
                                    echo"window.location.href='chang.php?changt=true';";
                                    echo"</script>";
                                }
                            }
                        }
                    }
                }
            }
                if(isset($_GET['changf'])=='flase'){
                    echo'<script type="text/javascript">
                    swal("", "ບໍ່ສາມາດປ່ຽນລະຫັດຜ່ານໄດ້ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "info");
                    </script>';
                }
                if(isset($_GET['changt'])=='true'){
                    echo'<script type="text/javascript">
                    swal("", "ປ່ຽນລະຫັດຜ່ານສຳເລັດ", "info");
                    </script>';
                }
                if(isset($_GET['compare1'])=='true1'){
                    echo'<script type="text/javascript">
                    swal("", "ກະລຸນາໃສ່ລະຫັດຜ່ານໃໝ່ທີ່ແຕກຕ່າງຈາກລະຫັດຜ່ານເກົ່າ", "info");
                    </script>';
                }
                if(isset($_GET['compare2'])=='true2'){
                    echo'<script type="text/javascript">
                    swal("", "ລະຫັດຜ່ານໃໝ່ບໍ່ຕົງກັນ", "error");
                    </script>';
                }
                if(isset($_GET['oldpass'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາປ້ອນລະຫັດຜ່ານເກົ່າ", "info");
                        </script>';
                }
                if(isset($_GET['newpass'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາປ້ອນລະຫັດຜ່ານໃໝ່", "info");
                        </script>';
                }
                if(isset($_GET['requestpass'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາຢືນຢັນລະຫັດຜ່ານໃໝ່", "info");
                        </script>';
                }
                if(isset($_GET['resulckold'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ລະຫັດຜ່ານເກົ່າບໍ່ຖືກຕ້ອງ", "error");
                        </script>';
                }

        ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
