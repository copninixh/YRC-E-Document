<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <div class="user-profile position-relative" style="background: url(./assets/images/background/bg2.jpg);">
            <!-- User profile image -->
            <div class="text-left" style="margin-left: 20px;">
                <br>
                <?php 
                    if($_SESSION['t_pic'] == ''){
                ?>
                    <img src="assets/images/users/logo.jpg" alt="user" class="w-50 rounded-circle" />
                <?php }else{ ?>
                    <img src="assets/images/users/<?php echo $_SESSION['t_pic']; ?>" width="" class="w-50 rounded-circle" />
                <?php } ?>
                <br>
                <br>
            </div>
            <!-- User profile text-->
            <div class="profile-text pt-1">
                <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block" data-toggle="dropdown"
                    role="button" aria-haspopup="true" aria-expanded="true">
                    <?php echo $_SESSION['t_title']; echo $_SESSION['t_name']; ?></a>
                <div class="dropdown-menu animated flipInY">
                    <a href="profile.php" class="dropdown-item"><i class="ti-user"></i> โปรไฟล์</a>
                    <div class="dropdown-divider"></div>
                    <a href="process/logout.php" class="dropdown-item"><i class="fa fa-power-off"></i>
                        ออกจากระบบ</a>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">ระบบแผนงาน</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="calendar.php"
                        aria-expanded="false">
                        <i class="mdi mdi-calendar"></i><span class="hide-menu">ปฏิทิน</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="todo.php" aria-expanded="false">
                        <i class="mdi mdi-clipboard-text"></i><span class="hide-menu">สิ่งที่ต้องทำ</span>
                    </a>
                </li>

                <?php if($_SESSION['t_permission'] == '1'){ ?>
                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">ระบบบริหารจัดการ</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_teacher.php"
                        aria-expanded="false">
                        <i class="mdi mdi-sitemap"></i>
                        <span class="hide-menu">บริหารจัดการครู</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_news.php"
                        aria-expanded="false">
                        <i class="mdi mdi-newspaper"></i>
                        <span class="hide-menu">บริหารจัดการข่าวสาร</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_document.php"
                        aria-expanded="false">
                        <i class="mdi mdi-book-multiple"></i>
                        <span class="hide-menu">บริหารจัดการเอกสาร</span>
                    </a>
                </li>

                <?php } else{?>
                

                <?php }?>
                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">ระบบเอกสาร/คำสั่ง</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="document.php" aria-expanded="false">
                        <i class="mdi mdi-book-minus"></i>
                        <span class="hide-menu">เอกสารคำสั่งของฉัน</span>
                    </a>
                </li>

                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">เกี่ยวกับระบบ</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin.php" aria-expanded="false">
                        <i class="mdi mdi-xml"></i>
                        <span class="hide-menu">ทีมพัฒนา</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="policy.php"
                        aria-expanded="false">
                        <i class="mdi mdi-xml"></i>
                        <span class="hide-menu">นโยบายเว็บไซต์</span>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>