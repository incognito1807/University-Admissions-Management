
<div id="notice"></div>

<script src="<?php echo BASE_PATH ?> /public/js/Notice.js"></script>

<div class="search-grade">



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
?>
    

<h3 class="search-grade-title">Tra cứu điểm Trung học phổ thông quốc gia:</h3>
<form action="<?php echo BASE_PATH ?>/UserController/searchGrade" method="POST" enctype="multipart/form-data">
            
<?php
    if (count($data['userGrade']) > 0) 
    {

        if ($data['searchFor'] == 0) 
        {
                echo '<div class="form-search-grade">';
                    echo '<input 
                            type = "text" 
                            class="id-user-search" 
                            id="id-user-search" 
                            name="id_user_search"
                            required
                        >';

                    echo '<button type="submit" class="move-btn btn-big b-green">Tra cứu</button>';
                echo '</div>';
            echo '</form>';
            echo 
                '<div 
                    class="row-grade-search" 
                    style="text-align: center;
                    width: 360px;
                    margin: auto;
                    padding-bottom: 10px;
                    font-size: 25px;"
                >
                    <div class="label-search-grade">
                    Mã thí sinh: 
                    </div>
                    <span class="c-green">'.$data['userGrade'][0]['userId'].'
                    </span>
                </div>';
            
            if ($data['userGrade'][0]["permission"] != 1)
            {
                echo '<div class="infor-search-grade">
                    Thông tin điểm của bạn là:
                </div>';
            }
        } else 
        {
                echo '<div class="form-search-grade">';
                    echo '<input 
                            type = "text" 
                            class="id-user-search" 
                            id="id-user-search" 
                            name="id_user_search"
                            required
                        >';

                    echo '<button type="submit" class="move-btn btn-big b-green">Tra cứu</button>';
                echo '</div>';
            echo '</form>';
            echo 
                '<div 
                    class="row-grade-search" 
                    style="text-align: center;
                    width: 360px;
                    margin: auto;
                    padding-bottom: 10px;
                    font-size: 25px;"
                >
                    <div class="label-search-grade">
                    Mã thí sinh: 
                    </div>
                    <span class="c-green">'.$data['userGrade'][0]['userId'].'
                    </span>
                </div>';
            
            if ($data['userGrade'][0]["permission"] != 1)
            {
                echo '<div class="infor-search-grade">
                        Thông tin điểm của thí sinh 
                        <span style="font-weight: 600;">'. $data['userGrade'][0]["fullname"]. '
                        </span> là:
                        </div>';
            }
        }
            
        // if ($data['userGrade'][0]["permission"] == 1)
        // {
        //     echo 'Day la admin:';
        // }


        foreach($data['userGrade'] as $key => $userGrade) 
        {
            echo '<div class="all-grade">';
                if($userGrade['grade_maths'] != 0) 
                {
                    echo 
                        '<div 
                            class="row-grade-search" 
                            style="padding-left: 30px;
                        ">
                            <div class="label-search-grade">
                            Môn toán: 
                            </div>
                            <span class="c-green">'.$userGrade['grade_maths'].'
                            </span>
                        </div>';
                }
                if($userGrade['grade_literature'] != 0) 
                {
                    echo 
                        '<div 
                            class="row-grade-search" 
                            style="padding-left: 30px;
                        ">
                            <div class="label-search-grade">
                            Môn ngữ văn: 
                            </div>
                            <span class="c-green">'.$userGrade['grade_literature'].'
                            </span>
                        </div>';
                }
                if($userGrade['grade_english'] != 0) 
                {
                    echo 
                        '<div 
                            class="row-grade-search" 
                            style="padding-left: 30px;
                        ">
                            <div class="label-search-grade">
                            Môn tiếng anh: 
                            </div>
                            <span class="c-green">'.$userGrade['grade_english'].'
                            </span>
                        </div>';
                }
                if($userGrade['grade_physics'] != 0) 
                {
                    echo 
                        '<div 
                            class="row-grade-search" 
                            style="padding-left: 30px;
                        ">
                            <div class="label-search-grade">
                            Môn vật lý: 
                            </div>
                            <span class="c-green">'.$userGrade['grade_physics'].'
                            </span>
                        </div>';
                }
                if($userGrade['grade_chemistry'] != 0) 
                {
                    echo 
                        '<div 
                            class="row-grade-search" 
                            style="padding-left: 30px;
                        ">
                            <div class="label-search-grade">
                            Môn hóa học: 
                            </div>
                            <span class="c-green">'.$userGrade['grade_chemistry'].'
                            </span>
                        </div>';
                }
                if($userGrade['grade_biology'] != 0) 
                {
                    echo 
                        '<div 
                            class="row-grade-search" 
                            style="padding-left: 30px;
                        ">
                            <div class="label-search-grade">
                            Môn sinh học: 
                            </div>
                            <span class="c-green">'.$userGrade['grade_biology'].'
                            </span>
                        </div>';
                }
                if($userGrade['grade_history'] != 0) 
                {
                    echo 
                        '<div 
                            class="row-grade-search" 
                            style="padding-left: 30px;
                        ">
                            <div class="label-search-grade">
                            Môn lịch sử: 
                            </div>
                            <span class="c-green">'.$userGrade['grade_history'].'
                            </span>
                        </div>';
                }
                if($userGrade['grade_geography'] != 0) 
                {
                    echo 
                        '<div 
                            class="row-grade-search" 
                            style="padding-left: 30px;
                        ">
                            <div class="label-search-grade">
                            Môn địa lý: 
                            </div>
                            <span class="c-green">'.$userGrade['grade_geography'].'
                            </span>
                        </div>';
                }
                if($userGrade['grade_civic_education'] != 0) 
                {
                    echo 
                        '<div 
                            class="row-grade-search" 
                            style="padding-left: 30px;
                        ">
                            <div class="label-search-grade">
                            Môn giáo dục công dân: 
                            </div>
                            <span class="c-green">'.$userGrade['grade_civic_education'].'
                            </span>
                        </div>';
                }
            echo '</div>';
        }

        if ($_SESSION['permission'] == 1) {
            ?>

            <?php
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
                        $t++;
                    }
                }
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
                            <!-- <th>Hành động</th> -->
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
                            <!-- <td class="center"><button class="move-btn b-red"><a href="<?php echo BASE_PATH ?>/ExpectationController/deleteExpectation/
                                                            <?php echo trim($expect['majorId'])?>">Xóa</a></button></td> -->
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php
        }
    } 
    else 
    {
            echo '<div class="form-search-grade">';
                echo '<input 
                        type = "text" 
                        class="id-user-search" 
                        id="id-user-search" 
                        name="id_user_search"
                        required
                    >';

                echo '<button type="submit" class="move-btn btn-big b-green">Tra cứu</button>';
            echo '</div>';
        echo '</form>';
        echo '<div class="infor-search-grade">
            Không có dữ liệu cho thí sinh này!
        </div>';
    }
?>

</div>