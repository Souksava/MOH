<?php
    session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['status'] != 3){
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
        <title>ປະວັດການຝຶກອົບຮົມສ່ວນບຸກຄົນ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    </head>
    <body >
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="frmTrain.php">
                        <img src="../../icon/back.ico" width="30px">
                    </a>
                </div>
                <div align="center" class="tapbar fonthead">
                    ປະວັດການຝຶກອົບຮົມສ່ວນບຸກຄົນ
                </div>
                <div class="tapbar" align="right">
                    <a href="../../Check/Logout.php">
                        <img src="../../icon/close.ico" width="30px">
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="clearfix"></div>
        <?php 
        if(isset($_GET['id'])){
            $id2 = $_GET['id'];
            $sqlget = "select train_id,place,note,amount,No_,amount,date_,time_,user_name,user_edit from training  t left join username u on t.user_id=u.user_id where train_id='$id2';";
            $resultget = mysqli_query($link,$sqlget);
            $rowget = mysqli_fetch_array($resultget,MYSQLI_ASSOC);
        ?>
        <div class="container font14">
            <div class="row">
                <div style="float: left;width: 50%;">
                    <label>ເລກທີໃບອະນຸຍາດ: <?php echo $rowget['No_']; ?></label><br>
                    <label>ມູນຄ່າທຶນ: <?php echo number_format($rowget['amount']); ?></label><br>
                    <label>ວັນທີບັນທຶກຂໍ້ມູນ: <?php echo $rowget['date_']; ?></label><br>
                    <label>ເວລາ: <?php echo $rowget['time_']; ?></label><br>
                </div>
                <div style="float: right;width: 48%;padding-left: 10px;" align="right">
                    <label>ເລກທີ:  <?php echo $rowget['train_id']; ?></label><br>
                    <label>ສະຖານທີຈັດ: <?php echo $rowget['place']; ?></label><br>
                    <label>ໝາຍເຫດ: <?php echo $rowget['note']; ?></label><br>
                    <label>ຜູ້ລົງບັນທຶກ: <?php echo $rowget['user_name']; ?></label><br>
                    <?php 
                        if(trim($rowget['user_edit']) == ""){
                            echo"";
                        }
                        else {
                            $user_edit = $rowget['user_edit'];
                            echo"ຜູ້ແກ້ໄຂ: $user_edit";
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php 
        }
        ?>
    <?php
        if(isset($_GET['id'])){
           $id = $_GET['id'];
           $sqlget2 = "select train_id,place,note,amount,No_,amount from training where train_id='$id';";
           $resultget2 = mysqli_query($link,$sqlget2);
           $rowget2 = mysqli_fetch_array($resultget2,MYSQLI_ASSOC);
    ?>
    <div class="container font14">
        <div>
            <form action="Report_traindetail.php" method="POST" id="form1">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="place" value="<?php echo $rowget2['place']; ?>">
                <input type="hidden" name="note" value="<?php echo $rowget2['note']; ?>">
                <input type="hidden" name="amount" value="<?php echo $rowget2['amount']; ?>">
                <input type="hidden" name="No_" value="<?php echo $rowget2['No_']; ?>">
                <button type="submit" name="btn" class="btn btn-primary">
                    <img src="../../icon/print.ico" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 2800px;">
                <tr>
                    <th style="width: 25px;">#</th>
                    <th style="width: 100px;">ລຫັດ</th>
                    <th style="width: 120px;">ຊື່</th>
                    <th style="width: 120px;">ນາມສະກຸນ</th>
                    <th style="width: 40px;">ເພດ</th>
                    <th style="width: 80px;">ຊົນເຜົ່າ</th>
                    <th style="width: 80px;">ສັນຊາດ</th>
                    <th style="width: 120px;">ປະເພດບຸກຄະລາກອນ</th>
                    <th style="width: 120px;">ວຸດທິການສຶກສາ</th>
                    <th style="width: 200px;">ພາກສ່ວນ</th>
                    <th style="width: 120px;">ແຂວງ</th>
                    <th style="width: 300px;">ຫົວຂໍ້ອົບຮົມ</th>
                    <th style="width: 90px;">ວັນທີເຂົ້າອົບຮົມ</th>
                    <th style="width: 90px;">ວັນທີສິ້ນສຸດ</th>
                    <th style="width: 80px;">ຈຳນວນວັນ</th>
                    <th style="width: 80px;">ສົກປີ</th>
                    <th style="width: 200px;">ທຶນສະໜັບສະໜຸນ</th>
                    <th style="width: 120px;">ພູມມິພາກ</th>
                    <th style="width: 80px;">ໝາຍເຫດ</th>
                    <th style="width: 100px;"></th>
                </tr>
                <?php
                    $sqlsearch = "select d.detail_id,d.per_id,per_name,per_surname,gender,eth_name,nation_name,sec_name,d.note,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,type_name,year,region,No_,quota_name,d.note,pro_name,cer_name,cer_name2 from tranddetail d left join training t on d.train_id=t.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id left join ethnicity e on p.eth_id=e.eth_id left join nationality n on p.nation_id=n.nation_id left join type_person r on p.type_id=r.type_id left join province v on s.province=v.pro_id left join certificate a on p.cer_id=a.cer_id left join certificate2 a2 on a.cer_id2=a2.cer_id2 where d.train_id='$id' order by sec_name asc; ";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    $No_ = 0;
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $No_ += 1; ?></td>
                    <td><?php echo $row['per_id']; ?></td>
                    <td><?php echo $row['per_name']; ?></td>
                    <td><?php echo $row['per_surname']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['eth_name']; ?></td>
                    <td><?php echo $row['nation_name']; ?></td>
                    <td><?php echo $row['type_name']; ?></td>
                    <td><?php echo $row['cer_name2']; echo" "; echo $row['cer_name'] ?></td>
                    <td><?php echo $row['sec_name']; ?></td>
                    <td><?php echo $row['pro_name']; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row['date_start'])); ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row['date_end'])); ?></td>
                    <td><?php echo $row['day']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['quota_name']; ?></td>
                    <td><?php echo $row['region']; ?></td>
                    <td><?php echo $row['note']; ?></td>
                    <td>
                    </td>
                </tr>
                <?php
                    }
                    $sqlfemale = "select count(d.per_id) as female from tranddetail d left join personality p on d.per_id=p.per_id where gender='ຍິງ' and d.train_id='$id' group by gender;";
                    $resultfemale = mysqli_query($link,$sqlfemale);
                    $rowfemale = mysqli_fetch_array($resultfemale, MYSQLI_ASSOC);
                    $sqlmale = "select count(d.per_id) as male from tranddetail d left join personality p on d.per_id=p.per_id where gender='ຊາຍ' and d.train_id='$id' group by gender; ";
                    $resultmale = mysqli_query($link,$sqlmale);
                    $rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC);
                    $sqlcount = "select count(per_id) as count from tranddetail where train_id='$id';";
                    $resultcount = mysqli_query($link,$sqlcount);
                    $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
                ?>
               <tr>
                    <td colspan="17" align="right">ຈຳນວນຍິງ</td>
                    <td colspan="3" align="right"><?php echo number_format($rowfemale['female']); ?> ຄົນ</td>
                </tr>
                <tr>
                    <td colspan="17" align="right">ຈຳນວນຊາຍ</td>
                    <td colspan="3" align="right"><?php echo number_format($rowmale['male']); ?> ຄົນ</td>
                </tr>
                <?php 
                    $sqleth = "select count(p.eth_id) as counteth,eth_name from tranddetail d left join personality p on d.per_id=p.per_id left join ethnicity c on p.eth_id=c.eth_id where d.train_id='$id' group by p.eth_id;";
                    $resulteth = mysqli_query($link,$sqleth);
                    while($roweth = mysqli_fetch_array($resulteth, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td colspan="17" align="right"><?php echo $roweth['eth_name']; ?></td>
                    <td colspan="3" align="right"><?php echo $roweth['counteth']; ?> ຄົນ</td>
                </tr>
                <?php 
                    }
                ?>
                <?php 
                    $sqlcer = "select count(p.cer_id) as countcer_id,cer_name,cer_name2 from tranddetail d left join personality p on d.per_id=p.per_id left join certificate a on p.cer_id=a.cer_id left join certificate2 a2 on a.cer_id2=a2.cer_id2 where d.train_id='$id' group by p.cer_id;";
                    $resultcer = mysqli_query($link,$sqlcer);
                    while($rowcer = mysqli_fetch_array($resultcer, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td colspan="17" align="right"><?php echo $rowcer['cer_name2'];echo" "; echo $rowcer['cer_name']; ?></td>
                    <td colspan="3" align="right"><?php echo $rowcer['countcer_id']; ?> ຄົນ</td>
                </tr>
                <?php 
                    }
                ?>
                <?php 
                    $sqlnation = "select count(p.nation_id) as countnation,nation_name from tranddetail d left join personality p on d.per_id=p.per_id left join nationality n on p.nation_id=n.nation_id where d.train_id='$id' group by p.nation_id;";
                    $resultnation = mysqli_query($link,$sqlnation);
                    while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td colspan="17" align="right">ສັນຊາດ<?php echo $rownation['nation_name']; ?></td>
                    <td colspan="3" align="right"><?php echo $rownation['countnation']; ?> ຄົນ</td>
                </tr>
                <?php 
                    }
                    $sqlsec = "select count(p.sec_id) as countnation,sec_name from tranddetail d left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id where d.train_id='$id' group by p.sec_id;";
                    $resultsec = mysqli_query($link,$sqlsec);
                    while($rowsec = mysqli_fetch_array($resultsec, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td colspan="17" align="right"><?php echo $rowsec['sec_name']; ?></td>
                    <td colspan="3" align="right"><?php echo $rowsec['countnation']; ?> ຄົນ</td>
                </tr>
                <?php 
                    }
                ?>
                <tr>
                    <td colspan="17" align="right">ຈຳນວນທັງໝົດ</td>
                    <td colspan="3" align="right"><?php echo $rowcounts['count']; ?> ຄົນ</td>
                </tr>
            </table>
        </div>
    </div>
    <?php
        }
        if(isset($_POST['btnDelete'])){
            $train_id = $_POST['train_id'];
            $sqldete1 = "delete from tranddetail where train_id='$train_id';";
            $resultdelete1 = mysqli_query($link,$sqldete1);
            if(!$resultdelete1){
                echo"<script>";
                echo"window.location.href='frmTrain.php?delf1=flase';";
                echo"</script>";
            }
            else {
                $sqldete2 = "delete from training where train_id='$train_id';";
                $resultdelete2 = mysqli_query($link,$sqldete2);
                if(!$resultdelete2){
                    echo"<script>";
                    echo"window.location.href='frmTrain.php?delf2=flase2';";
                    echo"</script>";
                }
                else {
                    echo"<script>";
                    echo"window.location.href='frmTrain.php?delt1=true';";
                    echo"</script>";
                }
            }
        }
        if(isset($_POST['btndeldetail'])){
            $detail_id = $_POST['detail_id'];
            $sqldel = "delete from tranddetail where detail_id='$detail_id';";
            $resultdel = mysqli_query($link,$sqldel);
            if(!$resultdel){
                echo"<script>";
                echo"window.location.href='frmTrain.php?delf3=flase3';";
                echo"</script>";
            }
            else {
                echo"<script>";
                echo"window.location.href='frmTrain.php?delt2=true2';";
                echo"</script>";
            }
        }
    ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
