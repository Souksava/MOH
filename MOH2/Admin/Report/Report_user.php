
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $search = "%".$_POST['search']."%";
    if(isset($_POST['btn'])){
        $sql = "select user_id,user_name,user_surname,gender,address,tel,email,md5(pass) as pass,status_name from username u left join status s on u.status=s.status where user_id like '$search' or user_name like '$search' or user_surname like '$search' or gender like '$search' or status_name like '$search';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="left">'.$row["user_name"].' '.$row["user_surname"].'</td>
                    <td align="left">'.$row["gender"].'</td>
                    <td align="left">'.$row["address"].'</td>
                    <td align="left">'.$row["tel"].'</td>
                    <td align="left">'.$row["email"].'</td>
                    <td align="left">'.$row["status_name"].'</td>
                </tr>
            ';
        }
        $sqlcount = "select count(gender) as count from username u left join status s on u.status=s.status where user_id like '$search' or user_name like '$search' or user_surname like '$search' or gender like '$search' or status_name like '$search';";
        $resultcount = mysqli_query($link,$sqlcount);
        $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ຈຳນວນທັງໝົດ:  </b></h3></td>
                        <td colspan="2" align="right"><h3><b>'.$rowcounts["count"].' ຄົນ</h3> </b></td>
                    </tr>    
                ';
        $sqlmale = "select count(gender) as count,gender from username u left join status s on u.status=s.status where user_id like '$search' or user_name like '$search' or user_surname like '$search' or gender like '$search' or status_name like '$search' group by gender order by gender desc;";
        $resultmale = mysqli_query($link,$sqlmale);
        while($rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC)){
        $output .='
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>'.$rowmale["gender"].'   </b></h3></td>
                        <td colspan="2" align="right"><h3><b>'.$rowmale["count"].' ຄົນ</h3> </b></td>
                    </tr>    
                ';
        }
        $sqlnation = "select count(s.status) as countnation,status_name from username u left join status s on u.status=s.status where user_id like '$search' or user_name like '$search' or user_surname like '$search' or gender like '$search' or status_name like '$search' group by s.status;";
        $resultnation = mysqli_query($link,$sqlnation);
        while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
        $output .='
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ສັນຊາດ'.$rownation["status_name"].'   </b></h3></td>
                        <td colspan="2" align="right"><h3><b>'.$rownation["countnation"].' ຄົນ</h3> </b></td>
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
                        ຂໍ້ມູນຜູ້ໃຊ້ລະບົບ
                    </b>
                </u>
            </div>
            <table align="center" width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #9CE513">
                    <th style="width: 25px;">#</th>
                    <th style="width: 240px;">ຊື່ ແລະ ນາມສະກຸນ</th>
                    <th style="width: 40px;">ເພດ</th>
                    <th style="width: 150px;">ທີ່ຢູ່ປັດຈຸບັນ</th>
                    <th style="width: 120px;">ເບີໂທລະສັບ</th>
                    <th style="width: 100px;">ທີ່ຢູ່ອີເມວ</th>
                    <th style="width: 100px;">ສະຖານະຜູ້ໃຊ້</th>
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
$mpdf->Output('ລາຍງານຜູ້ໃຊ້ລະບົບ.pdf','I');
?>