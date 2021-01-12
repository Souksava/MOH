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
        <title>ວິຊາການສະເພາະ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <script src="../../js/sweetalert.min.js" ></script>
    </head>
    <body >
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="management.php">
                        <img src="../../icon/back.ico" width="30px">
                    </a>
                </div>
                <div align="center" class="tapbar fonthead">
                    ວິຊາການສະເພາະ
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
                    <b>ວິຊາການສະເພາະ</b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
                </div>
                <div align="right" style="width: 48%;float: right;">
                    <form action="certificate.php" id="form1" method="POST" enctype="multipart/form-data">
                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                            <img src="../../icon/add.ico" alt="" width="30px">
                        </a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ວິຊາການສະເພາະ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" align="left">
                                            <div class="col-md-12 form-group">
                                                <label>ວິຊາການສະເພາະ</label>
                                                <input type="text" name="cer_name" class="form-control" placeholder="ຊື່ວິຊາການສະເພາະ">
                                            </div>
                                        </div>
                                        <div class="row" align="left">
                                            <div class="col-md-12 form-group">
                                                <label>ວຸດທິການສຶກສາ</label>
                                                <select name="cer_id2" id="" class="form-control">
                                                    <option value="">ເລືອກວຸດທິການສຶກສາ</option>
                                                    <?php
                                                        $sqlcer= "select * from certificate2;";
                                                        $resultcer = mysqli_query($link, $sqlcer);
                                                        while($rowcer = mysqli_fetch_array($resultcer, MYSQLI_NUM)){
                                                        echo" <option value='$rowcer[0]'>$rowcer[1]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                                        <button type="submit" name="btnSave" class="btn btn-outline-primary">ບັນທຶກ</button>
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
                $cer_name = $_POST['cer_name']; 
                $cer_id2 = $_POST['cer_id2']; 
                if(trim($cer_name) == ""){
                    echo"<script>";
                    echo"window.location.href='certificate.php?cer_name=null';";
                    echo"</script>";
                }
                elseif(trim($cer_id2) == ""){
                    echo"<script>";
                    echo"window.location.href='certificate.php?cer_id2=null2';";
                    echo"</script>";
                }
                else {                 
                        $sqlinsert = "insert into certificate(cer_name,cer_id2) values('$cer_name','$cer_id2');";
                        $resultinsert = mysqli_query($link, $sqlinsert);
                        if(!$resultinsert){
                            echo"<script>";
                            echo"window.location.href='certificate.php?savef1=false';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='certificate.php?savet=true';";
                            echo"</script>";
                        }
                    }
                
            }
        ?>
        <div class="clearfix"></div>
        <div class="container font14">
            <form action="certificate.php" id="fomrsearch" method="POST">
                <div style="width: 100%">
                    <input type="text" class="form-control" name="search" style="float: left;width: 50%;" placeholder="ວິຊາການສະເພາະ, ວຸດທິການສຶກສາ">
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
                        <th>#</th>
                        <th>ວຸດທິການສຶກສາ</th>
                        <th>ວິຊາການສະເພາະ</th>
                        <th style="width: 75px;"></th>
                    </tr>
                    <?php
                        $sqlsearch = "select cer_id,cer_name,cer_name2 from certificate c left join certificate2 c2 on c.cer_id2=c2.cer_id2 where cer_id like '$search' or cer_name like '$search' or cer_name2 like '$search';";
                        $resultsearch = mysqli_query($link,$sqlsearch);
                        $No_ = 0;
                        while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $No_ += 1; ?></td>
                        <td><?php echo $row['cer_name']; ?></td>
                        <td><?php echo $row['cer_name2']; ?></td>
                        <td>
                            <a href="updatecer.php?id=<?php echo $row['cer_id'];?>">
                                <img src="../../icon/edit.ico" alt="" width="20px;">
                            </a>
                            <a href="delcer.php?id=<?php echo $row['cer_id'];?>">
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
                        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກວິຊາການສະເພາະນີ້ມີຢູ່ໃນຂໍ້ມູນບຸກຄະລາກອນແລ້ວ", "error");
                        </script>';
                }
                if(isset($_GET['cer_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້", "info");
                        </script>';
                }
                if(isset($_GET['cer_id2'])=='null2'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາເລືອກວຸດທິການສຶກສາ", "info");
                        </script>';
                }
                if(isset($_GET['cer_name'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາໃສ່ຂໍ້ມູນວຸດການສຶກສາ", "info");
                        </script>';
                }
        ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
