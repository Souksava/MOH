<?php 
 require '../../ConnectDB/connectDB.php';
 date_default_timezone_set("Asia/Bangkok");
 $datenow = time();
 $Date = date("Y-m-d",$datenow);
    if(isset($_POST['btnExcel_All'])){
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="5" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="5" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
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
                    <td colspan="5" align="center"><h2>ລາຍງານລາຍຮັບ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
            <tr>
                <th style="width: 25px;">#</th>
                <th style="width: 150px;" align="left">ຊື່ພາກສ່ວນ</th>
                <th style="width: 100px;" align="center">ບ້ານ</th>
                <th style="width: 100px;" align="center">ເມືອງ</th>
                <th style="width: 100px;" align="center">ແຂວງ</th>
            </tr>      
        ';
            $sqlexcel = "select sec_name,village,district,pro_name from section s left join province p on s.province=p.pro_id;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center" style="width: 25px;">'.$No1_.'</td>
                    <td align="left">
                        '.$rowexcel["sec_name"].'
                    </td>
                    <td align="center" style="width: 100px;"> 
                        '.$rowexcel['village'].'
                    </td align="center">
                    <td align="center">'.$rowexcel['district'].'</td>
                    <td align="center">'.$rowexcel['pro_name'].'</td>
                </tr>
            ';
            }
            $sqlexcel2 = "select count(sec_name) as amount from section;";
            $resultexcel2 = mysqli_query($link,$sqlexcel2);
            $rowexcel2 = mysqli_fetch_array($resultexcel2, MYSQLI_ASSOC);
            $output .= '
                <tr align="right" style="font-size: 18px;">
                    <td colspan="3">ຈຳນວນທັງໝົດ: </td>
                    <td colspan="2">'.$rowexcel2['amount'].' ພາກສ່ວນ</td>
                </tr>
        </table>
        ';
        
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=section.xls");
        echo $output;
    }
    if(isset($_POST['btnWord_All'])){
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="5" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="5" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
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
                    <td colspan="5" align="center"><h2>ລາຍງານລາຍຮັບ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
            <tr>
                <th style="width: 25px;">#</th>
                <th align="left">ຊື່ພາກສ່ວນ</th>
                <th align="center">ບ້ານ</th>
                <th align="center">ເມືອງ</th>
                <th align="center">ແຂວງ</th>
            </tr>      
        ';
            $sqlexcel = "select sec_name,village,district,pro_name from section s left join province p on s.province=p.pro_id;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center" style="width: 25px;">'.$No1_.'</td>
                    <td align="left">
                        '.$rowexcel["sec_name"].'
                    </td>
                    <td align="center"> 
                        '.$rowexcel['village'].'
                    </td align="center">
                    <td align="center">'.$rowexcel['district'].'</td>
                    <td align="center">'.$rowexcel['pro_name'].'</td>
                </tr>
            ';
            }
            $sqlexcel2 = "select count(sec_name) as amount from section;";
            $resultexcel2 = mysqli_query($link,$sqlexcel2);
            $rowexcel2 = mysqli_fetch_array($resultexcel2, MYSQLI_ASSOC);
            $output .= '
                <tr align="right" style="font-size: 18px;">
                    <td colspan="3">ຈຳນວນທັງໝົດ: </td>
                    <td colspan="2">'.$rowexcel2['amount'].' ພາກສ່ວນ</td>
                </tr>
        </table>
        ';
        
        // header("Content-Type: application/xls");
        // header("Content-Disposition:attachment; filename=section.xls");
        header("Content-Type: application/vnd.msword");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Disposition:  attachment; filename=section.doc");
        echo $output;
    }
    if(isset($_POST['btnExcel'])){
        $sec_name = $_POST['sec_name'];
        $pro_id = $_POST['pro_id'];
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="5" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="5" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
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
                    <td colspan="5" align="center"><h2>ລາຍງານລາຍຮັບ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
            <tr>
                <th style="width: 25px;">#</th>
                <th style="width: 150px;" align="left">ຊື່ພາກສ່ວນ</th>
                <th style="width: 100px;" align="center">ບ້ານ</th>
                <th style="width: 100px;" align="center">ເມືອງ</th>
                <th style="width: 100px;" align="center">ແຂວງ</th>
            </tr>      
        ';
            $sqlexcel = "select sec_name,village,district,pro_name from section s left join province p on s.province=p.pro_id where sec_name = '$sec_name' or province = '$pro_id' order by sec_name asc;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center" style="width: 25px;">'.$No1_.'</td>
                    <td align="left">
                        '.$rowexcel["sec_name"].'
                    </td>
                    <td align="center" style="width: 100px;"> 
                        '.$rowexcel['village'].'
                    </td align="center">
                    <td align="center">'.$rowexcel['district'].'</td>
                    <td align="center">'.$rowexcel['pro_name'].'</td>
                </tr>
            ';
            }
            $sqlexcel2 = "select count(sec_name) as amount from section where sec_name = '$sec_name' or province = '$pro_id' order by sec_name asc;;";
            $resultexcel2 = mysqli_query($link,$sqlexcel2);
            $rowexcel2 = mysqli_fetch_array($resultexcel2, MYSQLI_ASSOC);
            $output .= '
                <tr align="right" style="font-size: 18px;">
                    <td colspan="3">ຈຳນວນທັງໝົດ: </td>
                    <td colspan="2">'.$rowexcel2['amount'].' ພາກສ່ວນ</td>
                </tr>
        </table>
        ';
        
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=section.xls");
        echo $output;
    }

    if(isset($_POST['btnWord'])){
        $sec_name = $_POST['sec_name'];
        $pro_id = $_POST['pro_id'];
        $output = '
            <table class="table" style="width: 1200px;font-size: 12px;font-family: '."Phetsarath OT".';">
                <tr>
                    <td colspan="5" align="center">ສາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
                </tr>
                <tr>
                    <td colspan="5" align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</td>
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
                    <td colspan="5" align="center"><h2>ລາຍງານລາຍຮັບ</h2></td>
                </tr>
                <tr>

                </tr>
            </table>
        ';
        $output .= ' 
        <table class="table" border="1" style="width: 1800px;font-size: 14px;font-family: '."Phetsarath OT".';">
            <tr>
                <th style="width: 25px;">#</th>
                <th style="width: 150px;" align="left">ຊື່ພາກສ່ວນ</th>
                <th style="width: 100px;" align="center">ບ້ານ</th>
                <th style="width: 100px;" align="center">ເມືອງ</th>
                <th style="width: 100px;" align="center">ແຂວງ</th>
            </tr>      
        ';
            $sqlexcel = "select sec_name,village,district,pro_name from section s left join province p on s.province=p.pro_id where sec_name = '$sec_name' or province = '$pro_id' order by sec_name asc;";
            $resultexcel = mysqli_query($link,$sqlexcel);
            $No1_ = 0;
            while($rowexcel = mysqli_fetch_array($resultexcel, MYSQLI_ASSOC)){
            $No1_ += 1;
            $output .= '
                <tr>
                    <td align="center" style="width: 25px;">'.$No1_.'</td>
                    <td align="left">
                        '.$rowexcel["sec_name"].'
                    </td>
                    <td align="center" style="width: 100px;"> 
                        '.$rowexcel['village'].'
                    </td align="center">
                    <td align="center">'.$rowexcel['district'].'</td>
                    <td align="center">'.$rowexcel['pro_name'].'</td>
                </tr>
            ';
            }
            $sqlexcel2 = "select count(sec_name) as amount from section where sec_name = '$sec_name' or province = '$pro_id' order by sec_name asc;;";
            $resultexcel2 = mysqli_query($link,$sqlexcel2);
            $rowexcel2 = mysqli_fetch_array($resultexcel2, MYSQLI_ASSOC);
            $output .= '
                <tr align="right" style="font-size: 18px;">
                    <td colspan="3">ຈຳນວນທັງໝົດ: </td>
                    <td colspan="2">'.$rowexcel2['amount'].' ພາກສ່ວນ</td>
                </tr>
        </table>
        ';
        header("Content-Type: application/vnd.msword");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Disposition:  attachment; filename=section.doc");
        echo $output;
    }

?>