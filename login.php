<!-- Tran Nguyen Khang -->
<?php
include "connection.php";
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./css/login1.css" />
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <div class="title">
                    <h3>Đăng nhập</h3>
                </div>
                <form action="" name="forml" method="post">
                    <div class="input-field">
                        <!-- <label class="control-label" for="username">Username</label> -->
                        <input type="text" name="username" id="username" placeholder="username"
                            title="Please enter you username" required />
                        <i class="uil uil-user"></i>
                    </div>

                    <div class="input-field">
                        <!-- <label class="control-label" for="password">Password</label> -->
                        <input type="password" name="password" id="password" title="Please enter your password"
                            placeholder="********" required />
                        <i class="uil uil-lock icon"></i>
                    </div>

                    <div class="alert" id="failure" style="
                margin-top: 10px;
                background-color: #f8d7da;
                padding: 10px;
                display: none;
              ">
                        <strong>Do not match!</strong> Invald Username or Password.
                    </div>

                    <div class="input-field button">
                        <button class="btnloginsignup" type="submit" name="login">
                            Đăng nhập
                        </button>
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Chưa có tài khoản
                        <a href="signup.php" class="text signup-link">Đăng ký ngay</a>
                    </span>
                </div>
            </div>
        </div>
        <?php
if(isset($_POST["login"])){

$count = 0;
$res = mysqli_query($link, "select * from tb_account where username='$_POST[username]' and password='$_POST[password]'");
$count=mysqli_num_rows($res);
if($count==1){
    //lấy role dể xác định account là admin hay user
    // Thực hiện truy vấn SQL
    $result = mysqli_query($link, "SELECT role FROM tb_account where username='$_POST[username]' ");

    // Lấy kết quả trả về dưới dạng một mảng kết hợp
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Lấy giá trị của cột my_integer_column dưới dạng một số nguyên
    $role = (int) $row['role'][0];
    
    $_SESSION["username"]=$_POST['username'];
    if($role==0){                   
        header('Location: index.php');
    }
    else{
        header('Location: ./admin/index.php');
    }

}
//$count==0 thi chua ton tai uểname
if($count==0){
    //lưu session username nao da dang nhhap
    ?>
        <script type="text/javascript">
        document.getElementById("failure").style.display = "block";
        </script>

        <?php

}

}
?>
    </div>
</body>

</html>