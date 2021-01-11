<?php
    require_once './connect/connect.php';

    function boxstatus() {
        if(isset($_GET['status'])){
            $status = $_GET['status'];
            if($status == 'success'){
                echo '<br><div class="alert alert-success" role="alert">
                        บันทึกข้อมูลสำเร็จ
                    </div>';
            }else if ($status == 'error'){
                echo '<br><div class="alert alert-danger" role="alert">
                        บันทึกข้อมูลไม่สำเร็จ
                    </div>';
            }
        }
    }

?>
