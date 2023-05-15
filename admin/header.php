<?php
session_start();

if(!isset($_SESSION["username"]) ){
    // header('Location: ../login.php');
    // exit();
}


?>

<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý câu hỏi</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="shortcut icon" href="/online-quiz/admin/images/logo (2).png"> -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/test.css"> -->



    <link rel="stylesheet" href="css/style1.css">




    <!-- style hover for menu -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <style>
    li:hover,
    li.active {
        background-color: #1399d6ec;
        transition: all 0.2s linear;
    }
    </style>

</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <a class="navbar-brand" href="index.php">
                    Admin Dashboard
                </a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- active có chức năng đổi màu xanh của thẻ chọn-->
                    <li>
                        <a href="account.php">Tài khoản người dùng</a>
                    </li>
                    <li>
                        <a href="exam.php">Đề thi</a>
                    </li>

                    <li>
                        <a href="all_result.php">Kết quả thi</a>
                    </li>
                    <li>
                        <a href="logout.php">Đăng xuất</a>
                    </li>
                </ul>

            </div>

        </nav>
    </aside>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">

                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../img/profile.png">
                            <!-- <span> -->
                            Xin chào Admin
                            <?php
                                echo($_SESSION["username"]);
                                ?>

                            <!-- </span> -->
                        </a>

                    </div>



                </div>

            </div>

        </header>