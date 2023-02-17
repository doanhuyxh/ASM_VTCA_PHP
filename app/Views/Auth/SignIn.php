<div class="all center_flex form">
  <form method="post" action="<?php echo _WEB_ROOT . '/dang-ky' ?>" >
    <div class="mb-3">
      <label for="Email" class="form-label all">Nhập địa chỉ Email</label>
      <input type="Email" class="form-control all" id="Email"  name="Email">
      <p id="EmailCheck" class="text-danger"></p>
    </div>
    <div class="mb-3">
      <label for="UserName" class="form-label w-100">Nhập tài khoản đăng nhập</label>
      <input type="text" class="form-control w-100" id="UserName"  name="UserName">
      <p id="userCheck" class="text-danger"></p>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label w-100">Mật Khẩu</label>
      <input type="password" class="form-control w-100" id="password" name="password">
      <p id="passwordCheck" class="text-danger"></p>
    </div>
    <div class="mb-3">
      <label for="re_password" class="form-label w-100">Nhập lại mật khẩu</label>
      <input type="password" class="form-control w-100" id="re_password">
      <p id="passwordCheck" class="text-danger"></p>
    </div>
    <button type="submit" class="btn btn-primary all">Gửi</button>
  </form>
</div>

<Script>
  $(function($) {
    $('#UserName').keyup(function() {
      console.log($('#UserName').val());

      fetch(`<?php echo _WEB_ROOT . "/Auth/CheckExits" ?>?user=doanhuyxh`)
        .then((response) => response.json())
        .then((data) => {
          if ($('#UserName').val() == data)
          $("#userCheck").text("Tài khoản đã tồn tại vui lòng chọn tài khoản khác");
        });
    });
  })
</Script>