
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $id = $_POST['id'];
    if(isset($_POST['btn'])){
        $sql = "select d.per_id,per_name,per_surname,gender,eth_name,nation_name,sec_name,place,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,type_name,year,amount,region,No_,quota_name,d.note,pro_name from tranddetail d left join training t on d.train_id=t.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id left join ethnicity e on p.eth_id=e.eth_id left join nationality n on p.nation_id=n.nation_id left join type_person r on p.type_id=r.type_id left join province v on s.province=v.pro_id where d.per_id='$id' order by year asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["per_name"].' '.$row["per_surname"].'</td>
                    <td align="center">'.$row["gender"].'</td>
                    <td align="center">'.$row["eth_name"].'</td>
                    <td align="center">'.$row["nation_name"].'</td>
                    <td align="center">'.$row["sec_name"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($row["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($row["date_end"])).'</td>
                    <td align="center">'.$row["day"].'</td>
                    <td align="center">'.$row["year"].'</td>
                    <td align="center">'.$row["quota_name"].'</td>
                    <td align="center">'.number_format($row["amount"]).'</td>
                    <td align="center">'.$row["region"].'</td>
                    <td align="center">'.$row["No_"].'</td>
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
                        ປະວັດການຝຶກອົບຮົມສ່ວນບຸກຄົນ
                    </b>
                </u>
            </div>
            <table align="center" width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #9CE513">
                    <th style="width: 25px;">#</th>
                    <th style="width: 150px;">ຊື່ ແລະ ນາມສະກຸນ</th>
                    <th style="width: 40px;">ເພດ</th>
                    <th style="width: 60px;">ຊົນເຜົ່າ</th>
                    <th style="width: 60px;">ສັນຊາດ</th>
                    <th style="width: 150px;">ພາກສ່ວນ</th>
                    <th style="width: 100px;">ແຂວງ</th>
                    <th style="width: 300px;">ຫົວຂໍ້ອົບຮົມ</th>
                    <th style="width: 80px;">ວັນທີເຂົ້າອົບຮົມ</th>
                    <th style="width: 80px;">ວັນທີສິນສຸດອົດຮົມ</th>
                    <th style="width: 60px;">ຈຳນວນວັນ</th>
                    <th style="width: 80px;">ສົກປີ</th>
                    <th style="width: 140px;">ທຶນສະໜັບສະໜຸນ</th>
                    <th style="width: 100px;">ຈຳນວນເງິນ</th>
                    <th style="width: 120px;">ພູມມິພາກ</th>
                    <th style="width: 100px;">ເລກທີໃບອະນຸຍາດ</th>
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
$mpdf->Output('ລາຍງານປະວັດການຝຶກອົບຮົມສ່ວນບຸກຄົນ.pdf','I');
?>