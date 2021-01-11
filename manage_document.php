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
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#info-header-modal">
                                    เพิ่มเอกสาร
                                </button>
                                <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-info">
                                                <h4 class="modal-title text-white" id="info-header-modalLabel">
                                                    เพิ่มเอกสาร/คำสั่ง/ราชการ</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="process/add_document_process1.php" method="post"
                                                    enctype="multipart/form-data">
                                                    <h4><i class="fas fa-user-edit"></i> ส่วนที่ 1 ข้อมูลทั่วไปของเอกสาร</h4>
                                                    <hr>                                                
                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">เลขเอกสาร</label>
                                                        <div class="col-md-10">
                                                            <?php
                                                                $y = date("Y")+543;
                                                            ?>
                                                            <input type="text" class="form-control m-b-5" placeholder="เลขเอกสาร ที่ 0000/<?php echo $y; ?>" value="/<?php echo $y; ?>" name="d_number" required="">
                                                      
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">ชื่อเอกสาร </label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control m-b-5"
                                                                placeholder="ชื่อเอกสาร" name="d_name" required="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">วัน/เดือน/ปี ที่อัพโหลด </label>
                                                        <div class="col-md-10">
                                                            <?php
                                                                $yaer = date("Y")+543;
                                                                $m = date("m");
                                                                $d = date("d");
                                                            ?>
                                                            <input type="text" class="form-control m-b-5"
                                                                value="<?php echo $d . '/' . $m . '/' .$yaer; ?>"
                                                                name="d_date" required="" readonly>
                                                        </div>
                                                    </div>

                                                    <h4><i class="fas fa-user-edit"></i> ส่วนที่ 2 รายละเอียด</h4>
                                                    <hr>     

                                                    <div class="row">
                                                        <label class="col-form-label col-md-2">วันที่ไปปฏิบัติงาน (เริ่ม) </label>
                                                            <div class="col-md-10">
                                                                <div class="d-flex">
                                                                    <div class="w-100  mail-to mb-4">
        
                                                                        <input class="form-control" name="d_datestart" type="date" id="example-date-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>

                                                    <div class="row">
                                                        <label class="col-form-label col-md-2">วันที่ไปปฏิบัติงาน (สิ้นสุด) </label>
                                                            <div class="col-md-10">
                                                                <div class="d-flex">
                                                                    <div class="w-100  mail-to mb-4">
        
                                                                        <input class="form-control" name="d_dateend" type="date" id="example-date-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>



                                                    <div class="form-group row mb-4">
                                                        <label class="col-form-label col-md-2">รายละเอียดเอกสาร </label>
                                                        <div class="col-md-10">
                                                            <div class="w-100">
                                                                <textarea name="d_detail" id="taskdescription" class="w-100"></textarea>
                                                                    
                                                                <span class="validation-text"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                 
                                                    <input type="submit" class="btn btn-success w-100 mt-1" name="Insert"
                                                        value="เพิ่มข้อมูล">
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-dismiss="modal">Close</button>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <br>
                             
                                <br>
                           
                                <?php boxstatus();?>
                                <hr>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="50px" class="text-center">ลำดับที่</th>
                                                <th width="200px">หมายเลขเอกสาร</th>
                                                <th width="400px">ชื่อเอกสาร</th>
                                                <th width="300px">วัน/เดือน/ปี การปฏิบัติหน้าที่</th>
                                              
                                                <th width="300px" class="text-center">อัพโหลด/ประมวลผล</th>
                                                <th width="100px" class="text-center">แก้ไข</th>
                                                <th width="100px" class="text-center">ลบ</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sql = "SELECT * FROM document ORDER BY d_id ASC";
                                            $result = mysqli_query($conn,$sql);
                                            $i = 0;
                                            while($row = mysqli_fetch_array($result)){
                                            $i++;
                                            
                                        
                                        
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td><?php echo $row[1]; ?></td>
                                                <td><?php echo $row['d_name']; ?></td>
                                                <td>
                                                    <p><b class="text-danger" style="font-weight: 600;">วันที่เริ่มปฏิบัติหน้าที่ : </b> <?php echo $row['d_datestart']; ?></p>
                                                    
                                                    <p><b class="text-danger" style="font-weight: 600;">วันที่สิ้นสุดการปฏิบัติหน้าที่ : </b> <?php echo $row['d_dateend']; ?></p>
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger">สีแดง ยังไม่เสร็จ</span>
                                                    <br>
                                                    <span class="badge badge-success">สีเขียว เรียบร้อย</span>
                                                    <br>

                                                    
                                                   
                                                    
            
                                                    <?php
                                                        $sqlcheck = "SELECT * FROM resultdoc WHERE d_id = '$row[d_id]'";
                                                        $query = mysqli_query($conn,$sqlcheck);
                                                        $numcheck = mysqli_num_rows($query);

                                                        if($numcheck > 0){
                                                            $data = 'btn-success';
                                                        }else{
                                                            $data = 'btn-danger';
                                                        }
                                                    ?>
                                                    <a href="add_teacher_in_doc.php?id=<?php echo $row[0]; ?>" class="btn <?php echo $data; ?> mt-1">1.เพิ่ม/บริหารจัดการบุคลากร</a>
                                                </td>
                                                <td class="">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#info-header-modal<?php echo $row[0] ?>">
                                                        <i class="fas fa-edit"></i> แก้ไข
                                                    </button>
                                                    <div id="info-header-modal<?php echo $row[0] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header modal-colored-header bg-warning">
                                                                    <h4 class="modal-title text-white" id="info-header-modalLabel">
                                                                        แก้ไขเอกสาร/คำสั่ง/ราชการ</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="process/edit_document.php" method="post"
                                                                        enctype="multipart/form-data">
                                                                        <h4><i class="f
                                                                        as fa-user-edit"></i> ส่วนที่ 1 ข้อมูลทั่วไปของเอกสาร</h4>
                                                                        <hr>     
                                                                        <div class="form-group row m-b-15 d-none">
                                                                            <label class="col-form-label col-md-2">ไอดีเอกสาร</label>
                                                                            <div class="col-md-10">
                                                                                
                                                                                <input type="text" class="form-control m-b-5" value="<?php echo $row['d_id']; ?>" name="d_id" required="">
                                                                        
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label class="col-form-label col-md-2">เลขเอกสาร</label>
                                                                            <div class="col-md-10">
                                                                                <?php
                                                                                    $y = date("Y")+543;
                                                                                ?>
                                                                                <input type="text" class="form-control m-b-5" value="<?php echo $row['d_number']; ?>" name="d_number" required="">
                                                                        
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label class="col-form-label col-md-2">ชื่อเอกสาร </label>
                                                                            <div class="col-md-10">
                                                                                <input type="text" class="form-control m-b-5"
                                                                                    placeholder="ชื่อเอกสาร" name="d_name" required="" value="<?php echo $row['d_name']; ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label class="col-form-label col-md-2">วัน/เดือน/ปี ที่อัพโหลด (แก้ไขเพิ่มเติม) </label>
                                                                            <div class="col-md-10">
                                                                                <?php
                                                                                    $yaer = date("Y")+543;
                                                                                    $m = date("m");
                                                                                    $d = date("d");
                                                                                ?>
                                                                                <input type="text" class="form-control m-b-5"
                                                                                    value="<?php echo $d . '/' . $m . '/' .$yaer; ?>"
                                                                                    name="d_date" required="" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <h4><i class="fas fa-user-edit"></i> ส่วนที่ 2 รายละเอียด</h4>
                                                                        <hr>     

                                                                        <div class="row">
                                                                            <label class="col-form-label col-md-2">วันที่ไปปฏิบัติงาน (เริ่ม) </label>
                                                                                <div class="col-md-10">
                                                                                    <div class="d-flex">
                                                                                        <div class="w-100  mail-to mb-4">
                                                                                            <p><b class="text-danger">วันที่เริ่มปฏิบัติงาน : </b> <?php echo $row['d_datestart']; ?></p>
                                                                                            <input class="form-control" name="d_datestart" type="date" value="" id="example-date-input">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <label class="col-form-label col-md-2">วันที่ไปปฏิบัติงาน (สิ้นสุด) </label>
                                                                                <div class="col-md-10">
                                                                                    <div class="d-flex">
                                                                                        <div class="w-100  mail-to mb-4">
                                                                                            <p><b class="text-danger">วันสิ้นสุดปฏิบัติงาน : </b> <?php echo $row['d_dateend']; ?></p>
                                                                                            <input class="form-control" name="d_dateend" type="date" id="example-date-input">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>



                                                                        <div class="form-group row mb-4">
                                                                            <label class="col-form-label col-md-2">รายละเอียดเอกสาร </label>
                                                                            <div class="col-md-10">
                                                                                <div class="w-100">
                                                                                    <textarea name="d_detail" id="taskdescription2" class="w-100">
                                                                                        <?php echo $row['d_detail']; ?>
                                                                                    </textarea>
                                                                                        
                                                                                    <span class="validation-text"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    
                                                                        <input type="submit" class="btn btn-warning w-100 mt-1" name="Insert"
                                                                            value="แก้ไขข้อมูล">
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light"
                                                                        data-dismiss="modal">Close</button>

                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                </td>
                                                <td class="text-center"><a href="process/delete_document.php?d_id=<?php echo $row[0] ?>" class="btn btn-danger"><i
                                                            class="fas fa-trash-alt"></i> ลบ</a></td>
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