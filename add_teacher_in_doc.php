<?php
  session_start();
  include("connect/connect.php");
  include("function.php");
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
                                    if(isset($_GET['id'])){
                                        $d_id = filter_input(INPUT_GET , 'id' , FILTER_SANITIZE_NUMBER_INT);
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
                                        <h3 class="text-danger mt-2">ประมวลผลรายนามคณะครู เอกสารคำสั่งที่ <?php echo $row['d_number']; ?><br>เรื่อง <?php echo $row['d_name']; ?></h3>
                                    </div>
                                    
                                </div>
                                <hr>

                                <?php boxstatus(); ?>

                                

                                <div class="row">
                                    <div class="col-xl-6">
                                        <h4>1. อัพโหลดเอกสารไฟล์รูปภาพ ทีละไฟล์</h4>
                                        <form action="process/add_document_process2.php" method="post" enctype="multipart/form-data">
                                            <div class="input-group mb-3">
                                                <input type="text" class="d-none" readonly value="<?php echo $row[0]; ?>" name="d_id">
                                                <input type="text" class="d-none" readonly value="<?php echo $row['d_datestart']; ?>" name="d_datestart">
                                                <input type="text" class="d-none" readonly value="<?php echo $row['d_dateend']; ?>" name="d_dateend">
                                                <input type="text" class="d-none" readonly value="<?php echo $row['d_name']; ?>" name="d_name">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">อัพโหลดเอกสาร</span>
                                                </div>

                                                <div class="custom-file">
                                                    <input type="file" name="d_pic" class="custom-file-input" id="inputGroupFile01" required>
                                                    <label class="custom-file-label" for="inputGroupFile01">ยังไม่มีไฟล์</label>

                                                    
                                                </div>
                                                <input type="submit" name="submit" class="btn btn-success w-100 mt-2" value="อัพโหลดไฟล์">
                                            </div>
                                            <p style="font-size: 15px;"><b style="font-weight: 600;" class="text-danger">หมายเหตุ : </b> เอกสารที่นำมาประมวลผลภาพจะรองรับเฉพาะไฟล์สกุล Jpg, jpeg และ png เป็นภาพที่มาจากการสแกนอย่างน้อย 200 dpi ขนาดไม่เกิน 1 MB.</p>
                                        </form>
                                        <hr>
                                        <h4>2. อัพโหลดเอกสาร(PDF)</h4>
                                        <form action="process/updoc.php" method="post" enctype="multipart/form-data">
                                            <div class="input-group mb-3">
                                                <input type="text" class="d-none" readonly value="<?php echo $row[0]; ?>" name="d_id">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">อัพโหลดเอกสาร</span>
                                                </div>

                                                <div class="custom-file">
                                                    <input type="file" name="d_pic" class="custom-file-input" id="inputGroupFile01" required>
                                                    <label class="custom-file-label" for="inputGroupFile01">ยังไม่มีไฟล์</label>

                                                    
                                                </div>
                                                <input type="submit" name="submit" class="btn btn-success w-100 mt-2" value="อัพโหลดไฟล์">
                                            </div>
                                           
                                        </form>

                                        <?php
                                            if($row['d_pic'] == '0'){
                                                echo '<p style="font-size: 15px;"><b style="font-weight: 600;" class="text-danger">ยังไม่ได้อัพโหลดเอกสาร</b></p>';
                                                echo '<p class="text-center"><img src="img/notfound.png" class="img-fluid w-50 text-center"></p>';
                                            }else{
                                               
                                        ?>
                                         <p style="font-size: 15px;"><b style="font-weight: 600;" class="text-danger">เอกสารที่อัพโหลด</b></p>
                                        <div class="embed-responsive" style="padding-bottom: 141.42%;">
                                            <object class="embed-responsive-item" data="doc/<?php echo $row['d_pic']; ?>" type="application/pdf" internalinstanceid="9" title="">
                                            </object>
                                        </div>

                                        <?php }?>
                                 
                                       
                                   
                                
                                       

                                    </div>

                                    <div class="col-xl-6">
                                    <?php
                                            $sqlt2 = "SELECT * FROM resultdoc WHERE d_id = '$row[0]'";
                                            $query2 = mysqli_query($conn,$sqlt2);
                                            $numt = mysqli_num_rows($query2);
                                        ?>
                                        <h4>3. ผลการประมวลผล</h4>
                                        <h5><b class="text-danger" style="font-weight: 600;">ชื่อครู/บุคลากร ที่ตรวจพบในเอกสาร : </b> <?php echo $numt; ?> คน มีรายนามดังนี้</h5>
                                        <?php
                                            if(isset($_GET['t_id'])){
                                                $t_id = filter_input(INPUT_GET , 't_id' , FILTER_SANITIZE_NUMBER_INT);
                                                $sqlert = "SELECT * FROM teacher WHERE t_id = '$t_id'";
                                                $rete = mysqli_query($conn,$sqlert);
                                                
                                                while($fett = mysqli_fetch_array($rete)){
                                                    echo '<div class="alert alert-danger" role="alert">'.'มีชื่อ '.$fett['t_title'].$fett['t_name'].' อยู่แล้ว'.'</div>';
                                                }
                                            }
                                        ?>
                                        <a href="input_auto.php?d_id=<?php echo $row[0]; ?>" class="btn btn-info w-100">เพิ่มรายชื่อครู</a>

                                        
                                      
                                            <form action="process/add_document_process3.php" method="post">
                                                <div class="table-responsive mt-1">
                                                    <table id="zero_config" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="50px" class="text-center">ลำดับที่</th>
                                                                <th>ชื่อครู/บุคลากร</th>
                                                                <th class="text-center">สถานะ</th>
                                                                <th width="100px" class="text-center">ลบ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                    

                                                    <?php 
                                                        $sqlresult = "SELECT * FROM resultdoc WHERE d_id = '$row[0]'";
                                                        $queryresult = mysqli_query($conn,$sqlresult);
                                                        $i = 0;
                                                        while($fetchre = mysqli_fetch_array($queryresult)){

                                                        
                                                    ?>
                                                    
                                                    
                                                        <?php
                                                            $sqlret = "SELECT * FROM teacher WHERE t_id = '$fetchre[t_id]'";
                                                            $queryret = mysqli_query($conn,$sqlret);
                                                            
                                                            while($fetchret = mysqli_fetch_array($queryret)){
                                                            $i++;
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $i; ?></td>
                                                                <td><?php echo $fetchret['t_title'].$fetchret['t_name']; ?></td>
                                                                <td class="text-center">
                                                                    <?php 
                                                                        if($fetchre['r_status'] == '1'){
                                                                            echo '<a href="#" class="btn btn-outline-danger">ไม่ยืนยัน</a>';
                                                                        }else{
                                                                            echo '<a href="#" class="btn btn-success">ส่งเอกสารให้ครูแล้ว</a>';
                                                                        }

                                                                    ?>
                                                                </td>
                                                                <td class="text-center"><a href="process/delete_teacher_after_process.php?t_id=<?php echo $fetchret[0]; ?>&d_id=<?php echo $fetchre['d_id']; ?>" class="btn btn-danger">ลบชื่อครู</a></td>
                                                                
                                                            </tr>

                                                            
                                                            <div class="d-none">
                                                                <input type="text" value="<?php echo $fetchret[0] ?>" name="t_id">
                                                                <input type="text" value="<?php echo $row[0] ?>" name="d_id">
                                                                <input type="text" value="<?php echo $fetchre[0] ?>" name="r_id">
                                                                <input type="text" value="2" name="t_status"><br>
                                                    
                                                            </div>
                                                            
                                                    
                                                        
                                                        <?php }?>

                                                    <?php }?>
                                                    
                                                
                                                    </tbody>

                                                    </table>
                                                </div>
                                                    <button name="submit" class="btn btn-danger w-100 mt-2"><i class="mdi mdi-check"></i> ยืนยันการส่งเอกสาร</button>
                                            </form>
                                    
                                    </div>

                                    <!--div class="col-xl-6">
                                        <h4>อัพโหลดเอกสารแบบ หลายไฟล์</h4>
                                        <form action="#" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>    
                                        </form>
                                        <p style="font-size: 15px;"><b style="font-weight: 600;" class="text-danger">หมายเหตุ : </b> เอกสารที่นำมาประมวลผลภาพจะรองรับเฉพาะไฟล์สกุล Jpg, jpeg และ png เป็นภาพที่มาจากการสแกนอย่างน้อย 200 dpi ขนาดไม่เกิน 1 MB.</p>
                                    </!--div-->
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