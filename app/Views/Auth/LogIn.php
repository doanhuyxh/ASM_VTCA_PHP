<div class="all center_flex" style="margin-top: 30px">
    <form method="post" action="<?php echo _WEB_ROOT . '/dang-nhap' ?>">
        <div class="mb-3">
            <label for="UserName" class="form-label">Nhập tài khoản đăng nhập</label>
            <input type="text" class="form-control" id="text" aria-describedby="Email" name="UserName">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật Khẩu</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary all">Gửi</button>
    </form>
</div>