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
 $user_name = $_SESSION['user_name'];
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
                    <a href="frmTrain.php">
                        <img src="../../icon/back.ico" width="30px">
                    </a>
                </div>
                <div align="center" class="tapbar fonthead">
                    ແກ້ໄຂຂໍ້ມູນຝຶກອົບຮົມ
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
            $sqlget = "select train_id,place,topic,date_start,date_end,year,amount,region,No_,quota_name,note from training where train_id='$id';";
            $resultget = mysqli_query($link,$sqlget);
            $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);

        ?>
        <div class="container font14">
            <form action="updatetrain.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ຫົວຂໍ້ອົບຮົມ</label>
                        <input type="text" name="topic" class="form-control" placeholder="ຫົວຂໍ້ອົບຮົມ" value="<?php echo $row['topic']; ?>">
                        <input type="hidden" name="train_id" value="<?php echo $row['train_id']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ສະຖານທີຈັດ</label>
                        <input type="text" name="place" class="form-control" placeholder="ສະຖານທີຈັດ" value="<?php echo $row['place']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ວັນທີເຂົ້າຝຶກອົບຮົມ</label>
                        <input type="date" name="date_start" class="form-control" value="<?php echo $row['date_start']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ວັນທີສິ້ນສຸດ</label>
                        <input type="date" name="date_end" class="form-control" value="<?php echo $row['date_end']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ສົກປີ</label>
                        <input type="text" name="year" class="form-control" placeholder="ສົກປີ" value="<?php echo $row['year']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ທຶນສະໜັບສະໜຸນ</label>
                        <input type="text" name="quota_name" class="form-control" placeholder="ທຶນສະໜັບສະໜຸນ" value="<?php echo $row['quota_name']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ມູນຄ່າທຶນ</label>
                        <input type="number" min="0" name="amount" class="form-control" placeholder="ມູນຄ່າທຶນ" value="<?php echo $row['amount']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ເລືອກພູມມິພາກ</label>
                        <select name="region" id="" class="form-control">
                            <option value="<?php echo $row['region']; ?>"><?php echo $row['region']; ?></option>
                            <option value="ພາຍໃນປະເທດ">ພາຍໃນປະເທດ</option>
                            <option value="ຕ່າງປະເທດ">ຕ່າງປະເທດ</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ເລກທີໃບອະນຸຍາດ</label>
                        <input type="text" name="No_" class="form-control" placeholder="ເລກທີໃບອະນຸຍາດ" value="<?php echo $row['No_']; ?>">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        <label>ໝາຍເຫດ</label>
                        <input type="text" name="note" class="form-control" placeholder="ໝາຍເຫດ" value="<?php echo $row['note']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button type="button" class="btn btn-outline-success" style="width: 100%;" data-toggle="modal" data-target="#myModal">
                            ແກ້ໄຂຂໍ້ມູນ
                        </button>
                        <div class="modal fade font28" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body" align="center">
                                        ທ່ານຕ້ອງການແກ້ໄຂຂໍ້ມູນຝຶກອົບຮົມ ຫຼື ບໍ່ ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                                        <button type="submit" name="btnUpdate" class="btn btn-outline-primary" onclick="">ແກ້ໄຂຂໍ້ມູນ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
            }
        ?>
       <?php
        if(isset($_POST['btnUpdate'])){
            $train_id = $_POST['train_id'];
            $place = mysqli_real_escape_string($link,$_POST['place']);
            $topic = mysqli_real_escape_string($link,$_POST['topic']);
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
            $year = mysqli_real_escape_string($link,$_POST['year']);
            $amount = $_POST['amount'];
            $region = $_POST['region'];
            $No_ = mysqli_real_escape_string($link,$_POST['No_']);
            $quota_name = mysqli_real_escape_string($link,$_POST['quota_name']);
            $note = mysqli_real_escape_string($link,$_POST['note']);
            if(trim($note) == ""){
                $note = "-";
            }
            if(trim($place) == ""){
                echo"<script>";
                echo"window.location.href='frmTrain.php?place=null';";
                echo"</script>";  
            }
            else if(trim($topic) == ""){
                echo"<script>";
                echo"window.location.href='frmTrain.php?topic=null';";
                echo"</script>";  
            }
            else if(trim($date_start) == ""){
                echo"<script>";
                echo"window.location.href='frmTrain.php?date_start=null';";
                echo"</script>";  
            }
            else if(trim($date_end) == ""){
                echo"<script>";
                echo"window.location.href='frmTrain.php?date_end=null';";
                echo"</script>";  
            }
            else if(trim($year) == ""){
                echo"<script>";
                echo"window.location.href='frmTrain.php?year=null';";
                echo"</script>";  
            }
            else if(trim($amount) == ""){
                echo"<script>";
                echo"window.location.href='frmTrain.php?amount=null';";
                echo"</script>";  
            }
            else if(trim($region) == ""){
                echo"<script>";
                echo"window.location.href='frmTrain.php?region=null';";
                echo"</script>";  
            }
            else if(trim($No_) == ""){
                echo"<script>";
                echo"window.location.href='frmTrain.php?No_=null';";
                echo"</script>";  
            }
            else if(trim($quota_name) == ""){
                echo"<script>";
                echo"window.location.href='frmTrain.php?quota_name=null';";
                echo"</script>";  
            }
                else {
                    $sqlsave = "update training set place='$place',topic='$topic',date_start='$date_start',date_end='$date_end',year='$year',amount='$amount',region='$region',No_='$No_',quota_name='$quota_name',note='$note',user_edit='$user_name' where train_id='$train_id';";
                    $resultsave = mysqli_query($link,$sqlsave);
                    if(!$resultsave){
                        echo"<script>";
                        echo"window.location.href='frmTrain.php?editf=flase';";
                        echo"</script>";  
                    }
                    else {
                        echo"<script>";
                        echo"window.location.href='frmTrain.php?editt=true.php';";
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
