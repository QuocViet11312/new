<?php

    session_start();
    if (!isset($_SESSION['dangnhap1'])) {
        header('Location: canhbao.php');
    }
    if (isset($_GET['login'])) {
        $dangxuat = $_GET['login'];
    } else {
        $dangxuat = '';
    }
    if ($dangxuat == 'dangxuat') {
        session_destroy();
        header('Location: index.php');
    }

?>
<?php
    include './connect_db.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
        $_SESSION['locsanpham1'] = $_POST;
        header('Location: quanlisanpham.php');
        exit;
    }
    if (!empty($_SESSION['locsanpham1'])) {
        $where = "";
        foreach ($_SESSION['locsanpham1'] as $field => $value) {
            //tách mảng ra làm 2 $field và $value

            if (!empty($value)) {
                switch ($field) {
                    case 'tensp':

                        $where .= (!empty($where)) ? " AND " . "`" . $field . "` LIKE '%" . $value . "%'" :
                            "`" . $field . "` LIKE '%" . $value . "%'";

                        break;
                    default:
                        $where .= (!empty($where)) ? " AND " . "`" . $field . "` = " . $value . "" :
                            "`" . $field . "` = " . $value . "";
                        break;
                }
            }
        }
        extract($_SESSION['locsanpham1']);//tự động lấy ra biến id và hoten
    }

    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM `tbl_qlsanpham`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $_SESSION['tongsanpham'] = $totalRecords;


    if (!empty($where)) {
        $result = mysqli_query($con,
            "SELECT * FROM `tbl_qlsanpham` where (" . $where . ") ORDER BY `masp` ASC  LIMIT " . $item_per_page .
            " OFFSET " . $offset);
    } else {
        $result = mysqli_query($con,
            "SELECT * FROM `tbl_qlsanpham` ORDER BY `masp` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
    }

    mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Quản lí sản phẩm</title>
    <meta content="name" name="author">
    <meta content="description here" name="description">
    <meta content="keywords,here" name="keywords">
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
          rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <!--Totally optional :) -->
    <script crossorigin="anonymous"
            integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis="
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <link href="css/test.css" rel="stylesheet">

</head>


<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

<!--Nav-->
<nav class="fixed top-0 z-20 px-1 pt-2 pb-1 mt-0 w-full h-auto bg-gray-800 md:pt-1">

    <div class="flex flex-wrap items-center">
        <div class="flex flex-shrink justify-center text-white md:w-1/3 md:justify-start">
            <a href="#">
                <span class="pl-2 text-xl"><i class="em em-grinning"></i></span>
            </a>
        </div>

        <div class="flex flex-1 justify-center px-2 text-white md:w-1/3 md:justify-start">
                <span class="relative w-full">
                    <input class="px-2 py-3 pl-10 w-full leading-normal text-white bg-gray-900 rounded border border-transparent transition appearance-none focus:outline-none focus:border-gray-400"
                           placeholder="Search"
                           type="search">
                    <div class="absolute search-icon"
                         style="top: 1rem; left: .8rem;">
                        <svg class="w-4 h-4 text-white pointer-events-none fill-current"
                             viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                    </div>
                </span>
        </div>

        <div class="flex justify-between content-center pt-2 w-full md:w-1/3 md:justify-end">
            <ul class="flex flex-1 justify-between items-center list-reset md:flex-none">

                <li class="flex-1 md:flex-none md:mr-3">
                    <div class="inline-block relative">
                        <button class="text-white drop-button focus:outline-none"
                                onclick="toggleDD('myDropdown')"><span
                                    class="pr-2"><i
                                        class="em em-robot_face"></i></span> <?php
                                echo 'Hi, ' . $_SESSION['dangnhap1'] ?>
                            <svg class="inline h-3 fill-current"
                                 viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </button>
                        <div class="overflow-auto absolute right-0 invisible z-30 p-3 mt-3 text-white bg-gray-800 dropdownlist"
                             id="myDropdown">

                            <a class="block p-2 text-sm text-white no-underline hover:bg-blue-800 hover:no-underline"
                               href="dangnhap.php"
                               style="width: 120px;"><i
                                        class="fa fa-user fa-fw"></i> Đăng nhập
                            </a>
                            <div class="border border-gray-800"></div>
                            <a class="block p-2 text-sm text-white no-underline hover:bg-blue-800 hover:no-underline"
                               href="?login=dangxuat"
                               style="width: 120px;"><i
                                        class="fas fa-sign-out-alt fa-fw"></i>
                                Đăng xuất</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</nav>

