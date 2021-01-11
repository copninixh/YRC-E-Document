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
                                <h3 class="text-danger" style="font-weight: 600;">เอกสารคำสั่งที่ได้รับของ : <?php echo $_SESSION['t_title'].$_SESSION['t_name']; ?></h3>
                                <hr>
                                <div class="row draggable-cards" id="draggable-area">
                                        <?php 
                                            $sql2 = "SELECT * FROM resultdoc WHERE t_id = '$_SESSION[t_id]' AND r_status = '2'";
                                            $result2 = mysqli_query($conn,$sql2);
                                            $i = 0;
                                            while($row2 = mysqli_fetch_array($result2)){
                                            $i++;
                                        ?>
                                            <?php
                                                $sqldoc2 = "SELECT * FROM document WHERE d_id = '$row2[d_id]'";
                                                $query2 = mysqli_query($conn,$sqldoc2);
                                                while($fetch2 = mysqli_fetch_array($query2)){
                                                ?>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="card card-hover">
                                                        <div class="card-header bg-danger">
                                                            <h4 class="mb-0 text-white">คำสั่งที่ <?php echo $fetch2[1] ?></h4></div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <img src="img/logok.jpg" class="img-fluid w-100" alt="">
                                                                </div>
                                                                <div class="col-xl-10">
                                                                    <h3 class="card-title text-danger">เรื่อง <?php echo $fetch2['d_name']; ?></h3>
                                                                    
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <p class="card-text" style="font-size: 16px;"><b class="text-danger" style="font-weight: 600;">วันที่ไปปฏิบัติหน้าที่</b> <?php echo $fetch2['d_datestart'] ?></p>
                                                            <p class="card-text" style="font-size: 16px;"><b class="text-danger" style="font-weight: 600;">วันสิ้นสุดปฏิบัติหน้าที่</b> <?php echo $fetch2['d_dateend'] ?></p>
                                                            <hr>
                                                            <a href="detail_document.php?d_id=<?php echo $fetch2[0] ?>" class="btn btn-inverse w-100">ดูรายละเอียดเพิ่มเติม</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <?php }?>
                                        <?php }?>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="50px" class="text-center">ลำดับที่</th>
                                                <th width="200px">หมายเลขเอกสาร</th>
                                                <th width="400px">ชื่อเอกสาร</th>
                                                <th class="text-center" width="100px">รายละเอียด</th>
                                              
                                              
                                         
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sql = "SELECT * FROM resultdoc WHERE t_id = '$_SESSION[t_id]' AND r_status = '2'";
                                            $result = mysqli_query($conn,$sql);
                                            $i = 0;
                                            while($row = mysqli_fetch_array($result)){
                                            $i++;
                                            
                                        
                                        
                                        ?>
                                            <tr>
                                                <?php
                                                    $sqldoc = "SELECT * FROM document WHERE d_id = '$row[d_id]'";
                                                    $query = mysqli_query($conn,$sqldoc);
                                                    while($fetch = mysqli_fetch_array($query)){

                                                    
                                                ?>
                                                    <td class="text-center"><?php echo $i; ?></td>
                                                    <td><?php echo $fetch[1]; ?></td>
                                                    <td><?php echo $fetch['d_name']; ?></td>
                                                    <td><a href="detail_document.php?d_id=<?php echo $fetch2[0] ?>" class="btn btn-danger w-100">ดูรายละเอียดเพิ่มเติม</a></td>
                                                <?php }?>
                                                
                                      
                                            </tr>

                                            <?php }?>
 

                                        </tbody>

                                    </table>
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