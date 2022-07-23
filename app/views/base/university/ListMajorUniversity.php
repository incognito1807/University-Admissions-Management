<?php
    $t = 0;
    foreach($data as $key => $uni) 
    {
        if($t == 0) 
        {
            echo '<h3 class="header_list_major">Các ngành của trường '.$uni['university_name'].'</h3>';
        }
        $t = 1;
    }
?>

<div class="main_list_major">
    <table class="table_major">
        <thead class="head_table_major">
            <tr>
                <th>Số thứ tự</th>
                <th>Mã ngành</th>
                <th>Tên ngành</th>
                <th>Khối</th>
                <th>Điểm chuẩn năm trước</th>
                <th>Điểm chuẩn năm nay</th>
                <th>Chỉ tiêu tuyển sinh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class="body_table_major">            
            <?php
                $row = 0;
                foreach($data as $key => $uni) 
                {
                    $row += 1;
                    if($row %2 == 1)
                    {
                        echo '<tr style="background: #e8e8e9;">';
                    }
                    else if($row %2 == 0) 
                    {
                        echo '<tr>';
                    }
            ?>
                <td class="center"><?php echo $row?></td>
                <td class="center"><?php echo $uni['majorId']?></td>
                <td class="left"><?php echo $uni['major_name']?></td>
                <td class="center"><?php echo $uni['block']?></td>
                <td class="center"><?php echo $uni['old_benchmark']?></td>

                <?php 
                    if ($uni['new_benchmark'] == 0) 
                    {
                ?>
                    <td class="center">Chưa có</td>
                <?php 
                    } 
                    else 
                    {
                ?>
                    <td class="center"><?php echo $uni['new_benchmark']?></td>
                <?php 
                    }
                ?>

                <td class="center"><?php echo $uni['target']?></td>

                <?php 
                    if (session_status() === PHP_SESSION_NONE) 
                    {
                        session_start();
                    }
                    if (session::get('permission') == 0) 
                    { 
                        // echo "<script>console.log('Debug Objects: " . session::get('permission') . "' );</script>";
                ?>
                    <td class="center"><button class="move-btn b-green"><a class="min-w-150" href="<?php echo BASE_PATH ?>/ExpectationController/addExpectation/
                                        <?php echo trim($uni['majorId'])?>">Thêm nguyện vọng</a></button></td>
                <?php 
                    } 
                ?>

                <?php
                    if (session::get('permission') == 1) 
                    { 
                ?>
                    <td class="center"><button class="move-btn min-w-150 b-green"><a class="min-w-150" href="<?php echo BASE_PATH ?>/StatisticController/listStatisticEnrollment/
                                        <?php echo trim($uni['majorId'])?>">Quản lý tuyển sinh</a></button></td>
                <?php 
                    } 
                ?>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
