<?php
    session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['status'] != 2){
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
        <title>ພາກສ່ວນ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <script src="../../js/sweetalert.min.js" ></script>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="management.php">
                        <img src="../../icon/back.ico" width="30px">
                    </a>
                </div>
                <div align="center" class="tapbar fonthead">
                    ພາກສ່ວນ
                </div>
                <div class="tapbar" align="right">
                    <a href="../../Check/Logout.php">
                        <img src="../../icon/close.ico" width="30px">
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="container font14">
            <div class="row">
                <div style="float: left;width: 50%;padding-left: 10px;">
                    <b>ພາກສ່ວນ</b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
                </div>
                <div align="right" style="width: 48%;float: right;">
                    <form action="section.php" id="form1" method="POST" enctype="multipart/form-data">
                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                            <img src="../../icon/add.ico" alt="" width="30px">
                        </a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ພາກສ່ວນ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" align="left">
                                            <div class="col-md-12 col-sm-6 form-group">
                                                <label>ຊື່ພາກສ່ວນ</label>
                                                <input type="text" name="sec_name" class="form-control" placeholder="ຊື່ພາກສ່ວນ">
                                            </div>
                                            <div class="col-md-12 col-sm-6 form-group">
                                                <label>ຕັ້ງຢູ່ທີບ້ານ</label>
                                                <input type="text" name="village" class="form-control" placeholder="ບ້ານ">
                                            </div>                                            <div class="col-md-12 col-sm-6 form-group">
                                                <label>ເມືອງ</label>
                                                <input type="text" name="district" class="form-control" placeholder="ເມືອງ">
                                            </div>                                            <div class="col-md-12 col-sm-6 form-group">
                                                <label>ແຂວງ</label>
                                                <select name="pro_id" id="" class="form-control">
                                                    <option value="">ເລືອກເເຂວງ</option>
                                                    <?php
                                                        $sqlcate = "select * from province;";
                                                        $resultcate = mysqli_query($link, $sqlcate);
                                                        while($rowcate = mysqli_fetch_array($resultcate, MYSQLI_NUM)){
                                                        echo" <option value='$rowcate[0]'>$rowcate[1]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                                        <button type="submit" name="btnSave" class="btn btn-outline-primary" onclick="">ບັນທຶກ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            if(isset($_POST['btnSave'])){
                $sec_name = $_POST['sec_name']; 
                $village = $_POST['village'];
                $district = $_POST['district'];
                $pro_id = $_POST['pro_id'];
                if(trim($sec_name) == ""){
                    echo"<script>";
                    echo"window.location.href='section.php?sec_name=null';";
                    echo"</script>";
                }
                else if(trim($pro_id) == ""){
                    echo"<script>";
                    echo"window.location.href='section.php?pro_id=null';";
                    echo"</script>";
                }
                else {
                    $sqlckid = "select * from section where sec_name='$sec_name';";
                    $resultckid = mysqli_query($link,$sqlckid);
                    if(mysqli_num_rows($resultckid) > 0){
                        echo"<script>";
                        echo"window.location.href='section.php?savef2=flase2';";
                        echo"</script>";
                    }
                    else {
                        $sqlinsert = "insert into section(sec_name,village,district,province) values('$sec_name','$village','$district','$pro_id');";
                        $resultinsert = mysqli_query($link, $sqlinsert);
                        if(!$resultinsert){
                            echo"<script>";
                            echo"window.location.href='section.php?savef1=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='section.php?savet=true';";
                            echo"</script>";
                        }
                    }
                }
            }
        ?>
        <div class="clearfix"></div>
        <div class="container font14">
            <form action="section.php" id="fomrsearch" method="POST">
                <div style="width: 100%">
                    <input type="text" class="form-control" name="search" style="float: left;width: 50%;" placeholder="ລະຫັດ, ຊື່ພາກສ່ວນ, ແຂວງ">
                    <button class="btn btn-outline-success" name="btnSearch" type="submit" style="float:left;margin-left: 10px">
                        ຄົ້ນຫາ
                    </button>
                </div>
            </form>
        </div>
        <div class="clearfix"></div><br>
        <?php
            if(isset($_POST['btnSearch'])){
            $search = "%".$_POST['search']."%";
            
        ?>
        <div class="container font12">
            <div>
                <?php
                    $s = $_POST['search'];
                    if($s != ""){
                        echo"ຄົ້ນຫາດ້ວຍ '$s'";
                    }
                ?>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 25px;">#</th>
                        <th style="width: 25px;">ລະຫັດ</th>
                        <th style="width: 150px;">ຊື່ພາກສ່ວນ</th>
                        <th style="width: 100px;">ບ້ານ</th>
                        <th style="width: 100px;">ເມືອງ</th>
                        <th style="width: 100px;">ແຂວງ</th>
                        <th style="width: 75px;"></th>
                    </tr>
                    <?php
                        $sqlsearch = "select sec_id,sec_name,village,district,pro_name from section s left join province p on s.province=p.pro_id where sec_id like '$search' or sec_name like '$search' or pro_name like '$search' order by sec_name asc;";
                        $resultsearch = mysqli_query($link,$sqlsearch);
                        $No_ = 0;
                        while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $No_ += 1; ?></td>
                        <td><?php echo $row['sec_id']; ?></td>
                        <td><?php echo $row['sec_name']; ?></td>
                        <td><?php echo $row['village']; ?></td>
                        <td><?php echo $row['district']; ?></td>
                        <td><?php echo $row['pro_name']; ?></td>
                        <td>
                            <a href="updatesec.php?id=<?php echo $row['sec_id'];?>">
                                <img src="../../icon/edit.ico" alt="" width="20px;">
                            </a>
                            <a href="delsec.php?id=<?php echo $row['sec_id'];?>" onclick="">
                                <img src="../../icon/delete.ico" alt="" width="20px;">
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
            if(isset($_GET['savet'])=='true'){
                echo'<script type="text/javascript">
                    swal("", "ບັນທຶກຂໍ້ມູນສຳເລັດ !!", "success");
                    </script>';
                    // echo"<meta http-equiv='refresh' content='1;URL=frmlogin.php'>";
            }
              if(isset($_GET['savef1'])=='flase'){
                  echo'<script type="text/javascript">
                  swal("", "ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ !!", "error");
                  </script>';
              }
              if(isset($_GET['savef2'])=='flase2'){
                echo'<script type="text/javascript">
                swal("", "ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກພາກສ່ວນນີ້ມີຢູ່ແລ້ວ !!", "error");
                </script>';
            }
              if(isset($_GET['editt'])=='true'){
                echo'<script type="text/javascript">
                    swal("", "ແກ້ໄຂຂໍ້ມູນສຳເລັດ", "success");
                    </script>';
                }
                if(isset($_GET['editf'])=='flase'){
                  echo'<script type="text/javascript">
                      swal("", "ແກ້ໄຂຂໍ້ມູນບໍ່ສຳເລັດ", "error");
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
                if(isset($_GET['delf2'])=='flase2'){
                    echo'<script type="text/javascript">
                        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກພາກສ່ວນນີ້ໄດ້ເຄີຍທຳການຝຶກອົບໂຮມແລ້ວ", "error");
                        </script>';
                }
                if(isset($_GET['sec_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້", "info");
                        </script>';
                }
                if(isset($_GET['sec_name'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາໃສ່ຊື່ພາກສ່ວນ", "info");
                        </script>';
                }
                if(isset($_GET['pro_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາເລືອກແຂວງ", "info");
                        </script>';
                }
                
        ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
