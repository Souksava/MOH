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
        <title>ບຸກຄະນາກອນ</title>
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
                    ບຸກຄະນາກອນ
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
                    <b>ບຸກຄະນາກອນ</b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
                </div>
                <div align="right" style="width: 48%;float: right;">
                    <form action="personality.php" id="form1" method="POST" enctype="multipart/form-data">
                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                            <img src="../../icon/add.ico" alt="" width="30px">
                        </a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ບຸກຄະນາກອນ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" align="left">
                                            <div class="col-md-12 form-group">
                                                <label>ລະຫັດບຸກຄະນາກອນ</label>
                                                <input type="text" name="per_id" class="form-control" placeholder="ລະຫັດບຸກຄະນາຄອນ">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ຊື່ບຸກຄະນາກອນ</label>
                                                <input type="text" name="per_name" class="form-control" placeholder="ຊື່ບຸກຄະນາກອນ">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ນາມສະກຸນ</label>
                                                <input type="text" name="per_surname" class="form-control" placeholder="ນາມສະກຸນ">
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
                                                <label>ວັນເດືອນປີເກີດ</label>
                                                <input type="date" name="dob" class="form-control">
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
                                                <label>ປະເພດບຸກຄະລາກອນ</label>
                                                <select name="type_id" id="" class="form-control">
                                                    <option value="">ປະເພດບຸກຄະລາກອນ</option>
                                                    <?php
                                                        $sqltype = "select * from type_person;";
                                                        $resulttype = mysqli_query($link, $sqltype);
                                                        while($rowtype = mysqli_fetch_array($resulttype, MYSQLI_NUM)){
                                                        echo" <option value='$rowtype[0]'>$rowtype[1]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ພາກສ່ວນ</label>
                                                <select name="sec_id" id="" class="form-control">
                                                    <option value="">ເລືອກພາກສ່ວນ</option>
                                                    <?php
                                                        $sqlsec = "select * from section order by sec_name asc;";
                                                        $resultsec = mysqli_query($link, $sqlsec);
                                                        while($rowsec = mysqli_fetch_array($resultsec, MYSQLI_NUM)){
                                                            echo" <option value='$rowsec[0]'>$rowsec[1]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ເລືອກຊົນເຜົ່າ</label>
                                                <select name="eth_id" id="" class="form-control">
                                                    <option value="">ເລືອກຊົນເຜົ່າ</option>
                                                    <?php
                                                        $sqleth = "select * from ethnicity;";
                                                        $resulteth = mysqli_query($link, $sqleth);
                                                        while($roweth = mysqli_fetch_array($resulteth, MYSQLI_NUM)){
                                                        echo" <option value='$roweth[0]'>$roweth[1]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>ເລືອກສັນຊາດ</label>
                                                <select name="nation_id" id="" class="form-control">
                                                    <option value="">ເລືອກສັນຊາດ</option>
                                                    <?php
                                                        $sqlnation = "select * from nationality;";
                                                        $resultnation = mysqli_query($link, $sqlnation);
                                                        while($rownation = mysqli_fetch_array($resultnation, MYSQLI_NUM)){
                                                        echo" <option value='$rownation[0]'>$rownation[1]</option>";
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
                $per_id = $_POST['per_id'];
                $per_name = $_POST['per_name'];
                $per_surname = $_POST['per_surname'];
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $type_id = $_POST['type_id'];
                $eth_id = $_POST['eth_id'];
                $nation_id = $_POST['nation_id'];
                $sec_id = $_POST['sec_id'];
                if(trim($dob) == ""){
                    $dob = "0000-00-00";
                }
             
                if(trim($per_id) == ""){
                    echo"<script>";
                    echo"window.location.href='personality.php?per_id=null';";
                    echo"</script>";
                }
                elseif(trim($per_name) == ""){
                    echo"<script>";
                    echo"window.location.href='personality.php?per_name=null';";
                    echo"</script>";
                }
                elseif(trim($per_surname) == ""){
                    echo"<script>";
                    echo"window.location.href='personality.php?per_surname=null';";
                    echo"</script>";
                }
                elseif(trim($gender) == ""){
                    echo"<script>";
                    echo"window.location.href='personality.php?gender=null';";
                    echo"</script>";
                }
                elseif(trim($type_id) == ""){
                    echo"<script>";
                    echo"window.location.href='personality.php?type_id=null';";
                    echo"</script>";
                }
                elseif(trim($sec_id) == ""){
                    echo"<script>";
                    echo"window.location.href='personality.php?sec_id=null';";
                    echo"</script>";
                }
                elseif(trim($eth_id) == ""){
                    echo"<script>";
                    echo"window.location.href='personality.php?eth_id=null';";
                    echo"</script>";
                }
                elseif(trim($nation_id) == ""){
                    echo"<script>";
                    echo"window.location.href='personality.php?nation_id=null';";
                    echo"</script>";
                }
                else {
                    $sqlckname = "select * from personality where per_id='$per_id';";
                    $resultckname = mysqli_query($link,$sqlckname);
                    if (mysqli_num_rows($resultckname) > 0) {
                        echo"<script>";
                        echo"window.location.href='personality.php?savef2=flase2';";
                        echo"</script>";
                    }
                  
                    else {
                        $sqlinsert = "insert into personality(per_id,per_name,per_surname,gender,dob,tel,address,email,type_id,eth_id,nation_id,sec_id) values('$per_id','$per_name','$per_surname','$gender','$dob','$tel','$address','$email','$type_id','$eth_id','$nation_id','$sec_id');";
                        $resultinsert = mysqli_query($link, $sqlinsert);
                        if(!$resultinsert){
                            echo"<script>";
                            echo"window.location.href='personality.php?savef1=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='personality.php?savet=true';";
                            echo"</script>";
                        }
                    }
                }
            }
        ?>
        <div class="clearfix"></div>
        <div class="container font14">
            <form action="personality.php" id="fomrsearch" method="POST">
                <div style="width: 100%">
                    <input type="text" class="form-control" name="search" style="float: left;width: 50%;" placeholder="ລະຫັດ, ຊື່, ນາມສະກຸນ, ເພດ, ຊົນເຜົ່າ, ປະເພດບຸກຄະລາກອນ, ສັນຊາດ, ພາກສ່ວນ, ແຂວງ">
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
                <table class="table table-striped" style="width: 2100px;">
                    <tr>
                        <th style="width: 25px;">#</th>
                        <th style="width: 100px;">ລະຫັດບຸກຄະນາຄອນ</th>
                        <th style="width: 120px;">ຊື່ບຸກຄະນາກອນ</th>
                        <th style="width: 120px;">ນາມສະກຸນ</th>
                        <th style="width: 40px;">ເພດ</th>
                        <th style="width: 80px;">ວັນເດືອນປີເກີດ</th>
                        <th style="width: 80px;">ຊົນເຜົ່າ</th>
                        <th style="width: 80px;">ສັນຊາດ</th>
                        <th style="width: 120px;">ປະເພດບຸກຄະລາກອນ</th>
                        <th style="width: 200px;">ພາກສ່ວນ</th>
                        <th style="width: 100px;">ແຂວງ</th>
                        <th style="width: 120px;">ເບີໂທລະສັບ</th>
                        <th style="width: 300px;">ທີ່ຢູ່ປັດຈຸບັນ</th>
                        <th style="width: 120px;">ທີ່ຢູ່ອີເມວ</th>
                        <th style="width: 75px;"></th>
                    </tr>
                    <?php
                        $sql = "select per_id,per_name,per_surname,gender,dob,tel,address,email,type_name,eth_name,nation_name,sec_name,pro_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join section s on p.sec_id=s.sec_id left join province o on s.province=o.pro_id where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or sec_name like '$search' or pro_name like '$search' order by p.per_name asc;";
                        $result = mysqli_query($link,$sql);
                        $NO_ = 0;
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $NO_ += 1; ?></td>
                        <td><?php echo $row['per_id']; ?></td>
                        <td><?php echo $row['per_name']; ?></td>
                        <td><?php echo $row['per_surname']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td>
                        <?php 
                            if($row['dob'] == "0000-00-00"){
                                echo"00/00/0000";
                            }
                            else{
                                echo date("d/m/Y",strtotime($row['dob'])); 
                            }
                        ?>
                        </td>
                        <td><?php echo $row['eth_name']; ?></td>
                        <td><?php echo $row['nation_name']; ?></td>
                        <td><?php echo $row['type_name']; ?></td>
                        <td><?php echo $row['sec_name']; ?></td>
                        <td><?php echo $row['pro_name']; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="updateperson.php?id=<?php echo $row['per_id'];?>">
                                <img src="../../icon/edit.ico" alt="" width="20px;">
                            </a>
                            <a href="delperson.php?id=<?php echo $row['per_id'];?>" onclick="">
                                <img src="../../icon/delete.ico" alt="" width="20px;">
                            </a>
                        </td>
                    </tr>
                     <?php 
                        }
                        $sqlcount = "select count(gender) as count from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search';";
                        $resultcount = mysqli_query($link,$sqlcount);
                        $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
                    ?>
                     <tr>
                        <td colspan="12" align="right">ຈຳນວນທັງໝົດ</td>
                        <td colspan="3" align="right"><?php echo $rowcounts['count']; ?> ຄົນ</td>
                    </tr>
                    <?php
                       
                        $sqlmale = "select count(gender) as count,gender from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' group by gender order by gender desc;";
                        $resultmale = mysqli_query($link,$sqlmale);
                        while($rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC)){
                       
                    ?>
                    <tr>
                        <td colspan="12" align="right"><?php echo $rowmale['gender']; ?></td>
                        <td colspan="3" align="right"><?php echo $rowmale['count']; ?> ຄົນ</td>
                    </tr>
                    <?php 
                        }
                        $sqlnation = "select count(p.nation_id) as countnation,nation_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' group by n.nation_id;";
                        $resultnation = mysqli_query($link,$sqlnation);
                        while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
                    ?>
                      <tr>
                        <td colspan="12" align="right">ສັນຊາດ<?php echo $rownation['nation_name']; ?></td>
                        <td colspan="3" align="right"><?php echo $rownation['countnation']; ?> ຄົນ</td>
                    </tr>
                    <?php 
                        }
                    ?>
                     <?php 
                        $sqleth = "select count(p.eth_id) as counteth,eth_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' group by p.eth_id;";
                        $resulteth = mysqli_query($link,$sqleth);
                        while($roweth = mysqli_fetch_array($resulteth, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td colspan="12" align="right"><?php echo $roweth['eth_name']; ?></td>
                        <td colspan="3" align="right"><?php echo $roweth['counteth']; ?> ຄົນ</td>
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
                swal("", "ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ ເນື່ອງຈາກລະຫັດບຸກຄະລາກອນນີ້ມີຢູ່ແລ້ວ ກະລຸນາໃສ່ລະຫັດບຸກຄະລາກອນທີ່ແຕກຕ່າງ !", "error");
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
                        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ ເນື່ອງຈາກບຸກຄະລາກອນນີ້ເຄີຍໄດ້ທຳການຝຶກອົບໂຮມແລ້ວ", "error");
                        </script>';
                }
                if(isset($_GET['per_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາໃສ່ລະຫັດບຸກຄະນາກອນ", "info");
                        </script>';
                }
                if(isset($_GET['per_name'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາໃສ່ຊື່ບຸກຄະລາກອນ", "info");
                        </script>';
                }
                if(isset($_GET['per_surname'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາໃສ່ນາມສະກຸນ", "info");
                        </script>';
                }
                if(isset($_GET['gender'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາເລືອກເພດ", "info");
                        </script>';
                }
                if(isset($_GET['type_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາເລືອກປະເພດບຸກຄະລາກອນ", "info");
                        </script>';
                }
                if(isset($_GET['sec_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາເລືອກພາກສ່ວນ", "info");
                        </script>';
                }
                if(isset($_GET['eth_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາເລືອກຊົນເຜົ່າ", "info");
                        </script>';
                }
                if(isset($_GET['nation_id'])=='null'){
                    echo'<script type="text/javascript">
                        swal("", "ກະລຸນາເລືອກສັນຊາດ", "info");
                        </script>';
                }
        ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
