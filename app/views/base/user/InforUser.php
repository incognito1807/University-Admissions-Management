<!-- <?php 
    $url = $_SERVER['REQUEST_URI'];    
    $msg = substr($url, strrpos($url, '?') + 1);
    $id = substr($url, strrpos($url, '=') + 1);
    if($msg == 'msg='.$id) 
    {
        if($id == 0) 
        {
            echo '<span style="color: blue; font-weight: bold;">Sửa thông tin thất bại!</span>';
        } 
        elseif($id == 1) 
        {
            echo '<span style="color: blue; font-weight: bold;">Sửa thông tin thành công!</span>';
        }
    }
?> -->

<?php
    foreach($data as $key => $user) 
    {
?>

<div class = "infor_body">
    <div class="main-infor">
        <h2>Phiếu dự thi</h2>
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
                        <td>Địa chỉ thường trú: </td>
                        <td><?php echo $user['domicile']?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ tạm trú: </td>
                        <td><?php echo $user['address']?></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><?php echo $user['email']?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại: </td>
                        <td><?php echo $user['phone_number']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>