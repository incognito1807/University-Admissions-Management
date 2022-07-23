<div class="list_university">
    <h3 class="header_list_university"><br>Danh sách các trường đại học</h3>
    <table class="table_list_university">
        <?php
            $t = 0;
            foreach($data as $key => $uni) 
            {
                if($t % 5 == 0 ) 
                {
        ?>
        <tr>
            <td>
                <div class="td_university">
                    <a href="<?php echo BASE_PATH ?>/UniversityController/inforUniversity/<?php echo $uni['universityId']?>">
                        <div class = "uni_infor_list">
                            <div>
                                <img src="<?php echo BASE_PATH?>/public/img/university/<?php echo $uni['university_image']?>" height="100" width="70">
                            </div>
                            <div>
                                <p><?php echo $uni['university_name']?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </td>
        <?php
                } 
                elseif($t % 5 == 4) 
                {
        ?>
            <td>
                <div class="td_university">
                    <a href="<?php echo BASE_PATH ?>/UniversityController/inforUniversity/<?php echo $uni['universityId']?>">
                        <div class = "uni_infor_list">
                            <div>
                                <img src="<?php echo BASE_PATH?>/public/img/university/<?php echo $uni['university_image']?>" height="100" width="70">
                            </div>
                            <div>
                                <p><?php echo $uni['university_name']?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </td>
        </tr>
        <?php 
            } 
            else 
            {
        ?>
            <td>
                <div class="td_university">
                    <a href="<?php echo BASE_PATH ?>/UniversityController/inforUniversity/<?php echo $uni['universityId']?>">
                        <div class = "uni_infor_list">
                            <div>
                                <img src="<?php echo BASE_PATH?>/public/img/university/<?php echo $uni['university_image']?>" height="100" width="70">
                            </div>
                            <div>
                                <p><?php echo $uni['university_name']?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </td>
        <?php
                }
                $t++;
            }
        ?>
    </table>
</div>