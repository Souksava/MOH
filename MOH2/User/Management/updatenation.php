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
                    <a href="nationality.php">
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
            $sqlget = "select * from nationality where nation_id='$id';";
            $resultget = mysqli_query($link,$sqlget);
            $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);

        ?>
        <div class="container font14">
            <form action="updatenation.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        
                        <input type="text" name="nation_name" class="form-control" value="<?php echo $row['nation_name']?>" placeholder="ຊື່ສັນຊາດ">
                        <input type="hidden" name="nation_id" class="form-control" value="<?php echo $row['nation_id']?>" >
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        
                        <button type="submit" class="btn btn-outline-success" name="btnUpdate" style="width: 120px;">
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
            <form action="updatenation.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        
                        <input type="text" name="nation_name" class="form-control"  placeholder="ຊື່ສັນຊາດ">
                        <input type="hidden" name="nation_id" class="form-control" >
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        
                        <button type="submit" class="btn btn-outline-success" name="btnUpdate" style="width: 120px;">
                           ແກ້ໄຂຂໍ້ມູນ
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php
            }
            if(isset($_POST['btnUpdate'])){
                $nation_id = $_POST['nation_id'];
                $nation_name = $_POST['nation_name']; 
                if(trim($nation_name) == ""){
                    echo"<script>";
                    echo"window.location.href='nationality.php?nation_name=null';";
                    echo"</script>";
                }
                elseif(trim($nation_id) == ""){
                    echo"<script>";
                    echo"window.location.href='nationality.php?nation_id=null';";
                    echo"</script>";
                }
                else {
                        $sqlupdate = "update nationality set nation_name='$nation_name' where nation_id='$nation_id';";
                        $resultupdate = mysqli_query($link,$sqlupdate);
                        if(!$resultupdate){
                            echo"<script>";
                            echo"window.location.href='nationality.php?editf=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='nationality.php?editt=true';";
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
