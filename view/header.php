<?php
// kiểm tra kyw có hay ko, có thì hiển thị lại
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['kyw'])) {
        $kyw = $_POST['kyw'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án</title>
    <!-- bootstrap4 -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/css.css?ver=<?php echo rand() ?>">
    <link rel="shortcut icon" href="./img/logo/tải xuống.png">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="boxcenter">
        <!--HEADER -->
        <div class="mb header">
            <nav>
                <div class="logo">
                    <h1><a href="index.php">Nik<span>e</span> - Sho<span>p</span></a></h1>
                </div>

                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
                    <li><a href="index.php?act=gt">Giới thiệu</a></li>
                    <li><a href="index.php?act=lh">Liên hệ</a></li>
                    <li><a href="index.php?act=rv">Đánh giá</a></li>
                </ul>

                <div class="icons">
                    <form action="index.php?act=sanpham" method="POST">
                        <input type="text" name="kyw" placeholder="tìm kiếm..." style="padding: 0px 2px;" value="<?= !empty($kyw) ? $kyw : '' ?>">
                        <input type="submit" name="search" value="Tìm kiếm">
                    </form>
                </div>
            </nav>
        </div>
        <!-- END HEADER -->