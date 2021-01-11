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
        require_once './components/menu.php';
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
                                <h3>ครูที่ปรึกษาโครงการ</h3>
                                <hr>
                                <div class="row">
                                    
                                    <div class="col-lg-3 col-xlg-3 col-md-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="mt-4"> <img src="assets/images/admin/kru2.jpg" class="rounded-circle" width="150">
                                                    <h4 class="card-title mt-2">นายปณวรรต บุญตาศานย์</h4>
                                                    <h6 class="card-subtitle">หัวหน้ากลุ่มเทคโนโลยี</h6>
                                                    <!--div class="row text-center justify-content-md-center">
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                                    </!--div-->
                                                </center>
                                            </div>
                                            <div>
                                                <hr> </div>
                                            <div class="card-body"> <small class="text-muted">Email address </small>
                                                <h6>phanawat.lo@yupparaj.ac.th</h6> 
                                                <small class="text-muted pt-4 db">Address</small>
                                                <h6>238 ถนนพระปกเกล้า ตำบลศรีภูมิ อำเภอเมือง จังหวัดเชียงใหม่ 50200</h6>
                                                <!--div class="map-box">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                                                </!--div--> <small class="text-muted pt-4 db">Social Profile</small>
                                                <br>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xlg-3 col-md-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="mt-4"> <img src="assets/images/admin/kru1.jpg" class="rounded-circle" width="150">
                                                    <h4 class="card-title mt-2">นายวิรัชชัย จันต๊ะวงศ์</h4>
                                                    <h6 class="card-subtitle">ประธานกรรมการงานระบบเครือข่ายและเทคโนโลยี</h6>
                                                    <!--div class="row text-center justify-content-md-center">
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                                    </!--div-->
                                                    
                                                </center>
                                            </div>
                                            <div>
                                                <hr> </div>
                                            <div class="card-body"> <small class="text-muted">Email address </small>
                                                <h6>viratchai.ju@yupparaj.ac.th</h6> <small class="text-muted pt-4 db">Address</small>
                                                <h6>238 ถนนพระปกเกล้า ตำบลศรีภูมิ อำเภอเมือง จังหวัดเชียงใหม่ 50200</h6>
                                              <small class="text-muted pt-4 db">Social Profile</small>
                                                <br>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                                <h3>ทีมพัฒนา</h3><hr>
                                <div class="row">
                                    
                                    <div class="col-lg-3 col-xlg-3 col-md-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="mt-4"> <img src="assets/images/admin/stu1.jpg" class="rounded-circle" width="150">
                                                    <h4 class="card-title mt-2">นายกัมปนาท ชัยมูลฐาน</h4>
                                                    <h6 class="card-subtitle">Web Developer & Cloud System</h6>
                                                    <!--div class="row text-center justify-content-md-center">
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                                    </!--div-->
                                                </center>
                                            </div>
                                            <div>
                                                <hr> </div>
                                            <div class="card-body"> <small class="text-muted">Email address </small>
                                                <h6>48505@yupparaj.ac.th</h6> 
                                                <small class="text-muted pt-4 db">Address</small>
                                                <h6>238 ถนนพระปกเกล้า ตำบลศรีภูมิ อำเภอเมือง จังหวัดเชียงใหม่ 50200</h6>
                                                <!--div class="map-box">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                                                </!--div--> <small class="text-muted pt-4 db">Social Profile</small>
                                                <br>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xlg-3 col-md-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="mt-4"> <img src="assets/images/admin/s2.jpg" class="rounded-circle" width="150">
                                                    <h4 class="card-title mt-2">นายพงศ์วิชญ์ สมตา</h4>
                                                    <h6 class="card-subtitle">App Developer & Database System</h6>
                                                    <!--div class="row text-center justify-content-md-center">
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                                    </!--div-->
                                                    
                                                </center>
                                            </div>
                                            <div>
                                                <hr> </div>
                                            <div class="card-body"> <small class="text-muted">Email address </small>
                                                <h6>viratchai.ju@yupparaj.ac.th</h6> <small class="text-muted pt-4 db">Address</small>
                                                <h6>238 ถนนพระปกเกล้า ตำบลศรีภูมิ อำเภอเมือง จังหวัดเชียงใหม่ 50200</h6>
                                                <!--div class="map-box">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                                                </!--div--> <small class="text-muted pt-4 db">Social Profile</small>
                                                <br>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xlg-3 col-md-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="mt-4"> <img src="assets/images/admin/s3.jpg" class="rounded-circle" width="150">
                                                    <h4 class="card-title mt-2">นายรัชชานนท์ มุขแก้ว</h4>
                                                    <h6 class="card-subtitle">Web Developer & Ai for Thai dev</h6>
                                                    <!--div class="row text-center justify-content-md-center">
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                                    </!--div-->
                                                    
                                                </center>
                                            </div>
                                            <div>
                                                <hr> </div>
                                            <div class="card-body"> <small class="text-muted">Email address </small>
                                                <h6>49874@yupparaj.ac.th</h6> <small class="text-muted pt-4 db">Address</small>
                                                <h6>238 ถนนพระปกเกล้า ตำบลศรีภูมิ อำเภอเมือง จังหวัดเชียงใหม่ 50200</h6>
                                                <!--div class="map-box">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                                                </!--div--> <small class="text-muted pt-4 db">Social Profile</small>
                                                <br>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                                            </div>
                                        </div>
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © <?php echo date("Y") ?> Yupparaj Wittayalai School 
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

    </div>

    <?php
        require_once './components/jslink.php';
    ?>

</body>
</html>
<?php }?>