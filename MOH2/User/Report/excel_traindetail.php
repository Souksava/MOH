<?php 
 require '../../ConnectDB/connectDB.php';
 date_default_timezone_set("Asia/Bangkok");
 $datenow = time();
 $Date = date("Y-m-d",$datenow);
 $id2 = $_POST['id'];
 $id = $_POST['id'];
 $place = $_POST['place'];
 $note = $_POST['note'];
 $amount = $_POST['amount'];
 $No_ = $_POST['No_'];
 $sqlget = "select train_id,place,note,amount,No_,amount,date_,time_,user_name,user_edit from training  t left join username u on t.user_id=u.user_id where train_id='$id2';";
 $resultget = mysqli_query($link,$sqlget);
 $rowget = mysqli_fetch_array($resultget,MYSQLI_ASSOC);
    if(isset($_POST['btnExcel'])){
        $output = '
            <table class="table font12" style="width: 1200px;font-family: '."Phetsarath OT".';font-size: 12px;">
            <tr>
                <td colspan="16" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
            </tr>
            <tr>
                <td colspan="16" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td colspan="8" align="left">ກະຊວງສາທາລະນະສຸກ</td>    
            </tr>
            <tr>  
                <td colspan="8" align="left">ກົມການສຶກສາສາທາລະນະສຸກ</td>
            </tr>
            <tr>
                <td colspan="8" align="left">ພະແນກຄຸ້ມຄອງການອົບຮົມບຸກຄະລາກອນສາທາລະນະສຸກ</td>    
            </tr>
            <tr>

            </tr>
            <tr>
                <td colspan="8" align="left">ເລກທີໃບອະນຸຍາດ: '.$rowget["No_"].'</td>    
                <td colspan="8" align="right">ເລກທີ: '.$rowget["train_id"].'</td>    
            </tr>
            <tr>  
                <td colspan="8" align="left">ມູນຄ່າທຶນ: '.$rowget["amount"].'</td>
                <td colspan="8" align="right">ສະຖານທີ: '.$rowget["place"].'</td>    
            </tr>
            <tr>
                <td colspan="8" align="left">ວັນທີບັນທຶກຂໍ້ມູນ: '.date("d/m/Y",strtotime($rowget["date_"])).'</td>  
                <td colspan="8" align="right">ໝາຍເຫດ: '.$rowget["note"].'</td>      
            </tr>
            <tr>
                <td colspan="8" align="left">ເວລາ: '.$rowget["time_"].'</td>  
            ';
                if(trim($rowget['user_edit']) == ""){
                    echo"<td colspan='8' align='right'></td>";
                }
                else {
                    $user_edit = $rowget['user_edit'];
                    echo"<td colspan='8' align='right'> $user_edit </td>";
                }
            $output .=' 
            </tr>
            <tr>

            </tr>
            <tr>
                <td colspan="16" align="center"><h2>ລາຍລະອຽດຜູ້ເຂົ້າຮ່ວມຝຶກອົບຮົມ</h2></td>
            </tr>
            <tr>

            </tr>
            </table>
        ';
        $output .= ' 
        <table class="table font12" border="1" style="width: 1800px;font-family: '."Phetsarath OT".';font-size: 12px;">
            <tr>
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
        ';
            $sqlexcel = "select d.detail_id,d.per_id,per_name,per_surname,gender,eth_name,nation_name,sec_name,d.note,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,type_name,year,region,No_,quota_name,d.note,pro_name,cer_name,cer_name2 from tranddetail d left join training t on d.train_id=t.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id left join ethnicity e on p.eth_id=e.eth_id left join nationality n on p.nation_id=n.nation_id left join type_person r on p.type_id=r.type_id left join province v on s.province=v.pro_id left join certificate a on p.cer_id=a.cer_id left join certificate2 a2 on a.cer_id2=a2.cer_id2 where d.train_id='$id' order by sec_name asc;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center">'.$No1_.'</td>
                    <td align="center">'.$rowexcel["per_name"].' '.$rowexcel["per_surname"].' </td>
                    <td align="center">'.$rowexcel["gender"].'</td>
                    <td align="center">'.$rowexcel["eth_name"].'</td>
                    <td align="center">'.$rowexcel["nation_name"].'</td>
                    <td align="center">'.$rowexcel["cer_name2"].' '.$rowexcel["cer_name"].'</td>
                    <td align="center">'.$rowexcel["sec_name"].'</td>
                    <td align="center">'.$rowexcel["pro_name"].'</td>
                    <td align="center">'.$rowexcel["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_end"])).'</td>
                    <td align="center">'.$rowexcel["day"].'</td>
                    <td align="center">'.$rowexcel["year"].'</td>
                    <td align="center">'.$rowexcel["quota_name"].'</td>
                    <td align="center">'.$rowexcel["region"].'</td>
                    <td align="center">'.$rowexcel["note"].'</td>
                </tr>
            ';
            }
            $sqlfemale = "select count(d.per_id) as female from tranddetail d left join personality p on d.per_id=p.per_id where gender='ຍິງ' and d.train_id='$id2' group by gender;";
            $resultfemale = mysqli_query($link,$sqlfemale);
            $rowfemale = mysqli_fetch_array($resultfemale, MYSQLI_ASSOC);
            $sqlmale = "select count(d.per_id) as male from tranddetail d left join personality p on d.per_id=p.per_id where gender='ຊາຍ' and d.train_id='$id2' group by gender; ";
            $resultmale = mysqli_query($link,$sqlmale);
            $rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC);
            $sqlcount = "select count(per_id) as count from tranddetail where train_id='$id2';";
            $resultcount = mysqli_query($link,$sqlcount);
            $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
            $output .='
                        <tr class="fontblack18">
                            <td colspan="11" align="right"><h3><b>ຈຳນວນທັງໝົດ:  </b></h3></td>
                            <td colspan="5" align="right"><h3><b>'.number_format($rowcounts["count"]).' ຄົນ</h3> </b></td>
                        </tr>    
                        <tr class="fontblack18">
                            <td colspan="11" align="right"><h3><b>ຈຳນວນຍິງ:  </b></h3></td>
                            <td colspan="5" align="right"><h3><b>'.number_format($rowfemale["female"]).' ຄົນ</h3> </b></td>
                        </tr>    
                        <tr class="fontblack18">
                            <td colspan="11" align="right"><h3><b>ຈຳນວນຊາຍ:  </b></h3></td>
                            <td colspan="5" align="right"><h3><b>'.number_format($rowmale["male"]).' ຄົນ</h3> </b></td>
                        </tr>    
                    ';
                $sqlsec = "select count(p.sec_id) as countnation,sec_name from tranddetail d left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id where d.train_id='$id2' group by p.sec_id;";
                $resultsec = mysqli_query($link,$sqlsec);
                while($rowsec = mysqli_fetch_array($resultsec, MYSQLI_ASSOC)){
                $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>'.$rowsec["sec_name"].'  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$rowsec["countnation"].' ຄົນ</h3> </b></td>
                    </tr>    
                    ';
            }
            $sqlnation = "select count(p.nation_id) as countnation,nation_name from tranddetail d left join personality p on d.per_id=p.per_id left join nationality n on p.nation_id=n.nation_id where d.train_id='$id2' group by p.nation_id;";
            $resultnation = mysqli_query($link,$sqlnation);
                while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
                    $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>ສັນຊາດ'.$rownation["nation_name"].'  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$rownation["countnation"].' ຄົນ</h3> </b></td>
                    </tr>    
                    ';
                }
            $sqleth = "select count(p.eth_id) as counteth,eth_name from tranddetail d left join personality p on d.per_id=p.per_id left join ethnicity c on p.eth_id=c.eth_id where d.train_id='$id2' group by p.eth_id;";
            $resulteth = mysqli_query($link,$sqleth);
            while($roweth = mysqli_fetch_array($resulteth, MYSQLI_ASSOC)){
                $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>'.$roweth["eth_name"].'  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$roweth["counteth"].' ຄົນ</h3> </b></td>
                    </tr>    
                        ';
                }
            $sqlcerr = "select count(p.cer_id) as countcer_id,cer_name,cer_name2 from tranddetail d left join personality p on d.per_id=p.per_id left join certificate a on p.cer_id=a.cer_id left join certificate2 a2 on a.cer_id2=a2.cer_id2 where d.train_id='$id2' group by p.eth_id;";
            $resultcerr = mysqli_query($link,$sqlcerr);
            while($rowcerr = mysqli_fetch_array($resultcerr, MYSQLI_ASSOC)){
            $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>'.$rowcerr["cer_name2"].' '. $rowcerr["cer_name"].'   </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$rowcerr["countcer_id"].' ຄົນ</h3> </b></td>
                    </tr>    
                    ';
            }
            $output .='
            </table>
            ';
        
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=trainingdetail.xls");
        // header("Content-Type: application/vnd.msword");
        // header("Expires: 0");
        // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        // header("Content-Disposition:  attachment; filename=revenue.doc");
        echo $output;
    }
    if(isset($_POST['btnWord'])){
        $output = '
            <table class="table font12" style="width: 1200px;font-family: '."Phetsarath OT".';font-size: 12px;">
            <tr>
                <td colspan="16" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
            </tr>
            <tr>
                <td colspan="16" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td colspan="8" align="left">ກະຊວງສາທາລະນະສຸກ</td>    
            </tr>
            <tr>  
                <td colspan="8" align="left">ກົມການສຶກສາສາທາລະນະສຸກ</td>
            </tr>
            <tr>
                <td colspan="8" align="left">ພະແນກຄຸ້ມຄອງການອົບຮົມບຸກຄະລາກອນສາທາລະນະສຸກ</td>    
            </tr>
            <tr>

            </tr>
            <tr>
                <td colspan="8" align="left">ເລກທີໃບອະນຸຍາດ: '.$rowget["No_"].'</td>    
                <td colspan="8" align="right">ເລກທີ: '.$rowget["train_id"].'</td>    
            </tr>
            <tr>  
                <td colspan="8" align="left">ມູນຄ່າທຶນ: '.$rowget["amount"].'</td>
                <td colspan="8" align="right">ສະຖານທີ: '.$rowget["place"].'</td>    
            </tr>
            <tr>
                <td colspan="8" align="left">ວັນທີບັນທຶກຂໍ້ມູນ: '.date("d/m/Y",strtotime($rowget["date_"])).'</td>  
                <td colspan="8" align="right">ໝາຍເຫດ: '.$rowget["note"].'</td>      
            </tr>
            <tr>
                <td colspan="8" align="left">ເວລາ: '.$rowget["time_"].'</td>  
            ';
                if(trim($rowget['user_edit']) == ""){
                    echo"<td colspan='8' align='right'></td>";
                }
                else {
                    $user_edit = $rowget['user_edit'];
                    echo"<td colspan='8' align='right'> $user_edit </td>";
                }
            $output .=' 
            </tr>
            <tr>

            </tr>
            <tr>
                <td colspan="16" align="center"><h2>ລາຍລະອຽດຜູ້ເຂົ້າຮ່ວມຝຶກອົບຮົມ</h2></td>
            </tr>
            <tr>

            </tr>
            </table>
        ';
        $output .= ' 
        <table class="table font12" border="1" style="width: 1800px;font-family: '."Phetsarath OT".';font-size: 12px;">
            <tr>
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
        ';
            $sqlexcel = "select d.detail_id,d.per_id,per_name,per_surname,gender,eth_name,nation_name,sec_name,d.note,topic,date_start,date_end,datediff(date_end,date_start)+1 as day,type_name,year,region,No_,quota_name,d.note,pro_name,cer_name,cer_name2 from tranddetail d left join training t on d.train_id=t.train_id left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id left join ethnicity e on p.eth_id=e.eth_id left join nationality n on p.nation_id=n.nation_id left join type_person r on p.type_id=r.type_id left join province v on s.province=v.pro_id left join certificate a on p.cer_id=a.cer_id left join certificate2 a2 on a.cer_id2=a2.cer_id2 where d.train_id='$id' order by sec_name asc;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center">'.$No1_.'</td>
                    <td align="center">'.$rowexcel["per_name"].' '.$rowexcel["per_surname"].' </td>
                    <td align="center">'.$rowexcel["gender"].'</td>
                    <td align="center">'.$rowexcel["eth_name"].'</td>
                    <td align="center">'.$rowexcel["nation_name"].'</td>
                    <td align="center">'.$rowexcel["cer_name2"].' '.$rowexcel["cer_name"].'</td>
                    <td align="center">'.$rowexcel["sec_name"].'</td>
                    <td align="center">'.$rowexcel["pro_name"].'</td>
                    <td align="center">'.$rowexcel["topic"].'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_start"])).'</td>
                    <td align="center">'.date("d/m/Y",strtotime($rowexcel["date_end"])).'</td>
                    <td align="center">'.$rowexcel["day"].'</td>
                    <td align="center">'.$rowexcel["year"].'</td>
                    <td align="center">'.$rowexcel["quota_name"].'</td>
                    <td align="center">'.$rowexcel["region"].'</td>
                    <td align="center">'.$rowexcel["note"].'</td>
                </tr>
            ';
            }
            $sqlfemale = "select count(d.per_id) as female from tranddetail d left join personality p on d.per_id=p.per_id where gender='ຍິງ' and d.train_id='$id2' group by gender;";
            $resultfemale = mysqli_query($link,$sqlfemale);
            $rowfemale = mysqli_fetch_array($resultfemale, MYSQLI_ASSOC);
            $sqlmale = "select count(d.per_id) as male from tranddetail d left join personality p on d.per_id=p.per_id where gender='ຊາຍ' and d.train_id='$id2' group by gender; ";
            $resultmale = mysqli_query($link,$sqlmale);
            $rowmale = mysqli_fetch_array($resultmale,MYSQLI_ASSOC);
            $sqlcount = "select count(per_id) as count from tranddetail where train_id='$id2';";
            $resultcount = mysqli_query($link,$sqlcount);
            $rowcounts = mysqli_fetch_array($resultcount,MYSQLI_ASSOC);
            $output .='
                        <tr class="fontblack18">
                            <td colspan="11" align="right"><h3><b>ຈຳນວນທັງໝົດ:  </b></h3></td>
                            <td colspan="5" align="right"><h3><b>'.number_format($rowcounts["count"]).' ຄົນ</h3> </b></td>
                        </tr>    
                        <tr class="fontblack18">
                            <td colspan="11" align="right"><h3><b>ຈຳນວນຍິງ:  </b></h3></td>
                            <td colspan="5" align="right"><h3><b>'.number_format($rowfemale["female"]).' ຄົນ</h3> </b></td>
                        </tr>    
                        <tr class="fontblack18">
                            <td colspan="11" align="right"><h3><b>ຈຳນວນຊາຍ:  </b></h3></td>
                            <td colspan="5" align="right"><h3><b>'.number_format($rowmale["male"]).' ຄົນ</h3> </b></td>
                        </tr>    
                    ';
                $sqlsec = "select count(p.sec_id) as countnation,sec_name from tranddetail d left join personality p on d.per_id=p.per_id left join section s on p.sec_id=s.sec_id where d.train_id='$id2' group by p.sec_id;";
                $resultsec = mysqli_query($link,$sqlsec);
                while($rowsec = mysqli_fetch_array($resultsec, MYSQLI_ASSOC)){
                $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>'.$rowsec["sec_name"].'  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$rowsec["countnation"].' ຄົນ</h3> </b></td>
                    </tr>    
                    ';
            }
            $sqlnation = "select count(p.nation_id) as countnation,nation_name from tranddetail d left join personality p on d.per_id=p.per_id left join nationality n on p.nation_id=n.nation_id where d.train_id='$id2' group by p.nation_id;";
            $resultnation = mysqli_query($link,$sqlnation);
                while($rownation = mysqli_fetch_array($resultnation, MYSQLI_ASSOC)){
                    $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>ສັນຊາດ'.$rownation["nation_name"].'  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$rownation["countnation"].' ຄົນ</h3> </b></td>
                    </tr>    
                    ';
                }
            $sqleth = "select count(p.eth_id) as counteth,eth_name from tranddetail d left join personality p on d.per_id=p.per_id left join ethnicity c on p.eth_id=c.eth_id where d.train_id='$id2' group by p.eth_id;";
            $resulteth = mysqli_query($link,$sqleth);
            while($roweth = mysqli_fetch_array($resulteth, MYSQLI_ASSOC)){
                $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>'.$roweth["eth_name"].'  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$roweth["counteth"].' ຄົນ</h3> </b></td>
                    </tr>    
                        ';
                }
            $sqlcerr = "select count(p.cer_id) as countcer_id,cer_name,cer_name2 from tranddetail d left join personality p on d.per_id=p.per_id left join certificate a on p.cer_id=a.cer_id left join certificate2 a2 on a.cer_id2=a2.cer_id2 where d.train_id='$id2' group by p.eth_id;";
            $resultcerr = mysqli_query($link,$sqlcerr);
            while($rowcerr = mysqli_fetch_array($resultcerr, MYSQLI_ASSOC)){
            $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>'.$rowcerr["cer_name2"].' '. $rowcerr["cer_name"].'   </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$rowcerr["countcer_id"].' ຄົນ</h3> </b></td>
                    </tr>    
                    ';
            }
            $output .='
            </table>
            ';
        
        // header("Content-Type: application/xls");
        // header("Content-Disposition:attachment; filename=trainingdetail.xls");
        header("Content-Type: application/vnd.msword");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Disposition:  attachment; filename=trainingdetail.doc");
        echo $output;
    }

?>