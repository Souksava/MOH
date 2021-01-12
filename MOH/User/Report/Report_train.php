
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $search = $_POST['search'];
    $sec_id = $_POST['sec_id'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    if(isset($_POST['btn'])){
        $sql = "select t.train_id,sec_name,count(d.per_id) as qty,place,topic,date_start,date_end,datediff(date_end,date_start) + 1 as day,year,quota_name,amount,region,No_,t.note from training t left join tranddetail d on t.train_id=d.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id where No_ = '$search' or year = '$search' or quota_name = '$search' or topic = '$search' or date_start between '$date1' and '$date2' or date_end between '$date1' and '$date2' or s.sec_id = '$sec_id' group by p.sec_id order by s.sec_id asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["sec_name"].'</td>
                    <td align="center">'.$row["qty"].'</td>
                    <td align="center">'.$row["place"].'</td>
                    <td align="center">'.$row["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($row["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($row["date_end"])).'</td>
                    <td align="center">'.$row["day"].'</td>
                    <td align="center">'.$row["year"].'</td>
                    <td align="center">'.$row["quota_name"].'</td>
                    <td align="center">'.number_format($row["amount"],2).'</td>
                    <td align="center">'.$row["region"].'</td>
                    <td align="center">'.$row["No_"].'</td>
                    <td align="center">'.$row["note"].'</td>
                </tr>
            
            ';
        }
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select t.train_id,sec_name,count(d.per_id) as qty,place,topic,date_start,date_end,datediff(date_end,date_start) + 1 as day,year,quota_name,amount,region,No_,t.note from training t left join tranddetail d on t.train_id=d.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id  group by p.sec_id order by s.sec_id asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["sec_name"].'</td>
                    <td align="center">'.$row["qty"].'</td>
                    <td align="center">'.$row["place"].'</td>
                    <td align="center">'.$row["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($row["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($row["date_end"])).'</td>
                    <td align="center">'.$row["day"].'</td>
                    <td align="center">'.$row["year"].'</td>
                    <td align="center">'.$row["quota_name"].'</td>
                    <td align="center">'.number_format($row["amount"]).'</td>
                    <td align="center">'.$row["region"].'</td>
                    <td align="center">'.$row["No_"].'</td>
                    <td align="center">'.$row["note"].'</td>
                </tr>
            
            ';
          
        }
        return $output;
    }
}   
$content = '
            <div align="center" style="font-size: 10px;">
                ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ<br>
                ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ<br>
                =========oooo=========
            </div>
            <div align="left" style="z-index: 1;position: absolute;margin-top: -50px;">
                <img src="../../icon/MOH.jpg" width="100px">
            </div>
            <div style="float: left; width: 75%;">
                <p>
                    <p style="font-size: 10px;">
                        ກະຊວງສາທາລະນະສຸກ<br>
                        ກົມການສຶກສາ ແລະ ວິທະຍາສາດ<br>
                        ພະແນກຄຸ້ມຄອງການອົບຮົມ
                    </p>
                </P>
            </div>
            <div style="float: left;text-align: right;">
                <br><br><br>

            </div>
            <div align="center" style="font-size: 16px;">
                <u>
                    <b>
                        ຂໍ້ມູນການຝຶກອົບຮົມ
                    </b>
                </u>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #9CE513">
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
                '.ShowData().'
                </table><br>
            ';
$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4-L',
    'mode'              => 'utf-8',      
    'tempDir'           => '/tmp',
    'default_font_size' => 8,
    'margin_bottom' => 18, 
    'margin_footer' => 5, 
	'default_font' => 'saysettha_ot'
]);
$mpdf->defaultfooterline = 0;
$footer = '<p align="center" style="font-size: 8px;">ໜ້າທີ່ {PAGENO} ຂອງ {nb}<br> </p>';
$mpdf->SetFooter($footer);

$mpdf->WriteHTML($content);
$mpdf->Output('ລາຍງານການຝຶກອົບຮົມ.pdf','I');
?>