<?php
    session_start();

    //if (!isset($_SESSION['dangnhap'])) {
    //
    //    header('Location: index.php');
    //}
    if (isset($_GET['login'])) {
        $dangxuat = $_GET['login'];
    } else {
        $dangxuat = '';
    }
    if ($dangxuat == 'dangxuat') {
        session_destroy();
        header('Location: trangchu.php');
    }
include 'header.php';

?>

<main class="page landing-page">
    <section class="clean-block clean-hero"
             style="color: rgba(59,153,224,0.68);background: url(&quot;assets/img/tech/20140711-0119-giay-dat-nha-3.jpg&quot;);">
        <div class="text" style="width: 100%;">
            <h2 style="width: 100%;">Bóng đêm kì bí&nbsp;</h2>
            <p style="width: 100%;"><br>Sneaker&nbsp; có kiểu dáng khá lạ mắt, đặc biệt nó có thể phát sáng trong đêm
                kết hợp cùng đồ họa khói cuốn hút tạo nên một&nbsp;<strong>Paranorman Foamposite&nbsp;</strong>độc-đỉnh.
                Và thêm một lý do để nó có cái giá trời ơi này,&nbsp;<strong>Nike&nbsp;</strong>chỉ sản xuất đúng 800
                đôi mà thôi.<br></p>
            <button class="btn btn-outline-light btn-lg" type="button">Learn More</button>
        </div>
    </section>
    <section class="clean-block clean-info dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Giày thể thao đẳng cấp</h2>
                <p>Thể hiện, toát lên nét trẻ sức mạnh tuổi trẻ bùng nổ mạnh mẽ</p>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6"><img class="img-thumbnail" src="assets/img/20140711-0119-giay-dat-nha-4.jpg">
                </div>
                <div class="col-md-6">
                    <h3>Dunk Low Pro SB ‘Paris’</h3>
                    <div class="getting-started-info">
                        <p>Lại một đôi giày của Nike, ở vị trí thứ 4 là Dunk Low Pro SB ‘Paris’ với giá 3500$ (tương
                            đương khoảng 74 triệu rưỡi). Giống với đôi trên, Dunk&nbsp;Low Pro SB ‘Paris’ là hàng
                            limited-edition, chỉ có 202 đôi được bày bán. Họa tiết trên giày được vẽ bởi họa sĩ người
                            Pháp Bernard Buffet. Nếu bạn muốn nổi bật giữa đám đông thì Dunk Low Pro SB ‘Paris’ là một
                            lựa chọn cho bạn.</p>
                    </div>
                    <button class="btn btn-outline-primary btn-lg" type="button">Mua ngay</button>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block features">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Giày thể thao đẹp</h2>
                <p>Không có đơn đặt hàng tối thiểu<br>Sản phẩm đa dạng<br>Giá cả phải chăng</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 feature-box"><i class="icon-basket icon"></i>
                    <h4><strong>GIAO HÀNG TOÀN QUỐC</strong></h4>
                    <p>Vận chuyển khắp Việt Nam</p>
                </div>
                <div class="col-md-5 feature-box"><i class="far fa-money-bill-alt icon"></i>
                    <h4><strong>THANH TOÁN KHI NHẬN HÀNG</strong></h4>
                    <p>Nhận hàng tại nhà rồi thanh toán<br><br><br><br></p>
                </div>
                <div class="col-md-5 feature-box"><i class="far fa-laugh-beam icon"></i>
                    <h4><strong>BẢO HÀNH DÀI HẠN</strong></h4>
                    <p>Bảo hành lên đến 60 ngày<br><br></p>
                </div>
                <div class="col-md-5 feature-box"><i class="icon-refresh icon"></i>
                    <h4><strong>DỄ DÀNG ĐỔI HÀNG</strong></h4>
                    <p>Đổi hàng thoải mái trong 30 ngày</p>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block slider dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Sản phẩm bán chạy</h2>
                <p>sau đây là hình ảnh về một số sản phẩm bán chạy</p>
            </div>
            <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item active text-nowrap"><img alt="Slide Image"
                                                                       class="w-100 d-block"
                                                                       src="assets/img/20140711-0118-giay-dat-nha-2.jpg">
                    </div>
                    <div class="carousel-item"><img alt="Slide Image" class="w-100 d-block"
                                                    src="./admin/uploads/cac-hang-giay-noi-tieng-1(1).jpg"></div>
                    <div class="carousel-item"><img alt="Slide Image" class="w-100 d-block"
                                                    src="./admin/uploads/cac-thuong-hieu-giay-noi-tieng-1(1).jpg"></div>
                </div>
                <div><a class="carousel-control-prev" data-bs-slide="prev" href="#carousel-1" role="button"><span
                                class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a
                            class="carousel-control-next" data-bs-slide="next" href="#carousel-1" role="button"><span
                                class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a>
                </div>
                <ol class="carousel-indicators">
                    <li class="active" data-bs-slide-to="0" data-bs-target="#carousel-1"></li>
                    <li data-bs-slide-to="1" data-bs-target="#carousel-1"></li>
                    <li data-bs-slide-to="2" data-bs-target="#carousel-1"></li>
                </ol>
            </div>
        </div>
    </section>
    <section class="clean-block about-us">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Đội ngũ bán hàng của chúng tôi</h2>
                <p>Luôn nhiệt tình chọn lọc ra những mẫu mới nhất</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block"
                                                                  src="https://scontent.fhan15-2.fna.fbcdn.net/v/t39.30808-6/327334364_1191345168410633_128897387304684764_n.jpg?stp=cp6_dst-jpg&_nc_cat=103&ccb=1-7&_nc_sid=174925&_nc_ohc=A7vBfZu7AbcAX_xuzHV&_nc_ht=scontent.fhan15-2.fna&oh=00_AfBTWCjncLkp69avJqiHlyW1OD1BdDZtJNDVRBxjRIFRkw&oe=647E168E"
                                                                  style="height: 276.812px;"/>
                        <div class="card-body info" style="height: 177.438px;">
                            <h4 class="card-title">Nguyễn Trọng Đạo</h4>
                            <p class="card-text">CEO</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i
                                            class="icon-social-instagram"></i></a><a href="#"><i
                                            class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block"
                                                                  src="assets/img/avatars/avatar2.jpg"/>
                        <div class="card-body info" style="height: 178.438px;">
                            <h4 class="card-title">Phạm Đức Mạnh</h4>
                            <p class="card-text">Trợ lí</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i
                                            class="icon-social-instagram"></i></a><a href="#"><i
                                            class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block"
                                                                  src="assets/img/avatars/avatar3.jpg"/>
                        <div class="card-body info" style="height: 177.438px;">
                            <h4 class="card-title">Nam Em</h4>
                            <p class="card-text">Thư kí</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i
                                            class="icon-social-instagram"></i></a><a href="#"><i
                                            class="icon-social-twitter"></i></a></div>

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
                    <li><a href="#">Giới thiệu</a></li>
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