<?php
$routes['default_controller'] = "Home";
$routes['trang-chu'] = "Home/index";
$routes['dang-nhap'] = "Auth/LogIn";
$routes['dang-xuat'] = "Auth/LogOut";
$routes['dang-ky'] = "Auth/SignIn";
$routes['tin-tuc/.+-(\d).html'] = 'New/Category/$!';
?>
