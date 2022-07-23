<div class="topnav" id="myTopnav">
    <a class="menu-item" href="<?php echo BASE_PATH ?>/LoginController/dashboard">Trang chủ</a>

    <?php
        if (session_status() === PHP_SESSION_NONE) 
        {
            session_start();
        }
        if (session::get('permission') == 0) 
        { 
    ?>
        <div class="dropdown">
            <button class="dropbtn">Phiếu dự thi ▼ </button>
            <div class="dropdown-content">
                <a class="menu-item" href="<?php echo BASE_PATH ?>/UserController/getInforUser">Xem phiếu dự thi</a>
                <a class="menu-item" href="<?php echo BASE_PATH ?>/UserController/editUser">Sửa phiếu dự thi</a>
            </div>
        </div>
    <?php 
        } 
    ?>

    <a class="menu-item" href="<?php echo BASE_PATH ?>/UniversityController/listUniversity">Tra cứu</a>

    <?php 
        if (session::get('permission') == 0) 
        { 
    ?>
        <a class="menu-item" href="<?php echo BASE_PATH ?>/ExpectationController/listExpectation">Xem nguyện vọng</a>
    <?php 
        } 
    ?>
    
    <a class="menu-item" href="<?php echo BASE_PATH ?>/UserController/searchGrade">Tra cứu điểm</a>

    <div class="dropdown">
        <button class="dropbtn">Tài khoản ▼ </button>
        <div class="dropdown-content">
            <a class="menu-item" href="<?php echo BASE_PATH ?>/UserController/editPass">Đổi mật khẩu</a>
            <a class="menu-item" href="<?php echo BASE_PATH ?>/LoginController/logout">Đăng xuất</a>
        </div>
    </div>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="checkMenu()">`&#9776;`</a>
    <script src="<?php echo BASE_PATH ?>/public/js/menu.js"></script>

    <form class="search_form" method="POST" action="<?php echo BASE_PATH?>/MajorController/searchMajor">
        <input class="searchTerm" type="text" name="search_major" placeholder="Tìm ngành..." />
    </form>

    <form class="search_form" method="POST" action="<?php echo BASE_PATH?>/UniversityController/searchUniversity">
        <input class="searchTerm" type="text" name="search_uni" placeholder="Tìm trường..." />
    </form>
</div>

<div class="content">