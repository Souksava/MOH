<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon/MOH.ico">
    <title>ເຂົ້າສູ່ລະບົບ</title>
    <link href="css/Style.css" type="text/css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <script src="js/sweetalert.min.js" ></script>
  </head>
  <body>
        <div class="container font12" align="center" style="margin:0 auto;width:500px;height:480px;margin-top:100px;background-color: white;box-shadow: 5px 10px 8px 8px #9f9e9a;">
          <form action="Check/checklogin.php" id="form1" method="POST"><br><br><br>
                <div class="row">
                    <div class="col-md-12">
                      <img src="icon/MOH.jpg" alt="" width="250px">
                    </div>
                    <div class="col-md-12"><br>
                      <input type="email" name="email" placeholder="ທີ່ຢູ່ອີເມວ" class="form-control" style="width: 85%;">
                    </div>
                    <div class="col-md-12"><br>
                        <input type="password" name="pass" placeholder="ລະຫັດຜ່ານ" class="form-control" style="width: 85%;">
                    </div>
                    <div class="col-md-12"><br>
                        <button type="submit" class="btn btn-outline-success" style="width: 85%" onclick="">
                            ເຂົ້າສູ່ລະບົບ
                        </button>
                    </div>
                    <div class="col-md-12 font14" style="color: #0BAA04;"><br>
                      <b>
                          ກະຊວງສາທາລະນະສຸກ <br>
                          Misnistry of Health
                      </b> <br>
                    </div>
                </div>
          </form>
          <?php 
            if(isset($_GET['email'])=='not'){
              echo'<script type="text/javascript">
                  swal("", "ກະລຸນາປ້ອນອີເມວ !!", "info");
                  </script>';
                  // echo"<meta http-equiv='refresh' content='1;URL=frmlogin.php'>";
                  }
            if(isset($_GET['pass'])=='not'){
                echo'<script type="text/javascript">
                swal("", "ກະລຸນາປ້ອນລະຫັດຜ່ານ !!", "info");
                </script>';
            }
            if(isset($_GET['found'])=='true'){
              echo'<script type="text/javascript">
                  swal("", "ອີ່ເມວ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ !!", "error");
                  </script>';
              }
              if(isset($_GET['login'])=='true'){
                echo'<script type="text/javascript">
                    swal("", "ເຂົ້າສູ່ລະບົບສຳເລັດ", "success");
                    </script>';
            }
        
          ?>
        </div>
  </body>
        <script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
       
</html>
