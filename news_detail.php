<?php
  session_start();
  include("connect/connect.php");
  if(!$_SESSION['t_id']){
      header("location:login.php");
  }else{

  
?>
<?php
    if(isset($_GET['news_id'])){
        $n_id = filter_input(INPUT_GET , 'news_id' ,FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM news WHERE n_id = '$n_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    }

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
                                <h3 class="text-danger" style="font-weight: 600;"><?php echo $row['n_name'] ?></h3>

                                <h4>ประเภทข่าว : <?php
                                                                    if($row['n_ref'] == '1'){
                                                                        echo 'ข่าวประชาสัมพันธ์ทั่วไป';
                                                                    }else if($row['n_ref'] == '2'){
                                                                        echo 'ข่าวแจ้งจากผู้พัฒนา';
                                                                    }else if($row['n_ref'] == '3'){
                                                                        echo 'ข่าวด่วน';
                                                                    }else if($row['n_ref'] == '4'){
                                                                        echo 'อื่นๆ';
                                                                    }else{
                                                                        echo 'OUT';
                                                                    }
                                                                ?>
                                </h4>
                                <h4>วัน/เดือน/ปี ที่ลง : <?php echo $row['n_date']; ?></h4>
                                <hr>
                                <?php echo $row['n_detail']; ?>

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