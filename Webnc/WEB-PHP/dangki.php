<?php

    include_once 'connect.php';
    if (isset($_POST['dangki'])) {
        // variables for input data
        $hoten = $_POST['hoten'];
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];

        // variables for input data

        // sql query for inserting data into database
        $sql_query = "INSERT INTO tbl_tkkhachhang(hoten,username,password) VALUES('$hoten','$taikhoan','$matkhau') ";
        // sql query for inserting data into database

        // sql query execution function
        if (mysqli_query($con, $sql_query)) {
            ?>
            <script type="text/javascript">
                alert('Dữ liệu được chèn thành công ');
                window.location.href = 'dangnhap.php';
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert('Xảy ra lỗi trong khi chèn dữ liệu của bạn');
            </script>
            <?php
        }
        // sql query execution function
    }
    include './header.php';
?>

    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Đăng kí</h2>
                    <p>Đăng kí tài khoản tại đây</p>
                </div>
                <form method="post">
                    <div class="mb-3"><label class="form-label">Họ và tên</label><input class="form-control item" name="hoten" type="text"></div>
                    <div class="mb-3"><label class="form-label">Tên đăng nhập</label><input class="form-control item" type="text" name="taikhoan"></div>
                    <div class="mb-3"><label class="form-label">Mật khẩu</label><input class="form-control item" name="matkhau" type="password"></div>
                    <button name="dangki" class="btn btn-primary" type="submit">Đăng kí</button>
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
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script> -->
</body>

</html>