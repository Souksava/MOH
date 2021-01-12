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
        <title>ແກ້ໄຂຂໍ້ມູນ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <body >
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="section.php">
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
            $sqlget = "select sec_id,sec_name,village,district,province,pro_name from section s left join province p on s.province=p.pro_id where sec_id='$id';";
            $resultget = mysqli_query($link,$sqlget);
            $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);

        ?>
        <div class="container font14">
            <form action="updatesec.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຊື່ພາກສ່ວນ</label><br>
                        <input type="text" name="sec_name" class="form-control" value="<?php echo $row['sec_name']?>" placeholder="ຊື່ພາກສ່ວນ">
                        <input type="hidden" name="sec_id" class="form-control" value="<?php echo $row['sec_id']?>" >
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ບ້ານ</label><br>
                        <input type="text" name="village" class="form-control" value="<?php echo $row['village']?>" placeholder="ບ້ານ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ເມືອງ</label><br>
                        <input type="text" name="district" class="form-control" value="<?php echo $row['district']?>" placeholder="ເມືອງ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ແຂວງ</label>
                        <select name="pro_id" id="" class="form-control">
                            <option value="<?php echo $row['province']; ?>"><?php echo $row['pro_name'] ?></option>
                            <?php
                                $pro_id2 = $row['province'];
                                $sqlcate = "select * from province where pro_id!='$pro_id2';";
                                $resultcate = mysqli_query($link, $sqlcate);
                                while($rowcate = mysqli_fetch_array($resultcate, MYSQLI_NUM)){
                                    echo" <option value='$rowcate[0]'>$rowcate[1]</option>";
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
            else{
        ?>
        <div class="container font14">
            <form action="updatesec.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ຊື່ພາກສ່ວນ</label><br>
                        <input type="text" name="sec_name" class="form-control"  placeholder="ຊື່ພາກສ່ວນ">
                        <input type="hidden" name="sec_id" class="form-control" >
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ບ້ານ</label><br>
                        <input type="text" name="village" class="form-control" placeholder="ບ້ານ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        <label>ເມືອງ</label><br>
                        <input type="text" name="district" class="form-control" placeholder="ເມືອງ">
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
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
               $sec_id = $_POST['sec_id'];
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
                elseif(trim($sec_id) == ""){
                    echo"<script>";
                    echo"window.location.href='section.php?sec_id=null';";
                    echo"</script>";
                }
                else {
                        $sqlupdate = "update section set sec_name='$sec_name',village='$village',district='$district',province='$pro_id' where sec_id='$sec_id';";
                        $resultupdate = mysqli_query($link,$sqlupdate);
                        if(!$resultupdate){
                            echo"<script>";
                            echo"window.location.href='section.php?editf=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='section.php?editt=true';";
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
