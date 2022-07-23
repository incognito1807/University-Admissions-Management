<h3>Thêm nguyện vọng</h3>
<div class="">
    <form action="<?php echo BASE_PATH?>/ExpectationController/insertExpectation" method="POST">
        <div class="form-group">
            <label for="majorId">Mã nguyện vọng</label>
            <input type="text" name="majorId" class="form-control" id="majorId">
        </div>
        <button type="submit" class="btn btn-default">Thêm nguyện vọng</button>
    </form>
</div>