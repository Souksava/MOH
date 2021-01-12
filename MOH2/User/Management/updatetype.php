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
                    <a href="type_person.php">
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
            $sqlget = "select * from type_person where type_id='$id';";
            $resultget = mysqli_query($link,$sqlget);
            $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);

        ?>
        <div class="container font14">
            <form action="updatetype.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        
                        <input type="text" name="type_name" class="form-control" value="<?php echo $row['type_name']?>" placeholder="ຊື່ປະເພດບຸກຄະລາກອນ">
                        <input type="hidden" name="type_id" class="form-control" value="<?php echo $row['type_id']?>" >
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        
                        <button type="submit" class="btn btn-outline-success" name="btnUpdate" style="width: 120px;" onclick="">
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
            <form action="updatetype.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
                        <input type="text" name="type_name" class="form-control"  placeholder="ຊື່ປະເພດບຸກຄະລາກອນ">
                        <input type="hidden" name="type_id" class="form-control" >
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
                        
                        <button type="submit" class="btn btn-outline-success" name="btnUpdate" style="width: 120px;" onclick="">
                           ແກ້ໄຂຂໍ້ມູນ
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php
            }
            if(isset($_POST['btnUpdate'])){
                $type_id = $_POST['type_id'];
                $type_name = $_POST['type_name']; 
                if(trim($type_name) == ""){
                    echo"<script>";
                    echo"window.location.href='type_person.php?type_name=null';";
                    echo"</script>";
                }
                elseif(trim($type_id) == ""){
                    echo"<script>";
                    echo"window.location.href='type_person.php?type_id=null';";
                    echo"</script>";
                }
                else {
                        $sqlupdate = "update type_person set type_name='$type_name' where type_id='$type_id';";
                        $resultupdate = mysqli_query($link,$sqlupdate);
                        if(!$resultupdate){
                            echo"<script>";
                            echo"window.location.href='type_person.php?editf=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='type_person.php?editt=true';";
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
