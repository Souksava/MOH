<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../index.php'>";        
    }
    else if($_SESSION['status'] != 3){
        echo"<meta http-equiv='refresh' content='1;URL=../Check/logout.php'>";
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
    <title>ໜ້າຫຼັກ</title>
    <link rel="icon" href="../icon/MOH.ico">
        <link rel="stylesheet" href="../css/style.css">
        <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <script src="../js/sweetalert.min.js" ></script>
  </head>
  <body >
    <!-- head -->
    <div class="header">
        <div class="container">
            <div class="tapbar">
                <b><?php echo $_SESSION['user_name'] ?></b>
            </div>
            <div align="center" class="tapbar">
                <b>ກະຊວງສາທາລະນະສຸກ</b>
            </div>
            <div class="tapbar" align="right">
                <a href="../Check/Logout.php">
                    <img src="../icon/close.ico" width="30px">
                </a>
            </div>
        </div>
    </div>
      <div class="clearfix"></div><br>
      <!-- body -->
      <div class="container">
        <div class="row font12">
            <div style="width: 48%;float: left;" align="center">
                <a href="Report/Report.php" class="font12">
                     <img src="../icon/report.ico" width="60px" class="img-responsive" ><br>
                     <b>ລາຍງານ</b>
                </a>
            </div>
            <div style="width: 48%;float: left;" align="center">
                <a href="change/chang.php" class="font12">
                     <img src="../icon/key.jpg" width="60px" class="img-responsive" ><br>
                     <b>ປ່ຽນລະຫັດ</b>
                </a>
            </div>
        </div><br>
    </div>
    <?php 
      if(isset($_GET['login'])=='true'){
        echo'<script type="text/javascript">
            swal("", "ເຂົ້າສູ່ລະບົບສຳເລັດ", "success");
            </script>';
    }

    ?>
  </body> 
        <script src="../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../js/popper.min.js" ></script>
        <script src="../js/bootstrap.min.js"></script>
</html>
