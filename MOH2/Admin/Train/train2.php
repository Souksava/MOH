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
    $user_id = $_SESSION['user_id'];
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $Time = date("H:i:s",$datenow);
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ບັນທຶກ</title>
    <link rel="icon" href="../../icon/MOH.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <script src="../../js/sweetalert.min.js" ></script>
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container">
            <div class="tapbar">
                <a href="train.php">
                    <img src="../../icon/back.ico" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar fonthead">
                ບັນທຶກ
            </div>
            <div class="tapbar" align="right">
                <a href="../../Check/Logout.php">
                    <img src="../../icon/close.ico" width="30px">
                </a>
            </div>
          </div>
      </div>
     <!-- head -->

      <div class="clearfix"></div><br>
      <!-- body -->
    <div class="container font14" > 
        <form action="train2.php" id="formadd" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <input type="text" name="per_id" class="form-control" autofocus  placeholder="ລະຫັດບຸກຄະນາກອນ" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];}  ?>">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <input type="text" name="note" class="form-control" placeholder="ໝາຍເຫດ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <button type="submit" class="btn btn-outline-success" name="btnAdd" style="width: 120px;" onclick="">
                        ເພີ່ມລາຍຊື່
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['btnAdd'])){
            $per_id = $_POST['per_id'];
            $note2 = mysqli_real_escape_string($link,$_POST['note']);
            if(trim($note2) == ""){
                $note2 = "-";
            }
            $sqlck = "select * from personality where per_id='$per_id';";
            $resultck = mysqli_query($link,$sqlck);
            $sqlck2 = "select * from listtranddetail where per_id='$per_id' and user_id='$user_id';";
            $resultck2 = mysqli_query($link,$sqlck2);
            if(mysqli_num_rows($resultck) == 0 ){
                echo"<script>";
                echo"window.location.href='train2.php?resultck=null';";
                echo"</script>";
            }
            elseif(mysqli_num_rows($resultck2) > 0){
                echo"<script>";
                echo"window.location.href='train2.php?resultck2=null';";
                echo"</script>";
            }
            else{
                $sql = "insert into listtranddetail(per_id,user_id,note) values('$per_id','$user_id','$note2');";
                $result = mysqli_query($link,$sql);
                echo"<script>";
                echo"window.location.href='train2.php';";
                echo"</script>";
            }
           
        }
        $sqlshowsum = "select * from listtranddetail where user_id='$user_id';";
        $resultshowsum = mysqli_query($link,$sqlshowsum);
        if(mysqli_num_rows($resultshowsum) > 0){
    ?>
    <div class="container font14">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 1700px;">
                    <tr class="warning">
                        <th colspan="14" style="text-align: center;font-size: 18px;"><b>ລາຍຊື່ຜູ້ເຂົ້າຝຶກອົບຮົມ</b></th>
                    </tr>
                    <tr>
                    <th style="width: 25px;">#</th>
                        <th style="width: 110px;">ລະຫັດບຸກຄະນາຄອນ</th>
                        <th style="width: 100px;">ຊື່ບຸກຄະນາກອນ</th>
                        <th style="width: 100px;">ນາມສະກຸນ</th>
                        <th style="width: 40px;">ເພດ</th>
                        <th style="width: 50px;">ຊົນເຜົ່າ</th>
                        <th style="width: 50px;">ສັນຊາດ</th>
                        <th style="width: 100px;">ປະເພດບຸກຄະລາກອນ</th>
                        <th style="width: 100px;">ພາກສ່ວນ</th>
                        <th style="width: 100px;">ແຂວງ</th>
                        <th style="width: 80px;">ໝາຍເຫດ</th>
                        <th style="width: 30px;"></th>
                    </tr>
                    <tr>
                    <?php
                         $sqlshow = "select d.per_id,d.detail_id,per_name,per_surname,gender,dob,tel,address,email,type_name,eth_name,nation_name,note,sec_name,pro_name from listtranddetail d left join personality p on d.per_id=p.per_id left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join section s on p.sec_id=s.sec_id left join province o on s.province=o.pro_id where user_id='$user_id' order by d.detail_id asc";
                         $resultshow = mysqli_query($link,$sqlshow);
                         $NO_ = 0;
                         while($row = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                    ?>
                        <td><?php echo $NO_ += 1; ?></td>
                        <td><?php echo $row['per_id']; ?></td>
                        <td><?php echo $row['per_name']; ?></td>
                        <td><?php echo $row['per_surname']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['eth_name']; ?></td>
                        <td><?php echo $row['nation_name']; ?></td>
                        <td><?php echo $row['type_name']; ?></td>
                        <td><?php echo $row['sec_name']; ?></td>
                        <td><?php echo $row['pro_name']; ?></td>
                        <td><?php echo $row['note']; ?></td>
                        <td>
                            <a href="deltrain.php?id=<?php echo $row['detail_id'] ?>" onclick="">
                                <img src="../../icon/delete.ico" alt="" width="20px;">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        $sqlcount = "select count(*) as count from listtranddetail where user_id='$user_id';";
                        $resultcount = mysqli_query($link,$sqlcount);
                        $rowcount = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
                        $sqlmale = "select count(*) as countmale from listtranddetail d left join personality p on d.per_id=p.per_id where user_id='$user_id' and gender='ຊາຍ';";
                        $resultmale = mysqli_query($link,$sqlmale);
                        $rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC);
                        $sqlfemale = "select count(*) as countfemale from listtranddetail d left join personality p on d.per_id=p.per_id where user_id='$user_id' and gender='ຍິງ';";
                        $resultfemale = mysqli_query($link,$sqlfemale);
                        $rowfemale = mysqli_fetch_array($resultfemale,MYSQLI_ASSOC);
                    ?>
                        <tr class="danger">
                            <th colspan="9" style="text-align: right;font-size: 26px;"><b>ຈຳນວນທັງໝົດ:</b></th>
                            <th colspan="3" style="text-align: right;font-size: 26px;"><b><?php echo $rowcount['count']; ?> ຄົນ</b>
                                <input type="hidden" name="amount" value="<?php echo $rowcount['count']; ?>">
                            </th>
                        </tr>
                        <tr class="danger">
                            <th colspan="9" style="text-align: right;font-size: 26px;"><b>ຈຳນວນຍິງ:</b></th>
                            <th colspan="3" style="text-align: right;font-size: 26px;"><b><?php echo $rowfemale['countfemale']; ?> ຄົນ</b>
                                <input type="hidden" name="amount" value="<?php echo $rowmale['countmale']; ?>">
                            </th>
                        </tr>
                        <tr class="danger">
                            <th colspan="9" style="text-align: right;font-size: 26px;"><b>ຈຳນວນຊາຍ:</b></th>
                            <th colspan="3" style="text-align: right;font-size: 26px;"><b><?php echo $rowmale['countmale']; ?> ຄົນ</b>
                                <input type="hidden" name="amount" value="<?php echo $rowfemale['countfemale']; ?>">
                            </th>
                        </tr>
                   
                </table>
            </div>
    </div>
    <?php 
        }
    ?>
    <hr width="90%" />
    <div class="container font14" > 
        <form action="train2.php" method="POST" id="formsave">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ຫົວຂໍ້ອົບຮົມ</label>
                    <!-- <input type="text" name="topic" class="form-control" maxlength="1000" placeholder="ຫົວຂໍ້ອົບຮົມ"> -->
                    <textarea name="topic" placeholder="ຫົວຂໍ້ອົບຮົມ" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ສະຖານທີຈັດ</label>
                    <!-- <input type="text" name="place" class="form-control" placeholder="ສະຖານທີຈັດ"> -->
                    <textarea name="place" placeholder="ສະຖານທີຈັດ" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ທຶນສະໜັບສະໜຸນ</label>
                    <!-- <input type="text" name="quota_name" class="form-control" placeholder="ທຶນສະໜັບສະໜຸນ"> -->
                    <textarea name="quota_name" placeholder="ທຶນສະໜັບສະໜຸນ" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ວັນທີເຂົ້າຝຶກອົບຮົມ</label>
                    <input type="date" name="date_start" class="form-control">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ວັນທີສິ້ນສຸດ</label>
                    <input type="date" name="date_end" class="form-control">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ສົກປີ</label>
                    <input type="text" name="year" class="form-control" placeholder="ສົກປີ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ມູນຄ່າທຶນ</label>
                    <input type="number" min="0" name="amount" class="form-control" placeholder="ມູນຄ່າທຶນ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ເລືອກພູມມິພາກ</label>
                    <select name="region" id="" class="form-control">
                        <option value="">ເລືອກພູມມິພາກ</option>
                        <option value="ພາຍໃນປະເທດ">ພາຍໃນປະເທດ</option>
                        <option value="ຕ່າງປະເທດ">ຕ່າງປະເທດ</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ເລກທີໃບອະນຸຍາດ</label>
                    <input type="text" name="No_" class="form-control" placeholder="ເລກທີໃບອະນຸຍາດ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ໝາຍເຫດ</label>
                    <input type="text" name="note" class="form-control" placeholder="ໝາຍເຫດ">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    <label>ເລກທີ</label>
                    <input type="number" name="train_id2" min="0" class="form-control" placeholder="ເລກທີ">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <button type="button" class="btn btn-outline-success" style="width: 100%;" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp ບັນທຶກ
                    </button>
                    <div class="modal fade font28" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body" align="center">
                                    ທ່ານຕ້ອງການບັນທຶກ ຫຼື ບໍ່ ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                                    <button type="submit" name="btnSave" class="btn btn-outline-primary" onclick="">ບັນທຶກ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['btnSave'])){
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
            $train_id2 = $_POST['train_id2'];
            if(trim($note) == ""){
                $note = "-";
            }
            if(trim($train_id2) == ""){
                if(trim($place) == ""){
                    echo"<script>";
                    echo"window.location.href='train2.php?place=null';";
                    echo"</script>";  
                }
                else if(trim($topic) == ""){
                    echo"<script>";
                    echo"window.location.href='train2.php?topic=null';";
                    echo"</script>";  
                }
                else if(trim($date_start) == ""){
                    echo"<script>";
                    echo"window.location.href='train2.php?date_start=null';";
                    echo"</script>";  
                }
                else if(trim($date_end) == ""){
                    echo"<script>";
                    echo"window.location.href='train2.php?date_end=null';";
                    echo"</script>";  
                }
                else if(trim($year) == ""){
                    echo"<script>";
                    echo"window.location.href='train2.php?year=null';";
                    echo"</script>";  
                }
                else if(trim($amount) == ""){
                    echo"<script>";
                    echo"window.location.href='train2.php?amount=null';";
                    echo"</script>";  
                }
                else if(trim($region) == ""){
                    echo"<script>";
                    echo"window.location.href='train2.php?region=null';";
                    echo"</script>";  
                }
                else if(trim($No_) == ""){
                    echo"<script>";
                    echo"window.location.href='train2.php?No_=null';";
                    echo"</script>";  
                }
                else if(trim($quota_name) == ""){
                    echo"<script>";
                    echo"window.location.href='train2.php?quota_name=null';";
                    echo"</script>";  
                }
                else {
                    $sqlget = "select max(train_id) as train_id from training;";
                    $resultget = mysqli_query($link,$sqlget);
                    $rowget = mysqli_fetch_array($resultget,MYSQLI_ASSOC);
                    $train_id = $rowget['train_id'] + 1;
                    $sqlsave = "insert into training(train_id,place,topic,date_start,date_end,year,amount,region,No_,quota_name,note,date_,time_,user_id) values('$train_id','$place','$topic','$date_start','$date_end','$year','$amount','$region','$No_','$quota_name','$note','$Date','$Time','$user_id');";
                    $resultsave = mysqli_query($link,$sqlsave);
                    if(!$resultsave){
                        echo"<script>";
                        echo"window.location.href='train2.php?savef2=flase2';";
                        echo"</script>";  
                    }
                    else {
                        $sqlsave2 = "insert into tranddetail(per_id,train_id,note) select per_id,'$train_id',note from listtranddetail where user_id='$user_id';";
                        $resultsave2 = mysqli_query($link,$sqlsave2);
                        if(!$resultsave2){
                            echo"<script>";
                            echo"window.location.href='train2.php?savef1=flase';";
                            echo"</script>";  
                        }
                        else {
                            $sqlclear = "delete from listtranddetail where user_id='$user_id';";
                            $resultclear = mysqli_query($link,$sqlclear);
                            echo"<script>";
                            echo"window.location.href='train2.php?savet=true';";
                            echo"</script>";  
                        }
                    }          
                }
            }
            else {
                $sqlck3 = "select l.per_id,per_name,l.note from listtranddetail l left join tranddetail d on l.per_id=d.per_id left join personality p on l.per_id=p.per_id where train_id='$train_id2';";
                $resultck3 = mysqli_query($link,$sqlck3);
                $rowck = mysqli_fetch_array($resultck3, MYSQLI_ASSOC);
                $per_id2 = $rowck['per_id'];
                $per_name = $rowck['per_name'];
                if(mysqli_num_rows($resultck3) > 0){
                    echo"<script>";
                    echo"alert('ບໍ່ສາມາດເພີ່ມບຸກຄະລາກອນລົງໃສ່ຂໍ້ມູນການຝຶກອົບຮົມເກົ່າໄດ້ ເນື່ອງຈາກຜູ້ຝຶກອົບຮົມລະຫັດ $per_id2 ຊື່ $per_name ນີ້ມີຢູ່ໃນຂໍ້ມູນຝຶກອົບຮົມເລກທີ $train_id2 ນີ້ແລ້ວ');";
                    echo"window.location.href='train2.php';";
                    echo"</script>"; 
                }
                else {
                    $sqlupdate = "insert into tranddetail(per_id,train_id,note) select per_id,'$train_id2',note from listtranddetail where user_id='$user_id';";
                    $resultupdate = mysqli_query($link,$sqlupdate);
                    if(!$resultupdate){
                        echo"<script>";
                        echo"window.location.href='train2.php?addf2=flase2';";
                        echo"</script>";  
                    }
                    else {
                        $sqlclear = "delete from listtranddetail where user_id='$user_id';";
                        $resultclear = mysqli_query($link,$sqlclear);
                        echo"<script>";
                        echo"window.location.href='train2.php?addt=true';";
                        echo"</script>";  
                    }
                }
            }
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
            swal("", "ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ !!", "error");
            </script>';
            }
            if(isset($_GET['addf2'])=='flase2'){
                echo'<script type="text/javascript">
                swal("", "ບໍ່ສາມາດເພີ່ມບຸກຄະລາກອນລົງໃສ່ຂໍ້ມູນການຝຶກອົບຮົມເກົ່າໄດ້ !!", "error");
                </script>';
            }
            if(isset($_GET['addt'])=='true'){
                echo'<script type="text/javascript">
                    swal("", "ເພີ່ມຂໍ້ມູນຜູ້ຝຶກອົບຮົມລົງໃສ່ການຝຶກອົບຮົມເກົ່າສຳເລັດ !!", "success");
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
            if(isset($_GET['place'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາເລືອກສະຖາທີຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['topic'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາໃສ່ຫົວຂໍ້ຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['date_start'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາເລືອກວັນຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['date_end'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາເລືອກວັນທີສິນສຸດການຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['year'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາປ້ອນສົກປີ", "info");
                    </script>';
            }
            if(isset($_GET['amount'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາປ້ອນມູນຄ່າທຶນຝຶກອົບຮົມ", "info");
                    </script>';
            }
            if(isset($_GET['region'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາເລືອກພູມມິພາກ", "info");
                    </script>';
            }
            if(isset($_GET['No_'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາປ້ອນເລກທີໃບອະນຸຍາດ", "info");
                    </script>';
            }
            if(isset($_GET['quota_name'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ກະລຸນາໃສ່ທຶນສະໜັບສະໜຸນ", "info");
                    </script>';
            }
            if(isset($_GET['resultck'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ລະຫັດບຸກຄະລາກອນນີ້ບໍ່ມີໃນລະບົບ", "info");
                    </script>';
            }
            if(isset($_GET['resultck2'])=='null'){
                echo'<script type="text/javascript">
                    swal("", "ບຸກຄະລາກອນທ່ານນີ້ໄດ້ເພີ່ມລົງລາຍການແລ້ວ ກະລຸນາໃສ່ບຸກຄະລາກອນທ່ານອື່ນ", "info");
                    </script>';
            }
        
    ?>
      <!-- body -->
  </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
