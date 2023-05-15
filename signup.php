<!-- Tran Nguyen Khang -->
<?php
include "connection.php"
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./css/signup1.css" />
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form signup">
                <div class="title">
                    <h3>Đăng kí tài khoản</h3>
                </div>

                <form action="" name="form1" method="post">
                    <div class="input-field">
                        <input type="text" name="name" placeholder="Nhập tên của bạn" class="form-control" required />
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập của bạn"
                            required />
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu"
                            required />
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" class="form-control" placeholder="Nhập email của bạn"
                            required />
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon" />
                            <label for="termCon" class="text">Tôi đòng ý tất cả điều khoản sử dụng</label>
                        </div>
                    </div>
                    <div class="alert alert-success" id="success" style="
                margin-top: 10px;
                background-color: #f8d7da;
                padding: 10px;
                display: none;
              ">
                        <strong>Tài Khoản đã đăng ký thành công!<br />Vui lòng đăng
                            nhập!</strong>
                    </div>
                    <div class="alert alert-danger" id="failure" style="
                margin-top: 10px;
                background-color: #f8d7da;
                padding: 10px;
                display: none;
              ">
                        <strong>Tên người dùng này đã tồn tại!</strong>
                    </div>
                    <div class="input-field buttonr">
                        <button type="submit" name="submit1" class="btnloginsignup">
                            Đăng ký
                        </button>
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Đã có tài khoản
                        <a href="login.php" class="text signup-link">Đăng nhập ngay</a>
                    </span>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST["submit1"])){
            // ktra username ton tai hay chua
            $count = 0;
            $res = mysqli_query($link, "select * from tb_account where username='$_POST[username]'") or die(mysqli_error($link));
            $count=mysqli_num_rows($res);
            
            if($count>0){
                ?>
        <script type="text/javascript">
        document.getElementById("success").style.display = "none";
        document.getElementById("failure").style.display = "block";
        </script>
        <?php
            }
            else{
                
                mysqli_query($link,"insert into tb_account values (NULL, '$_POST[name]', '$_POST[username]', '$_POST[password]', '$_POST[email]', 0)");
                ?>
        <script type="text/javascript">
        document.getElementById("success").style.display = "block";
        document.getElementById("failure").style.display = "none";
        </script>
        <?php
        sleep(4);
        header('Location: login.php');

            }
            
        }
    ?>
    </div>
</body>

</html>