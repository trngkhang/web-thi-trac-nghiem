<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Trắc Nghiệm</title>
    <link rel="stylesheet" href="./css/home.css" />
    <link rel="stylesheet" href="./admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style1.css">
</head>

<body>
    <header>
        <img src="./img/logo-310x70.png" alt="" />
    </header>
    <nav>
        <div class="navbar">
            <a href="index.php">Trang chủ</a>
            <a href="load_exam.php">Làm bài</a>
            <a href="add_exam.php">Tạo đề</a>
            <a href="logout.php">Đăng xuất</a>
            <div class="dropdown" id="login">
                <?php
                // $_SESSION["username"];
                    if(isset($_SESSION["username"]) ){
                        echo '<button class="dropbtn">
                        <img id="userimg" src="./img/profile.png" />
                        <span>';
                        echo($_SESSION["username"]);
                        echo '
                        </span>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="logout.php" >Đăng xuất</a>
                    </div>';

                    }
                    
                    ?>
                <!-- <button class="dropbtn"> -->
                <!-- <span>User</span>
                    <i class="fa fa-caret-down"></i> -->
                <!-- </button> -->
                <!-- <div class="dropdown-content">
                    <a href="logout.php">Đăng xuất</a>
                </div> -->
            </div>
            <!-- <div id="loginSingup" onclick="login();">Đăng nhập</div> -->
        </div>
    </nav>