<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blog - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Product-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/MUSA_carousel-product-cart-slider-1.css">
    <link rel="stylesheet" href="assets/css/MUSA_carousel-product-cart-slider.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/css/test.css">
    <link rel="stylesheet" href="sua.css">
</head>

<body>
<div class="container fixed-top">
    <div class="row">
        <div class="col ">
            <ul class="top-bar__social-list">
                <li><a href=""><img src="images/fb.png" height="25" width="25"/></a></li>
                <li><a href=""><img src="images/g.png" height="25" width="25"/></a></li>
                <li><a href=""><img src="images/mail.png" height="25" width="25"/></a></li>
            </ul>
        </div>
        <div class="col ">
            <div class=" container top-bar__link">
                <form class="row" action="">
                    <input class=" col search " type="search" placeholder="Nhập từ bạn cần tìm?" >
                    <div class=" col ">
                        <button class="btn btn-primary" type="submit" >Tìm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container">

        <a class="navbar-brand logo" href="#"></a>

        <div class=" collapse navbar-collapse" id="navcol-1"><img src="assets/img/LogoMakr-5wk3kI.png"
                                                                  style="width: 109px;">
            <?php
                if (!empty($_SESSION['dangnhap'])) { ?>
                    <div class="them"><?php echo 'Chào: ' . $_SESSION['dangnhap'] ?><a class="dangxuat"
                                                                                       href="?login=dangxuat">Đăng
                            xuất</a>
                    </div>
                    <?php
                }
            ?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item "><a class="nav-link active test-color" href="trangchu.php">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link active test-color" href="./shop.php">Cửa hàng</a></li>
                <li class="nav-item"><a class="nav-link active test-color" href="./baiviet.php">blog</a></li>
                <li class="nav-item"><a class="nav-link active test-color" href="vechungtoi.php">giới thiệu</a></li>
                <li class="nav-item"><a class="nav-link active test-color" href="lienhe.php"
                                        style="font-family: Montserrat, sans-serif;">liên hệ</a></li>
                <li class="nav-item dropdown" style="padding-right: 2rem;"><a
                            aria-expanded="false"
                            class="dropdown-toggle nav-link test-color"
                            data-bs-toggle="dropdown" href="#"
                            style="padding-right: .5rem;padding-left: .5rem;font-weight: 600;font-size: .8rem;text-transform: uppercase;transform: scale(1.03);color: var(--bs-dark);text-decoration: none;font-family: Montserrat, sans-serif;">Tài
                        khoản</a>
                    <div class="dropdown-menu"><a class="dropdown-item" href="dangnhap.php"
                                                  style="padding-right: .5rem;padding-left: .5rem;font-weight: 600;font-size: .8rem;text-transform: uppercase;transform: scale(1.03);color: var(--bs-dark);text-decoration: none;font-family: Montserrat, sans-serif;">
                            Đăng nhập</a><a class="dropdown-item" href="dangki.php"
                                            style="padding-right: .5rem;padding-left: .5rem;font-weight: 600;font-size: .8rem;text-transform: uppercase;transform: scale(1.03);color: var(--bs-dark);text-decoration: none;font-family: Montserrat, sans-serif;">Đăng
                            kí</a>
                        <a class="dropdown-item" href="giohang.php"
                           style="padding-right: .5rem;padding-left: .5rem;font-weight: 600;font-size: .8rem;text-transform: uppercase;transform: scale(1.03);color: var(--bs-dark);text-decoration: none;font-family: Montserrat, sans-serif;">Giỏ
                            hàng</a>

                    </div>
                </li>

            </ul>
        </div>
        <i class="fas fa-shopping-cart"></i>
    </div>




</nav>