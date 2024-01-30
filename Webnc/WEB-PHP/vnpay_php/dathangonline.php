<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css"
          rel="stylesheet">
</head>
<?php
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    require_once("./config.php");
    include './connect1.php';
    if(isset($_GET['action'])){
        $_POST['quantity']=$_SESSION['chuyen'];
        $timsanpham = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham` WHERE `masp` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
        $total = 0;
        $orderProducts = array();
        while ($row = mysqli_fetch_array($timsanpham)) {
            $orderProducts[] = $row;
            $total += $row['giasanpham'] * $_POST['quantity'][$row['masp']];
        }
    if ($_POST['tenkh']=='' || $_POST['sdt'] ==''|| $_POST['diachi'] ==''||$_POST['quantity'] =='')
    {
        ?>
        <script>
            alert( 'Mời bạn nhập đầy đủ thông tin');
            window.location.href= 'dathangonline.php';
        </script>
    <?php
        }
        $insertOrder = mysqli_query($con, "INSERT INTO `oder` (`id`, `tenkh`, `sdt`, `diachi`, `note`, `tongtien`, `ngaytao`) VALUES (NULL, '" . $_POST['tenkh'] . "', '" . $_POST['sdt'] . "', '" . $_POST['diachi'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . time() . "')");
        $orderID = $con->insert_id;// lưu id giỏ hàng

        $insertString = "";
        foreach ($orderProducts as $key => $timsanpham) {
            $insertString .= "(NULL, '" . $orderID . "', '" . $timsanpham['masp'] . "', '" . $_POST['quantity'][$timsanpham['masp']] . "', '" . $timsanpham['giasanpham'] . "', '" . time() . "', '" . time() . "')";

            if ($key != count($orderProducts) - 1) {
                $insertString .= ",";
            }
        }
        $insertOrder = mysqli_query($con, "INSERT INTO `oder_chitiet` (`id`, `madonhang`, `masp`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
//var_dump($total);
//        var_dump($orderID);
//exit;
        unset($_SESSION['giohang']); // xoá lại giỏ hàng
    ?>
        <script>
            alert('Đơn hàng đã đặt thành công, tiếp theo mời bạn nhập thông tin thanh toán');
        </script>
    <?php

        }else{
    ?>
        <section class="max-w-4xl p-6 mx-auto  rounded-md shadow-md dark:bg-gray-800 mt-20">
            <div class="text-center w-full font-bold text-3xl text-gray-600 p-4">
                Thông tin đặt hàng
            </div>
            <form method="post" action="dathangonline.php?action=submit">
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

                        <button type="submit" name="xacnhan" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white duration-100 ease-in-out w-full text-indigo-500 p-2 flex  justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5"
                                 fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            lưu lại
                        </button>
                    </div>



                </div>
            </form>
        </section>
        <?php
    }
    if(isset($orderID)){
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Tạo mới đơn hàng</title>
            <!-- Bootstrap core CSS -->
            <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
            <!-- Custom styles for this template -->
            <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
            <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
        </head>

        <body>
        <?php require_once("./config.php"); ?>
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY DEMO</h3>
            </div>
            <h3>Tạo mới đơn hàng</h3>
            <div class="table-responsive">
                <form action="/vnpay_php/vnpay_create_payment.php" id="create_form" method="post">

                    <div class="form-group">
                        <label for="language">Loại hàng hóa </label>
                        <select name="order_type" id="order_type" class="form-control">

                            <option value="billpayment">Thanh toán hóa đơn</option>


                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Mã hóa đơn</label>
                        <input class="form-control" id="order_id"  name="order_id" type="text" value="<?= $orderID ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" id="amount"
                               name="amount" type="number"  value="295000"/>
                    </div>
                    <div class="form-group">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Thanh toan don hang <?= $orderID ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Thời hạn thanh toán</label>
                        <input class="form-control" id="txtexpire"
                               name="txtexpire" type="text" value="<?php echo $expire; ?>"/>
                    </div>
                    <div class="form-group">
                        <h3>Thông tin hóa đơn (Billing)</h3>
                    </div>
                    <div class="form-group">
                        <label >Họ tên (*)</label>
                        <input class="form-control" id="txt_billing_fullname"
                               name="txt_billing_fullname" type="text" value="NGUYEN VAN XO"/>
                    </div>
                    <div class="form-group">
                        <label >Email (*)</label>
                        <input class="form-control" id="txt_billing_email"
                               name="txt_billing_email" type="text" value="xonv@vnpay.vn"/>
                    </div>
                    <div class="form-group">
                        <label >Số điện thoại (*)</label>
                        <input class="form-control" id="txt_billing_mobile"
                               name="txt_billing_mobile" type="text" value="0934998386"/>
                    </div>
                    <div class="form-group">
                        <label >Địa chỉ (*)</label>
                        <input class="form-control" id="txt_billing_addr1"
                               name="txt_billing_addr1" type="text" value="22 Lang Ha"/>
                    </div>
                    <div class="form-group">
                        <label >Mã bưu điện (*)</label>
                        <input class="form-control" id="txt_postalcode"
                               name="txt_postalcode" type="text" value="100000"/>
                    </div>
                    <div class="form-group">
                        <label >Tỉnh/TP (*)</label>
                        <input class="form-control" id="txt_bill_city"
                               name="txt_bill_city" type="text" value="Hà Nội"/>
                    </div>
                    <div class="form-group">
                        <label>Bang (Áp dụng cho US,CA)</label>
                        <input class="form-control" id="txt_bill_state"
                               name="txt_bill_state" type="text" value=""/>
                    </div>
                    <div class="form-group">
                        <label >Quốc gia (*)</label>
                        <input class="form-control" id="txt_bill_country"
                               name="txt_bill_country" type="text" value="VN"/>
                    </div>
                    <div class="form-group">
                        <h3>Thông tin giao hàng (Shipping)</h3>
                    </div>
                    <div class="form-group">
                        <label >Họ tên (*)</label>
                        <input class="form-control" id="txt_ship_fullname"
                               name="txt_ship_fullname" type="text" value="Nguyễn Thế Vinh"/>
                    </div>
                    <div class="form-group">
                        <label >Email (*)</label>
                        <input class="form-control" id="txt_ship_email"
                               name="txt_ship_email" type="text" value="vinhnt@vnpay.vn"/>
                    </div>
                    <div class="form-group">
                        <label >Số điện thoại (*)</label>
                        <input class="form-control" id="txt_ship_mobile"
                               name="txt_ship_mobile" type="text" value="0123456789"/>
                    </div>
                    <div class="form-group">
                        <label >Địa chỉ (*)</label>
                        <input class="form-control" id="txt_ship_addr1"
                               name="txt_ship_addr1" type="text" value="Phòng 315, Công ty VNPAY, Tòa nhà TĐL, 22 Láng Hạ, Đống Đa, Hà Nội"/>
                    </div>
                    <div class="form-group">
                        <label >Mã bưu điện (*)</label>
                        <input class="form-control" id="txt_ship_postalcode"
                               name="txt_ship_postalcode" type="text" value="1000000"/>
                    </div>
                    <div class="form-group">
                        <label >Tỉnh/TP (*)</label>
                        <input class="form-control" id="txt_ship_city"
                               name="txt_ship_city" type="text" value="Hà Nội"/>
                    </div>
                    <div class="form-group">
                        <label>Bang (Áp dụng cho US,CA)</label>
                        <input class="form-control" id="txt_ship_state"
                               name="txt_ship_state" type="text" value=""/>
                    </div>
                    <div class="form-group">
                        <label >Quốc gia (*)</label>
                        <input class="form-control" id="txt_ship_country"
                               name="txt_ship_country" type="text" value="VN"/>
                    </div>
                    <div class="form-group">
                        <h3>Thông tin gửi Hóa đơn điện tử (Invoice)</h3>
                    </div>
                    <div class="form-group">
                        <label >Tên khách hàng</label>
                        <input class="form-control" id="txt_inv_customer"
                               name="txt_inv_customer" type="text" value="Lê Văn Phổ"/>
                    </div>
                    <div class="form-group">
                        <label >Công ty</label>
                        <input class="form-control" id="txt_inv_company"
                               name="txt_inv_company" type="text" value="Công ty Cổ phần giải pháp Thanh toán Việt Nam"/>
                    </div>
                    <div class="form-group">
                        <label >Địa chỉ</label>
                        <input class="form-control" id="txt_inv_addr1"
                               name="txt_inv_addr1" type="text" value="22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội"/>
                    </div>
                    <div class="form-group">
                        <label>Mã số thuế</label>
                        <input class="form-control" id="txt_inv_taxcode"
                               name="txt_inv_taxcode" type="text" value="0102182292"/>
                    </div>
                    <div class="form-group">
                        <label >Loại hóa đơn</label>
                        <select name="cbo_inv_type" id="cbo_inv_type" class="form-control">
                            <option value="I">Cá Nhân</option>
                            <option value="O">Công ty/Tổ chức</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input class="form-control" id="txt_inv_email"
                               name="txt_inv_email" type="text" value="pholv@vnpay.vn"/>
                    </div>
                    <div class="form-group">
                        <label >Điện thoại</label>
                        <input class="form-control" id="txt_inv_mobile"
                               name="txt_inv_mobile" type="text" value="02437764668"/>
                    </div>

                    <button type="submit" name="redirect" id="redirect" class="btn btn-default">Thanh toán ngay</button>

                </form>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>




        </body>
        </html>




        <?php
    }

?>

