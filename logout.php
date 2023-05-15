<?php
session_start();
// Hủy phiên đăng nhập
unset($_SESSION["username"]);
session_destroy();
// Chuyển hướng về trang đăng nhập
header("Location:login.php");
?>