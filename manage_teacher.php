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
                                    เพิ่มคณะผู้บริหาร/ครู/บุคลากร
                                </button>
                                <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-info">
                                                <h4 class="modal-title text-white" id="info-header-modalLabel">
                                                    เพิ่มคณะผู้บริหาร/ครู/บุคลากร</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="process/add_teacher.php" method="post"
                                                    enctype="multipart/form-data">
                                                    <h4><i class="fas fa-user-edit"></i> ส่วนที่ 1 ข้อมูลส่วนบุคคล</h4>
                                                    <hr>
                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">คำนำหน้าชื่อ</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control" name="t_title" id="t_title"
                                                                required="">

                                                                <option>นางสาว</option>
                                                                <option>นาง</option>
                                                                <option>นาย</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">ชื่อ-สกุล </label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control m-b-5"
                                                                placeholder="ชื่อ-สกุล" name="t_name" required="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label
                                                            class="col-form-label col-md-2">กลุ่มสาระการเรียนรู้</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control" name="t_group" id="t_group"
                                                                required="">

                                                                <option>ฝ่ายบริหาร</option>
                                                                <option>กลุ่มสาระการเรียนรู้ภาษาไทย</option>
                                                                <option>กลุ่มสาระการเรียนรู้คณิตศาสตร์</option>
                                                                <option>กลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี
                                                                </option>
                                                                <option>กลุ่มสาระการเรียนรู้สังคมศึกษา ศาสนา และวัฒนธรรม
                                                                </option>
                                                                <option>กลุ่มสาระการเรียนรู้สุขศึกษาและพลศึกษา</option>
                                                                <option>กลุ่มสาระการเรียนรู้ศิลปะ</option>
                                                                <option>กลุ่มสาระการเรียนรู้การงานอาชีพ</option>
                                                                <option>กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ ก</option>
                                                                <option>กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ ข</option>
                                                                <option>กิจกรรมพัฒนาผู้เรียน</option>
                                                                <option>ฝ่ายส่งเสริมการเรียนการสอน</option>
                                                                <option>กลุ่มครูจ้างสอน</option>
                                                                <option>กลุ่มลูกจ้างประจำ</option>
                                                                <option>กลุ่มเจ้าหน้าที่สำนักงาน</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">วิทยฐานะ</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control" name="t_position"
                                                                id="t_position" required="">

                                                                <option>เชี่ยวชาญ</option>
                                                                <option>ชำนาญการพิเศษ</option>
                                                                <option>ชำนาญการ</option>
                                                                <option>-</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">สถานะการใช้งาน</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control" name="t_position"
                                                                id="t_position" required="">

                                                                <option value="2">ผู้ใช้งานทั่วไป</option>
                                                                <option value="1">ผู้ดูแลระบบ</option>

                                                            </select>
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

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">รูปโปร์ไฟล์</label>
                                                        <div class="col-md-10">
                                                            <input type="file" class="form-control m-b-5"
                                                                onchange="readURL(this);" name="t_pic">
                                                            <br>
                                                            <img id="blah" class="img-fluid w-50 text-center" src="#"
                                                                alt="your image" />
                                                        </div>
                                                    </div>





                                                    <input type="submit" class="btn btn-success w-100" name="Insert"
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
                          
                                <?php boxstatus();?>
                                <hr>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="50px" class="text-center">ลำดับที่</th>
                                                <th>ชื่อ</th>
                                                <th>กลุ่มสาระการเรียนรู้</th>
                                                <th>วิทยฐานะ</th>
                                                <th width="100px" class="text-center">แก้ไข</th>
                                                <th width="100px" class="text-center">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sql = "SELECT * FROM teacher ORDER BY t_id ASC";
                                            $result = mysqli_query($conn,$sql);
                                            $i = 0;
                                            while($row = mysqli_fetch_array($result)){
                                            $i++;
                                            
                                        
                                        
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td><?php echo $row['t_title'].$row['t_name']; ?></td>
                                                <td><?php echo $row['t_group']; ?></td>
                                                <td><?php echo $row['t_position'] ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#info-header-modal<?php echo $row[0] ?>">
                                                        <i class="fas fa-edit"></i> แก้ไข
                                                    </button>
                                                    <div id="info-header-modal<?php echo $row[0] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header modal-colored-header bg-warning">
                                                                    <h4 class="modal-title text-white" id="info-header-modalLabel">
                                                                        แก้ไขคณะผู้บริหาร/ครู/บุคลากร
                                                                    </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body text-left">

                                                                    <form action="process/edit_teacher.php"
                                                                        method="post" enctype="multipart/form-data">
                                                                        <h4><i class="fas fa-user-edit"></i> ส่วนที่ 1 ข้อมูลส่วนบุคคล</h4>
                                                                        <hr>
                                                                        <div class="form-group row m-b-15">
                                                                            <label class="col-form-label col-md-2">ไอดี
                                                                            </label>
                                                                            <div class="col-md-10">
                                                                                <input type="text"
                                                                                    class="form-control m-b-5"
                                                                                    value="<?php echo $row['t_id']; ?>"
                                                                                    name="t_id" required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">คำนำหน้าชื่อ</label>
                                                                            <div class="col-md-10">
                                                                                <select class="form-control"
                                                                                    name="t_title" id="t_title"
                                                                                    required="">
                                                                                    <option><?php echo $row['t_title']; ?></option>
                                                                                    <option>นางสาว</option>
                                                                                    <option>นาง</option>
                                                                                    <option>นาย</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">ชื่อ-สกุล
                                                                            </label>
                                                                            <div class="col-md-10">
                                                                                <input type="text"
                                                                                    class="form-control m-b-5"
                                                                                    value="<?php echo $row['t_name']; ?>"
                                                                                    name="t_name" required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">กลุ่มสาระการเรียนรู้</label>
                                                                            <div class="col-md-10">
                                                                                <select class="form-control"
                                                                                    name="t_group" id="t_group"
                                                                                    required="">
                                                                                    <option>
                                                                                        <?php echo $row['t_group']; ?>
                                                                                    </option>

                                                                                    <option>
                                                                                        ฝ่ายบริหาร
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มสาระการเรียนรู้ภาษาไทย
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มสาระการเรียนรู้คณิตศาสตร์
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มสาระการเรียนรู้สังคมศึกษา
                                                                                        ศาสนา และวัฒนธรรม
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มสาระการเรียนรู้สุขศึกษาและพลศึกษา
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มสาระการเรียนรู้ศิลปะ
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มสาระการเรียนรู้การงานอาชีพ
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ
                                                                                        ก
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มสาระการเรียนรู้ภาษาต่างประเทศ
                                                                                        ข
                                                                                    </option>

                                                                                    <option>
                                                                                        กิจกรรมพัฒนาผู้เรียน
                                                                                    </option>

                                                                                    <option>
                                                                                        ฝ่ายส่งเสริมการเรียนการสอน
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มครูจ้างสอน
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มลูกจ้างประจำ
                                                                                    </option>

                                                                                    <option>
                                                                                        กลุ่มเจ้าหน้าที่สำนักงาน
                                                                                    </option>

                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">วิทยฐานะ</label>
                                                                            <div class="col-md-10">
                                                                                <select class="form-control"
                                                                                    name="t_position" id="t_position"
                                                                                    required="">
                                                                                    <option>
                                                                                        <?php echo $row['t_position']; ?>
                                                                                    </option>
                                                                                    <option>เชี่ยวชาญ</option>
                                                                                    <option>ชำนาญการพิเศษ</option>
                                                                                    <option>ชำนาญการ</option>
                                                                                    <option>-</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">สถานะการใช้งาน</label>
                                                                            <div class="col-md-10">
                                                                                <select class="form-control"
                                                                                    name="t_permission"
                                                                                    id="t_permission" required="">
                                                                                    <option
                                                                                        value="<?php echo $row['t_permission']; ?>">
                                                                                        <?php
                                                                                                            if($row['t_permission'] == '1'){
                                                                                                                echo 'ผู้ดูแลระบบ';
                                                                                                            }else{
                                                                                                                echo 'ผู้ใช้งานทั่วไป';
                                                                                                            }
                                                                                                        ?>
                                                                                    </option>
                                                                                    <option value="2">ผู้ใช้งานทั่วไป
                                                                                    </option>
                                                                                    <option value="1">ผู้ดูแลระบบ
                                                                                    </option>

                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <script type="text/javascript">
                                                                            function readURL(input) {
                                                                                if (input.files && input.files[0]) {
                                                                                    var reader = new FileReader();

                                                                                    reader.onload = function(e) {
                                                                                        $('#blah2').attr('src', e.target.result);
                                                                                    }

                                                                                    reader.readAsDataURL(input.files[0]);
                                                                                }
                                                                            }
                                                                        </script>


                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">รูปโปร์ไฟล์</label>
                                                                            <div class="col-md-10">
                                                                                <input type="file"
                                                                                    class="form-control m-b-5"
                                                                                    onchange="readURL(this);"
                                                                                    name="t_pic">
                                                                                <?php 
                                                                                    if($row['t_pic'] == ''){                                      
                                                                                ?>
                                                                                <br>
                                                                              
                                                                                <h6 class="text-danger">หมายเหตุ : ยังไม่ได้อัพโหลดรูป</h6>
                                                                                <?php }else{ ?>
                                                                                <br>
                                                                                <img src="assets/images/users/<?php echo $row['t_pic'] ?>"
                                                                                    class="img-fluid w-50">
                                                                                <h5>*หมายเหตุ : รูปปัจจุบัน</h5>


                                                                                <?php }?>
                                                                                <img id="blah2"
                                                                                    class="img-fluid w-50 text-center"
                                                                                    src="#" alt="รูปภาพคุณ" />
                                                                            </div>
                                                                        </div>

                                                                        <input type="submit"
                                                                            class="btn btn-warning w-100" name="Insert"
                                                                            value="แก้ไข">
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
                                                <td class="text-center">
                                                    <a href="process/delete_teacher.php?teacher_id=<?php echo $row[0] ?>" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i> 
                                                        ลบ
                                                    </a>
                                                </td>
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
        require_once'./components/jslink.php';
    ?>

</body>

</html>

<?php } ?>