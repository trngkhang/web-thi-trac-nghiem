<?php
session_start();

include "../connection.php";

if(!isset($_SESSION["username"]) ){
    // header('Location: ../login.php');
    // exit();
}

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = mysqli_query($link, "SELECT * FROM tb_account WHERE id=$id");

    if(mysqli_num_rows($result) == 1) {
        // nếu tìm thấy dòng dữ liệu muốn xoá, hiển thị thông báo và tùy chọn xoá hoặc huỷ
        echo "
            <script>
                if(confirm('Bạn có chắc muốn xoá tài khoản này ?')) {
                    window.location.href = 'delete_acc.php?id=$id &action=delete';
                } else {
                    window.location.href = 'account.php';
                }
            </script>";
    }
}

if(isset($_GET["action"]) && $_GET["action"] == "delete") {
    $id = $_GET["id"];
    mysqli_query($link, "DELETE FROM tb_account WHERE id=$id");
    header("Location: account.php");
}
?>