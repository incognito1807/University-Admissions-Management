<div class="main_login">
    <div class="left_login">
        <form autocomplete="off" action="<?php echo BASE_PATH?>/LoginController/authenticationLogin" method="POST">
            <p>Đăng nhập</p>
            <?php
                $url = $_SERVER['REQUEST_URI'];    
                $msg = substr($url, strrpos($url, '?') + 1);
                $id = substr($url, strrpos($url, '=') + 1);
                if($msg == 'msg='.$id) 
                {
                    if($id == 0) 
                    {
                        echo '<span class style="color: blue; font-weight: bold;">Sai thông tin đăng nhập</span>';
                    }
                }
            ?>
            <input autocomplete="off" id="userName" class="login_input" name="username" placeholder=" Số CMND" type="text" value="" required>
            <input autocomplete="off" id="passWord" class="login_input" name="password" placeholder=" Mật khẩu" type="password" value="" required>
            <i class="far fa-eye" id="togglePassword" onclick="showPass()"></i>
            <input type="submit" id="btn-dangnhap" value="ĐĂNG NHẬP" class="btn-dangnhap">
        </form>
    </div>
    <div class="right_login">
        <div >
            <h3>Thông báo</h3>
        </div>
        <div id="divscroll" >
            <ul>
                <li>Thí sinh chưa có Mã đăng nhập vui lòng liên hệ Điểm tiếp nhận hồ sơ nơi nộp hồ sơ đăng ký dự thi để lấy mã đăng nhập.</li>
                <li>
                    Thí sinh sử dụng trình duyệt Chrome trên Điện thoại không đăng nhập được hệ thống thực hiện như sau:
                    <br>
                    &nbsp;- Với máy chạy hệ điều hành IOS(Iphone/Ipad):
                        Vào biểu tượng (… ) trên trình duyệt, tiếp đến vào Cài đặt (Setting) &gt;  Băng thông (Bandwith) &gt; tại mục Tải trước trang web(Preload Webpage) chọn không bao giờ (Nerver). Để đăng nhập vào hệ thống bình thường.
                    <br>
                    &nbsp;- Với máy chạy hệ điều hành Androi (Samsung/ Vinsmart/ Huawei/ Xiaomi/ Oppo…):
                        Vào biểu tượng (… ) trên trình duyệt, tiếp đến vào Cài đặt (Setting) &gt;  Tại tab Nâng cao (Advance) tìm đến mục Chế độ thu gọn (Compact mode). Chọn Tắt (Off). Để đăng nhập vào hệ thống bình thường.
                </li>
            </ul>
        </div>
    </div>
</div>

<script src="<?php echo BASE_PATH ?> /public/js/ShowPass.js"></script>
    
