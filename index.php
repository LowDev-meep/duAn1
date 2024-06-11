<?php
session_start();
include "view/header.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "global.php";
include "model/cart.php";

// Nếu là admin bắt buộc vào trang admin, không cho quay lại
if (!empty($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 1) {
        header("Location: admin/index.php");
    }
}
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$dsSanpham = sanpham_get_all_home();
$dsDanhmuc = danhmuc_get_all_home();
$dstop10 = sanpham_get_all_home_top10();

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "dangky":
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                insert_taikhoan($email, $user, $pass, $address, $tel);
                $thongbao = "Đã đăng ký thành công ! Vui lòng đăng nhập";
            }
            include "view/dangky.php";
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = check_user($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;

                    header("LOCATION: index.php");
                    // $thongbao="Đăng nhập thành công !";

                } else {
                    $thongbao = "Tài khoản không tồn tại! Vui lòng đăng ký tài khoản mới !!!";
                    header("LOCATION: index.php");
                }
            }
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = check_user($user, $pass);
                // header('location:index.php?act=edit_taikhoan');
                $thongbao = "Cập nhật thành công!";
            }
            include "view/edit_taikhoan.php";
            break;
        case "quenmk":
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $check_email = check_email($email);
                if (is_array($check_email)) {
                    $thongbao = "Mật khẩu của bạn là: " . $check_email['pass'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/quenmk.php";
            break;

        case "thoat":
            session_unset();
            header("LOCATION: index.php");
            break;

        case "sanphamct":
            if (isset($_GET['id']) && ($_GET['id'])) {
                $id = $_GET['id'];
                $onesp = sanpham_get_by_id($id);
                extract($onesp);
                $spcl = load_sanpham_cungloai($id, $iddm);
                include "view/sanphamct.php";
            } else {
                include "index.php";
            }
            break;
        case "sanpham":
            if (isset($_POST['kyw']) && ($_POST['kyw'] !="")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dsSanpham = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;

        case "addtocart":
            // Kiểm tra người dùng đăng nhập hay chưa
            if (empty($_SESSION['user'])) {
                $thongbao = 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng';
            } else {
                //add thông tin sp từ form add to cart đến SESSION
                if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    // kiểm tra trong session xem có sản phẩm hay chưa 
                    $id = $_POST['id'];
                    $checkCartExit = false;
                    foreach ($_SESSION['mycart'] as $key => $item) {
                        if ($item['0'] == $id) {
                            $checkCartExit = true;
                        }
                    }
                    if (!$checkCartExit) {
                        $name = $_POST['name'];
                        $img = $_POST['img'];
                        $price = $_POST['price'];
                        $soluong = 1;
                        $ttien = $soluong * $price;
                        $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                        array_push($_SESSION['mycart'], $spadd);
                    } else {
                        foreach ($_SESSION['mycart'] as $key => $item) {
                            if ($item[0] == $id) {
                                $item[4]++;
                                $_SESSION['mycart'][$key][4] = $item[4];
                            }
                        }
                    }
                }
            }
            include "view/cart/viewcart.php";
            break;

        case "pluscart":
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                // kiểm tra trong session xem có sản phẩm hay chưa 
                $id = $_GET['id'];
                $checkCartExit = false;
                foreach ($_SESSION['mycart'] as $key => $item) {
                    if ($item[0] == $id) {
                        $item[4]++;
                        $_SESSION['mycart'][$key][4] = $item[4];
                    }
                }
            }
            include "view/cart/viewcart.php";
            break;

        case "minuscart":
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                // kiểm tra trong session xem có sản phẩm hay chưa 
                $id = $_GET['id'];
                $checkCartExit = false;
                foreach ($_SESSION['mycart'] as $key => $item) {
                    if ($item[0] == $id) {
                        if ($item[4] > 1) {
                            $item[4]--;
                        } else {
                            $thongbao = 'Số lượng sản phẩm đặt mua nhỏ nhất là 1';
                        }
                        $_SESSION['mycart'][$key][4] = $item[4];
                    }
                }
            }
            include "view/cart/viewcart.php";
            break;

        case "delcart":
            if (isset($_GET['idcart'])) {
                // array_slice($_SESSION['mycart'],$_GET['idcart'],1);
                // unset($_SESSION['mycart'][$_GET['idcart']]);
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            // include "";
            header('Location: index.php?act=addtocart');
            break;
        case "delbill":
            if (isset($_GET['idcart'])) {
                // array_slice($_SESSION['mycart'],$_GET['idcart'],1);
                // unset($_SESSION['mycart'][$_GET['idcart']]);
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            // include "";
            header('Location: index.php?act=bill');
            break;

        case "bill":
            include "view/cart/bill.php";
            break;

        case "billconfirm":
            if (isset($_POST['redirect']) && ($_POST['redirect'])) {
                if (!empty($_POST['pttt']) && $_POST['pttt'] == 3) {
                    // Thanh toán online = momo tích hợp
                    $tongdonhang = tongdonhang();
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $pttt = $_POST['pttt'];
                    header('Content-type: text/html; charset=utf-8');

                    function execPostRequest($url, $data)
                    {
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt(
                            $ch,
                            CURLOPT_HTTPHEADER,
                            array(
                                'Content-Type: application/json',
                                'Content-Length: ' . strlen($data)
                            )
                        );
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        //execute post
                        $result = curl_exec($ch);
                        //close connection
                        curl_close($ch);
                        return $result;
                    }


                    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                    $partnerCode = 'MOMOBKUN20180529';
                    $accessKey = 'klm05TvNBzhg7h7j';
                    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                    $orderInfo = "Thanh toán qua MoMo";
                    $amount = $tongdonhang;
                    $orderId = time() . "";
                    $redirectUrl = "http://localhost/da/da1_nhom1/index.php?act=billconfirm&name=$name&email=$email&address=$address&tel=$tel&pttt=$pttt";
                    $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
                    $extraData = "";

                    $requestId = time() . "";
                    $requestType = "payWithATM";
                    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                    //before sign HMAC SHA256 signature
                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $secretKey);
                    $data = array(
                        'partnerCode' => $partnerCode,
                        'partnerName' => "Test",
                        "storeId" => "MomoTestStore",
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'redirectUrl' => $redirectUrl,
                        'ipnUrl' => $ipnUrl,
                        'lang' => 'vi',
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature
                    );
                    $result = execPostRequest($endpoint, json_encode($data));
                    $jsonResult = json_decode($result, true);  // decode json

                    //Just a example, please check more in there
                    header('Location: ' . $jsonResult['payUrl']);
                } else {
                    if (isset($_SESSION['user'])) $iduser = ($_SESSION['user'])['id'];
                    else $id = 0;
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $pttt = $_POST['pttt'];
                    $ngaydathang = date('h:i:sa d/m/Y');
                    $tongdonhang = tongdonhang();
                    // tạo bill
                    $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);

                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                    }

                    // xóa session cart
                    unset($_SESSION['mycart']);
                }
            }
            // $idbill = 1;
            // kiểm tra phương thức get và insert vào database với pttt là momo atm
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_SESSION['user'])) $iduser = ($_SESSION['user'])['id'];
                else $id = 0;
                $name = $_GET['name'];
                $email = $_GET['email'];
                $address = $_GET['address'];
                $tel = $_GET['tel'];
                $pttt = $_GET['pttt'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();
                $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                }
                unset($_SESSION['mycart']);
            }

            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            // if(!is_array($bill)){
            //     $bill = [
            //         'id' => 0,
            //         'ngaydathang' => '',
            //         'tongdonhang' => '',
            //         'pttt' => '',
            //     ];
            //     $bill = []; 
            // }
            include "view/cart/billconfirm.php";
            break;
        case "mybill":
            // $listbill = loadall_bill($kyw,$_SESSION['user']['id']);
            $listbill = loadhistory_bill($_SESSION['user']['id']);
            include "view/cart/mybill.php";
            break;
        case "billdetail":
            if (!empty($_GET['idbill'])) {
                $idbill = $_GET['idbill'];
                $listBillDetail = billDetail($idbill);
                $bill_info = billInfo($idbill);
            }

            include "view/cart/billdetail.php";
            break;
        case "gt":
            include "view/gioithieu.php";
            break;
        case "lh":
            include "view/lh.php";
            break;
        case "rv":
            include "view/rv.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
