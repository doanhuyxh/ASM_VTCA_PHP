<?php
$routes['default_controller'] = "Home";
$routes['trang-chu'] = "Home/index";
$routes['dang-nhap'] = "Auth/Login";
$routes['dang-xuat'] = "Auth/LogOut";
$routes['dang-ky'] = "Auth/Signin";
$routes['admin-user'] = "/admin/User";
$routes['admin'] = "/admin/Dashboard";
$routes['tin-tuc/.+-(\d).html'] = 'New/Category/$!';
?>
