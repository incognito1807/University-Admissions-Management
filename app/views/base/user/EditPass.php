
<?php
    foreach($data as $key => $user) 
    {
?>
<div id="notice"></div>

<script src="<?php echo BASE_PATH ?> /public/js/Notice.js"></script>
<div class="main_edit_pass">
    <h3 class="header_edit_pass">Đổi mật khẩu</h3>
    <form action="<?php echo BASE_PATH ?>/UserController/authenticationEditPass" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label>Họ và tên: </label>
                </td>
                <td>
                    <?php echo $user['fullname']?>            
                </td>
            </tr>
            <tr>
                <td>
                    <label>Số chứng minh nhân dân: </label>
                </td>
                <td>
                    <?php echo $user['username']?>            
                </td>
            </tr>
            <tr>
                <td>
                    <label>Mật khẩu cũ: </label>
                </td>
                <td>
                    <input class="input-pass" type="password" name="old_pass" required>        
                </td>
            </tr>
            <tr>
                <td>
                    <label>Mật khẩu mới: </label>
                </td>
                <td>
                    <input class="input-pass" type="password" name="new_pass1" required>  
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nhập lại mật khẩu mới: </label>
                </td>
                <td>
                    <input class="input-pass" type="password" name="new_pass2" required>          
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="span-edit">
                    <?php 
                        $url = $_SERVER['REQUEST_URI'];    
                        $msg = substr($url, strrpos($url, '?') + 1);
                        $id = substr($url, strrpos($url, '=') + 1);
                        if($msg == 'msg='.$id) 
                        {
                            if($id == 2) 
                            {
                                echo "<script type='text/javascript'>
                                    notice ({ 
                                        message: 'Mật khẩu cũ sai!',
                                        type: 'warning',
                                        duration: 4000
                                    });
                                </script>";
                                echo '<span style="color: blue; font-weight: bold;">Mật khẩu cũ sai!</span>';
                            } 
                            elseif($id == 3) 
                            {
                                echo "<script type='text/javascript'>
                                    notice ({ 
                                        message: 'Mật khẩu mới không khớp!',
                                        type: 'warning',
                                        duration: 4000
                                    });
                                </script>";
                                echo '<span style="color: blue; font-weight: bold;">Mật khẩu mới không khớp!</span>';
                            }
                        }
                    ?>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <button type="reset" class="move-btn btn-big b-yellow"><a href="<?php echo BASE_PATH ?>/LoginController/dashboard">Hủy</a></button>
                </td>
                <td style="padding-left: 20px;">
                    <button type="submit" class="move-btn btn-big b-green">Cập nhật</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php 
    }
?>