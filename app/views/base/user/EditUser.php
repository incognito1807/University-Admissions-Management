<!-- <h2>Sửa phiếu dự thi</h2>
<?php
    foreach($data as $key => $user) 
    {
?>
    <div>
        <label>Họ và tên: </label>
        <?php echo $user['fullname']?>
    </div>
    <div>
        <label>Số chứng minh nhân dân: </label>
        <?php echo $user['username']?>
    </div>
    <div>
        <label>Giới tính: </label>
        <?php echo $user['sex']?>
    </div>
    <div>
        <label>Ngày sinh: </label>
        <?php echo $user['date_of_birth']?>
    </div>
    <div>
        <label>Địa chỉ thường trú: </label>
        <input type="text" value="<?php echo $user['domicile']?>" name="domicile">
    </div>
    <div>
        <label>Địa chỉ tạm trú: </label>
        <input type="text" value="<?php echo $user['address']?>" name="address">
    </div>
    <div>
        <label>Email: </label>
        <input type="text" value="<?php echo $user['email']?>" name="email">
    </div>
    <div>
        <label>Số điện thoại: </label>
        <input type="text" value="<?php echo $user['phone_number']?>" name="phone_number">
    </div>
<?php 
    }
?> -->

<?php
    foreach($data as $key => $user) 
    {
?>

<form action="<?php echo BASE_PATH ?>/UserController/updateUser" method="POST" enctype="multipart/form-data">
    <div class = "infor_body">
        <div class="form-w3-agile">
            <div class="main-infor">
                <h2>Sửa phiếu dự thi</h2>
                <div class="personal-infor">
                    <img src="<?php echo BASE_PATH?>/public/img/user/<?php echo $user['user_image']?>" alt="personal-view" class="personal-img"/>
                    <div class="infor">
                        <h4>Học sinh/ Student</h4> <hr/>
                        <table class="table_infor">
                            <tr>
                                <td>Số CMND:</td>
                                <td><?php echo $user['username']?></td>
                            </tr>
                            <tr>
                                <td>Họ và tên:</td>
                                <td><?php echo $user['fullname']?></td>
                            </tr>
                            <tr>
                                <td>Giới tính:</td>
                                <td><?php echo $user['sex']?></td>
                            </tr>
                            <tr>
                                <td>Ngày sinh:</td>
                                <td><?php echo $user['date_of_birth']?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                
                <div class="others-details">
                    <div class="infor">
                        <table class="table_infor">
                            <tr>
                                <td><label>Địa chỉ thường trú: </label></td>
                                <td><input type="text" value="<?php echo $user['domicile']?>" name="domicile" class="fix_infor"></td>
                            </tr>
                            <tr>
                                <td><label>Địa chỉ tạm trú: </label></td>
                                <td><input type="text" value="<?php echo $user['address']?>" name="address" class="fix_infor"></td>
                            </tr>
                            <tr>
                                <td><label>Email: </label></td>
                                <td><input type="text" value="<?php echo $user['email']?>" name="email" class="fix_infor"></td>
                            </tr>
                            <tr>
                                <td><label>Số điện thoại: </label></td>
                                <td><input type="text" value="<?php echo $user['phone_number']?>" name="phone_number" class="fix_infor"></td>
                            </tr>
                        </table>
                        <div class="submit_edit_infor">
                            <button type="reset" class="move-btn btn-big b-yellow"><a href="<?php echo BASE_PATH ?>/UserController/getInforUser">Hủy</a></button>
                            <button type="submit" class="move-btn btn-big b-green">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
    }
?>