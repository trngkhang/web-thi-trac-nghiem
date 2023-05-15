<?php
session_start();

include "../connection.php";



if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = mysqli_query($link, "SELECT * FROM tb_exam WHERE id=$id");

    if(mysqli_num_rows($result) == 1) {
        // nếu tìm thấy dòng dữ liệu muốn xoá, hiển thị thông báo và tùy chọn xoá hoặc huỷ
        echo "
            <script>
                if(confirm('Bạn có chắc muốn đề thi này ?')) {
                    window.location.href = 'delete_exam.php?id=$id &action=delete';
                } else {
                    window.location.href = 'exam.php';
                }
            </script>";
    }
}

if(isset($_GET["action"]) && $_GET["action"] == "delete") {
    $id = $_GET["id"];
    mysqli_query($link, "DELETE FROM tb_exam WHERE id=$id");
    header("Location: exam.php");
}
?>

<!-- Trong đó, sau khi xoá thành công,  sử dụng hàm confirm() để tạo một hộp thoại xác nhận với hai lựa chọn "OK" và "Cancel". Nếu người dùng nhấp vào "OK", trang sẽ được chuyển hướng đến exam_category.php. Nếu người dùng nhấp vào "Cancel", trang sẽ không thay đổi.

Nếu xoá không thành công,  sử dụng hàm alert() để tạo một hộp thoại thông báo lỗi và sau đó chuyển hướng trang đến exam_category.php. -->