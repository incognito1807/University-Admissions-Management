<div id="notice"></div>

<script src="<?php echo BASE_PATH ?> /public/js/Notice.js"></script>
<?php
    foreach($data as $key => $uni) 
    {
        echo "<script type='text/javascript'>
            notice ({ 
                message: 'Lấy thông tin trường thành công!',
                type: 'info',
                duration: 4000
            });
        </script>";
?>

<div class="full_infor_university">
    <h3 class="header_list_university">Thông tin trường <?php echo $uni['university_name']?></h3>
    <div class="main_infor_university">
        <div class="left_infor_university">
            <div class="university_image">
                <img src="<?php echo BASE_PATH?>/public/img/university/<?php echo $uni['university_image']?>">
            </div>
            <div class="button_infor_university">
                <a class="move-btn btn-big b-green" href="<?php echo BASE_PATH ?>/UniversityController/listMajorUniversity/
                            <?php echo trim($uni['universityId'])?>">Xem các ngành của trường</a>
            </div>
        </div>
        <div class="right_infor_university">
            <div class="university_id">
                <p>Mã trường: <?php echo $uni['universityId']?></p>
            </div>
            <div class="university_kind">
                <p><br>Khu vực: <?php echo $uni['university_kind']?></p>
            </div>
            <div class="university_desc">
                <p><br>Miêu tả: <?php echo $uni['introduction']?></p>
            </div>
            <div class="university_address">
                <p><br>Địa chỉ: <?php echo $uni['university_address']?></p>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>