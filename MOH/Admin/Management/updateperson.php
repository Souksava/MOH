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
        <title>ແກ້ໄຂຂໍ້ມູນ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <body >
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="personality.php">
                        <img src="../../icon/back.ico" width="30px">
                    </a>
                </div>
                <div align="center" class="tapbar fonthead">
                    ແກ້ໄຂຂໍ້ມູນ
                </div>
                <div class="tapbar" align="right">
                    <a href="../../Check/Logout.php">
                        <img src="../../icon/close.ico" width="30px">
                    </a>
                </div>
            </div>
        </div>
        <br>
        <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sqlget = "select per_id,per_name,per_surname,gender,dob,tel,address,email,t.type_id,type_name,eth_name,nation_name,p.sec_id,sec_name,pro_name,p.nation_id,p.eth_id,e.cer_id,cer_name,cer_name2 from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join section s on p.sec_id=s.sec_id left join province o on s.province=o.pro_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id='$id';";
            $resultget = mysqli_query($link,$sqlget);
            $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);

        ?>
        <div class="container font14">
            <form action="updateperson.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຊື່ບຸກຄະນາກອນ</label>
                        <input type="text" name="per_name" class="form-control" placeholder="ຊື່ບຸກຄະນາກອນ" value="<?php echo $row['per_name']; ?>">
                        <input type="hidden" name="per_id" value="<?php echo $row['per_id']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ນາມສະກຸນ</label>
                        <input type="text" name="per_surname" class="form-control" placeholder="ນາມສະກຸນ" value="<?php echo $row['per_surname']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ເພດ</label>
                        <select name="gender" id="" class="form-control">
                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                            <option value="ຍິງ">ຍິງ</option>
                            <option value="ຊາຍ">ຊາຍ</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ວັນເດືອນປີເກີດ</label>
                        <input type="date" name="dob" class="form-control" value="<?php echo $row['dob']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ທີ່ຢູ່ປັດຈຸບັນ</label>
                        <input type="text" name="address" class="form-control" placeholder="ທີ່ຢູ່ປັດຈຸບັນ" value="<?php echo $row['address']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ເບີໂທລະສັບ</label><br>
                        <input type="text" name="tel" class="form-control" value="<?php echo $row['tel']?>" placeholder="ເບີໂທລະສັບ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ທີ່ຢູ່ອີເມວ</label>
                        <input type="email" name="email" class="form-control" placeholder="ທີ່ຢູ່ອີເມວ" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ປະເພດບຸກຄະລາກອນ</label>
                        <select name="type_id" id="" class="form-control">
                            <option value="<?php echo $row['type_id']?>"><?php echo $row['type_name']?></option>
                            <?php
                                $type_id2 = $row['type_id'];
                                $sqltype = "select * from type_person where type_id != '$type_id2';";
                                $resulttype = mysqli_query($link, $sqltype);
                                while($rowtype = mysqli_fetch_array($resulttype, MYSQLI_NUM)){
                                    echo" <option value='$rowtype[0]'>$rowtype[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ພາກສ່ວນ</label>
                        <select name="sec_id" id="" class="form-control">
                            <option value="<?php echo $row['sec_id']?>"><?php echo $row['sec_name']?></option>
                            <?php
                                $sec_id2 = $row['sec_id'];
                                $sqlsec = "select * from section where sec_id != '$sec_id2' order by sec_name asc;";
                                $resultsec = mysqli_query($link, $sqlsec);
                                while($rowsec = mysqli_fetch_array($resultsec, MYSQLI_NUM)){
                                    echo" <option value='$rowsec[0]'>$rowsec[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຊົນເຜົ່າ</label>
                        <select name="eth_id" id="" class="form-control">
                            <option value="<?php echo $row['eth_id']?>"><?php echo $row['eth_name']?></option>
                            <?php
                                $eth_id2 = $row['eth_id'];
                                $sqleth = "select * from ethnicity where eth_id != '$eth_id2';";
                                $resulteth = mysqli_query($link, $sqleth);
                                while($roweth = mysqli_fetch_array($resulteth, MYSQLI_NUM)){
                                    echo" <option value='$roweth[0]'>$roweth[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ເລືອກສັນຊາດ</label>
                        <select name="nation_id" id="" class="form-control">
                            <option value="<?php echo $row['nation_id']?>"><?php echo $row['nation_name']?></option>
                            <?php
                                $nation_id2 = $row['nation_id'];
                                $sqlnation = "select * from nationality where nation_id != '$nation_id2';";
                                $resultnation = mysqli_query($link, $sqlnation);
                                while($rownation = mysqli_fetch_array($resultnation, MYSQLI_NUM)){
                                    echo" <option value='$rownation[0]'>$rownation[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ວຸດທິການສຶກສາ</label>
                        <select name="cer_id" id="" class="form-control">
                            <option value="<?php echo $row['cer_id'];?>"><?php echo $row['cer_name']; $row['cer_name2']; ?></option>
                            <?php
                                $cer_id2 = $row['cer_id'];
                                $sqlcer = "select cer_id,cer_name,cer_name2 from certificate c left join certificate2 c2 on c.cer_id2=c2.cer_id2 where cer_id != '$cer_id2' order by cer_name2 asc;";
                                $resultcer = mysqli_query($link, $sqlcer);
                                while($rowcer = mysqli_fetch_array($resultcer, MYSQLI_NUM)){
                                    echo" <option value='$rowcer[0]'>$rowcer[2] $rowcer[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        
                        <button type="submit" class="btn btn-outline-success" name="btnUpdate" style="width: 100%;" onclick="">
                           ແກ້ໄຂຂໍ້ມູນ
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php
            }
        ?>
        </div>
        <?php
            if(isset($_POST['btnUpdate'])){
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
                $cer_id = $_POST['cer_id'];
                if(trim($dob) == ""){
                    $dob = "0000-00-00";
                }
                if(trim($address) == ""){
                    $address = "-";
                }
                if(trim($tel) == ""){
                    $tel = "-";
                }
                if(trim($address) == ""){
                    $address = "-";
                }
                if(trim($email) == ""){
                    $email = "-";
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
                elseif(trim($cer_id) == ""){
                    echo"<script>";
                    echo"window.location.href='personality.php?cer_id=null';";
                    echo"</script>";
                }
                else {
                        $sqlupdateper = "update personality set per_name='$per_name',per_surname='$per_surname',gender='$gender',dob='$dob',tel='$tel',address='$address',email='$email',type_id='$type_id',eth_id='$eth_id',nation_id='$nation_id',sec_id='$sec_id',cer_id='$cer_id' where per_id='$per_id';";
                        $resultupdateper = mysqli_query($link, $sqlupdateper);
                        if(!$resultupdateper){
                            echo"<script>";
                            echo"window.location.href='personality.php?editf=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='personality.php?editt=true';";
                            echo"</script>";
                        }
                    }
            }
        ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
