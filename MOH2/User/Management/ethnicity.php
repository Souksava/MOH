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
?>
<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ຊົນເຜົ່າ</title>
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
                    ຊົນເຜົ່າ
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
                    <b>ຊົນເຜົ່າ</b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
                </div>
                <div align="right" style="width: 48%;float: right;">
                    <form action="ethnicity.php" id="form1" method="POST" enctype="multipart/form-data">
                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                            <img src="../../icon/add.ico" alt="" width="30px">
                        </a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ຊົນເຜົ່າ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" align="left">
                                            <div class="col-md-12 col-sm-6 form-group">
                                                <label>ຊື່ຊົນເຜົ່າ</label>
                                                <input type="text" name="eth_name" class="form-control" placeholder="ຊື່ຊົນເຜົ່າ">
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
                $eth_name = $_POST['eth_name']; 
                if(trim($eth_name) == ""){
                    echo"<script>";
                    echo"window.location.href='ethnicity.php?eth_name=null';";
                    echo"</script>";
                }
                else {
                    $sqlckid = "select * from ethnicity where eth_name='$eth_name';";
                    $resultckid = mysqli_query($link,$sqlckid);
                    if(mysqli_num_rows($resultckid) > 0){
                        echo"<script>";
                        echo"window.location.href='ethnicity.php?savef2=flase2';";
                        echo"</script>";
                    }
                    else {
                        $sqlinsert = "insert into ethnicity(eth_name) values('$eth_name');";
                        $resultinsert = mysqli_query($link, $sqlinsert);
                        if(!$resultinsert){
                            echo"<script>";
                            echo"window.location.href='ethnicity.php?savef1=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='ethnicity.php?savet=true';";
                            echo"</script>";
                        }
                    }
                }
            }
        ?>
        <div class="clearfix"></div>
        <div class="container font14">
            <form action="ethnicity.php" id="fomrsearch" method="POST">
                <div style="width: 100%">
                    <input type="text" class="form-control" name="search" style="float: left;width: 50%;" placeholder="ລະຫັດ, ຊົນເຜົ່າ">
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
                        <th>ຊື່ຊົນເຜົ່າ</th>
                        <th style="width: 75px;"></th>
                    </tr>
                    <?php
                        $sqlsearch = "select * from ethnicity where eth_id like '$search' or eth_name like '$search';";
                        $resultsearch = mysqli_query($link,$sqlsearch);
                        $No_ = 0;
                        while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $No_ += 1; ?></td>
                        <td><?php echo $row['eth_name']; ?></td>
                        <td>
                            <a href="updateeth.php?id=<?php echo $row['eth_id'];?>">
                                <img src="../../icon/edit.ico" alt="" width="20px;">
                            </a>
                            <a href="deleth.php?id=<?php echo $row['eth_id'];?>" onclick="">
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
                swal("", "ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ເນື່ອງຈາກຊົນເຜົ່ານີ້ມີຢູ່ແລ້ວ !!", "error");
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
                        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກຊົນເຜົ່ານີ້ມີຢູ່ໃນຂໍ້ມູນຜູ້ຝຶກອົບໂຮມແລ້ວ", "error");
                        </script>';
                }
                if(isset($_GET['eth_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້", "info");
                        </script>';
                }
                if(isset($_GET['eth_name'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາໃສ່ຊື່ຊົນເຜົ່າ", "info");
                        </script>';
                }
        ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
