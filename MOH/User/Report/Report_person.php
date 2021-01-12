
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $search = "%".$_POST['search']."%";
    if(isset($_POST['btn'])){
        $sql = "select per_id,per_name,per_surname,gender,dob,tel,address,email,type_name,eth_name,nation_name,sec_name,pro_name,e.cer_id,cer_name,cer_name2 from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join section s on p.sec_id=s.sec_id left join province o on s.province=o.pro_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or sec_name like '$search' or pro_name like '$search' or cer_name like '$search' or cer_name2 order by p.per_name asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            if($row["dob"] == "0000-00-00"){
               $rows = "00/00/0000";
            }
            else{
               $rows = date("d/m/Y",strtotime($row["dob"]));
            }
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="left">'.$row["per_id"].'</td>
                    <td align="left">'.$row["per_name"].' '.$row["per_surname"].'</td>
                    <td align="left">'.$row["gender"].'</td>
                    <td align="left">'.$rows.'</td>
                    <td align="left">'.$row["eth_name"].'</td>
                    <td align="left">'.$row["nation_name"].'</td>
                    <td align="left">'.$row["type_name"].'</td>
                    <td align="left">'.$row["cer_name2"].' '.$row["cer_name"].'</td>
                    <td align="left">'.$row["sec_name"].'</td>
                    <td align="left">'.$row["pro_name"].'</td>
                    <td align="left">'.$row["address"].'</td>
                    <td align="left">'.$row["email"].'</td>
                </tr>
            ';
        }
        $sqlcount = "select count(gender) as count from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2  where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2;";
        $resultcount = mysqli_query($link,$sqlcount);
        $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>ຈຳນວນທັງໝົດ:  </b></h3></td>
                        <td colspan="2" align="right"><h3><b>'.$rowcounts["count"].' ຄົນ</h3> </b></td>
                    </tr>    
                ';
        $sqlmale = "select count(gender) as count,gender from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by gender order by gender desc;";
        $resultmale = mysqli_query($link,$sqlmale);
        while($rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC)){
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>'.$rowmale["gender"].'   </b></h3></td>
                        <td colspan="2" align="right"><h3><b>'.$rowmale["count"].' ຄົນ</h3> </b></td>
                    </tr>    
                ';
        }
        $sqlnation = "select count(p.nation_id) as countnation,nation_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by n.nation_id;";
        $resultnation = mysqli_query($link,$sqlnation);
        while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>ສັນຊາດ'.$rownation["nation_name"].'   </b></h3></td>
                        <td colspan="2" align="right"><h3><b>'.$rownation["countnation"].' ຄົນ</h3> </b></td>
                    </tr>    
                ';
        }
        $sqleth = "select count(p.eth_id) as counteth,eth_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by p.eth_id;";
        $resulteth = mysqli_query($link,$sqleth);
        while($roweth = mysqli_fetch_array($resulteth, MYSQLI_ASSOC)){
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>'.$roweth["eth_name"].'   </b></h3></td>
                        <td colspan="2" align="right"><h3><b>'.$roweth["counteth"].' ຄົນ</h3> </b></td>
                    </tr>    
                ';
        }
        $sqlcerr = "select count(p.cer_id) as countcer_id,cer_name,cer_name2 from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 like '$search' group by p.cer_id;";
        $resultcerr = mysqli_query($link,$sqlcerr);
        while($rowcerr = mysqli_fetch_array($resultcerr, MYSQLI_ASSOC)){
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>'.$rowcerr["cer_name2"].' '. $rowcerr["cer_name"].'   </b></h3></td>
                        <td colspan="2" align="right"><h3><b>'.$rowcerr["countcer_id"].' ຄົນ</h3> </b></td>
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
                        ຂໍ້ມູນຜູ້ເຂົ້າຝຶກອົບຮົມ
                    </b>
                </u>
            </div>
            <table align="center" width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #9CE513">
                    <th style="width: 25px;">#</th>
                    <th style="width: 100px;">ລະຫັດບຸກຄະນາຄອນ</th>
                    <th style="width: 200px;">ຊື່ ແລະ ນາມສະກຸນ</th>
                    <th style="width: 40px;">ເພດ</th>
                    <th style="width: 80px;">ວັນເດືອນປີເກີດ</th>
                    <th style="width: 80px;">ຊົນເຜົ່າ</th>
                    <th style="width: 80px;">ສັນຊາດ</th>
                    <th style="width: 100px;">ປະເພດບຸກຄະລາກອນ</th>
                    <th style="width: 100px;">ວຸດທິການສຶກສາ</th>
                    <th style="width: 150px;">ພາກສ່ວນ</th>
                    <th style="width: 80px;">ແຂວງ</th>
                    <th style="width: 150px;">ທີ່ຢູ່ປັດຈຸບັນ</th>
                    <th style="width: 100px;">ທີ່ຢູ່ອີເມວ</th>
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
$mpdf->Output('ລາຍງານຜູ້ຝຶກອົບຮົມ.pdf','I');
?>