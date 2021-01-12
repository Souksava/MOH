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
                    <a href="certificate.php">
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
            $sqlget = "select cer_id,cer_name,c2.cer_id2,cer_name2 from certificate c left join certificate2 c2 on c.cer_id2=c2.cer_id2 where cer_id='$id';";
            $resultget = mysqli_query($link,$sqlget);
            $row = mysqli_fetch_array($resultget, MYSQLI_ASSOC);

        ?>
        <div class="container font14">
            <form action="updatecer.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">                    
                        <input type="text" name="cer_name" class="form-control" value="<?php echo $row['cer_name']?>" placeholder="ວຸດທິການສຶກສາ">
                        <input type="hidden" name="cer_id" class="form-control" value="<?php echo $row['cer_id']?>" >
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">                    
                        <select name="cer_id2" id="" class="form-control">
                            <option value="<?php echo $row['cer_id2']; ?>"><?php echo $row['cer_name2']; ?></option>
                            <?php
                                $cer_id3 = $row['cer_id2'];
                                $sqlcer= "select * from certificate2 where cer_id2 != '$cer_id3';";
                                $resultcer = mysqli_query($link, $sqlcer);
                                while($rowcer = mysqli_fetch_array($resultcer, MYSQLI_NUM)){
                                    echo" <option value='$rowcer[0]'>$rowcer[1]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
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
            <form action="updatecer.php" id="update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        
                        <input type="text" name="cer_name" class="form-control"  placeholder="ວຸດທິການສຶກສາ">
                        <input type="hidden" name="cer_id" class="form-control" >
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">                    
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
                    <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        
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
                $cer_id = $_POST['cer_id'];
                $cer_name = $_POST['cer_name']; 
                $cer_id2 = $_POST['cer_id2'];
                if(trim($cer_name) == ""){
                    echo"<script>";
                    echo"window.location.href='certificate.php?cer_name=null';";
                    echo"</script>";
                }
                elseif(trim($cer_id2) == ""){
                    echo"<script>";
                    echo"window.location.href='certificate.php?cer_id2=null';";
                    echo"</script>";
                }
                elseif(trim($cer_id) == ""){
                    echo"<script>";
                    echo"window.location.href='certificate.php?cer_id=null';";
                    echo"</script>";
                }
                else {
                        $sqlupdate = "update certificate set cer_name='$cer_name',cer_id2='$cer_id2' where cer_id='$cer_id';";
                        $resultupdate = mysqli_query($link,$sqlupdate);
                        if(!$resultupdate){
                            echo"<script>";
                            echo"window.location.href='certificate.php?editf=flase';";
                            echo"</script>";
                        }
                        else {
                            echo"<script>";
                            echo"window.location.href='certificate.php?editt=true';";
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
