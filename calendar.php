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
        require_once './components/menu.php';
        require_once './components/customizer.php';
    ?>

        <div class="page-wrapper">

            <?php 
                require_once 'components/bar.php';
            ?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">

                                        <?php require_once "./calendar_1.php"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
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

<?php }?>