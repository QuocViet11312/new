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
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
$offset = ($current_page - 1) * $item_per_page;
$products = mysqli_query(
    $con,
    "SELECT * FROM `tbl_qlbaidang` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset
); //đánh dấu sản phẩm từ offset và lấy tiếp theo nó là limit = ra số sản phẩm thương ứng
$totalRecords = mysqli_query($con, "SELECT * FROM `tbl_qlbaidang` ");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);

include_once 'header.php';
?>

<main class="page blog-post-list">
    <section class="clean-block clean-blog-list dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Blog</h2>
                <p>Thông tin, trao đổi, chia sẻ kinh nghiệm về thời trang và thể thao</p>
            </div>
            <div class="block-content">

                <!--               thêm bài ở đây-->
                <?php
                while ($row = mysqli_fetch_array($products)) {
                    if ($row['chedo'] == 'Hiện') {
                ?>
                        <div class="clean-blog-post">
                            <div class="row">
                                <div class="col-lg-5"><img class="rounded img-fluid" src="./admin/<?= $row['anhdaidien'] ?>">
                                </div>
                                <div class="col-lg-7">
                                    <!--                                tiêu đề-->
                                    <h3><?= $row['tieude'] ?></h3>
                                    <div class="info"><span class="text-muted"><?= date(
                                                                                    'd/m/Y H:i',
                                                                                    $row['ngaycapnhat']
                                                                                ) ?>&nbsp;<a href="#"><?= $row['nguoiphutrach'] ?></a></span></div>
                                    <p><?= $row['noidung'] ?></p>
                                    <a href="chitietbaiviet.php?id=<?= $row['id'] ?>">
                                        <button class="btn btn-outline-primary btn-sm" type="button">Xem thêm
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
                <div class="clear-both"></div>
                <?php
                include './pagination.php';
                ?>
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