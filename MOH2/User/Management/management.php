<?php
    session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['status'] != 2){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/logout.php'>";
    }
    else{}
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ຈັດການຂໍ້ມູນຫຼັກ</title>
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
                ຈັດກນຂໍ້ມູນຫຼັກ
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
                <a href="ethnicity.php" class="font12">
                     <img src="../../icon/ethnicity.ico" width="60px" class="img-responsive" ><br>
                     <b>ຂໍ້ມູນຊົນເຜົ່າ</b>
                </a>
            </div>
            <div style="width: 33%;float: left;" align="center">
                <a href="section.php" class="font12">
                    <img src="../../icon/section.ico" width="60px" class="img-responsive" ><br>
                   <b>ຂໍ້ມູນພາກສ່ວນ</b>
                </a>
            </div>
            <div style="width: 33%;float: left;" align="center">
                <a href="nationality.php" class="font12">
                     <img src="../../icon/nationality.ico" width="60px" class="img-responsive"><br>
                     <b>ຂໍ້ມູນສັນຊາດ</b>
                </a>
            </div>
        </div>
        <div class="row font12">
            <div style="width: 33%;float: left;" align="center"><br>
                <a href="type_person.php" class="font12">
                     <img src="../../icon/persontype.ico" width="60px" class="img-responsive" ><br>
                    <b> ຂໍ້ມູນປະເພດຜູ້ຝຶກອົບຮົມ</b>
                </a>
            </div>
            <div style="width: 33%;float: left;" align="center"><br>
                <a href="certificate2.php" class="font12">
                     <img src="../../icon/certificate.ico" width="60px" class="img-responsive" ><br>
                    <b> ຂໍ້ມູນວຸດທິການສຶກສາ</b>
                </a>
            </div>
            <div style="width: 33%;float: left;" align="center"><br>
                <a href="certificate.php" class="font12">
                     <img src="../../icon/certificate.ico" width="60px" class="img-responsive" ><br>
                    <b>ວິຊາສະເພາະ</b>
                </a>
            </div>
            
        </div>
        <div class="row font12">
            <div style="width: 33%;float: left;" align="center"><br>
                <a href="personality.php" class="font12">
                     <img src="../../icon/person.ico" width="60px" class="img-responsive" ><br>
                    <b> ຂໍ້ມູນຜູ້ຝຶກອົບຮົມ</b>
                </a>
            </div>  
            <div style="width: 33%;float: left;" align="center"><br>
                <a href="username.php" class="font12">
                     <img src="../../icon/employee.ico" width="60px" class="img-responsive" ><br>
                    <b> ຂໍ້ມູນຜູ້ໃຊ້ລະບົບ</b>
                </a>
            </div>
        </div>
    </div>

      <!-- body -->
  </body>
</html>
