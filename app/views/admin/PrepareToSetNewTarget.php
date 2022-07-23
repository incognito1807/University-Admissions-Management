<?php
    foreach($data['inforMajorEnrollment'] as $key => $major) 
    {
        echo '<div class="header_list_major">';
            echo '<h3>Thông tin cập nhật điểm tuyển sinh</h3>';
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
                    echo '<h4 class="title_infor">Chỉ tiêu hiện tại:</h4>';
                    echo '<div class="value_infor">'.$major['target'].'</div>';
                echo '</div>';
                
                echo '<form autocomplete="off" action="'.BASE_PATH.'/StatisticController/setNewTargetByHand/'
                            .trim($major['majorId']).'" method="POST">';
                    echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Chỉ tiêu mới:</h4>';
                        echo '<input 
                                autocomplete="off" 
                                id="newTarget" 
                                class="new-input" 
                                name="newTarget" 
                                placeholder="" 
                                type="number" 
                                step="1" 
                                value="" 
                                required
                            >';
                        echo '<input 
                                type="submit" 
                                id="btn-update-target" 
                                value="Xác nhận" 
                                class="move-btn b-green" 
                                style="margin-left: 8px;"
                            >';
                    echo '</div>';
                echo '</form>';

                echo '<div class="row_infor">';
                    echo '<h4 class="title_infor">Số thí sinh dự tuyển:</h4>';
                    echo '<div class="value_infor">'.$data['countStatistic'].'</div>';
                echo '</div>';
                if($data['countStatistic'] != 0 && $major['new_benchmark'] == 0) 
                {
                    echo '<div class="row_infor">';
                        echo '<h4 class="title_infor">Điểm trúng tuyển hiện tại:</h4>';
                        echo '<div class="value_infor">Chưa có</div>';
                    echo '</div>';
                } 
                else if($data['countStatistic'] != 0 && $major['new_benchmark'] != 0) 
                {
                    echo '<div class="row_infor">';
                        echo '<h4 class="title_infor">Điểm trúng tuyển hiện tại:</h4>';
                        echo '<div class="value_infor">'.$major['new_benchmark'].'</div>';
                    echo '</div>';
                }
            echo '</div>';
            ?>
            <div id="chart-prepare" style="width: 800px; height: 400px; margin: 0 auto; display: block;"></div>
            <?php
        echo '</div>';
    }
    echo '</div>';
?>