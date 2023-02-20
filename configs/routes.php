<?php
$routes['default_controller'] = "Home";
$routes['trang-chu'] = "Home/index";
$routes['dang-nhap'] = "Auth/Login";
$routes['dang-xuat'] = "Auth/LogOut";
$routes['dang-ky'] = "Auth/Signin";


$routes['admin-login'] = "/admin/Auth/Login";
$routes['admin-home'] = "/admin/Dashboard";
$routes['admin-user'] = "/admin/User";
$routes['tin-tuc/.+-(\d).html'] = 'New/Category/$!';
?>
