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
        <title>ບັນທຶກ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    </head>
    <body >
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="../main.php">
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
        <br>
        <div class="clearfix"></div>
        <div class="container font14">
            <form action="train.php" id="fomrsearch" method="POST">
                <div style="width: 100%">
                    <input type="text" class="form-control" name="search" style="float: left;width: 50%;" placeholder="ລະຫັດ, ຊື່, ນາມສະກຸນ, ເພດ, ຊົນເຜົ່າ, ປະເພດບຸກຄະລາກອນ, ສັນຊາດ, ພາກສ່ວນ, ແຂວງ">
                    <button class="btn btn-outline-primary" name="btnSearch" type="submit" style="float:left;margin-left: 10px">
                        ຄົ້ນຫາ
                    </button>
                </div>
            </form>
        </div>
        <div class="clearfix"></div><br>
        <?php
            if(isset($_POST['btnSearch'])){
            $search = "%".$_POST['search']."%";
        ?>
        <div class="container font12">
            <div>
                <?php
                    $s = $_POST['search'];
                    if($s != ""){
                        echo"ຄົ້ນຫາດ້ວຍ '$s'";
                    }
                ?>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" style="width: 1300px;">
                    <tr>
                        <th style="width: 25px;">#</th>
                        <th style="width: 100px;">ລະຫັດບຸກຄະນາຄອນ</th>
                        <th style="width: 120px;">ຊື່ບຸກຄະນາກອນ</th>
                        <th style="width: 120px;">ນາມສະກຸນ</th>
                        <th style="width: 40px;">ເພດ</th>
                        <th style="width: 80px;">ວັນເດືອນປີເກີດ</th>
                        <th style="width: 80px;">ຊົນເຜົ່າ</th>
                        <th style="width: 80px;">ສັນຊາດ</th>
                        <th style="width: 100px;">ປະເພດບຸກຄະລາກອນ</th>
                        <th style="width: 100px;">ພາກສ່ວນ</th>
                        <th style="width: 100px;">ແຂວງ</th>
                        <th style="width: 75px;"></th>
                    </tr>
                    <?php
                        $sql = "select per_id,per_name,per_surname,gender,dob,tel,address,email,type_name,eth_name,nation_name,sec_name,pro_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join section s on p.sec_id=s.sec_id left join province o on s.province=o.pro_id where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or sec_name like '$search' or pro_name like '$search' order by per_name asc;";
                        $result = mysqli_query($link,$sql);
                        $NO_ = 0;
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $NO_ += 1; ?></td>
                        <td><?php echo $row['per_id']; ?></td>
                        <td><?php echo $row['per_name']; ?></td>
                        <td><?php echo $row['per_surname']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['eth_name']; ?></td>
                        <td><?php echo $row['nation_name']; ?></td>
                        <td><?php echo $row['type_name']; ?></td>
                        <td><?php echo $row['sec_name']; ?></td>
                        <td><?php echo $row['pro_name']; ?></td>
                        <td>
                            <a href="train2.php?id=<?php echo $row['per_id'];?>" class="btn btn-outline-success">
                                ລົງບັນທຶກ
                            </a>
                        </td>
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
