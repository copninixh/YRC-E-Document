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
                                    เพิ่มข่าว
                                </button>
                                <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-info">
                                                <h4 class="modal-title text-white" id="info-header-modalLabel">เพิ่มข่าว
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="process/add_news.php" method="post"
                                                    enctype="multipart/form-data">

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">พาดหัวข่าว </label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control m-b-5"
                                                                placeholder="พาดหัวข่าว" name="n_name" required="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">วัน/เดือน/ปี </label>
                                                        <div class="col-md-10">
                                                            <?php
                                                                $yaer = date("Y")+543;
                                                                $m = date("m");
                                                                $d = date("d");
                                                            ?>
                                                            <input type="text" class="form-control m-b-5"
                                                                value="<?php echo $d . '/' . $m . '/' .$yaer; ?>"
                                                                name="n_date" required="">
                                                        </div>
                                                    </div>



                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">ประเภทข่าว</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control" name="n_ref" id="n_ref"
                                                                required="">
                                                                <option value="1">ข่าวประชาสัมพันธ์ทั่วไป</option>
                                                                <option value="2">ข่าวแจ้งจากผู้พัฒนา</option>
                                                                <option value="3">ข่าวด่วน</option>
                                                                <option value="4">อื่นๆ</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-form-label col-md-2">รายละเอียดข่าว</label>
                                                        <div class="col-md-10">
                                                            <textarea name="n_detail" class="summernote">

                                                                </textarea>
                                                        </div>
                                                    </div>

                                                    <input type="submit" class="btn btn-success w-100" name="Insert"
                                                        value="เพิ่มข่าว">
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
                                                <th>ชื่อข่าว</th>
                                                <th>วัน/เดือน/ปี</th>
                                                <th>ประเภทข่าว</th>
                                                <th width="100px" class="text-center">แก้ไข</th>
                                                <th width="100px" class="text-center">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sql = "SELECT * FROM news ORDER BY n_id ASC";
                                            $result = mysqli_query($conn,$sql);
                                            $i = 0;
                                            while($row = mysqli_fetch_array($result)){
                                            $i++;
                                            
                                        
                                        
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td><?php echo $row['n_name']; ?></td>
                                                <td><?php echo $row['n_date']; ?></td>
                                                <td><?php
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
                                                                ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#info-header-modal<?php echo $row[0]; ?>">
                                                        แก้ไขข่าว
                                                    </button>
                                                    <div id="info-header-modal<?php echo $row[0]; ?>" class="modal fade"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="info-header-modalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div
                                                                    class="modal-header modal-colored-header bg-warning">
                                                                    <h4 class="modal-title text-white"
                                                                        id="info-header-modalLabel">เพิ่มข่าว</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="process/edit_news.php" method="post"
                                                                        enctype="multipart/form-data">

                                                                        <div class="form-group row m-b-15 d-none">
                                                                            <label
                                                                                class="col-form-label col-md-2">พาดหัวข่าว
                                                                            </label>
                                                                            <div class="col-md-10">
                                                                                <input type="text"
                                                                                    class="form-control m-b-5"
                                                                                    value="<?php echo $row['n_id']; ?>"
                                                                                    placeholder="พาดหัวข่าว" name="n_id"
                                                                                    required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">พาดหัวข่าว
                                                                            </label>
                                                                            <div class="col-md-10">
                                                                                <input type="text"
                                                                                    class="form-control m-b-5"
                                                                                    value="<?php echo $row['n_name']; ?>"
                                                                                    placeholder="พาดหัวข่าว"
                                                                                    name="n_name" required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">วัน/เดือน/ปี
                                                                            </label>
                                                                            <div class="col-md-10">


                                                                                <input type="text"
                                                                                    class="form-control m-b-5"
                                                                                    value="<?php echo $row['n_date']; ?>"
                                                                                    name="n_date" required="">
                                                                            </div>
                                                                        </div>



                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">ประเภทข่าว</label>
                                                                            <div class="col-md-10">
                                                                                <select class="form-control"
                                                                                    name="n_ref" id="n_ref" required="">
                                                                                    <option
                                                                                        value="<?php echo $row['n_ref']; ?>"> <?php
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
                                                                ?></option>
                                                                                    <option value="1">
                                                                                        ข่าวประชาสัมพันธ์ทั่วไป</option>
                                                                                    <option value="2">
                                                                                        ข่าวแจ้งจากผู้พัฒนา</option>
                                                                                    <option value="3">ข่าวด่วน</option>
                                                                                    <option value="4">อื่นๆ</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row m-b-15">
                                                                            <label
                                                                                class="col-form-label col-md-2">รายละเอียดข่าว</label>
                                                                            <div class="col-md-10">

                                                                                <textarea name="n_detail"
                                                                                    class="summernote">
                                                                                        <?php echo $row['n_detail']; ?>
                                                                                    </textarea>
                                                                            </div>
                                                                        </div>

                                                                        <input type="submit"
                                                                            class="btn btn-success w-100" name="submit"
                                                                            value="แก้ไขข่าว">
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
                                                <td class="text-center"><a
                                                        href="process/delete_news.php?news_id=<?php echo $row[0] ?>"
                                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
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