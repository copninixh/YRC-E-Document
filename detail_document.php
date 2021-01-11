<?php
  session_start();
  include("connect/connect.php");
  if(!$_SESSION['t_id']){
      header("location:login.php");
  }else{

  
?>

<!DOCTYPE html>
<html lang="en">
<?php
      require_once './components/head.php';
  ?>

<body>
    <div id="main-wrapper">
        <?php
            require_once './components/navbar.php';
        ?>

        <?php
            require_once './components/menu.php';
        ?>

        <?php
            require_once './components/customizer.php';
        ?>

        <div class="page-wrapper">
            <?php
                  require_once 'components/bar.php';
              ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                              <?php 
                                    if(isset($_GET['d_id'])){
                                        $d_id = filter_input(INPUT_GET , 'd_id' , FILTER_SANITIZE_NUMBER_INT);
                                        $sql = "SELECT * FROM document WHERE d_id = '$d_id'";
                                        $result = mysqli_query($conn,$sql);
                                        $row = mysqli_fetch_array($result);
                                    }
                              ?>
                            <div class="row">
                                    <div class="col-xl-1">
                                        <img src="img/logok.jpg" class="img-fluid w-100" alt="">
                                    </div>
                                    <div class="col-xl-10 text-left">
                                        <h3 class="text-danger mt-2">เอกสารคำสั่งที่ <?php echo $row['d_number']; ?><br>เรื่อง <?php echo $row['d_name']; ?></h3>
                                    </div>
                            </div>

                            <hr>
                            
                            <p class="card-text" style="font-size: 16px;"><b class="text-danger" style="font-weight: 600;">วันที่ไปปฏิบัติหน้าที่</b> <?php echo $row['d_datestart'] ?></p>
                            <p class="card-text" style="font-size: 16px;"><b class="text-danger" style="font-weight: 600;">วันสิ้นสุดปฏิบัติหน้าที่</b> <?php echo $row['d_dateend'] ?></p>
                            <h5>รายละเอียด</h5>
                            <p><?php echo $row['d_detail']; ?></p>
                            <div class="embed-responsive" style="padding-bottom: 141.42%;">
                                <object class="embed-responsive-item" data="doc/<?php echo $row['d_pic']; ?>" type="application/pdf" internalinstanceid="9" title="">
                                </object>
                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                © <?php echo date("Y") ?> Yupparaj Wittayalai School
            </footer>

        </div>

    </div>

    <?php
        require_once './components/jslink.php';
    ?>

</body>

</html>

<?php } ?>