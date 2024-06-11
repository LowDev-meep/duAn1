<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- boostrap 5.13 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- style css custome -->
    <link rel="stylesheet" href="../css/css.css?ver=<?php echo rand() ?>">
    <link rel="shortcut icon" href="../img/logo/tải xuống.png">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="boxcenter">
        <!--HEADER -->
        <div class="mb header">
            <nav>
                <div class="logo">
                    <h1><a href="index.php">Admi<span>n</span></a></h1>
                </div>

                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="index.php?act=listdm">Danh mục</a></li>
                    <li><a href="index.php?act=listsp">Hàng hóa</a></li>
                    <li><a href="index.php?act=dskh">Khách hàng</a></li>
                    <li><a href="index.php?act=dsbl">Bình luận</a></li>
                    <li><a href="index.php?act=thongke">Thống kê</a></li>
                    <li><a href="index.php?act=listbill">Danh sách đơn hàng</a></li>
                </ul>

                <div class="icons">
                    <i class="fa-solid fa-bars"></i>
                    <div class="dropdown-content">
                        <a href="index.php?act=logout">Đăng xuất</a> 
                    </div>
                </div>
            </nav>
        </div>
        <!-- END HEADER -->