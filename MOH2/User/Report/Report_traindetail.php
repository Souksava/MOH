
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $id = $_POST['id'];
    if(isset($_POST['btn'])){
        $sql = "select d.detail_id,d.per_id,per_name,per_surname,gender,eth_name,nation_name,sec_name,d.note,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,type_name,year,region,No_,quota_name,d.note,pro_name,cer_name,cer_name2 from tranddetail d left join training t on d.train_id=t.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id left join ethnicity e on p.eth_id=e.eth_id left join nationality n on p.nation_id=n.nation_id left join type_person r on p.type_id=r.type_id left join province v on s.province=v.pro_id left join certificate a on p.cer_id=a.cer_id left join certificate2 a2 on a.cer_id2=a2.cer_id2 where d.train_id='$id' order by sec_name asc; ";
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
                    <td align="center">'.$row["cer_name2"].' '.$row["cer_name"].'</td>
                    <td align="center">'.$row["sec_name"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($row["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($row["date_end"])).'</td>
                    <td align="center">'.$row["day"].'</td>
                    <td align="center">'.$row["year"].'</td>
                    <td align="center">'.$row["quota_name"].'</td>
                    <td align="center">'.$row["region"].'</td>
                    <td align="center">'.$row["note"].'</td>
                </tr>
            ';
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
        $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>ຈຳນວນທັງໝົດ:  </b></h3></td>
                        <td colspan="4" align="right"><h3><b>'.number_format($rowcounts["count"]).' ຄົນ</h3> </b></td>
                    </tr>    
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>ຈຳນວນຍິງ:  </b></h3></td>
                        <td colspan="4" align="right"><h3><b>'.number_format($rowfemale["female"]).' ຄົນ</h3> </b></td>
                    </tr>    
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>ຈຳນວນຊາຍ:  </b></h3></td>
                        <td colspan="4" align="right"><h3><b>'.number_format($rowmale["male"]).' ຄົນ</h3> </b></td>
                    </tr>    
                ';
            $sqlsec = "select count(p.sec_id) as countnation,sec_name from tranddetail d left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id where d.train_id='$id' group by p.sec_id;";
            $resultsec = mysqli_query($link,$sqlsec);
            while($rowsec = mysqli_fetch_array($resultsec, MYSQLI_ASSOC)){
            $output .='
                <tr class="fontblack18">
                    <td colspan="11" align="right"><h3><b>'.$rowsec["sec_name"].'  </b></h3></td>
                    <td colspan="4" align="right"><h3><b>'.$rowsec["countnation"].' ຄົນ</h3> </b></td>
                </tr>    
                ';
        }
        $sqlnation = "select count(p.nation_id) as countnation,nation_name from tranddetail d left join personality p on d.per_id=p.per_id left join nationality n on p.nation_id=n.nation_id where d.train_id='$id' group by p.nation_id;";
        $resultnation = mysqli_query($link,$sqlnation);
            while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
                $output .='
                <tr class="fontblack18">
                    <td colspan="11" align="right"><h3><b>ສັນຊາດ'.$rownation["nation_name"].'  </b></h3></td>
                    <td colspan="4" align="right"><h3><b>'.$rownation["countnation"].' ຄົນ</h3> </b></td>
                </tr>    
                ';
            }
        $sqleth = "select count(p.eth_id) as counteth,eth_name from tranddetail d left join personality p on d.per_id=p.per_id left join ethnicity c on p.eth_id=c.eth_id where d.train_id='$id' group by p.eth_id;";
        $resulteth = mysqli_query($link,$sqleth);
        while($roweth = mysqli_fetch_array($resulteth, MYSQLI_ASSOC)){
            $output .='
                <tr class="fontblack18">
                    <td colspan="11" align="right"><h3><b>'.$roweth["eth_name"].'  </b></h3></td>
                    <td colspan="4" align="right"><h3><b>'.$roweth["counteth"].' ຄົນ</h3> </b></td>
                </tr>    
                    ';
            }
        $sqlcerr = "select count(p.cer_id) as countcer_id,cer_name,cer_name2 from tranddetail d left join personality p on d.per_id=p.per_id left join certificate a on p.cer_id=a.cer_id left join certificate2 a2 on a.cer_id2=a2.cer_id2 where d.train_id='$id' group by p.eth_id;";
        $resultcerr = mysqli_query($link,$sqlcerr);
        while($rowcerr = mysqli_fetch_array($resultcerr, MYSQLI_ASSOC)){
        $output .='
                <tr class="fontblack18">
                    <td colspan="11" align="right"><h3><b>'.$rowcerr["cer_name2"].' '. $rowcerr["cer_name"].'   </b></h3></td>
                    <td colspan="4" align="right"><h3><b>'.$rowcerr["countcer_id"].' ຄົນ</h3> </b></td>
                </tr>    
                ';
        }
        return $output;
    }
}   
$id2 = $_POST['id'];
$place = $_POST['place'];
$note = $_POST['note'];
$amount = $_POST['amount'];
$No_ = $_POST['No_'];

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
                ເລກທີ: '.$id2.'<br>
                ເລກທີໃບອະນຸຍາດ: '.$No_.'<br>
                ມູນຄ່າເງິນທຶນ: '.number_format($amount).'
            </div>
            <div align="center" style="font-size: 16px;">
                <u>
                    <b>
                        ລາຍລະອຽດຝຶກອົບຮົມ
                    </b>
                </u>
            </div>
            <div>
            <label>ສະຖານທີຈັດ: '.$place.'</label><br>
            <label>ໝາຍເຫດ: '.$note.'</label><br>
            </div>
            <table align="center" width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #9CE513">
                    <th style="width: 25px;">#</th>
                    <th style="width: 120px;">ຊື່ ແລະ ນາມສະກຸນ</th>
                    <th style="width: 40px;">ເພດ</th>
                    <th style="width: 80px;">ຊົນເຜົ່າ</th>
                    <th style="width: 80px;">ສັນຊາດ</th>
                    <th style="width: 150px;">ວຸດທິການສຶກສາ</th>
                    <th style="width: 150px;">ພາກສ່ວນ</th>
                    <th style="width: 80px;">ແຂວງ</th>
                    <th style="width: 300px;">ຫົວຂໍ້ອົບຮົມ</th>
                    <th style="width: 90px;">ວັນທີເຂົ້າອົບຮົມ</th>
                    <th style="width: 90px;">ວັນທີສິ້ນສຸດ</th>
                    <th style="width: 80px;">ຈຳນວນວັນ</th>
                    <th style="width: 80px;">ສົກປີ</th>
                    <th style="width: 140px;">ທຶນສະໜັບສະໜຸນ</th>
                    <th style="width: 120px;">ພູມມິພາກ</th>
                    <th style="width: 80px;">ໝາຍເຫດ</th>
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
$mpdf->Output('ລາຍງານລາຍລະອຽດການຝຶກອົບຮົມ.pdf','I');
?>