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
        <title>ລາຍງານການຝຶກອົບຮົມ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <script src="../../js/sweetalert.min.js" ></script>
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
                    ລາຍງານການຝຶກອົບຮົມ
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
            <form action="frmTrain.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຄົ້ນຫາດ້ວຍຊື່ພາກສ່ວນ</label>
                        <input type="text" class="form-control" name="search" placeholder="ເລກທີໃບອະນຸຍາດ, ສົກປີ, ທຶນສະໜັບສະໜຸນ, ຫົວຂໍ້ອົບຮົມ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຄົ້ນຫາດ້ວຍພາກສ່ວນ</label>
                        <select name="sec_id" id="" class="form-control">
                            <option value="">ເລືອກພາກສ່ວນ</option>
                            <?php
                                $sqlauther = "select * from section order by sec_name asc;";
                                $resultauther = mysqli_query($link, $sqlauther);
                                while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                    echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຊ່ວງວັນທີ</label>
                        <input type="date" class="form-control" name="date1">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຫາວັນທີ</label>
                        <input type="date" class="form-control" name="date2">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12 form-group"><br>
                        <button type="submit" class="btn btn-outline-primary" name="btn" style="width: 100%;">
                           ຄົ້ນຫາ
                        </button><br><br>
                        <button type="submit" class="btn btn-outline-success" name="btnall" style="width: 100%;">
                           ລາຍການທັງໝົດ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    <div class="clearfix"></div><br>
    <?php
        if(isset($_POST['btn'])){
           $search = $_POST['search'];
           $sec_id = $_POST['sec_id'];
           $date1 = $_POST['date1'];
           $date2 = $_POST['date2'];
    ?>
    <div class="container font14">
        <div>
            <form action="Report_train.php" method="POST" id="form1">
                <input type="hidden" name="search" value="<?php echo $search ?>">
                <input type="hidden" name="sec_id" value="<?php echo $sec_id ?>">
                <input type="hidden" name="date1" value="<?php echo $date1 ?>">
                <input type="hidden" name="date2" value="<?php echo $date2 ?>">
                <button type="submit" name="btn" class="btn btn-primary">
                    <img src="../../icon/print.ico" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th style="width: 25px;">#</th>
                    <th style="width: 150px;">ພາກສ່ວນ</th>
                    <th style="width: 60px;">ຈຳນວນ</th>
                    <th style="width: 100px;">ສະຖານທີຈັດ</th>
                    <th style="width: 150px;">ຫົວຂໍ້ອົບຮົມ</th>
                    <th style="width: 80px;">ວັນທີອົບຮົມ</th>
                    <th style="width: 80px;">ວັນທີສິ້ນສຸດ</th>
                    <th style="width: 60px;">ຈຳນວນວັນ</th>
                    <th style="width: 60px;">ສົກປີ</th>
                    <th style="width: 100px;">ທຶນສະໜັບສະໜຸນ</th>
                    <th style="width: 100px;">ມູນຄ່າທຶນ</th>
                    <th style="width: 60px;">ພູມມິພາກ</th>
                    <th style="width: 120px;">ເລກທີໃບອະນຸຍາດ</th>
                    <th style="width: 100px;">ໝາຍເຫດ</th>
                    <th style="width: 80px;"></th>
                </tr>
                <?php
                    $sqlsearch = "select t.train_id,sec_name,count(d.per_id) as qty,place,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,year,quota_name,amount,region,No_,t.note from training t left join tranddetail d on t.train_id=d.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id where No_ = '$search' or year = '$search' or quota_name = '$search' or topic = '$search' or date_start between '$date1' and '$date2' or date_end between '$date1' and '$date2' or s.sec_id = '$sec_id' group by p.sec_id;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['sec_name']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['place']; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row['date_start'])); ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row['date_end'])); ?></td>
                    <td><?php echo $row['day']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['quota_name']; ?></td>
                    <td><?php echo number_format($row['amount']); ?></td>
                    <td><?php echo $row['region']; ?></td>
                    <td><?php echo $row['No_']; ?></td>
                    <td><?php echo $row['note']; ?></td>
                    <td>
                        <a href="updatetrain.php?id=<?php echo $row['train_id'];?>">
                            <img src="../../icon/edit.ico" alt="" width="18px;">
                        </a>&nbsp;
                        <a href="traindetail.php?id=<?php echo $row['train_id'];?>">
                            <img src="../../icon/info.ico" alt="" width="18px;">
                        </a>
                    </td>
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
            <form action="Report_train.php" method="POST" id="form1">
                <button type="submit" name="btnall" class="btn btn-primary">
                    <img src="../../icon/print.ico" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 2000px;">
                <tr>
                    <th style="width: 25px;">#</th>
                    <th style="width: 150px;">ພາກສ່ວນ</th>
                    <th style="width: 60px;">ຈຳນວນ</th>
                    <th style="width: 100px;">ສະຖານທີຈັດ</th>
                    <th style="width: 150px;">ຫົວຂໍ້ອົບຮົມ</th>
                    <th style="width: 80px;">ວັນທີອົບຮົມ</th>
                    <th style="width: 80px;">ວັນທີສິ້ນສຸດ</th>
                    <th style="width: 60px;">ຈຳນວນວັນ</th>
                    <th style="width: 60px;">ສົກປີ</th>
                    <th style="width: 100px;">ທຶນສະໜັບສະໜຸນ</th>
                    <th style="width: 100px;">ມູນຄ່າທຶນ</th>
                    <th style="width: 60px;">ພູມມິພາກ</th>
                    <th style="width: 120px;">ເລກທີໃບອະນຸຍາດ</th>
                    <th style="width: 100px;">ໝາຍເຫດ</th>
                    <th style="width: 80px;"></th>
                </tr>
                <?php
                    $sqlsearch = "select t.train_id,sec_name,count(d.per_id) as qty,place,topic,date_start,date_end,datediff(date_end,date_start) + 1 as day,year,quota_name,amount,region,No_,t.note from training t left join tranddetail d on t.train_id=d.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id group by p.sec_id;";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['sec_name']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['place']; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row['date_start'])); ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row['date_end'])); ?></td>
                    <td><?php echo $row['day']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['quota_name']; ?></td>
                    <td><?php echo number_format($row['amount']); ?></td>
                    <td><?php echo $row['region']; ?></td>
                    <td><?php echo $row['No_']; ?></td>
                    <td><?php echo $row['note']; ?></td>
                    <td>
                        <a href="updatetrain.php?id=<?php echo $row['train_id'];?>">
                            <img src="../../icon/edit.ico" alt="" width="18px;">
                        </a>&nbsp;
                        <a href="traindetail.php?id=<?php echo $row['train_id'];?>">
                            <img src="../../icon/info.ico" alt="" width="18px;">
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
    <?php
        }
            if(isset($_GET['delt1'])=='true'){
                echo'<script type="text/javascript">
                swal("", "ລົບຂໍ້ມູນຝຶກອົບໂຮມສຳເລັດ", "success");
                </script>';
            }
            if(isset($_GET['delt2'])=='true2'){
                echo'<script type="text/javascript">
                swal("", "ລົບຂໍ້ມູນຝຶກອົບຮົບບຸກຄົນສຳເລັດ", "success");
                </script>';
            }
            if(isset($_GET['delf1'])=='flase'){
                echo'<script type="text/javascript">
                    swal("", "ລົບຂໍ້ມູນລາຍລະອຽດຝຶກອົບຮົບບໍ່ສຳເລັດ", "error");
                    </script>';
            }
            if(isset($_GET['delf2'])=='flase2'){
                echo'<script type="text/javascript">
                    swal("", "ລົບຂໍ້ມູນຝຶກອົບຮົບບໍ່ສຳເລັດ", "error");
                    </script>';
            }
            if(isset($_GET['delf3'])=='flase2'){
                echo'<script type="text/javascript">
                    swal("", "ລົບຂໍ້ມູນຝຶກອົບຮົບບຸກຄົນບໍ່ສຳເລັດ", "error");
                    </script>';
            }
          if(isset($_GET['editt'])=='true'){
            echo'<script type="text/javascript">
                swal("", "ແກ້ໄຂຂໍ້ມູນຝຶກອົບຮົມສຳເລັດ", "success");
                </script>';
            }
            if(isset($_GET['editf'])=='flase'){
              echo'<script type="text/javascript">
                  swal("", "ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້", "error");
                  </script>';
          }
          if(isset($_GET['delt'])=='true'){
            echo'<script type="text/javascript">
                swal("", "ລົບຂໍ້ມູນສຳເລັດ", "success");
                </script>';
            }
            if(isset($_GET['delf1'])=='flase'){
                echo'<script type="text/javascript">
                    swal("", "ລົບບໍ່ມູນບໍ່ສຳເລັດ", "error");
                    </script>';
            }
            if(isset($_GET['place'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາເລືອກສະຖາທີຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['topic'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາໃສ່ຫົວຂໍ້ຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['date_start'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາເລືອກວັນຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['date_end'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາເລືອກວັນທີສິນສຸດການຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['year'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາປ້ອນສົກປີ", "info");
                    </script>';
            }
            if(isset($_GET['amount'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາປ້ອນມູນຄ່າທຶນຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['region'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາເລືອກພູມມິພາກ", "info");
                    </script>';
            }
            if(isset($_GET['No_'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາປ້ອນເລກທີໃບອະນຸຍາດ", "info");
                    </script>';
            }
            if(isset($_GET['quota_name'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາໃສ່ທຶນສະໜັບສະໜຸນ", "info");
                    </script>';
            }
            if(isset($_GET['resultck'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ລະຫັດບຸກຄະລາກອນນີ້ບໍ່ມີໃນລະບົບ", "info");
                    </script>';
            }
            if(isset($_GET['resultck2'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ບຸກຄະລາກອນທ່ານນີ້ໄດ້ເພີ່ມລົງລາຍການແລ້ວ ກະລຸນາໃສ່ບຸກຄະລາກອນທ່ານອື່ນ", "info");
                    </script>';
            }
    ?>
        <div class="clearfix"></div><br>
   
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
