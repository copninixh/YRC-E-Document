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
      
            <div class="email-app todo-box-container">
                        <!-- ============================================================== -->
                        <!-- Left Part -->
                        <!-- ============================================================== -->
                        <div class="left-part list-of-tasks">
                            <a class="ti-menu ti-close btn btn-success show-left-part d-block d-md-none" href="javascript:void(0)"></a>
                            <div class="scrollable" style="height:100%;">
                                <div class="p-3">
                                    <a class="waves-effect waves-light btn btn-info d-block" href="javascript: void(0)" id="add-task">เพิ่มสิ่งที่ต้องทำ</a>
                                </div>
                                <div class="divider"></div>
                                <ul class="list-group">
                                    <li>
                                        <small class="p-3 grey-text text-lighten-1 db">รายการ</small>
                                    </li>
                                    <?php
                                        $sqlnum = "SELECT * FROM todo WHERE teacher_id = '$_SESSION[t_id]'";
                                        $resultnum = mysqli_query($conn,$sqlnum);
                                        $num = mysqli_num_rows($resultnum);

                                        
                                    ?>
                                    <li class="list-group-item p-0 border-0">
                                        <a href="javascript:void(0)" class="todo-link active list-group-item-action p-3 d-block" id="all-todo-list"><i class="mdi mdi-format-list-bulleted"></i> สิ่งที่ต้องทำทั้งหมด <span class="todo-badge badge badge-info float-right"></span></a>
                                    </li>
                                    <li class="list-group-item p-0 border-0">
                                        <a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block" id="current-task-important"> <i class="mdi mdi-star"></i> สำคัญ <span class="todo-badge badge badge-warning float-right"></span></a>
                                    </li>
                                    <li class="list-group-item p-0 border-0">
                                        <a href="javascript:void(0)" class="todo-link list-group-item-action p-3 d-block" id="current-task-done"> <i class="mdi mdi-send"></i> เสร็จสิ้น <span class="todo-badge badge badge-success float-right"></span></a>
                                    </li>
                                    <li class="list-group-item p-0 border-0">
                                        <hr>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- Right Part -->
                        <!-- ============================================================== -->
                        <div class="right-part mail-list bg-white overflow-auto">
                            <div id="todo-list-container">
                                <div class="p-3 border-bottom">
                                    <div class="input-group searchbar">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="search"><i class="icon-magnifier text-muted"></i></span>
                                        </div>
                                        <input type="text" class="form-control w-100" placeholder="ค้นหา" aria-describedby="search">
                                    </div>
                                </div>
                                <!-- Todo list-->
                                <div class="todo-listing">
                                    <div id="all-todo-container" class="p-3">
                                  
                           
                                    <?php boxstatus();?>
                      

                                    <?php
                                        $sql = "SELECT * FROM todo WHERE teacher_id = '$_SESSION[t_id]'";
                                        $result = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_array($result)){

                                        
                                    ?>
                                        <!-- Item 1 -->
                                        <div class="todo-item all-todo-list p-3 border-bottom position-relative 
                                        <?php 
                                            if($row['t_status'] == '0'){
                                                    echo '';
                                            }else if($row['t_status'] == '1'){
                                                echo 'current-task-done';
                                            }
                                            
                                        ?>

                                        <?php 
                                            if($row['t_lable'] == '1'){
                                                echo 'current-task-important';
                                            }else{
                                                echo '';
                                            }
                                        ?>

                                            
                                        "
                                       
                                        >
                                            <div class="inner-item d-flex align-items-start">
                                                <div class="w-100">
                                                    <!-- Checkbox -->
                                                    <div class="checkbox checkbox-info d-flex align-items-start">
                                                        <form method="post" action="process/update_status.php">
                                                        <input type="text" class="d-none" name="t_id" value="<?php echo $row['t_id']; ?>">
                                                            <input type="text" class="d-none" name="t_status" 
                                                            value="<?php 
                                                                        if($row['t_status'] == '0'){
                                                                                echo '1';
                                                                        }else if($row['t_status'] == '1'){
                                                                            echo '0';
                                                                        }
                                                                        
                                                                    ?>">
                                                            <!--input type="checkbox" name="submit" class="material-inputs" id="checkbox1">
                                                            <label-- class="custom-control-label" for="checkbox1"></label-->

                                                            <button name="insert" class="btn btn-outline-danger btn-sm" style="margin-right:10px ;">
                                                                <?php 
                                                                    if($row['t_status'] == '0'){
                                                                            echo '&nbsp;';
                                                                    }else if($row['t_status'] == '1'){
                                                                        echo '<i class="mdi mdi-check"></i>';
                                                                    }
                                                                ?>
                                                            </button>

                                                        </form>
                                                        
                                                        
                                                        <div>
                                                            <div class="content-todo">
                                                               
                                            <h5 class="font-medium font-16 todo-header mb-0" data-todo-header="<?php echo $row['t_name'];  ?>"> <?php echo $row['t_name'];  ?> <?php 
                                            if($row['t_lable'] == '1'){ ?>
                                                    <i class="mdi mdi-star text-warning"></i>
                                                <?php }else{?>

                                                <?php }?>
                                            </h5>
                                                                    <div class="todo-subtext text-muted" 
                                                                    data-todosubtext-html="<p><?php echo $row['t_detail'];  ?> </p>" 
                                                                    data-todosubtextText='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. \n"}]}'>
                                                                    <?php echo $row['t_detail'];  ?>
                                                                </div>
                                                                <span class="todo-time font-12 text-muted"><i class="icon-calender mr-1"></i><?php echo $row['t_date'];  ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <div class="dropdown-action">
                                                                <div class="dropdown todo-action-dropdown">
                                                                    <button class="btn btn-link text-dark p-1 dropdown-toggle text-decoration-none todo-action-dropdown" type="button" id="more-action-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="icon-options-vertical"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-action-1">
                                                                        
                                                                        <button type="button" class="edit dropdown-item" data-toggle="modal"
                                                                            data-target="#info-header-moda33l<?php echo $row[0] ?>">
                                                                            <i class="fas fa-edit text-warning"></i> แก้ไข
                                                                        </button>

                                                                        <div id="info-header-moda33l<?php echo $row[0] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header modal-colored-header bg-warning">
                                                                                        <h4 class="modal-title text-white" id="info-header-modalLabel">แก้ไขคณะผู้บริหาร/ครู/บุคลากร/</h4>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                    </div>
                                                                                    <div class="modal-body text-left">

                                                                                        <form action="process/edit_teacher.php" method="post" enctype="multipart/form-data">
                                                                                            <h4><i class="fas fa-user-edit"></i> ส่วนที่ 1 ข้อมูลส่วนบุคคล</h4>
                                                                                            <hr>
                                                                                            <div class="form-group row m-b-15">
                                                                                                <label class="col-form-label col-md-2">ไอดี
                                                                                                </label>
                                                                                                <div class="col-md-10">
                                                                                                    <input type="text"
                                                                                                        class="form-control m-b-5"
                                                                                                        value="<?php echo $row[0]; ?>"
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
                                                                                                        <option>
                                                                                                            <?php echo $row['t_title']; ?>
                                                                                                        </option>
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

                                                                        <a class="remove dropdown-item" href="process/delete_todo.php?t_id=<?php echo $row[0]; ?>"><i class="far fa-trash-alt text-danger mr-1"></i>ลบทิ้ง</a>
                                                                        <a class="dropdown-item permanent-delete" href="javascript:void(0);"><i class="fas fa-trash text-danger mr-1"></i>Permanent Delete</a>
                                                                        <a class="dropdown-item revive" href="javascript:void(0);"><i class="fas fa-undo-alt text-success mr-1"></i>Revive Task</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Content -->											
                                                </div>
                                            </div>
                                        </div> <!-- ./Item 1 -->
                                    <?php }?>
                                       
                                        
                                       
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="todoShowListItem" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content border-0">
                                                <div class="modal-header bg-light">
                                                    <h5 class="modal-title task-heading"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="compose-box">
                                                        <div class="compose-content">
                                                            <label class="mb-0 font-16">รายละเอียดสิ่งที่ต้องทำ</label>
                                                            <p class="task-text text-muted"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger btn-block" data-dismiss="modal">ปิด</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content border-0">
                                        <div class="modal-header bg-info text-white">
                                            <h5 class="modal-title text-white">เพิ่มสิ่งที่ต้องทำ</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="compose-box">
                                                <div class="compose-content" id="addTaskModalTitle">
                                                    <form method="post" action="process/add_todo.php">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="d-flex mail-to mb-4">
                                                                    <div class="w-100">
                                                                        <input id="task" type="text" placeholder="หัวข้อ" class="form-control" name="t_name" required>
                                                                        <span class="validation-text"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="d-flex">
                                                                    <div class="w-100  mail-to mb-4">
        
                                                                        <input class="form-control" name="t_date" type="date" id="example-date-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="d-flex">
                                                                    <div class="w-100  mail-to mb-4">
        
                                                                    <select class="form-control" name="t_lable">
                                                                        <option value="2">เลือกลำดับความสำคัญ</option>
                                                                 
                                                                        <option value="1">สำคัญ</option>
                                                                        <option value="2">ทั่วไป</option>
                                                                     
                                                                    </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row d-none">
                                                            <div class="col-md-12">
                                                                <div class="d-flex mail-to mb-4">
                                                                    <div class="w-100">
                                                                        <input id="task" type="text" class="form-control" name="teacher_id" value="<?php echo $_SESSION['t_id']; ?>" readonly>
                                                                        <span class="validation-text"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row d-none">
                                                            <div class="col-md-12">
                                                                <div class="d-flex mail-to mb-4">
                                                                    <div class="w-100">
                                                                        <input id="task" type="text" class="form-control" name="t_status" value="0" readonly>
                                                                        <span class="validation-text"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex  mail-subject mb-4">
                                                            <div class="w-100">
                                                                <textarea name="t_detail" id="taskdescription" class="w-100"></textarea>
                                                                
                                                                <span class="validation-text"></span>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>

                                                        <input type="submit" name="Insert" class="btn btn-success w-100" value="เพิ่มสิ่งที่ต้องทำ">


                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> ปิด</button>
                                            
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