<div class="flex flex-col md:flex-row">

    <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

        <div class="md:mt-12 md:w-50 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <a class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500"
                       href="./trangchu.php">
                        <i class="fas fa-tasks pr-0 md:pr-3"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Trang chủ</span>
                    </a>
                </li>

                <li class="mr-3 flex-1">
                    <a class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 border-blue-700"
                       href="./quanlisanpham.php">

                        <i class="fas fa-dolly md:pr-3"></i>
                        <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Quản lí sản phẩm</span>
                    </a>
                </li>

                <li class="mr-3 flex-1">
                    <a class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-yellow-400"
                       href="./quanlikhachhang.php">

                        <i class="far fa-address-card md:pr-3"></i>
                        <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Quản lí Khách hàng</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-blue-500"
                       href="./quanlibaidang.php">

                        <i class="fas fa-align-left md:pr-3"></i>
                        <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Quản lí bài đăng</span>
                    </a>
                </li>

                <li class="mr-3 flex-1">
                    <a class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-400"
                       href="./quanlithanhvien.php">
                        <i class="far fa-address-book md:pr-3"></i>

                        <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Quản lí thành viên</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-green-400"
                       href="./quanlidonhang.php">
                        <i class="fas fa-wallet md:pr-3"></i>
                        <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Quản lí đơn hàng</span>
                    </a>
                </li>
            </ul>
        </div>


    </div>

    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Danh sách sản phẩm</h3>
            </div>
        </div>


        <div class="flex flex-wrap">
            <div class="w-full p-6">
                <!--Metric Card-->
                <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-indigo-600"><i
                                        class="fas fa-tasks fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Số sản
                                phẩm</h5>
                            <h3 class="font-bold text-3xl"><?= $totalRecords ?> sản phẩm</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full p-6 flex flex-row-reverse">
                <!--                <button class=" mr-4 ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">-->
                <!--                    <a-->
                <!--                            href="./quanlidanhmuc.php">Quản lí danh mục</a>-->
                <!--                </button>-->
                <button class=" ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    <a
                            href="./themsanpham.php">Thêm sản
                        phẩm</a>
                </button>
                <div class="mr-2 flex items-center justify-center ">
                    <form action="quanlisanpham.php?action=search" method="POST">
                        <div class="flex ">
                            <input type="text"
                                   class="border-2 border-gray-200 rounded px-2 py-2 w-30"
                                   placeholder="Nhập mã sản phẩm ..." name="masp"
                                   value="<?= !empty($masp) ? $masp : "" ?>"/>
                            <input type="text"
                                   class="border-2 border-gray-200 rounded mr-2 px-2 ml-2 py-2 w-30"
                                   placeholder="Nhập tên sản phẩm ..." name="tensp"
                                   value="<?= !empty($tensp) ? $tensp : "" ?>"/>
                            <button type="submit" value="Tìm"
                                    class=" rounded px-4 mr-2 text-white bg-blue-500 border-l  ">
                                Tìm
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="flex w-full mr-8 justify-end">
                <div>Có tất cả <strong><?= $totalRecords ?></strong> sản phẩm trên <strong><?= $totalPages ?></strong>
                    trang
                </div>
            </div>
            <div class="w-full p-6">
                <table id="table_customers">
                    <thead class="bg-blue-300">
                    <tr class="border-2">
                        <th class="w-1/12 ">Mã</th>
                        <th class="w-1/12 ">Ảnh</th>
                        <th class="w-3/12 ">Tên sản phẩm</th>
                        <th class="w-1/12 ">Giá(VND)</th>
                        <th class="w-2/12 ">Ngày cập nhật</th>
                        <th class="w-2/12 ">Ngày tạo</th>
                        <th class="w-1/12 ">Sửa</th>
                        <th class="w-1/12 ">Xoá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $row['masp'] ?></td>
                                <td><img height="100"
                                         src="<?= $row['anhdaidien'] ?>"
                                         width="100"/></td>
                                <td><?= $row['tensp'] ?></td>
                                <td class="text-center"><?= number_format($row['giasanpham'], 0, ",", ".") ?> </td>
                                <td class="text-center"><?= date('d/m/Y H:i', $row['ngaycapnhat']) ?></td>
                                <td class="text-center"><?= date('d/m/Y H:i', $row['ngaytao']) ?></td>
                                <td class="text-center doimau"><a
                                            href="./edit_qlsanpham.php?masp=<?= $row['masp'] ?>">Sửa</a>
                                </td>
                                <td class="text-center doimau"><a
                                            href="./delete_qlsanpham.php?masp=<?= $row['masp'] ?>">Xóa</a>
                                </td>
                            </tr>
                            <?php
                        } ?>
                    </tbody>
                </table>
                <div class="clear-both"></div>
                <?php
                    include './pagination.php';
                ?>
                <div class="clear-both"></div>

            </div>
        </div>
    </div>


</div>

</div>


<script>
    /*Toggle dropdown list*/
    function toggleDD(myDropMenu) {
        document.getElementById(myDropMenu).classList.toggle("invisible");
    }

    /*Filter dropdown options*/
    function filterDD(myDropMenu, myDropMenuSearch) {
        var input, filter, ul, li, a, i;
        input = document.getElementById(myDropMenuSearch);
        filter = input.value.toUpperCase();
        div = document.getElementById(myDropMenu);
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
            var dropdowns = document.getElementsByClassName("dropdownlist");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('invisible')) {
                    openDropdown.classList.add('invisible');
                }
            }
        }
    }
</script>


</body>

</html>
