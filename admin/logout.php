<?php
session_start();
// Hủy phiên đăng nhập
session_destroy();
// Chuyển hướng về trang đăng nhập
header("Location:../login.php");
?>