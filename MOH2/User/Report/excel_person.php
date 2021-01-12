<?php 
 require '../../ConnectDB/connectDB.php';
 date_default_timezone_set("Asia/Bangkok");
 $datenow = time();
 $Date = date("Y-m-d",$datenow);
 $search = "%".$_POST['search']."%";
    if(isset($_POST['btnExcel'])){
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="15" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="15" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
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
                    <td colspan="15" align="center"><h2>ລາຍງານບຸກຄະລາກອນ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
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
            </tr>      
        ';
            $sqlexcel = "select per_id,per_name,per_surname,gender,dob,tel,address,email,type_name,eth_name,nation_name,sec_name,pro_name,e.cer_id,cer_name,cer_name2 from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join section s on p.sec_id=s.sec_id left join province o on s.province=o.pro_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or sec_name like '$search' or pro_name like '$search' or cer_name like '$search' or cer_name2 order by p.per_name asc;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            if($rowexcel['dob'] == "0000-00-00"){
                $rowexcel['dob'] = "00/00/0000";
            }
            else{
                $rowexcel['dob'] = date("d/m/Y",strtotime($rowexcel['dob'])); 
            }
            $output .= '
                <tr>
                    <td align="center" style="width: 25px;">'.$No1_.'</td>
                    <td align="left">'.$rowexcel["per_id"].'</td>
                    <td align="center"> '.$rowexcel['per_name'].'</td align="center">
                    <td align="center">'.$rowexcel['per_surname'].'</td>
                    <td align="center">'.$rowexcel['gender'].'</td>
                    <td align="center"> '.$rowexcel['dob'].'</td>
                    <td align="left">'.$rowexcel["eth_name"].'</td>
                    <td align="center"> '.$rowexcel['nation_name'].'</td align="center">
                    <td align="center">'.$rowexcel['type_name'].'</td>
                    <td align="center">'.$rowexcel['cer_name2'].'</td>
                    <td align="left">'.$rowexcel["sec_name"].'</td>
                    <td align="center"> '.$rowexcel['pro_name'].'</td align="center">
                    <td align="center">'.$rowexcel['tel'].'</td>
                    <td align="center">'.$rowexcel['address'].'</td>
                    <td align="left">'.$rowexcel["email"].'</td>
                </tr>
            ';
            }
            $sqlcount = "select count(gender) as count from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2  where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2;";
            $resultcount = mysqli_query($link,$sqlcount);
            $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
            $output .= '
                <tr align="right" style="font-size: 18px;">
                    <td colspan="12">ຈຳນວນທັງໝົດ: </td>
                    <td colspan="3">'.$rowcounts['count'].' ຄົນ</td>
                </tr>
            ';
            $sqlmale = "select count(gender) as count,gender from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by gender order by gender desc;";
            $resultmale = mysqli_query($link,$sqlmale);
            while($rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC)){
            $output .='
                <tr class="fontblack18" style="font-size: 18px;">
                    <td colspan="12" align="right"><h3><b>'.$rowmale["gender"].'   </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$rowmale["count"].' ຄົນ</h3> </b></td>
                </tr>    
            ';
            }
            $sqlnation = "select count(p.nation_id) as countnation,nation_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by n.nation_id;";
            $resultnation = mysqli_query($link,$sqlnation);
            while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
            $output .='
                <tr class="fontblack18" style="font-size: 18px;">
                    <td colspan="12" align="right"><h3><b>ສັນຊາດ'.$rownation["nation_name"].'   </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$rownation["countnation"].' ຄົນ</h3> </b></td>
                </tr>  
            ';
            }
            $sqleth = "select count(p.eth_id) as counteth,eth_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by p.eth_id;";
            $resulteth = mysqli_query($link,$sqleth);
            while($roweth = mysqli_fetch_array($resulteth, MYSQLI_ASSOC)){
            $output .='  
                <tr class="fontblack18" style="font-size: 18px;">
                    <td colspan="12" align="right"><h3><b>'.$roweth["eth_name"].'   </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$roweth["counteth"].' ຄົນ</h3> </b></td>
                </tr>    
            ';
            }
            $sqlcerr = "select count(p.cer_id) as countcer_id,cer_name,cer_name2 from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 like '$search' group by p.cer_id;";
            $resultcerr = mysqli_query($link,$sqlcerr);
            while($rowcerr = mysqli_fetch_array($resultcerr, MYSQLI_ASSOC)){
            $output .='
                <tr class="fontblack18" style="font-size: 18px;">
                    <td colspan="12" align="right"><h3><b>'.$rowcerr["cer_name2"].' '. $rowcerr["cer_name"].'   </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$rowcerr["countcer_id"].' ຄົນ</h3> </b></td>
                </tr>  
            ';
            }
            $output .='  
        </table>
        ';
        
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=person.xls");
        echo $output;
    }
    if(isset($_POST['btnWord'])){
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="15" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="15" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
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
                    <td colspan="15" align="center"><h2>ລາຍງານບຸກຄະລາກອນ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
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
            </tr>      
        ';
            $sqlexcel = "select per_id,per_name,per_surname,gender,dob,tel,address,email,type_name,eth_name,nation_name,sec_name,pro_name,e.cer_id,cer_name,cer_name2 from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join section s on p.sec_id=s.sec_id left join province o on s.province=o.pro_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or sec_name like '$search' or pro_name like '$search' or cer_name like '$search' or cer_name2 order by p.per_name asc;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            if($rowexcel['dob'] == "0000-00-00"){
                $rowexcel['dob'] = "00/00/0000";
            }
            else{
                $rowexcel['dob'] = date("d/m/Y",strtotime($rowexcel['dob'])); 
            }
            $output .= '
                <tr>
                    <td align="center" style="width: 25px;">'.$No1_.'</td>
                    <td align="left">'.$rowexcel["per_id"].'</td>
                    <td align="center"> '.$rowexcel['per_name'].'</td align="center">
                    <td align="center">'.$rowexcel['per_surname'].'</td>
                    <td align="center">'.$rowexcel['gender'].'</td>
                    <td align="center"> '.$rowexcel['dob'].'</td>
                    <td align="left">'.$rowexcel["eth_name"].'</td>
                    <td align="center"> '.$rowexcel['nation_name'].'</td align="center">
                    <td align="center">'.$rowexcel['type_name'].'</td>
                    <td align="center">'.$rowexcel['cer_name2'].'</td>
                    <td align="left">'.$rowexcel["sec_name"].'</td>
                    <td align="center"> '.$rowexcel['pro_name'].'</td align="center">
                    <td align="center">'.$rowexcel['tel'].'</td>
                    <td align="center">'.$rowexcel['address'].'</td>
                    <td align="left">'.$rowexcel["email"].'</td>
                </tr>
            ';
            }
            $sqlcount = "select count(gender) as count from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2  where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2;";
            $resultcount = mysqli_query($link,$sqlcount);
            $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
            $output .= '
                <tr align="right" style="font-size: 18px;">
                    <td colspan="12">ຈຳນວນທັງໝົດ: </td>
                    <td colspan="3">'.$rowcounts['count'].' ຄົນ</td>
                </tr>
            ';
            $sqlmale = "select count(gender) as count,gender from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by gender order by gender desc;";
            $resultmale = mysqli_query($link,$sqlmale);
            while($rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC)){
            $output .='
                <tr class="fontblack18" style="font-size: 18px;">
                    <td colspan="12" align="right"><h3><b>'.$rowmale["gender"].'   </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$rowmale["count"].' ຄົນ</h3> </b></td>
                </tr>    
            ';
            }
            $sqlnation = "select count(p.nation_id) as countnation,nation_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by n.nation_id;";
            $resultnation = mysqli_query($link,$sqlnation);
            while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
            $output .='
                <tr class="fontblack18" style="font-size: 18px;">
                    <td colspan="12" align="right"><h3><b>ສັນຊາດ'.$rownation["nation_name"].'   </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$rownation["countnation"].' ຄົນ</h3> </b></td>
                </tr>  
            ';
            }
            $sqleth = "select count(p.eth_id) as counteth,eth_name from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 group by p.eth_id;";
            $resulteth = mysqli_query($link,$sqleth);
            while($roweth = mysqli_fetch_array($resulteth, MYSQLI_ASSOC)){
            $output .='  
                <tr class="fontblack18" style="font-size: 18px;">
                    <td colspan="12" align="right"><h3><b>'.$roweth["eth_name"].'   </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$roweth["counteth"].' ຄົນ</h3> </b></td>
                </tr>    
            ';
            }
            $sqlcerr = "select count(p.cer_id) as countcer_id,cer_name,cer_name2 from personality p left join type_person t on p.type_id=t.type_id left join ethnicity c on p.eth_id=c.eth_id left join nationality n on p.nation_id=n.nation_id left join certificate e on p.cer_id=e.cer_id left join certificate2 e2 on e.cer_id2=e2.cer_id2 where per_id like '$search' or per_name like '$search' or per_surname like '$search' or gender like '$search' or eth_name like '$search' or type_name like '$search' or nation_name like '$search' or cer_name like '$search' or cer_name2 like '$search' group by p.cer_id;";
            $resultcerr = mysqli_query($link,$sqlcerr);
            while($rowcerr = mysqli_fetch_array($resultcerr, MYSQLI_ASSOC)){
            $output .='
                <tr class="fontblack18" style="font-size: 18px;">
                    <td colspan="12" align="right"><h3><b>'.$rowcerr["cer_name2"].' '. $rowcerr["cer_name"].'   </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$rowcerr["countcer_id"].' ຄົນ</h3> </b></td>
                </tr>  
            ';
            }
            $output .='  
        </table>
        ';
        
        header("Content-Type: application/vnd.msword");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Disposition:  attachment; filename=person.doc");
        echo $output;
    }
  

?>