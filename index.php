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
                                    <h4>ยินดีต้อนรับ <?php echo $_SESSION['t_title'].$_SESSION['t_name']; ?></h4>
                                   
                                    <hr>
                                  
                                    <div class="row">
                                    <?php 
                                        $sql = "SELECT * FROM news ORDER BY n_id DESC";
                                        $result = mysqli_query($conn,$sql);
                                        $num = mysqli_num_rows($result);
                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                        <div class="col-lg-3">
                                            <div class="card" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);">
                                                                <?php
                                                                    if($row['n_ref'] == '1'){
                                                                        echo '<img class="card-img-top img-fluid" src="assets/images/news1.jpg" alt="Card image cap">';
                                                                    }else if($row['n_ref'] == '2'){
                                                                        echo '<img class="card-img-top img-fluid" src="assets/images/news2.jpg" alt="Card image cap">';
                                                                    }else if($row['n_ref'] == '3'){
                                                                        echo '<img class="card-img-top img-fluid" src="assets/images/news3.jpg" alt="Card image cap">';
                                                                    }else if($row['n_ref'] == '4'){
                                                                        echo '<img class="card-img-top img-fluid" src="assets/images/news4.jpg" alt="Card image cap">';
                                                                    }else{
                                                                        echo 'OUT';
                                                                    }
                                                                ?>      
                                                
                                                <div class="card-body" >
                                                    <div class="d-flex no-block align-items-center mb-3">
                                                        <span><i class="ti-calendar"></i> <?php echo $row['n_date']; ?></span>
                                                        <div class="ml-auto">
                                                            <a href="javascript:void(0)" class="link"><i class="ti-comments"></i> 
                                                                <?php
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
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h3 class="font-normal text-danger"><?php echo $row['n_name']; ?></h3>
                                                    <!--p class="mb-0 mt-2">Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</!--p-->
                                                    <a href="news_detail.php?news_id=<?php echo $row[0]; ?>" class="btn btn-success btn-rounded waves-effect waves-light mt-3 w-100">อ่านต่อ</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                    
                                    </div>

                                    <h5>จำนวนข่าวสารทั้งหมด <?php echo $num; ?> รายการ</h5>
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