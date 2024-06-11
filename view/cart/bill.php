<div class="mb flgap30">

    <div class="boxleft">
        <form action="index.php?act=billconfirm" method="post">
            <div class="banner">
                <div class="box_title">THÔNG TIN ĐẶT HÀNG</div>
                <div class=" boxcontent form_account form_cart">
                    <br>
                    <table>
                        <?php

                        if (isset($_SESSION['user'])) {
                            $name = $_SESSION['user']['user'];
                            $address = $_SESSION['user']['address'];
                            $email = $_SESSION['user']['email'];
                            $tel = $_SESSION['user']['tel'];
                        } else {
                            $name = "";
                            $address = "";
                            $email = "";
                            $tel = "";
                        }
                        ?>
                        <tr>
                            <td style="text-align: left;">Người đặt hàng</td>
                            <td><input type="text" name="name" value="<?= $name ?>"></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">Địa chỉ</td>
                            <td><input type="text" name="address" value="<?= $address ?>"></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">Email</td>
                            <td><input type="text" name="email" value="<?= $email ?>"></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">Điện thoại</td>
                            <td><input type="text" name="tel" value="<?= $tel ?>"></td>
                        </tr>

                    </table>

                </div>

            </div><br>
            <!-- PTTT -->
            <div class="banner">
                <div class="box_title">Phương thức thanh toán</div>
                <div class=" boxcontent form_account form_cart">
                    <!-- <select name="pttt" id="">
                        <option value="1"> Thanh toán trước khi nhận hàng</option>
                        <option value="2"> Thanh toán khi nhận hàng</option>
                        <option value="3"> Thanh toán qua Momo</option>
                    </select> -->
                    <table>
                        <tr>
                            <td><input type="radio" value="1" name="pttt" checked> Thanh toán trước khi nhận hàng</td>
                            <td><input type="radio" value="2" name="pttt"> Thanh toán khi nhận hàng</td>
                            <td><input type="radio" value="3" name="pttt"> Thanh toán qua Momo</td>
                        </tr>
                    </table>


                </div><br>

            </div>

            <!-- TTGH -->
            <div class="banner">
                <div class="box_title">Thông tin giỏ hàng</div>
                <div class=" boxcontent form_account form_dslh">
                    <div class=" boxcontent cart">
                        <table>

                            <?php
                            viewbill(0);
                            ?>

                        </table>
                    </div>
                </div>
            </div>

            <div class="mb bill">
                <!-- <a href="index.php?act=addtocart"><input type="button" value="Quay lại giỏ hàng"></a> -->
                <input type="submit" value="Đồng ý đặt hàng" name="redirect">
            </div>
        </form>

    </div>
    <?php
    include "view/boxright.php";
    ?>