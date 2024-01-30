<?php
    session_start();

    include './connect.php';
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
     <h3>Thông báo có đơn hàng</h3>
     <p> Tên khách hàng: <br>{$_POST['tenkh']} </p>
   ";
            $mail->Body = $noidungthu;
            $mail->smtpConnect(array("ssl" => array("verify_peer" => false, "verify_peer_name" => false,
                "allow_self_signed" => true)));
            $mail->send();
//            echo 'Đã gửi mail xong';
        } catch (Exception $e) {
//            echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
        }
    }//function GuiMail
    if (isset($_GET['action'])) {
        $_POST['quantity'] = $_SESSION['chuyen'];
        $timsanpham = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham` WHERE `masp` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
        $total = 0;
        $orderProducts = array();
        while ($row = mysqli_fetch_array($timsanpham)) {
            $orderProducts[] = $row;
            $total += $row['giasanpham'] * $_POST['quantity'][$row['masp']];
        }
        if ($_POST['tenkh'] == '' || $_POST['sdt'] == '' || $_POST['diachi'] == '' || $_POST['quantity'] == '') {
            ?>
            <script>
                alert('Mời bạn nhập đầy đủ thông tin');
                window.location.href = 'infodathang.php';
            </script>
            <?php
        }
        $insertOrder = mysqli_query($con, "INSERT INTO `oder` (`id`, `tenkh`, `sdt`, `diachi`, `note`, `tongtien`, `ngaytao`,`donhangthang`) VALUES (NULL, '" . $_POST['tenkh'] . "', '" . $_POST['sdt'] . "', '" . $_POST['diachi'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . time() . "', '" . date('m') . "')");
        $orderID = $con->insert_id;// lưu id giỏ hàng
        $insertString = "";
        foreach ($orderProducts as $key => $timsanpham) {
            $insertString .= "(NULL, '" . $orderID . "', '" . $timsanpham['masp'] . "', '" . $_POST['quantity'][$timsanpham['masp']] . "', '" . $timsanpham['giasanpham'] . "', '" . time() . "', '" . time() . "')";

            if ($key != count($orderProducts) - 1) {
                $insertString .= ",";
            }
        }
        $insertOrder = mysqli_query($con, "INSERT INTO `oder_chitiet` (`id`, `madonhang`, `masp`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
        unset($_SESSION['giohang']); // xoá lại giỏ hàng
        GuiMail();
        ?>
        <script>
            alert('Đơn hàng đã đặt thành công !');
            window.location.href = 'giohang.php';

        </script>
        <?php

    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css"
          rel="stylesheet">
</head>
<body class="h-screen overflow-hidden flex items-center justify-center"
      style="background: #edf2f7;">


<div class="bg-white sm:bg-gray-200 min-h-screen w-screen flex flex-col justify-center items-center">
    <div class="bg-white shadow-none sm:shadow-lg px-8 sm:px-12 w-full xs:w-full sm:w-8/12 md:w-7/12 lg:w-7/12 xl:w-2/6 h-screen sm:h-auto py-8">
        <div class="text-center w-full font-bold text-3xl text-gray-600 p-4">
            Thông tin đặt hàng
        </div>
        <div
                class="w-full bg-gray-200 my-3" style="height: 1px"
        ></div>
        <form method="post" action="infodathang.php?action=submit">
            <div class="flex flex-col gap-4 px-0 py-4">
                <div>
                    <label class="text-gray-700">Họ tên người nhận:</label>
                    <input
                            name="tenkh"
                            class="py-2 pl-10 border border-gray-200 w-full"
                            type="text"
                    />
                </div>
                <div>
                    <label class="text-gray-700">Số điện thoại:</label>
                    <!-- <AtSymbolIcon class="font-medium text-2xl text-gray-600 absolute p-2.5 px-3 w-11" /> -->

                    <input
                            name="sdt"
                            class="py-2 pl-10 border border-gray-200 w-full"
                            type="text"
                    />
                </div>
                <div>
                    <label class="text-gray-700">Địa chỉ:</label>
                    <input
                            name="diachi"
                            class="py-2 pl-10 border border-gray-200 w-full"
                            type="text"
                    />
                </div>
                <div>
                    <label class="text-gray-700">Ghi chú:</label>
                    <!-- <AtSymbolIcon class="font-medium text-2xl text-gray-600 absolute p-2.5 px-3 w-11" /> -->

                    <input
                            name="note"
                            class="py-2 pl-10 border border-gray-200 w-full"
                            type="text"
                    />
                </div>
                <div class="w-full flex flex-row gap-2">
                    <button
                            class="border border-indigo-500 hover:bg-indigo-500 hover:text-white duration-100 ease-in-out w-6/12 text-indigo-500 p-0 flex flex-row justify-center items-center gap-1"

                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                             fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <a href="giohang.php">Quay lại</a>

                    </button>
                    <button type="submit" name="xacnhan"
                            class="border border-indigo-500 hover:bg-indigo-500 hover:text-white duration-100 ease-in-out w-6/12 text-indigo-500 p-2 flex flex-row justify-center items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5"
                             fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Xác nhận
                    </button>
                </div>


            </div>
        </form>
    </div>

</div>
</body>
</html>
