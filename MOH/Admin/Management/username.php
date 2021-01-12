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
        <title>ຜູ້ໃຊ້ລະບົບ</title>
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
                    ຜູ້ໃຊ້ລະບົບ
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
                    <b>ຜູ້ໃຊ້ລະບົບ</b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
                </div>
                <div align="right" style="width: 48%;float: right;">
                    <form action="username.php" id="form1" method="POST" enctype="multipart/form-data">
                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                            <img src="../../icon/add.ico" alt="" width="30px">
                        </a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ຜູ້ໃຊ້ລະບົບ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" align="left">
                                            <div class="col-md-12 form-group">
                                                <label>ຊື່ຜູ້ໃຊ້</label>
                                                <input type="text" name="user_name" class="form-control" placeholder="ຊື່ຜູ້ໃຊ້">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ນາມສະກຸນ</label>
                                                <input type="text" name="user_surname" class="form-control" placeholder="ນາມສະກຸນ">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ເພດ</label>
                                                <select name="gender" id="" class="form-control">
                                                    <option value="">ເລືອກເພດ</option>
                                                    <option value="ຍິງ">ຍິງ</option>
                                                    <option value="ຊາຍ">ຊາຍ</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ທີ່ຢູ່ປັດຈຸບັນ</label>
                                                <input type="text" name="address" class="form-control" placeholder="ທີ່ຢູ່ປັດຈຸບັນ">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ເບີໂທລະສັບ</label>
                                                <input type="text" name="tel" class="form-control" placeholder="ເບີໂທລະສັບ">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ທີ່ຢູ່ອີເມວ</label>
                                                <input type="email" name="email" class="form-control" placeholder="ທີ່ຢູ່ອີເມວ">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ລະຫັດເຂົ້າໃຊ້ລະບົບ</label>
                                                <input type="password" name="pass" class="form-control" placeholder="ລະຫັດເຂົ້າໃຊ້ລະບົບ">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ສະຖານະຜູ້ໃຊ້ລະບົບ</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">ເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ</option>
                                                    <?php
                                                        $sqlauther = "select * from status;";
                                                        $resultauther = mysqli_query($link, $sqlauther);
                                                        while($rowauther = mysqli_fetch_array($resultauther, MYSQLI_NUM)){
                                                        echo" <option value='$rowauther[0]'>$rowauther[1]</option>";
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
                $user_name = $_POST['user_name'];
                $user_surname = $_POST['user_surname'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $pass = $_POST['pass'];
                $status = $_POST['status'];
                if(trim($emp_surname) == ""){
                    $emp_surname = "-";
                }
                if(trim($address) == ""){
                    $address = "-";
                }
                if(trim($tel) == ""){
                    $tel = "-";
                }
                if(trim($user_name) == ""){
                    echo"<script>";
                    echo"window.location.href='username.php?user_name=null';";
                    echo"</script>";
                }
                elseif(trim($gender) == ""){
                    echo"<script>";
                    echo"window.location.href='username.php?gender=null';";
                    echo"</script>";
                }
                elseif(trim($email) == ""){
                    echo"<script>";
                    echo"window.location.href='username.php?email=null';";
                    echo"</script>";
                }
                elseif(trim($status) == ""){
                    echo"<script>";
                    echo"window.location.href='username.php?status=null';";
                    echo"</script>";
                }
                else {
                    $sqlckname = "select * from username where user_name='$user_name';";
                    $resultckname = mysqli_query($link,$sqlckname);
                    $sqlemail = "select * from username where email='$email';";
                    $resultemail = mysqli_query($link,$sqlemail);
                    if (mysqli_num_rows($resultckname) > 0) {
                        echo"<script>";
                        echo"window.location.href='username.php?savef2=flase2';";
                        echo"</script>";
                    }
                    elseif (mysqli_num_rows($resultemail) > 0) {
                        echo"<script>";
                        echo"window.location.href='username.php?savef3=flase3';";
                        echo"</script>";
                    }
                    else {
                        $sqlinsert = "insert into username(user_name,user_surname,gender,address,tel,email,pass,status) values('$user_name','$user_surname','$gender','$address','$tel','$email','$pass','$status');";
                        $resultinsert = mysqli_query($link, $sqlinsert);
                        if(!$resultinsert){
                            echo"<script>";
                            echo"window.location.href='username.php?savef1=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='username.php?savet=true';";
                            echo"</script>";
                        }
                    }
                }
            }
        ?>
        <div class="clearfix"></div>
        <div class="container font14">
            <form action="username.php" id="fomrsearch" method="POST">
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
                        <th style="width: 75px;"></th>
                    </tr>
                    <?php
                        $sql = "select user_id,user_name,user_surname,gender,address,tel,email,md5(pass) as pass,status_name from username u left join status s on u.status=s.status where user_id like '$search' or user_name like '$search' or user_surname like '$search' or gender like '$search' or status_name like '$search' order by status_name asc;";
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
                        <td>
                            <a href="updateuser.php?id=<?php echo $row['user_id'];?>">
                                <img src="../../icon/edit.ico" alt="" width="20px;">
                            </a>
                            <a href="deluser.php?id=<?php echo $row['user_id'];?>" onclick="">
                                <img src="../../icon/delete.ico" alt="" width="20px;">
                            </a>
                        </td>
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
                swal("", "ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກຊື່ຜູ້ໃຊ້ນີ້ມີຢູ່ແລ້ວ ກະລຸນາໃສ່ຊື່ທີ່ແຕກຕ່າງ !!", "error");
                </script>';
            }
            if(isset($_GET['savef3'])=='flase3'){
                echo'<script type="text/javascript">
                swal("", "ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກອີ່ເມວຜູ້ໃຊ້ນີ້ມີຢູ່ແລ້ວ ກະລຸນາໃສ່ອີເມວທີ່ແຕກຕ່າງ !!", "error");
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
                if(isset($_GET['user_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້", "info");
                        </script>';
                }
                if(isset($_GET['user_name'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້ລະບົບ", "info");
                        </script>';
                }
                if(isset($_GET['gender'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາເລືອກເພດ", "info");
                        </script>';
                }
                if(isset($_GET['email'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາໃສ່ອີເມວຜູ້ໃຊ້ລະບົບ", "info");
                        </script>';
                }
                if(isset($_GET['status'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ", "info");
                        </script>';
                }
        ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
