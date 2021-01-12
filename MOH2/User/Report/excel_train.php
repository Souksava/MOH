<?php 
 require '../../ConnectDB/connectDB.php';
 date_default_timezone_set("Asia/Bangkok");
 $datenow = time();
 $Date = date("Y-m-d",$datenow);
    if(isset($_POST['btnExcel_All'])){
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="14" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="14" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan="3" align="left">ກະຊວງສາທາລະນະສຸກ</td>    
                </tr>
                <tr>  
                    <td colspan="3" align="left">ກົມການສຶກສາສາທາລະນະສຸກ</td>
                </tr>
                <tr>
                    <td colspan="3" align="left">ພະແນກຄຸ້ມຄອງການອົບຮົມບຸກຄະລາກອນສາທາລະນະສຸກ</td>    

                </tr>

                <tr>

                </tr>
                <tr>
                    <td colspan="14" align="center"><h2>ລາຍງານການຝຶກອົບຮົມ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
            <tr>
                <th style="width: 25px;">#</th>
                <th style="width: 150px;">ພາກສ່ວນ</th>
                <th style="width: 60px;">ຈຳນວນ</th>
                <th style="width: 100px;">ສະຖານທີຈັດ</th>
                <th style="width: 150px;">ຫົວຂໍ້ອົບຮົມ</th>
                <th style="width: 80px;">ວັນທີອົບຮົມ</th>
                <th style="width: 80px;">ວັນທີສິ້ນສຸດ</th>
                <th style="width: 60px;">ຈຳນວນວັນ</th>
                <th style="width: 60px;">ສົກປີ</th>
                <th style="width: 100px;">ທຶນສະໜັບສະໜຸນ</th>
                <th style="width: 100px;">ມູນຄ່າທຶນ</th>
                <th style="width: 60px;">ພູມມິພາກ</th>
                <th style="width: 80px;">ເລກທີໃບອະນຸຍາດ</th>
                <th style="width: 100px;">ໝາຍເຫດ</th>
            </tr>      
        ';
            $sqlexcel = "select t.train_id,sec_name,count(d.per_id) as qty,place,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,year,quota_name,amount,region,No_,t.note from training t left join tranddetail d on t.train_id=d.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id group by p.sec_id;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center">'.$No1_.'</td>
                    <td align="center">'.$rowexcel["sec_name"].'</td>
                    <td align="center">'.$rowexcel["qty"].'</td>
                    <td align="center">'.$rowexcel["place"].'</td>
                    <td align="center">'.$rowexcel["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_end"])).'</td>
                    <td align="center">'.$rowexcel["day"].'</td>
                    <td align="center">'.$rowexcel["year"].'</td>
                    <td align="center">'.$rowexcel["quota_name"].'</td>
                    <td align="center">'.number_format($rowexcel["amount"]).'</td>
                    <td align="center">'.$rowexcel["region"].'</td>
                    <td align="center">'.$rowexcel["No_"].'</td>
                    <td align="center">'.$rowexcel["note"].'</td>
                </tr>
            ';
            }
            $output .= '
        </table>
        ';
        
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=trainning.xls");
        echo $output;
    }
    if(isset($_POST['btnWord_All'])){
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="14" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="14" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan="3" align="left">ກະຊວງສາທາລະນະສຸກ</td>    
                </tr>
                <tr>  
                    <td colspan="3" align="left">ກົມການສຶກສາສາທາລະນະສຸກ</td>
                </tr>
                <tr>
                    <td colspan="3" align="left">ພະແນກຄຸ້ມຄອງການອົບຮົມບຸກຄະລາກອນສາທາລະນະສຸກ</td>    

                </tr>

                <tr>

                </tr>
                <tr>
                    <td colspan="14" align="center"><h2>ລາຍງານການຝຶກອົບຮົມ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
            <tr>
                <th style="width: 25px;">#</th>
                <th style="width: 150px;">ພາກສ່ວນ</th>
                <th style="width: 60px;">ຈຳນວນ</th>
                <th style="width: 100px;">ສະຖານທີຈັດ</th>
                <th style="width: 150px;">ຫົວຂໍ້ອົບຮົມ</th>
                <th style="width: 80px;">ວັນທີອົບຮົມ</th>
                <th style="width: 80px;">ວັນທີສິ້ນສຸດ</th>
                <th style="width: 60px;">ຈຳນວນວັນ</th>
                <th style="width: 60px;">ສົກປີ</th>
                <th style="width: 100px;">ທຶນສະໜັບສະໜຸນ</th>
                <th style="width: 100px;">ມູນຄ່າທຶນ</th>
                <th style="width: 60px;">ພູມມິພາກ</th>
                <th style="width: 80px;">ເລກທີໃບອະນຸຍາດ</th>
                <th style="width: 100px;">ໝາຍເຫດ</th>
            </tr>      
        ';
            $sqlexcel = "select t.train_id,sec_name,count(d.per_id) as qty,place,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,year,quota_name,amount,region,No_,t.note from training t left join tranddetail d on t.train_id=d.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id group by p.sec_id;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center">'.$No1_.'</td>
                    <td align="center">'.$rowexcel["sec_name"].'</td>
                    <td align="center">'.$rowexcel["qty"].'</td>
                    <td align="center">'.$rowexcel["place"].'</td>
                    <td align="center">'.$rowexcel["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_end"])).'</td>
                    <td align="center">'.$rowexcel["day"].'</td>
                    <td align="center">'.$rowexcel["year"].'</td>
                    <td align="center">'.$rowexcel["quota_name"].'</td>
                    <td align="center">'.number_format($rowexcel["amount"]).'</td>
                    <td align="center">'.$rowexcel["region"].'</td>
                    <td align="center">'.$rowexcel["No_"].'</td>
                    <td align="center">'.$rowexcel["note"].'</td>
                </tr>
            ';
            }
            $output .= '
        </table>
        ';
        header("Content-Type: application/vnd.msword");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Disposition:  attachment; filename=trainning.doc");
        echo $output;
    }
    if(isset($_POST['btnExcel'])){
        $search = $_POST['search'];
        $sec_id = $_POST['sec_id'];
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="14" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="14" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan="3" align="left">ກະຊວງສາທາລະນະສຸກ</td>    
                </tr>
                <tr>  
                    <td colspan="3" align="left">ກົມການສຶກສາສາທາລະນະສຸກ</td>
                </tr>
                <tr>
                    <td colspan="3" align="left">ພະແນກຄຸ້ມຄອງການອົບຮົມບຸກຄະລາກອນສາທາລະນະສຸກ</td>    

                </tr>

                <tr>

                </tr>
                <tr>
                    <td colspan="14" align="center"><h2>ລາຍງານການຝຶກອົບຮົມ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
            <tr>
                <th style="width: 25px;">#</th>
                <th style="width: 150px;">ພາກສ່ວນ</th>
                <th style="width: 60px;">ຈຳນວນ</th>
                <th style="width: 100px;">ສະຖານທີຈັດ</th>
                <th style="width: 150px;">ຫົວຂໍ້ອົບຮົມ</th>
                <th style="width: 80px;">ວັນທີອົບຮົມ</th>
                <th style="width: 80px;">ວັນທີສິ້ນສຸດ</th>
                <th style="width: 60px;">ຈຳນວນວັນ</th>
                <th style="width: 60px;">ສົກປີ</th>
                <th style="width: 100px;">ທຶນສະໜັບສະໜຸນ</th>
                <th style="width: 100px;">ມູນຄ່າທຶນ</th>
                <th style="width: 60px;">ພູມມິພາກ</th>
                <th style="width: 80px;">ເລກທີໃບອະນຸຍາດ</th>
                <th style="width: 100px;">ໝາຍເຫດ</th>
            </tr>      
        ';
            $sqlexcel = "select t.train_id,sec_name,count(d.per_id) as qty,place,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,year,quota_name,amount,region,No_,t.note from training t left join tranddetail d on t.train_id=d.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id where No_ = '$search' or year = '$search' or quota_name = '$search' or topic = '$search' or date_start between '$date1' and '$date2' or date_end between '$date1' and '$date2' or s.sec_id = '$sec_id' group by p.sec_id order by s.sec_id asc;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center">'.$No1_.'</td>
                    <td align="center">'.$rowexcel["sec_name"].'</td>
                    <td align="center">'.$rowexcel["qty"].'</td>
                    <td align="center">'.$rowexcel["place"].'</td>
                    <td align="center">'.$rowexcel["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_end"])).'</td>
                    <td align="center">'.$rowexcel["day"].'</td>
                    <td align="center">'.$rowexcel["year"].'</td>
                    <td align="center">'.$rowexcel["quota_name"].'</td>
                    <td align="center">'.number_format($rowexcel["amount"]).'</td>
                    <td align="center">'.$rowexcel["region"].'</td>
                    <td align="center">'.$rowexcel["No_"].'</td>
                    <td align="center">'.$rowexcel["note"].'</td>
                </tr>
            ';
            }
            $output .= '
        </table>
        ';
        
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=trainning.xls");
        echo $output;
    }
    if(isset($_POST['btnWord'])){
        $search = $_POST['search'];
        $sec_id = $_POST['sec_id'];
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="14" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="14" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan="3" align="left">ກະຊວງສາທາລະນະສຸກ</td>    
                </tr>
                <tr>  
                    <td colspan="3" align="left">ກົມການສຶກສາສາທາລະນະສຸກ</td>
                </tr>
                <tr>
                    <td colspan="3" align="left">ພະແນກຄຸ້ມຄອງການອົບຮົມບຸກຄະລາກອນສາທາລະນະສຸກ</td>    

                </tr>

                <tr>

                </tr>
                <tr>
                    <td colspan="14" align="center"><h2>ລາຍງານການຝຶກອົບຮົມ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
            <tr>
                <th style="width: 25px;">#</th>
                <th style="width: 150px;">ພາກສ່ວນ</th>
                <th style="width: 60px;">ຈຳນວນ</th>
                <th style="width: 100px;">ສະຖານທີຈັດ</th>
                <th style="width: 150px;">ຫົວຂໍ້ອົບຮົມ</th>
                <th style="width: 80px;">ວັນທີອົບຮົມ</th>
                <th style="width: 80px;">ວັນທີສິ້ນສຸດ</th>
                <th style="width: 60px;">ຈຳນວນວັນ</th>
                <th style="width: 60px;">ສົກປີ</th>
                <th style="width: 100px;">ທຶນສະໜັບສະໜຸນ</th>
                <th style="width: 100px;">ມູນຄ່າທຶນ</th>
                <th style="width: 60px;">ພູມມິພາກ</th>
                <th style="width: 80px;">ເລກທີໃບອະນຸຍາດ</th>
                <th style="width: 100px;">ໝາຍເຫດ</th>
            </tr>      
        ';
            $sqlexcel = "select t.train_id,sec_name,count(d.per_id) as qty,place,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,year,quota_name,amount,region,No_,t.note from training t left join tranddetail d on t.train_id=d.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id where No_ = '$search' or year = '$search' or quota_name = '$search' or topic = '$search' or date_start between '$date1' and '$date2' or date_end between '$date1' and '$date2' or s.sec_id = '$sec_id' group by p.sec_id order by s.sec_id asc;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center">'.$No1_.'</td>
                    <td align="center">'.$rowexcel["sec_name"].'</td>
                    <td align="center">'.$rowexcel["qty"].'</td>
                    <td align="center">'.$rowexcel["place"].'</td>
                    <td align="center">'.$rowexcel["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_end"])).'</td>
                    <td align="center">'.$rowexcel["day"].'</td>
                    <td align="center">'.$rowexcel["year"].'</td>
                    <td align="center">'.$rowexcel["quota_name"].'</td>
                    <td align="center">'.number_format($rowexcel["amount"]).'</td>
                    <td align="center">'.$rowexcel["region"].'</td>
                    <td align="center">'.$rowexcel["No_"].'</td>
                    <td align="center">'.$rowexcel["note"].'</td>
                </tr>
            ';
            }
            $output .= '
        </table>
        ';
        header("Content-Type: application/vnd.msword");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Disposition:  attachment; filename=trainning.doc");
        echo $output;
    }
?>