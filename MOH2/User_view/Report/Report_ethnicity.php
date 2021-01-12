
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $search = "%".$_POST['search']."%";
    if(isset($_POST['btn'])){
        $sql = "select * from ethnicity where eth_name like '$search';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="left">'.$row["eth_name"].'</td>
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
                        ຂໍ້ມູນຊົນເຜົ່າ
                    </b>
                </u>
            </div>
            <table align="center" width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #9CE513">
                    <th style="width: 15px;">#</th>
                    <th style="width: 200px;">ຊື່ຊົນເຜົ່າ</th>
                </tr>
                '.ShowData().'
                </table><br>
            ';
$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4',
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
$mpdf->Output('ລາຍງານຊົນຜົ່ນ.pdf','I');
?>