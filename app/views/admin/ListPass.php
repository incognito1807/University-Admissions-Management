<?php
    foreach($data['inforMajorEnrollment'] as $key => $major) 
    {
        echo '<div class="header_list_major">';
            echo '<h3>Danh sách trúng tuyển</h3>';
        echo '</div>';
        
        echo '<div style="display: flex">';
            echo '<div class="infor_statistic">';
                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Tên trường:</h4>';
                    echo '<div class="value_infor">'.$major['university_name'].'</div>';
                echo '</div>';
                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Tên ngành:</h4>';
                    echo '<div class="value_infor">'.$major['major_name'].'</div>';
                echo '</div>';
                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Mã ngành:</h4>';
                    echo '<div class="value_infor">'.$major['majorId'].'</div>';
                echo '</div>';
                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Khối thi:</h4>';
                    echo '<div class="value_infor">'.$major['block'].'</div>';
                echo '</div>';
                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Điểm chuẩn năm trước:</h4>';
                    echo '<div class="value_infor">'.$major['old_benchmark'].'</div>';
                echo '</div>';
                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Chỉ tiêu:</h4>';
                    echo '<div class="value_infor">'.$major['target'].'</div>';
                    echo '<button class="btn_change_target move-btn b-green" style="margin-left: 7px">
                            <a href="'.BASE_PATH.'/StatisticController/changeTarget/'
                            .trim($major['majorId']).'">Thay đổi chỉ tiêu</a>
                        </button>';
                echo '</div>';
                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Số thí sinh dự tuyển:</h4>';
                    echo '<div class="value_infor">'.$data['countStatistic'].'</div>';
                echo '</div>';
                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Điểm trúng tuyển hiện tại:</h4>';
                    if($data['countStatistic'] != 0 && $major['new_benchmark'] == 0 && $data['newBenchmark'] == 0) 
                    {
                        echo '<div class="value_infor">Chưa có</div>';
                    } 
                    else 
                    {
                        echo '<div class="value_infor">'.$data['newBenchmark'].'</div>';
                    }
                    echo '<button class="btn_update_benchmark move-btn b-green">
                            <a href="'.BASE_PATH.'/StatisticController/prepareToSetNewBenchmark/'
                            .trim($major['majorId']).'">Cập nhật</a>
                        </button>';
                echo '</div>';
                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Số thí sinh trúng tuyển:</h4>';
                    echo '<div class="value_infor">'.count($data['listPassMajor']).'</div>';
                echo '</div>';
            echo '</div>';
            ?>
            <div id="chart-pass" style="width: 800px; height: 400px; margin: 0 auto; display: block;"></div>
            <?php
        echo '</div>';
    }
    echo '</div>';
?>

<div class="main_list_major">
    <table class="table_major">
        <thead class="head_table_major">
            <tr>
                <th class="width-5">STT</th>
                <th>Họ và tên</th>
                <th>Số CMND</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Điểm dự tuyển</th>
                <th>Thứ tự nguyện vọng</th>
            </tr>
        </thead>
        <tbody class="body_table_major">
            <?php
                $index_order = 0;
                $grades = array();
                foreach($data['listPassMajor'] as $key => $studentPass) 
                {
                    $index_order++;
                    if($index_order %2 == 1)
                    {
                        echo '<tr style="background: #e8e8e9;">';
                    }
                    else if($index_order %2 == 0) 
                    {
                        echo '<tr>';
                    }
                    array_push($grades, round($studentPass['apply_grade'], 2));
            ?>
                <td class="center"><?php echo $index_order?></td>
                <td class="left"><?php echo $studentPass['fullname']?></td>
                <td class="left"><?php echo $studentPass['username']?></td>
                <td class="center"><?php echo $studentPass['sex']?></td>
                <td class="left"><?php echo date("d/m/Y", strtotime($studentPass['date_of_birth']))?></td>
                <td class="left"><?php echo $studentPass['email']?></td>
                <td class="left"><?php echo $studentPass['phone_number']?></td>
                <td class="center"><?php echo round($studentPass['apply_grade'], 2)?></td>
                <td class="center"><?php echo $studentPass['expectation_order']?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<script>
    var arrayGrade = <?php echo json_encode($grades); ?>;
    var step = 0.25;
    var chardId = 'chart-pass';
</script>
<script src="<?php echo BASE_PATH ?> /public/js/Chart.js"></script>