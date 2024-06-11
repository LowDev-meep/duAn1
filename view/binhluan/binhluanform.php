<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
$dsbl = loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>


    <div class="  mb ">
        <div class="boxtitle"></div>
        <table border="1px" class="table table-bordered boxcontent form_account form_dslh">
            <tr>
                <th class="noidungbinhluan">Nội dung</th>
                <th>Người bình luận</th>
                <th>Thời gian</th>
            </tr>
            <?php

            foreach ($dsbl as $bl) {
                extract($bl);
                echo '<tr><td>' . $noidung . '</td> ';
                echo '<td>' . $iduser . '</td> ';
                echo '<td>' . $ngaybinhluan . '</td></tr> ';
            }
            ?>

        </table>
    </div>
    <div class="boxfooter searchbox">
        <div class="formbll" width="100%">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <?php
                if (isset($_SESSION['user']['id'])) {
                ?>
                    <div class="row">
                        <div class="col-10">
                            <input type="text" name="noidung" id="" required style="width: 100%; padding: 5px 10px; border-radius: 5px;" placeholder="Nhập bình luận đóng góp tại đây">
                        </div>
                        <div class="col-2">
                            <input type="submit" name="guibinhluan" value="Gửi bình luận" style="padding: 5px; border: 0.5px solid ;border-radius: 5px;" class="form-control">
                        </div>
                    </div>
                <?php
                } else {
                    echo 'Vui lòng đăng nhập để sử dụng tính năng bình luận !';
                }
                ?>

            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $noidung = $_POST['noidung'];
        $idpro = $_POST['idpro'];
        $iduser = $_SESSION['user']['id'];
        $ngaybinhluan = date('h:i:sa d/m/Y');
        insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
        header("location: " . $_SERVER['HTTP_REFERER']);
    }

    ?>
    </div>
</body>

</html>