
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $sec_name = $_POST['sec_name'];
    $pro_id = $_POST['pro_id'];
    if(isset($_POST['btn'])){
        $sql = "select sec_name,village,district,pro_name from section s left join province p on s.province=p.pro_id where sec_name like '$sec_name' or province = '$pro_id';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["sec_name"].'</td>
                    <td align="center">'.$row["village"].'</td>
                    <td align="center">'.$row["district"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                </tr>
            
            ';
        }
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select sec_name,village,district,pro_name from section s left join province p on s.province=p.pro_id;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["sec_name"].'</td>
                    <td align="center">'.$row["village"].'</td>
                    <td align="center">'.$row["district"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
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
                        ຂໍ້ມູນພາກສ່ວນ
                    </b>
                </u>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #9CE513">
                    <th style="width: 25px;">#</th>
                    <th style="width: 150px;">ຊື່ພາກສ່ວນ</th>
                    <th style="width: 100px;">ບ້ານ</th>
                    <th style="width: 100px;">ເມືອງ</th>
                    <th style="width: 100px;">ແຂວງ</th>
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
$mpdf->Output('ລາຍງານຂໍ້ມູນພາກສ່ວນ.pdf','I');
?>