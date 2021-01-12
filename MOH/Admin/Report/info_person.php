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
        <title>ປະວັດການຝຶກອົບຮົມສ່ວນບຸກຄົນ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    </head>
    <body >
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="frmPerson.php">
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
           $id = $_GET['id'];
    ?>
    <div class="container font14">
        <div>
            <form action="Report_info_person.php" method="POST" id="form1">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button type="submit" name="btn" class="btn btn-primary">
                    <img src="../../icon/print.ico" width="28px">
                </button> 
            </form>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped" style="width: 3000px;">
                <tr>
                    <th style="width: 25px;">#</th>
                    <th style="width: 100px;">ລຫັດ</th>
                    <th style="width: 120px;">ຊື່</th>
                    <th style="width: 120px;">ນາມສະກຸນ</th>
                    <th style="width: 40px;">ເພດ</th>
                    <th style="width: 80px;">ຊົນເຜົ່າ</th>
                    <th style="width: 80px;">ສັນຊາດ</th>
                    <th style="width: 120px;">ປະເພດບຸກຄະລາກອນ</th>
                    <th style="width: 150px;">ພາກສ່ວນ</th>
                    <th style="width: 100px;">ແຂວງ</th>
                    <th style="width: 170px;">ສະຖາທີ່ຈັດ</th>
                    <th style="width: 300px;">ຫົວຂໍ້ອົບຮົມ</th>
                    <th style="width: 120px;">ວັນທີເຂົ້າອົບຮົມ</th>
                    <th style="width: 120px;">ວັນທີສິ້ນສຸດ</th>
                    <th style="width: 80px;">ຈຳນວນວັນ</th>
                    <th style="width: 80px;">ສົກປີ</th>
                    <th style="width: 140px;">ທຶນສະໜັບສະໜຸນ</th>
                    <th style="width: 100px;">ຈຳນວນເງິນ</th>
                    <th style="width: 120px;">ພູມມິພາກ</th>
                    <th style="width: 100px;">ເລກທີໃບອະນຸຍາດ</th>
                    <th style="width: 100px;">ໝາຍເຫດ</th>
                </tr>
                <?php
                    $sqlsearch = "select d.per_id,per_name,per_surname,gender,eth_name,nation_name,sec_name,place,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,type_name,year,amount,region,No_,quota_name,d.note,pro_name from tranddetail d left join training t on d.train_id=t.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id left join ethnicity e on p.eth_id=e.eth_id left join nationality n on p.nation_id=n.nation_id left join type_person r on p.type_id=r.type_id left join province v on s.province=v.pro_id where d.per_id='$id' order by year asc; ";
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
                    <td><?php echo $row['sec_name']; ?></td>
                    <td><?php echo $row['pro_name']; ?></td>
                    <td><?php echo $row['place']; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row['date_start'])); ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row['date_end'])); ?></td>
                    <td><?php echo $row['day']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['quota_name']; ?></td>
                    <td><?php echo number_format($row['amount']); ?></td>
                    <td><?php echo $row['region']; ?></td>
                    <td><?php echo $row['No_']; ?></td>
                    <td><?php echo $row['note']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
    </body>
        <script src="../../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../../js/popper.min.js" ></script>
        <script src="../../js/bootstrap.min.js"></script>
</html>
