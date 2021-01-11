<?php
  session_start();
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
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="mt-4"> <img src="assets/images/users/<?php echo $_SESSION['t_pic']; ?>"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2"><?php echo $_SESSION['t_title']. $_SESSION['t_name']; ?>
                                    </h4>
                                    <h6 class="card-subtitle"><?php echo $_SESSION['t_group'] ?></h6>
                                    <h6 class="card-subtitle">วิทยฐานะ <?php echo $_SESSION['t_position'] ?></h6>
                                </center>

                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body"> <small class="text-muted">อีเมล</small>
                                <h6>yrc@yupparaj.ac.th</h6> <small class="text-muted pt-4 db">โทรศัพท์</small>
                                <h6>053-418673-5</h6> <small class="text-muted pt-4 db">ที่อยู่</small>
                                <h6>238 ถนนพระปกเกล้า ตำบลศรีภูมิ อำเภอเมือง จังหวัดเชียงใหม่ 50200</h6>
                               
                                <br />
                       
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill"
                                        href="#current-month" role="tab" aria-controls="pills-timeline"
                                        aria-selected="true">แก้ไขประวัติส่วนตัว</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month"
                                        role="tab" aria-controls="pills-setting" aria-selected="false"></a>
                                </li>
                            </ul>
                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="current-month" role="tabpanel"
                                    aria-labelledby="pills-timeline-tab">
                                    <div class="card-body">
                                    <form class="form-horizontal form-material" method="post" action="process/edit_profile.php">
                                            <div class="form-group d-none">
                                                <label class="col-md-12">ไอดีการแก้ไข</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $_SESSION['t_id'] ?>"
                                                        class="form-control form-control-line" name="t_id">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">ชื่อ/สกุล</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $_SESSION['t_name'] ?>"
                                                        class="form-control form-control-line" name="t_name">
                                                </div>
                                            </div>
                                           
                                           
                                            <div class="form-group">
                                                <label class="col-md-12">วิทยฐานะ</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $_SESSION['t_position'] ?>"
                                                        class="form-control form-control-line" name="t_position">
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                    function readURL(input) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();

                                                            reader.onload = function(e) {
                                                                $('#blah').attr('src', e.target.result);
                                                            }

                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }
                                            </script>

                                            <div class="form-group ">
                                                <label class="col-md-12">รูปโปร์ไฟล์</label>
                                                    <div class="col-md-12">
                                                        <input type="file" class="form-control  form-control-line" onchange="readURL(this);" name="t_pic">
                                                        <br>
                                                        <img id="blah" class="img-fluid w-25 text-center" src="#" alt="your image" />
                                                    </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">แก้ไขประวัติส่วนตัว</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>

            <footer class="footer">
                © <?php echo date("Y") ?> Yupparaj Wittayalai School
            </footer>

        </div>

    </div>

    <?php
        require_once'./components/jslink.php';
    ?>

</body>

</html>

<?php } ?>