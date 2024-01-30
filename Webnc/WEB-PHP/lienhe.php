<?php
    session_start();

    if (isset($_GET['login'])) {
        $dangxuat = $_GET['login'];
    } else {
        $dangxuat = '';
    }
    if ($dangxuat == 'dangxuat') {
        session_destroy();
        header('Location: lienhe.php');
    }
    include 'header.php';
    function GuiMail()
    {
        require "PHPMailer-master/src/PHPMailer.php";
        require "PHPMailer-master/src/SMTP.php";
        require 'PHPMailer-master/src/Exception.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'hethong1fx@gmail.com'; // SMTP username
            $mail->Password = 'Ducthongminh1';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL
            $mail->Port = 465;  // port to connect to
            $mail->setFrom('hethong1fx@gmail.com', 'Shop');
            $mail->addAddress('dukai201722@gmail.com', 'Nguyễn Minh Đức'); //mail và tên người nhận
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Liên hệ';
            $noidungthu = "
     <h3>Thư liên hệ từ khách hàng</h3>
     <p> Email khách hàng: <br>{$_POST['email']} </p>
     <p> Tên khách hàng: <br>{$_POST['name']} </p>
     <p> Nội dung liên hệ: <br>{$_POST['message']} </p> ";
            $mail->Body = $noidungthu;
            $mail->smtpConnect(array("ssl" => array("verify_peer" => false, "verify_peer_name" => false,
                "allow_self_signed" => true)));
            $mail->send();
            echo 'Đã gửi mail xong';
        } catch (Exception $e) {
//            echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
        }
    }//function GuiMail
    if (isset($_POST['btn'])) {
        GuiMail();
        ?>
        <script type="text/javascript">
            alert('Thư đã được gửi');
            window.location.href = 'lienhe.php';
        </script>
        <?php
    }
?>

<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Liên hệ</h2>
                <p>Tận tình – chuyên nghiệp – khách hàng là thượng đế là phương châm của chúng tôi</p>
            </div>
            <form method="post">
                <div class="mb-3"><label class="form-label" for="name">Họ và tên</label><input class="form-control"
                                                                                               type="text" id="name"
                                                                                               name="name"></div>

                <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control"
                                                                                            type="email" id="email"
                                                                                            name="email"></div>
                <div class="mb-3"><label class="form-label" for="message">Yêu cầu chi tiết</label><textarea
                            class="form-control" id="message" name="message"></textarea></div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="btn" type="submit">Gửi</button>
                </div>
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