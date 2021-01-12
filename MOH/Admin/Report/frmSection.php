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
        <title>ລາຍງານພາກສ່ວນ</title>
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
                    ລາຍງານພາກສ່ວນ
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
            <form action="frmSection.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຄົ້ນຫາດ້ວຍຊື່ພາກສ່ວນ</label>
                        <input type="text" class="form-control" name="sec_name" placeholder="ຊື່ພາກສ່ວນ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຄົ້ນຫາດ້ວຍແຂວງ</label>
                        <select name="pro_id" id="" class="form-control">
                            <option value="">ເລືອກແຂວງ</option>
                            <?php
                                $sqlauther = "select * from province;";
                                $resultauther = mysqli_query($link, $sqlauther);
                                while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                    echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12 form-group"><br>
                        <button type="submit" class="btn btn-outline-primary" name="btn" style="width: 100%;">
                           ຄົ້ນຫາ
                        </button><br><br>
                        <button type="submit" class="btn btn-outline-success" name="btnall" style="width: 100%;">
                           ພາກສ່ວນທັງໝົດ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    <div class="clearfix"></div><br>
    <?php
        if(isset($_POST['btn'])){
            $sec_name = $_POST['sec_name'];
            $pro_id = $_POST['pro_id'];
    ?>
    <div class="container font14">
        <div>
            <form action="Report_section.php" method="POST" id="form1">
                <input type="hidden" name="sec_name" value="<?php echo $sec_name ?>">
                <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
                <button type="submit" name="btn" class="btn btn-primary">
                    <img src="../../icon/print.ico" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 100%;">
                <tr>
                    <th style="width: 25px;">#</th>
                    <th style="width: 150px;">ຊື່ພາກສ່ວນ</th>
                    <th style="width: 100px;">ບ້ານ</th>
                    <th style="width: 100px;">ເມືອງ</th>
                    <th style="width: 100px;">ແຂວງ</th>
                </tr>
                <?php
                    $sqlsearch = "select sec_name,village,district,pro_name from section s left join province p on s.province=p.pro_id where sec_name = '$sec_name' or province = '$pro_id';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['sec_name']; ?></td>
                    <td><?php echo $row['village']; ?></td>
                    <td><?php echo $row['district']; ?></td>
                    <td><?php echo $row['pro_name']; ?></td>
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
       
    <?php
        if(isset($_POST['btnall'])){
           
    ?>
    <div class="container font14">
        <div>
            <form action="Report_section.php" method="POST" id="form1">
                <button type="submit" name="btnall" class="btn btn-primary">
                    <img src="../../icon/print.ico" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1500px;">
                <tr>
                    <th style="width: 25px;">#</th>
                    <th style="width: 150px;">ຊື່ພາກສ່ວນ</th>
                    <th style="width: 100px;">ບ້ານ</th>
                    <th style="width: 100px;">ເມືອງ</th>
                    <th style="width: 100px;">ແຂວງ</th>
                </tr>
                <?php
                    $sqlsearch = "select sec_name,village,district,pro_name from section s left join province p on s.province=p.pro_id;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['sec_name']; ?></td>
                    <td><?php echo $row['village']; ?></td>
                    <td><?php echo $row['district']; ?></td>
                    <td><?php echo $row['pro_name']; ?></td>
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
        <div class="clearfix"></div><br>
   
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
