<?php
    session_start();
    if($_SESSION['ses_id'] == ''){
       echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['status'] != 1){
       echo"<meta http-equiv='refresh' content='1;URL=../Check/logout.php'>";
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
                    <a href="username.php">
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
            $sqlget = "select user_id,user_name,user_surname,gender,address,tel,email,pass,s.status,status_name from username u left join status s on u.status=s.status where user_id='$id';";
            $resultget = mysqli_query($link,$sqlget);
            $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);

        ?>
        <div class="container font14">
            <form action="updateuser.php" id="update2" method="POST">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຊື່ຜູ້ໃຊ້</label><br>
                        <input type="text" name="user_name" class="form-control" value="<?php echo $row['user_name']?>" placeholder="ຊື່ຜູ້ໃຊ້">
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']?>" >
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ນາມສະກຸນ</label><br>
                        <input type="text" name="user_surname" class="form-control" value="<?php echo $row['user_surname']?>" placeholder="ນາມສະກຸນ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ເພດ</label>
                        <select name="gender" id="" class="form-control">
                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender'] ?></option>
                            <option value="ຊາຍ">ຊາຍ</option>
                            <option value="ຍິງ">ຍິງ</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ທີ່ຢູ່ປັດຈຸບັນ</label><br>
                        <input type="text" name="address" class="form-control" value="<?php echo $row['address']?>" placeholder="ທີ່ຢູ່ປັດຈຸບັນ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ເບີໂທລະສັບ</label><br>
                        <input type="text" name="tel" class="form-control" value="<?php echo $row['tel']?>" placeholder="ເບີໂທລະສັບ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ອີເມວ</label><br>
                        <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>" placeholder="ອີເມວ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ລະຫັດຜູ້ໃຊ້ລະບົບ</label><br>
                        <input type="password" name="pass" class="form-control" value="<?php echo $row['pass']?>" placeholder="ລະຫັດຜູ້ໃຊ້ລະບົບ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ສະຖານະຜູ້ໃຊ້ລະບົບ</label>
                            <select name="status" id="" class="form-control">
                                <option value="<?php echo $row['status']?>"><?php echo $row['status_name']?></option>
                                <?php
                                    $status2 = $row['status'];
                                    $sqlstatus = "select * from status where status != '$status2';";
                                    $resultstatus = mysqli_query($link, $sqlstatus);
                                    while($rowstatus = mysqli_fetch_array($resultstatus, MYSQLI_NUM)){
                                        echo" <option value='$rowstatus[0]'>$rowstatus[1]</option>";
                                    }
                                    ?>
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
            else{
        ?>
        <div class="container font14">
            <form action="updateuser.php" id="update" method="POST">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຊື່ຜູ້ໃຊ້</label><br>
                        <input type="text" name="user_name" class="form-control" placeholder="ຊື່ຜູ້ໃຊ້">
                        <input type="hidden" name="user_id" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ນາມສະກຸນ</label><br>
                        <input type="text" name="user_surname" class="form-control" placeholder="ນາມສະກຸນ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ເພດ</label>
                        <select name="gender" id="" class="form-control">
                            <option value="">ເລືອກເພດ</option>
                            <option value="ຊາຍ">ຊາຍ</option>
                            <option value="ຍິງ">ຍິງ</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ທີ່ຢູ່ປັດຈຸບັນ</label><br>
                        <input type="text" name="address" class="form-control" placeholder="ທີ່ຢູ່ປັດຈຸບັນ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ເບີໂທລະສັບ</label><br>
                        <input type="text" name="tel" class="form-control" placeholder="ເບີໂທລະສັບ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ອີເມວ</label><br>
                        <input type="text" name="email" class="form-control" placeholder="ອີເມວ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ລະຫັດຜູ້ໃຊ້ລະບົບ</label><br>
                        <input type="text" name="pass" class="form-control" placeholder="ລະຫັດຜູ້ໃຊ້ລະບົບ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ສະຖານະຜູ້ໃຊ້ລະບົບ</label>
                        <select name="status" id="" class="form-control">
                            <option value="">ເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ</option>
                            <?php
                                $sqlstatus = "select * from status;";
                                $resultstatus = mysqli_query($link, $sqlstatus);
                                while($rowstatus = mysqli_fetch_array($resultstatus, MYSQLI_NUM)){
                                    echo" <option value='$rowstatus[0]'>$rowstatus[1]</option>";
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
            if(isset($_POST['btnUpdate'])){
                $user_id = $_POST['user_id'];
                $user_name = $_POST['user_name'];
                $user_surname = $_POST['user_surname'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $pass = $_POST['pass'];
                $status = $_POST['status'];
                if(trim($user_id) == ""){
                    echo"<script>";
                    echo"window.location.href='username.php?user_id=null';";
                    echo"</script>";
                }
                elseif(trim($user_name) == ""){
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
                        $sqlupdates = "update username set user_name='$user_name',user_surname='$user_surname',gender='$gender',address='$address',tel='$tel',email='$email',pass='$pass',status='$status' where user_id='$user_id';";
                        $resultupdates = mysqli_query($link,$sqlupdates);
                        if(!$resultupdates){
                            echo"<script>";
                            echo"window.location.href='username.php?editf=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='username.php?editt=true';";
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
