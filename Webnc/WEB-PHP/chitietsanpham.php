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
    $result = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham` WHERE `masp` = ".$_GET['masp']);
    $product = mysqli_fetch_assoc($result);
    $row = mysqli_fetch_array($result);
    include_once 'header.php';
?>



<main class="page product-page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Trang sản phẩm</h2>
                <p>Chi tiết sản phẩm</p>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery">
                                <div id="product-preview" class="vanilla-zoom">
                                    <div class="zoomed-image"></div>
                                    <div class="sidebar">
                                        <!--                                        ảnh 1-->
                                        <img class="img-fluid d-block small-preview"
                                             height="100" src="admin/<?= $product['anhdaidien'] ?>" width="100">
                                        <!--                                        ánh 2-->
                                        <img
                                                class="img-fluid d-block small-preview"
                                               height="100" src="admin/<?= $product['anhgiuoithieu1'] ?>" width="100">
                                        <!--                                        ảnh 3-->
                                        <img
                                                class="img-fluid d-block small-preview"
                                               height="100" src="admin/<?= $product['anhgiuoithieu2'] ?>" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3><?= $product['tensp'] ?></h3>
                                <div class="rating"><img src="assets/img/star.svg">
                                    <img src="assets/img/star.svg">
                                    <img src="assets/img/star.svg">
                                    <img src="assets/img/star-half-empty.svg">
                                    <img src="assets/img/star-empty.svg">
                                </div>
                                <div class="price">
                                    <span class="originalprice"><?= number_format($product['giagoc'], 0, ",", ".") ?> VND</span>
                                    <h3><?= number_format($product['giasanpham'], 0, ",", ".") ?> VND</h3>
                                </div>
                                <form action="giohang.php?action=add" method="POST">
                                    <div>Bạn mua với số lượng:</div>
                                    <input class="ml-4" type="text" value="1" name="quantity[<?=$product['masp']?>]" size="2" /><br/>
                                   
                                        <button class="mt-2 btn btn-primary" type="submit"><i class="icon-basket"></i>Thêm vào giỏ
                                            hàng
                                        </button>
                                   
                                  
                                </form>
                                <div class="summary">
                                    <p><?= $product['noidung'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div>
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab"
                                                                        data-bs-toggle="tab" id="description-tab"
                                                                        href="#description">Mô tả sản phẩm</a></li>
                            </li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab"
                                                                        id="reviews-tab" href="#reviews">Đánh giá</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active description" role="tabpanel" id="description">
                                <p><?= $product['noidung'] ?></p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <figure class="figure">
                                            <img class="img-fluid figure-img" src="admin/<?= $product['anhdaidien'] ?>">
                                            <img class="img-fluid figure-img" src="admin/<?= $product['anhgiuoithieu1'] ?>">
                                            <img class="img-fluid figure-img" src="admin/<?= $product['anhgiuoithieu2'] ?>">
                                        </figure>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade specifications" role="tabpanel" id="specifications">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td class="stat">Display</td>
                                            <td>5.2"</td>
                                        </tr>
                                        <tr>
                                            <td class="stat">Camera</td>
                                            <td>12MP</td>
                                        </tr>
                                        <tr>
                                            <td class="stat">RAM</td>
                                            <td>4GB</td>
                                        </tr>
                                        <tr>
                                            <td class="stat">OS</td>
                                            <td>iOS</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="reviews">
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="assets/img/star.svg"><img
                                                src="assets/img/star.svg"><img src="assets/img/star.svg"><img
                                                src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc,
                                            pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="assets/img/star.svg"><img
                                                src="assets/img/star.svg"><img src="assets/img/star.svg"><img
                                                src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc,
                                            pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="assets/img/star.svg"><img
                                                src="assets/img/star.svg"><img src="assets/img/star.svg"><img
                                                src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc,
                                            pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                //sản phẩm liên quan-->
                <div class="clean-related-items">
                    <h3>Sản phẩm liên quan</h3>
                    <div class="items">
                        <div class="row justify-content-center">
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="#"><img class="img-fluid d-block mx-auto"
                                                                        src="http://img.mwc.com.vn/giay-thoi-trang?&w=450&h=450&FileInput=//Upload/2020/12/z2207799644056-a7a3686418460bba5a3d8dfeba1bba8b.jpg"></a></div>
                                    <div class="related-name"><a href="#">Giày Thể Thao Nam MWC NATT - 5300</a>
                                        <div class="rating"><img src="assets/img/star.svg"><img
                                                src="assets/img/star.svg"><img src="assets/img/star.svg"><img
                                                src="assets/img/star-half-empty.svg"><img
                                                src="assets/img/star-empty.svg"></div>
                                        <h4>295.000₫</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="#"><img class="img-fluid d-block mx-auto"
                                                                        src="http://img.mwc.com.vn/giay-thoi-trang?&w=450&h=450&FileInput=//Upload/2020/12/z2207799643827-353a4fbc5fda398b4a1f1998480a06f1-dee1de78-ceec-4936-a735-a8b301fc362d.jpg"></a></div>
                                    <div class="related-name"><a href="#">Giày Thể Thao Nam MWC NATT - 5300</a>
                                        <div class="rating"><img src="assets/img/star.svg"><img
                                                src="assets/img/star.svg"><img src="assets/img/star.svg"><img
                                                src="assets/img/star-half-empty.svg"><img
                                                src="assets/img/star-empty.svg"></div>
                                        <h4>295.000₫</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="#"><img class="img-fluid d-block mx-auto"
                                                                        src="http://img.mwc.com.vn/giay-thoi-trang?&w=450&h=450&FileInput=//Upload/2020/11/z2199242552753-8d97074fe58e3ebef22076fa91d036f1.jpg"></a></div>
                                    <div class="related-name"><a href="#">Giày Thể Thao Nam MWC NATT - 5299</a>
                                        <div class="rating"><img src="assets/img/star.svg"><img
                                                src="assets/img/star.svg"><img src="assets/img/star.svg"><img
                                                src="assets/img/star-half-empty.svg"><img
                                                src="assets/img/star-empty.svg"></div>
                                        <h4>295.000₫</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                //sản phẩm liên quan-->
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