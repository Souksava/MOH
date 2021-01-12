<?php
    session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['status'] != 1){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/logout.php'>";
    }
    else{}
//  require '../../ConnectDB/connectDB.php';
//  date_default_timezone_set("Asia/Bangkok");
//  $datenow = time();
//  $Date = date("Y-m-d",$datenow);
//  $sqlshop = "select * from shop;";
//  $resultshop = mysqli_query($link,$sqlshop);
//  $rowshop = mysqli_fetch_array($resultshop,MYSQLI_ASSOC);
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ລາຍງານ</title>
    <link rel="icon" href="../../icon/MOH.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container">
            <div class="tapbar">
                <a href="../main.php">
                    <img src="../../icon/back.ico" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar fonthead">
                ລາຍງານ
            </div>
            <div class="tapbar" align="right">
                <a href="../../Check/Logout.php">
                    <img src="../../icon/close.ico" width="30px">
                </a>
            </div>
          </div>
      </div>
     <!-- head -->

      <div class="clearfix"></div><br>
      <!-- body -->
    <div class="container" > 
        <div class="row ">
            <div style="width: 33%;float: left;" align="center">
                <a href="frmethnicity.php" class="font12">
                     <img src="../../icon/report.ico" width="60px" class="img-responsive" ><br>
                     <b>ລາຍງານຂໍ້ມູນຊົນເຜົ່າ</b>
                </a>
            </div>
            <div style="width: 33%;float: left;" align="center">
                <a href="frmSection.php" class="font12">
                    <img src="../../icon/report.ico" width="60px" class="img-responsive" ><br>
                   <b>ລາຍງານຂໍ້ມູນພາກສ່ວນ</b>
                </a>
            </div>
            <div style="width: 33%;float: left;" align="center">
                <a href="frmPerson.php" class="font12">
                     <img src="../../icon/report.ico" width="60px" class="img-responsive" ><br>
                    <b> ຂໍ້ມູນຜູ້ຝຶກອົບຮົມ</b>
                </a>
            </div>
        </div>
        <div class="row font12">
            <div style="width: 33%;float: left;" align="center"><br>
                <a href="frmTrain.php" class="font12">
                     <img src="../../icon/report.ico" width="60px" class="img-responsive"><br>
                    <b> ລາຍງານການຝຶກອົບຮົມ</b>
                </a>
            </div>
            <div style="width: 33%;float: left;" align="center"><br>
                <a href="frmUser.php" class="font12">
                     <img src="../../icon/report.ico" width="60px" class="img-responsive" ><br>
                    <b> ຂໍ້ມູນຜູ້ໃຊ້ລະບົບ</b>
                </a>
            </div>
        </div>
    </div>

      <!-- body -->
  </body>
</html>
