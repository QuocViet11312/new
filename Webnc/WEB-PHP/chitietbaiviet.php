<?php
    session_start();

    if (isset($_GET['login'])) {
        $dangxuat = $_GET['login'];
    } else {
        $dangxuat = '';
    }
    if ($dangxuat == 'dangxuat') {
        session_destroy();
        header('Location: baiviet.php');
    }
    include './connect.php';
    $result = mysqli_query($con, "SELECT * FROM `tbl_qlbaidang` WHERE `id` = " . $_GET['id']);
    $product = mysqli_fetch_assoc($result);
    $row = mysqli_fetch_array($result);

    include_once 'header.php';
?>


<main class="page blog-post">
    <section class="clean-block clean-post dark">
        <div class="container">
            <div class="block-content">
                <div class="post-image"
                     style="background-image:url(./admin/<?= $product['anhdaidien'] ?>);"></div>
                <div class="post-body">
                    <h3><?= $product['tieude'] ?></h3>
                    <div class="post-info"><span>by <?= $product['nguoiphutrach'] ?></span><span><?= date('d/m/Y H:i',
                                $product['ngaycapnhat']) ?></span></div>
                    <p><?= $product['noidung'] ?></p>
                    <figure class="figure"><img class="rounded img-fluid figure-img"
                                                src="./admin/<?= $product['anhgiuoithieu1'] ?>"
                        >
                    </figure>
                    <div class="row">
                        <div class="col-md-6">
                            <figure class="figure"><img class="rounded img-fluid figure-img"
                                                        src="./admin/<?= $product['anhgiuoithieu2'] ?>"
                                >
                            </figure>
                        </div>
                    </div>

                </div>
            </div>
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