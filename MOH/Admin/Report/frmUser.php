<?php
    session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['status'] != 1){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/logout.php'>";
    }
    // else{}
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
        <title>ລາຍງານຂໍ້ມູນຜູ້ໃຊ້ລະບົບ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    </head>
    <body >
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="Report.php">
                        <img src="../../icon/back.ico" width="30px">
                    </a>
                </div>
                <div align="center" class="tapbar fonthead">
                    ລາຍງານຂໍ້ມູນຜູ້ໃຊ້ລະບົບ
                </div>
                <div class="tapbar" align="right">
                    <a href="../../Check/Logout.php">
                        <img src="../../icon/close.ico" width="30px">
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="clearfix"></div>
        <div class="container font14">
            <form action="frmUser.php" id="fomrsearch" method="POST">
                <div style="width: 100%">
                    <input type="text" class="form-control" name="search" style="float: left;width: 50%;" placeholder="ລະຫັດ, ຊື່, ນາມສະກຸນ, ເພດ, ສະຖານະຜູ້ໃຊ້">
                    <button class="btn btn-outline-primary" name="btnSearch" type="submit" style="float:left;margin-left: 10px">
                        ຄົ້ນຫາ
                    </button>
                </div>
            </form>
        </div>
        <div class="clearfix"></div><br>
        <?php
            if(isset($_POST['btnSearch'])){
            $search = "%".$_POST['search']."%";
            $search2 = $_POST['search'];
        ?>
        <div class="container font12">
            <div class="row">
                <div style="float: left;width: 50%;padding-right: 10px;">
                    <?php
                        $s = $_POST['search'];
                        if($s != ""){
                            echo"ຄົ້ນຫາດ້ວຍ '$s'";
                        }
                    ?>
                </div><br>
                <div style="float: right;width: 47%;padding-left: 10px;" align="right">
                    <form action="Report_user.php" method="POST" id="form1">
                        <input type="hidden" name="search" value="<?php echo $search2 ?>">
                        <button type="submit" name="btn" class="btn btn-primary">
                            <img src="../../icon/print.ico" width="28px">
                        </button> 
                    </form>
                </div>
            </div><br>
            <div class="table-responsive">
                <table class="table table-striped" style="width: 1800px;">
                    <tr>
                        <th style="width: 25px;">#</th>
                        <th style="width: 90px;">ID ຜູ້ໃຊ້ລະບົບ</th>
                        <th style="width: 100px;">ຊື່ຜູ້ໃຊ້ລະບົບ</th>
                        <th style="width: 120px;">ນາມສະກຸນ</th>
                        <th style="width: 80px;">ເພດ</th>
                        <th style="width: 300px;">ທີ່ຢູ່ປັດຈຸບັນ</th>
                        <th style="width: 150px;">ເບີໂທລະສັບ</th>
                        <th style="width: 120px;">ທີ່ຢູ່ອີເມວ</th>
                        <th style="width: 180px;">ລະຫັດເຂົ້າໃຊ້ລະບົບ</th>
                        <th style="width: 180px;">ສະຖານະຜູ້ໃຊ້ລະບົບ</th>
                    </tr>
                    <?php
                        $sql = "select user_id,user_name,user_surname,gender,address,tel,email,md5(pass) as pass,status_name from username u left join status s on u.status=s.status where user_id like '$search' or user_name like '$search' or user_surname like '$search' or gender like '$search' or status_name like '$search' order by user_name asc;";
                        $result = mysqli_query($link,$sql);
                        $NO_ = 0;
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $NO_ += 1; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['user_surname']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['pass']; ?></td>
                        <td><?php echo $row['status_name']; ?></td>
                    </tr>
                    <?php
                        }
                        $sqlcount = "select count(gender) as count from username u left join status s on u.status=s.status where user_id like '$search' or user_name like '$search' or user_surname like '$search' or gender like '$search' or status_name like '$search';";
                        $resultcount = mysqli_query($link,$sqlcount);
                        $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
                    ?>
                    <tr>
                        <td colspan="9" align="right">ຈຳນວນທັງໝົດ</td>
                        <td colspan="4" align="right"><?php echo $rowcounts['count']; ?> ຄົນ</td>
                    </tr>
                    <?php
                       
                        $sqlmale = "select count(gender) as count,gender from username u left join status s on u.status=s.status where user_id like '$search' or user_name like '$search' or user_surname like '$search' or gender like '$search' or status_name like '$search' group by gender order by gender desc;";
                        $resultmale = mysqli_query($link,$sqlmale);
                        while($rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC)){
                       
                    ?>
                    <tr>
                        <td colspan="9" align="right"><?php echo $rowmale['gender']; ?></td>
                        <td colspan="4" align="right"><?php echo $rowmale['count']; ?> ຄົນ</td>
                    </tr>
                    <?php 
                        }
                        $sqlnation = "select count(s.status) as countnation,status_name from username u left join status s on u.status=s.status where user_id like '$search' or user_name like '$search' or user_surname like '$search' or gender like '$search' or status_name like '$search' group by s.status;";
                        $resultnation = mysqli_query($link,$sqlnation);
                        while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
                    ?>
                      <tr>
                        <td colspan="9" align="right">ສະຖານະ<?php echo $rownation['status_name']; ?></td>
                        <td colspan="4" align="right"><?php echo $rownation['countnation']; ?> ຄົນ</td>
                    </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </div>
        <?php
            }
        ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
