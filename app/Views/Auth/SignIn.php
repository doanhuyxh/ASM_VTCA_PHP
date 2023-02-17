<div class="all center_flex form">
  <form method="post" action="<?php echo _WEB_ROOT . '/dang-ky' ?>">

    <div class="mb-3">
      <label for="Email" class="form-label w-100">Nhập địa chỉ Email</label>
      <input type="Email" class="form-control w-100" id="Email" name="Email">
      <p id="EmailCheck" class="text-danger"></p>
    </div>

    <div class="mb-3">
      <label for="UserName" class="form-label w-100">Nhập tài khoản đăng nhập</label>
      <input type="text" class="form-control w-100" id="UserName" name="UserName">
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
      <p id="re_passwordCheck" class="text-danger"></p>
    </div>
    <button id="send" type="submit" class="btn btn-primary all">Gửi</button>
  </form>
</div>

<Script>
  var checkMail = 2;
  var checkUserName = 2;
  var checkPassword = 2;
  var checkRePassword = 2;


  $(function($) {
    $('#UserName').keyup(function() {
      let a = $('#UserName').val().toLowerCase();
      fetch(`<?php echo _WEB_ROOT . "/Auth/CheckExits" ?>?user=${a}`)
        .then((response) => response.json())
        .then((data) => {
          if (a === data && a != "") {
            $("#userCheck").text("Tài khoản đã tồn tại vui lòng chọn tài khoản khác");
            a = null;
            checkUserName = 2;
          } else {
            $('#userCheck').text(" ");
            a = null
            checkUserName = 4;
          }
        }).catch($('#userCheck').text(" "))
    });

    $('#Email').blur(function() {
      let regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!regex.test($('#Email').val())) {
        $('#EmailCheck').text("Email không hợp lệ");
        checkMail = 2;
      } else {
        $('#EmailCheck').text("");
        checkMail = 4;
      }
    });

    $('#password').blur(function() {

      let b = $('#password').val();
      if (b.length < 7) {
        checkPassword = 2;
        $('#passwordCheck').text("Độ dài mật khẩu phải lớn hơn 8 ký tự");
      } else {
        checkPassword = 4;
        $('#passwordCheck').text("");
      }
    })

    $('#re_password').blur(function() {
      if ($('#re_password').val() == $('#password').val()) {
        checkRePassword = 4;
        $('#re_passwordCheck').text("");
      } else {
        $('#re_passwordCheck').text("Mật khẩu không khớp");
        checkRePassword = 2;
      }
    })

  })

  setInterval(reload, 1000);
  
  function reload() {
    console.clear();
    if (checkRePassword == 4 && checkPassword == 4 && checkMail == 4 && checkUserName == 4) {
      $('#send').prop('disabled', false);
    } else {
      
      $('#send').prop('disabled', true);
    }
  }
</Script>