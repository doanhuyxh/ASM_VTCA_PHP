<div class="all center_flex form">
    <form method="post" action="<?php echo _WEB_ROOT . '/dang-nhap' ?>">
        <div class="mb-3">
            <label for="UserName" class="form-label w-100">Nhập tài khoản đăng nhập</label>
            <input type="text" class="form-control w-100" id="UserName" name="UserName" value="<?php echo (isset($data['user'])) ?  $data['user'] :  " " ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label w-100">Mật Khẩu</label>
            <input type="password" class="form-control w-100" id="password" name="password" value="<?php echo (isset($data['pass'])) ?  $data['pass'] :  " " ?>">
        </div>
        <?php
        echo (isset($data['error'])) ? '<p class="text-danger">Tài khoản hoặc mật khẩu không chính xác</p>' : " ";
        ?>
        <button type="submit" class="btn btn-primary all">Gửi</button>
    </form>
</div>