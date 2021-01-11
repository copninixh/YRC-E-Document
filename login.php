<!DOCTYPE html>
<html lang="en">
    <?php
        require_once './components/head.php';
    ?>

<body style="background:white">

    <style>
    .login {
        background-image: url("./img/bglogin.jpg");
        background-size: cover;
        min-height: 100vh;
    }

    .loginsm {
        background-image: url("./img/bgloginsm.jpg");
        background-size: cover;
        min-height: 100vh;


    }

    .container-fluid {
        max-width: 490px
    }

    input,
    input::-webkit-input-placeholder {
        font-size: 16px;
        line-height: 3;
    }
    </style>

    <!-- PC -->
    <div class="login d-none d-xl-block" style="font-family:'Kanit'">

        <div class="container-fluid " style="margin-left:1160px;padding-top:250px;">
            <p align="center"><img src="./img/logos.png" class="img-fluid" width="60%" alt=""></p>
            <h1 align="center" style="font-weight:bold;font-size:45px">ลงชื่อเข้าใช้</h1>
            <h5 style="font-size:18px" align="center" class="">YRC E-Document ระบบสารบรรณคำสั่งอิเล็กทรอนิกส์อัจฉริยะ
            </h5>
            <hr>
            <?php
                if(isset($_GET['status'])){
                    $status = $_GET['status'];
                    if($status == 'error'){
                        echo '<div class="card bg-danger">
                        <div class="card-body text-white">
                            <div class="d-flex flex-row">
                                <div class="display-9 align-self-center"><i class="ti-calendar"></i></div>
                                <div class="p-1 align-self-center text-center">
                                    <h5 class="mb-0 text-white">Username หรือ Password ไม่ถูกต้อง !</h5>
                                   
                                </div>
                                
                            </div>
                        </div>
                    </div>';
                    }else{

                    }
                }
            ?>
            <form class="mt-3" action="process/loginact.php" method="post">
                <div class="form-group">

                    <input type="text" class="form-control p-4" name="t_username" placeholder="เลขประจำตัวประชาชน"
                        style="border-radius:100px">

                    <input type="password" class="form-control mt-4 p-4" id="nametext" name="t_password"
                        placeholder="รหัสผ่าน" style="border-radius:100px">

                    <button type="submit" name="submit" class="btn btn-rounded btn-block btn-dribbble mt-4 p-3"
                        style="font-size:16px">ลงชื่อเข้าใช้</button>

                </div>
            </form>
        </div>

    </div>



    <!-- Mobile -->

    <div class="loginsm d-xl-none" style="font-family:'Kanit';padding-top:80px">

        <div class="container-fluid p-4 m-4"
            style="background:white;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;border-radius:10px">
            <p align="center"><img src="./img/logos.png" class="img-fluid" width="50%" alt=""></p>

            <h1 align="center" style="font-weight:bold;font-size:45px">ลงชื่อเข้าใช้</h1>
            <p align="center" class="">YRC E-Document ระบบสารบรรณคำสั่งอิเล็กทรอนิกส์อัจฉริยะ</p>
            <hr>
            <form class="mt-3" action="process/loginact.php" method="post">
                <div class="form-group">

                    <input type="text" class="form-control p-4" name="t_username" placeholder="เลขประจำตัวประชาชน"
                        style="border-radius:100px">

                    <input type="password" class="form-control mt-4 p-4" id="nametext" name="t_password"
                        placeholder="รหัสผ่าน" style="border-radius:100px">

                    <button type="submit" name="submit" class="btn btn-rounded btn-block btn-dribbble mt-4 p-3"
                        style="font-size:16px">ลงชื่อเข้าใช้</button>

                </div>
            </form>
        </div>

    </div>







    <?php
        require_once './components/jslink.php';
    ?>

</body>

</html>