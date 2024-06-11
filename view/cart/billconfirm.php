<div class="mb flgap30">

    <div class="boxleft">
        <div class="banner">
            <div class="box_title">Cảm ơn</div>
            <div class=" boxcontent form_account form_cart" style="text-align:center;">
                <h2>Cảm ơn quý khách đã đặt hàng ^^</h2>
            </div>
        </div>
        <?php
        if (isset($bill) && (is_array($bill))) {
            extract($bill);
        } else {
            echo "Không thể truy cập mảng";
        }
        ?>
        <br>

        <div class="banner">
            <div class="box_title">Thông tin đơn hàng</div>
            <div class=" boxcontent form_account form_cart" style="text-align:left; padding-left: 20px;">
                <li>Mã đơn hàng: <?= $bill['id'] ?></li>
                <li>Ngày đặt hàng: <?= $bill['ngaydathang'] ?></li>
                <li>Tổng đơn hàng: <?= $bill['total'] ?> <u style="color: crimson;">VNĐ</u></li>
                <li>Phương thức thanh toán: <?= $bill['bill_pttt'] ?></li>
            </div>
        </div>
        <br>

        <div class="banner">
            <div class="box_title">Thông tin khách hàng</div>
            <div class=" boxcontent form_account form_cart" style="text-align:left;">
                <table>
                    <tr>
                        <td style="text-align: left;">Người đặt hàng</td>
                        <td><input type="text" name="name" value="<?= $bill['bill_name']; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Địa chỉ</td>
                        <td><input type="text" name="address" value="<?= $bill['bill_address']; ?> " disabled></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Email</td>
                        <td><input type="text" name="email" value="<?= $bill['bill_email']; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Điện thoại</td>
                        <td><input type="text" name="tel" value="<?= $bill['bill_tel']; ?>" disabled></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>

        <div class="banner">
            <div class="box_title">Chi tiết giỏ hàng</div>
            <div class=" boxcontent form_account form_cart cart">
                <table class="table table-bordered">
                    <?php
                    bill_chi_tiet($billct);
                    ?>
                </table>
            </div>
        </div>

    </div>
    <?php
    include "view/boxright.php";
    ?>