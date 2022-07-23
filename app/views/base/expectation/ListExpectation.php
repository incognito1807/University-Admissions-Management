<h3 class="header_list_major">Danh sách nguyện vọng</h3>
        <div id="notice"></div>

<script src="<?php echo BASE_PATH ?> /public/js/Notice.js"></script>


<?php
    function getGradeDueToBlock($userGrade, $block) 
    {
        $sumGrade = 0;
        $sumGrade += $userGrade[$GLOBALS['BlockConfig'][$block]['first']];
        $sumGrade += $userGrade[$GLOBALS['BlockConfig'][$block]['second']];
        $sumGrade += $userGrade[$GLOBALS['BlockConfig'][$block]['third']];
        return $sumGrade;
    }

    function checkValidBlock($userGrade, $block) 
    {
        if($userGrade[$GLOBALS['BlockConfig'][$block]['first']] == 0)
            return false;
        if($userGrade[$GLOBALS['BlockConfig'][$block]['second']] == 0)
            return false;
        if($userGrade[$GLOBALS['BlockConfig'][$block]['third']] == 0)
            return false;
        return true;
    }

    $t = 0;
    foreach($data['gradeList'] as $key => $userGrade) 
    {
        if($t == 0) 
        {
            $grade['A00'] = getGradeDueToBlock($userGrade, 'A00');
            $grade['B00'] = getGradeDueToBlock($userGrade, 'B00');
            $grade['C00'] = getGradeDueToBlock($userGrade, 'C00');
            $grade['D00'] = getGradeDueToBlock($userGrade, 'D00');
            $grade['D01'] = getGradeDueToBlock($userGrade, 'D00');
            $grade['A01'] = getGradeDueToBlock($userGrade, 'A01');
            echo '<div style="display: block;
                            margin-top: 20px;
                            margin-bottom: 20px;">';
                echo '<div class="span_grade">Điểm dự tuyển của bạn là: ';
                if(checkValidBlock($userGrade, 'A00'))
                {
                    echo '<div style="padding-left: 30px;">Khối A00: <span class="c-green">'.$grade['A00'].'</span></div>';
                }
                if(checkValidBlock($userGrade, 'B00'))
                {
                    echo '<div style="padding-left: 30px;">Khối B00: <span class="c-green">'.$grade['B00'].'</span></div>';
                }
                if(checkValidBlock($userGrade, 'C00'))
                {
                    echo '<div style="padding-left: 30px;">Khối C00: <span class="c-green">'.$grade['C00'].'</span></div>';
                }
                if(checkValidBlock($userGrade, 'D00'))
                {
                    echo '<div style="padding-left: 30px;">Khối D01: <span class="c-green">'.$grade['D01'].'</span></div>';
                }
                if(checkValidBlock($userGrade, 'A01'))
                {
                    echo '<div style="padding-left: 30px;">Khối A01: <span class="c-green">'.$grade['A01'].'</span></div>';
                }
            echo '</div>';
            $t++;
        }
    }
?>

<?php 
    $url = $_SERVER['REQUEST_URI'];    
    $msg = substr($url, strrpos($url, '?') + 1);
    $id = substr($url, strrpos($url, '=') + 1);
    if($msg == 'msg='.$id) 
    {
        $notice = null;
        if($id == 0) 
        {
            echo '<div class="span_notification">Xóa nguyện vọng thất bại!</div>';
            echo "<script type='text/javascript'>
                notice ({ 
                    message: 'Xóa nguyện vọng thất bại!',
                    type: 'warning',
                    duration: 4000
                });
            </script>";
        } 
        elseif($id == 1) 
        {
            echo '<div class="span_notification">Xóa nguyện vọng thành công!</div>';
            echo "<script type='text/javascript'>
                notice ({ 
                    message: 'Xóa nguyện vọng thành công!',
                    type: 'success',
                    duration: 4000
                });
            </script>";
        } 
        elseif($id == 2) 
        {
            echo '<div class="span_notification">Nguyện vọng này đã được thêm trước đó!</div>';
            echo "<script type='text/javascript'>
                notice ({ 
                    message: 'Nguyện vọng này đã được thêm!',
                    type: 'warning',
                    duration: 4000
                });
            </script>";
        } 
        elseif($id == 3) 
        {
            echo '<div class="span_notification">Thêm nguyện vọng thành công!</div>';
            echo "<script type='text/javascript'>
                notice ({ 
                    message: 'Thêm nguyện vọng thành công!',
                    type: 'success',
                    duration: 4000
                });
            </script>";
        } 
        elseif($id == 4) 
        {
            echo '<div class="span_notification">Không thêm được nguyện vọng do khối thi của bạn không phù hợp!</div>';
            echo "<script type='text/javascript'>
                notice ({ 
                    message: 'Khối thi của bạn không phù hợp!',
                    type: 'error',
                    duration: 4000
                });
            </script>";
        }
    }
    echo '</div>';
?>


<div class="main_list_major">
    <table class="table_major">
        <thead class="head_table_major">
            <tr>
                <th class="width-5">Thứ tự nguyện vọng</th>
                <th>Mã trường</th>
                <th>Tên trường</th>
                <th>Mã ngành</th>
                <th>Tên ngành</th>
                <th>Khối</th>
                <th class="width-5">Chỉ tiêu tuyển sinh</th>
                <th class="width-5">Điểm chuẩn năm trước</th>
                <th class="width-5">Điểm dự tuyển</th>
                <th class="width-5">Điểm chuẩn năm nay</th>
                <th class="width-5">Kết quả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class="body_table_major">
            <?php
                $isPass = 0;
                $row = 0;
                foreach($data['expectationList'] as $key => $expect) 
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
                <td class="center"><?php echo $expect['expectation_order']?></td>
                <td class="center"><?php echo $expect['universityId']?></td>
                <td class="left"><?php echo $expect['university_name']?></td>
                <td class="center"><?php echo $expect['majorId']?></td>
                <td class="left"><?php echo $expect['major_name']?></td>
                <td class="center"><?php echo $expect['block']?></td>
                <td class="center"><?php echo $expect['target']?></td>
                <td class="center"><?php echo $expect['old_benchmark']?></td>
                <td class="center"><?php 
                        if(array_key_exists($expect['block'], $grade))
                        {
                            echo round($grade[$expect['block']], 2);
                        }
                        else 
                        {
                            echo 0;
                        }
                    ?></td>
                <td class="center">
                    <?php
                        if($expect['new_benchmark'] == 0) 
                        {
                            echo 'Chưa có';
                        } else {
                            echo $expect['new_benchmark'];
                        }
                    ?>
                </td>
                <td class="center">
                    <?php
                        if($expect['new_benchmark'] == 0) 
                        {
                            echo 'Chưa có';
                        } 
                        else if($expect['new_benchmark'] != 0 && $expect['id_expectation_pass'] == $expect['majorId'] && $isPass == 0)
                        {
                            echo 'Trúng tuyển';
                            $isPass = 1;
                        } 
                        else if($expect['new_benchmark'] != 0 && $expect['new_benchmark'] <= round($grade[$expect['block']], 2) && $isPass == 1)
                        {
                            echo 'Đã trúng tuyển NV khác';
                            $isPass = 1;
                        } 
                        else 
                        {
                            echo 'Không trúng tuyển';
                        }
                    ?>
                </td>
                <td class="center"><button class="move-btn b-red"><a class="min-w-80" href="<?php echo BASE_PATH ?>/ExpectationController/deleteExpectation/
                                                <?php echo trim($expect['majorId'])?>">Xóa</a></button></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

