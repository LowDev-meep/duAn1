<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "header.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";

// chặn quyền truy cập trực tiếp
if (empty($_SESSION['user'])) {
    header("Location: ../index.php");
} else {
    if ($_SESSION['user']['role'] != 1) {
        header("Location: ../index.php");
    }
}

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
            // DANH MUC
        case 'adddm':
            if (isset($_POST["themmoi"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                //Gọi phương thức trong model
                insert_dm($id, $name);
                // header("Location:index.php?act=listdm");
                $thongbao = "Thêm thành công !";
            }
            // $listdm= loadall_danhmuc();
            include "danhmuc/add.php";
            break;

        case 'listdm':
            $sql = "SELECT * FROM danhmuc ORDER BY ID DESC";
            $listDanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

            // case 'xoadm':
            //     if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            //         delete_dm($_GET['id']);
            //     }
            //     $listDanhmuc = danhmuc_get_all();
            //     include "danhmuc/list.php";
            //     break;

        case 'suadm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // Lấy thông tin danh mục
                $danhmuc = danhmuc_get_by_id($_GET['id']);
                // var_dump($danhmuc);
            }
            // $listdm= loadall_danhmuc();

            include "danhmuc/update.php";
            break;
        case "updatedm":
            if (isset($_POST["updatedm"])) {

                $id = $_POST["id"];
                $name = $_POST["name"];
                //Gọi phương thức trong model
                update_dm($id, $name);
            }
            $listDanhmuc = danhmuc_get_all();
            include "danhmuc/list.php";
            break;

            // SAN PHAM
        case "xoadm":
            if (isset($_GET['id'])) {
                $iddm = $_GET['id'];

                // kiểm tra xem trong danh mục còn sản phẩm hay không
                if (!empty(checkForeignKeyDm($iddm))) {
                    $thongbao = "Trong danh mục còn sản phẩm, Vui lòng xóa sản phẩm trước khi xóa danh mục !";
                } else {
                    delete_dm($iddm);
                    $thongbao = "Xóa danh mục thành công";
                }
            } else {
                $thongbao = "Liên kết không tồn tại hoặc đã hết hạn !";
            }

            $sql = "SELECT * FROM danhmuc ORDER BY ID DESC";
            $listDanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;
        case "listsp":
            if (isset($_POST["listok"]) && $_POST["listok"]) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdm = loadall_danhmuc();
            $listSanPham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;



        case "listbill":
            if (isset($_POST["listOK"]) && $_POST["listOK"]) {
                $kyw = $_POST['kyw'];
                $status = $_POST['status'];
            } else {
                $kyw = '';
                $status = '';
            }
            $listbill = loadall_bill($kyw, $status);
            include "bill/listbill.php";
            break;



        case "addsp":
            if (isset($_POST["themmoi"])) {
                $iddm = $_POST["iddm"];
                $ten = $_POST["name"];
                $gia = $_POST["price"];
                $mota = $_POST["mota"];

                $img = $_FILES["img"]["name"];
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    echo "The file" . htmlspecialchars(basename($_FILES["img"]["name"])) . "has been uploading";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                //Gọi phương thức trong model
                
                insert_sp($ten, $gia, $img, $mota, $iddm);
                header("Location:index.php?act=listsp");
            }
            $listdm = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case "xoasp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //Thực hiện xóa
                delete_sp($_GET['id']);
                $thongbao = "Xóa danh mục thành công";
            }
            if (isset($_POST["listok"]) && $_POST["listok"]) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdm = loadall_danhmuc();
            $listSanPham = loadall_sanpham($kyw, $iddm);
            // $listSanPham = sanpham_get_all();
            include "sanpham/list.php";
            break;
        case "suasp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // Lấy thông tin sản phẩm
                $sanpham = sanpham_get_by_id($_GET['id']);
                // var_dump($sanpham);
            }
            $listdm = loadall_danhmuc();

            include "sanpham/update.php";
            break;
        case "updatesp":
            if (isset($_POST["updatesp"])) {
                $iddm = $_POST["iddm"];
                $id = $_POST["id"];
                $ten = $_POST["name"];
                $gia = $_POST["price"];


                $img = $_FILES["img"]["name"];
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                // if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                //     echo "The file" . htmlspecialchars(basename($_FILES["img"]["name"])) . "has been uploading";
                // } else {
                //     // echo "Sorry, there was an error uploading your file.";
                // }
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                $mota = $_POST["mota"];
                //Gọi phương thức trong model
                update_sp($ten, $gia, $img, $mota, $iddm, $id);
            }
            if (isset($_POST["listok"]) && $_POST["listok"]) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdm = loadall_danhmuc();
            $listSanPham = loadall_sanpham($kyw, $iddm);
            // $listSanPham = sanpham_get_all();
            include "sanpham/list.php";
            break;
            // binhluan
        case 'dsbl':
            $listbl = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }

            $sql = "select * from binhluan order by id desc";
            $listbl = pdo_query($sql);
            include "binhluan/list.php";
            break;
            // tai khoan
        case 'xoatk':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //Thực hiện xóa
                delete_tk($_GET['id']);
            }
            $listtk = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'dskh':
            $listtk = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        case 'bieudo1':
            $listthongke = loadall_thongke();
            include "thongke/bieudo1.php";
            break;

            // case 'listbill':
            //     if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
            //         $kyw = $_POST['kyw'];
            //     } else {
            //         $kyw = "";
            //     }
            //     $listbill = loadall_bill($kyw, 0);
            //     include "bill/listbill.php";
            //     break;


        case "xoabill":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //Thực hiện xóa
                delete_bill($_GET['id']);
            }
            $listbill = loadall_bill(0);
            include "bill/listbill.php";
            break;
        case "suabill":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // Lấy thông tin sản phẩm
                $sanpham = bill_get_by_id($_GET['id']);
                // var_dump($bill);
                // lấy id đơn hàng
                $id = $_GET['id'];
                // lấy thông tin đơn hàng
                $listbill = checkBillToUpdate($id);
                // lấy số lượng sản phẩm của đơn hàng
                $checkCount = checkCountCart($id);
                $checkCount = count($checkCount);
            }
            include "bill/updatebill.php";
            break;

        case "updatebill":
            // $ttdh = get_ttdh($_GET['bill_status']);
            // $countsp = loadall_cart_count($bill['id']);
            if (isset($_POST["updatebill"])) {
                // $listbill = $_POST["listbill"];
                $id = $_POST["id"];
                $ttdh = $_POST["ttdh"];

                //Gọi phương thức trong model
                update_bill($id, $ttdh);
            }
            $listbill = loadall_bill();
            include "bill/listbill.php";
            break;

        case "updatestatus":
            // click vào trạng thái tự động cập nhật 
            if (isset($_GET['status']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $status = $_GET['status'];
                if ($status < 3) {
                    $status++;
                }

                update_bill($id, $status);
            }
            $listbill = loadall_bill();
            include "bill/listbill.php";
            break;

        case "billdetail":
            if (!empty($_GET['idbill'])) {
                $idbill = $_GET['idbill'];
                $listBillDetail = billDetail($idbill);
                $bill_info = billInfo($idbill);
            }

            include "bill/detail.php";
            break;
        case "logout":
            unset($_SESSION['user']);
            header("Location: ../index.php");
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}


include "footer.php";
