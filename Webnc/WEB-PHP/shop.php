<?php
    session_start();

    if (isset($_GET['login'])) {
        $dangxuat = $_GET['login'];
    } else {
        $dangxuat = '';
    }
    if ($dangxuat == 'dangxuat') {
        session_destroy();
        header('Location: shop.php');
    }
    include './connect.php';
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;
    $products = mysqli_query($con,
        "SELECT * FROM `tbl_qlsanpham` ORDER BY `masp` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    include 'header.php';
?>

<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Cửa hàng</h2>
                <p>Nơi trưng bày những sản phẩm mới nhất, tốt nhất.</p>
            </div>
            <!--            sản phẩm hiện ở đây-->

            <div class="container">
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_array($products)) {
                        ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product-grid2">
                                <div class="product-image2"><a
                                            href="chitietsanpham.php?masp=<?= $row['masp'] ?>">
                                        <img
                                                class="pic-1"

                                                src="admin/<?= $row['anhdaidien'] ?>"
                                                height="450" width="450"/>

                                        <img class="pic-2"
                                             src="admin/<?= $row['anhgiuoithieu1'] ?>"
                                             height="2560"
                                             width="2560"/></a>
                                    <ul class="social">
                                        <li><a href="chitietsanpham.php?masp=<?= $row['masp'] ?>"
                                               data-tip="Quick View"><i
                                                        class="fa fa-eye"></i></a>
                                        </li>
                                        <li><a href="#"
                                               data-tip="Add to Cart"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a
                                                style="text-decoration: none"
                                                href="chitietsanpham.php?masp=<?= $row['masp'] ?>"><?= $row['tensp'] ?></a>
                                    </h3>
                                    <span class="price"><?= number_format($row['giasanpham'], 0, ",", ".") ?> VND</span>
                                    <span class="originalprice"><?= number_format($row['giagoc'], 0, ",",
                                            ".") ?> VND</span>


                                </div>
                            </div>
                        </div>
                        <?php
                    } ?>
                    <div class="clear-both"></div>
                    <?php
                    include './pagination.php';
                    ?>
                    <div class="clear-both"></div>
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