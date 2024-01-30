<?php
    session_start();
    include './connect.php';
?>
<?php
    // session_destroy();
    // unset('dangnhap');
    if(isset($_POST['dangnhap'])) {
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        if($taikhoan=='' || $matkhau ==''){
            ?>
            <script type="text/javascript">
                alert('Mời bạn nhập đủ thông tin');
                window.location.href = 'dangnhap.php';
            </script>
            <?php
        }else{
            $sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_tkkhachhang WHERE username='$taikhoan' AND password='$matkhau' LIMIT 1");
            $count = mysqli_num_rows($sql_select_admin);
            $row_dangnhap = mysqli_fetch_array($sql_select_admin);
            if($count>0){
                $_SESSION['dangnhap'] = $row_dangnhap['hoten'];
                $_SESSION['makh'] = $row_dangnhap['makh'];
                header('Location: trangchu.php');

            }else{
                ?>
                <script type="text/javascript">
                    alert('Sai tài khoản hoặc mật khẩu');
                    window.location.href = 'dangnhap.php';
                </script>
                <?php
            }
        }
    }
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Product-List.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css"> -->
    <link rel="stylesheet" href="assets/css/MUSA_carousel-product-cart-slider-1.css">
    <link rel="stylesheet" href="assets/css/MUSA_carousel-product-cart-slider.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/css/test.css">
    <link rel="stylesheet" href="sua.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="#"></a>
        <button class="navbar-toggler" data-bs-target="#navcol-1" data-bs-toggle="collapse"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class=" collapse navbar-collapse" id="navcol-1"><img src="assets/img/LogoMakr-5wk3kI.png"
                                                                  style="width: 109px;">

            <ul class="navbar-nav ms-auto">
                <li class="nav-item "><a class="nav-link active test-color" href="trangchu.php">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link active test-color" href="./shop.php">Cửa hàng</a></li>
                <li class="nav-item"><a class="nav-link active test-color" href="./baiviet.php">blog</a></li>
                <li class="nav-item"><a class="nav-link active test-color" href="vechungtoi.php">giưới thiệu</a></li>
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
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Đăng nhập</h2>
            </div>
            <form action="dangnhap.php" method="POST">
                <div class="mb-3"><label class="form-label" for="email">Tài khoản</label><input name="taikhoan" class="form-control item" type="text" id="email"></div>
                <div class="mb-3"><label class="form-label" for="password">Mật khẩu</label><input name="matkhau" class="form-control" type="password" id="password"></div>
                <div class="mb-3">
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">Ghi nhớ&nbsp;</label></div>
                </div><button class="btn btn-primary" name="dangnhap" type="submit">Đăng nhập</button>
            </form>
        </div>
    </section>
</main>
<footer class="page-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Bắt đầu</h5>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                    <li><a href="#">Giỏ hàng</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Thông tin</h5>
                <ul>
                    <li><a href="#">Liên lạc</a></li>
                    <li><a href="#">Giưới thiệu</a></li>
                    <li><a href="#">Reviews</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Hỗ trợ</h5>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">SĐT</a></li>
                    <li><a href="#">Diễn đàn&nbsp;</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Hợp pháp</h5>
                <ul>
                    <li><a href="#">Điều kiện dịch vụ</a></li>
                    <li><a href="#">Điều kiện sử dụng</a></li>
                    <li><a href="#">Chính sách riêng tư</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2023 Copyright Text</p>
    </div>
</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/vanilla-zoom.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>