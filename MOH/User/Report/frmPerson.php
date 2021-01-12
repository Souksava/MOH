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
        <title>ລາຍງານບຸກຄະລາກອນ</title>
        <link rel="icon" href="../../icon/MOH.ico">
        <link rel="stylesheet" href="../../css/style.css">
        <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    </head>
    <body >
        <div class="header">
            <div class="container">
                <div class="tapbar">
                    <a href="Report.php">
                        <img src="../../icon/back.ico" width="30px">
                    </a>
                </div>
                <div align="center" class="tapbar fonthead">
                    ບຸກຄະລາກອນ
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
            <form action="frmPerson.php" id="fomrsearch" method="POST">
                <div style="width: 100%">
                    <input type="text" class="form-control" name="search" style="float: left;width: 50%;" placeholder="ລະຫັດ, ຊື່, ນາມສະກຸນ, ເພດ, ຊົນເຜົ່າ, ປະເພດບຸກຄະລາກອນ, ສັນຊາດ">
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
            $search2 = $_POST['search'];
        ?>
        <div class="container font12">
            <div class="row">
                <div style="float: left;width: 50%;padding-right: 10px;">
                    <?php
                        $s = $_POST['search'];
                        if($s != ""){
                            echo"ຄົ້ນຫາດ້ວຍ '$s'";
                        }
                    ?>
                </div><br>
                <div style="float: right;width: 47%;padding-left: 10px;" align="right">
                    <form action="Report_person.php" method="POST" id="form1">
                        <input type="hidden" name="search" value="<?php echo $search2 ?>">
                        <button type="submit" name="btn" class="btn btn-primary">
                            <img src="../../icon/print.ico" width="28px">
                        </button> 
                    </form>
                </div>
            </div><br>
            <div class="table-responsive">
                <table class="table table-striped" style="width: 2000px;">
                    <tr>
                        <th style="width: 25px;">#</th>
                        <th style="width: 100px;">ລະຫັດບຸກຄະນາຄອນ</th>
                        <th style="width: 120px;">ຊື່ບຸກຄະນາກອນ</th>
                        <th style="width: 120px;">ນາມສະກຸນ</th>
                        <th style="width: 40px;">ເພດ</th>
                        <th style="width: 80px;">ວັນເດືອນປີເກີດ</th>
                        <th style="width: 80px;">ຊົນເຜົ່າ</th>
                        <th style="width: 80px;">ສັນຊາດ</th>
                        <th style="width: 120px;">ປະເພດບຸກຄະລາກອນ</th>
                        <th style="width: 120px;">ລະດັບການສຶກສາ</th>
                        <th style="width: 200px;">ພາກສ່ວນ</th>
                        <th style="width: 100px;">ແຂວງ</th>
                        <th style="width: 120px;">ເບີໂທລະສັບ</th>
                        <th style="width: 300px;">ທີ່ຢູ່ປັດຈຸບັນ</th>
                        <th style="width: 120px;">ທີ່ຢູ່ອີເມວ</th>
                        <th style="width: 75px;"></th>
                    </tr>
                    <?php
                        $sql = "select per_id,per_name,per_surname,gender,dob,tel,address,email,type_name,eth_name,nation_name,sec_name,pro_name,e.cer_id,cer_name,cer_name2 from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join section s on p.sec_id=s.sec_id left join province o on s.province=o.pro_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or sec_name like '$search' or pro_name like '$search' or cer_name like '$search' or cer_name2 order by p.per_name asc;";
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
                        <td>
                        <?php 
                            if($row['dob'] == "0000-00-00"){
                                echo"00/00/0000";
                            }
                            else{
                                echo date("d/m/Y",strtotime($row['dob'])); 
                            }
                        ?>
                        </td>
                        <td><?php echo $row['eth_name']; ?></td>
                        <td><?php echo $row['nation_name']; ?></td>
                        <td><?php echo $row['type_name']; ?></td>
                        <td><?php echo $row['cer_name2']; echo" "; echo $row['cer_name'] ?></td>
                        <td><?php echo $row['sec_name']; ?></td>
                        <td><?php echo $row['pro_name']; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="info_person.php?id=<?php echo $row['per_id'];?>">
                                <img src="../../icon/info.ico" alt="" width="18px;">
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                        $sqlcount = "select count(gender) as count from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2;";
                        $resultcount = mysqli_query($link,$sqlcount);
                        $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
                    ?>
                     <tr>
                        <td colspan="13" align="right">ຈຳນວນທັງໝົດ</td>
                        <td colspan="3" align="right"><?php echo $rowcounts['count']; ?> ຄົນ</td>
                    </tr>
                    <?php
                       
                        $sqlmale = "select count(gender) as count,gender from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by gender order by gender desc;";
                        $resultmale = mysqli_query($link,$sqlmale);
                        while($rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC)){
                       
                    ?>
                    <tr>
                        <td colspan="13" align="right"><?php echo $rowmale['gender']; ?></td>
                        <td colspan="3" align="right"><?php echo $rowmale['count']; ?> ຄົນ</td>
                    </tr>
                    <?php 
                        }
                        $sqlnation = "select count(p.nation_id) as countnation,nation_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by n.nation_id;";
                        $resultnation = mysqli_query($link,$sqlnation);
                        while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
                    ?>
                      <tr>
                        <td colspan="13" align="right">ສັນຊາດ<?php echo $rownation['nation_name']; ?></td>
                        <td colspan="3" align="right"><?php echo $rownation['countnation']; ?> ຄົນ</td>
                    </tr>
                    <?php 
                        }
                    ?>
                     <?php 
                        $sqleth = "select count(p.eth_id) as counteth,eth_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by p.eth_id;";
                        $resulteth = mysqli_query($link,$sqleth);
                        while($roweth = mysqli_fetch_array($resulteth, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td colspan="13" align="right"><?php echo $roweth['eth_name']; ?></td>
                        <td colspan="3" align="right"><?php echo $roweth['counteth']; ?> ຄົນ</td>
                    </tr>
                    <?php 
                        }
                    ?>
                    <?php 
                        $sqlcerr = "select count(p.cer_id) as countcer_id,cer_name,cer_name2 from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 like '$search' group by p.cer_id;";
                        $resultcerr = mysqli_query($link,$sqlcerr);
                        while($rowcerr = mysqli_fetch_array($resultcerr, MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td colspan="13" align="right"><?php echo $rowcerr['cer_name2'];echo" "; echo $rowcerr['cer_name']; ?></td>
                        <td colspan="3" align="right"><?php echo $rowcerr['countcer_id']; ?> ຄົນ</td>
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
