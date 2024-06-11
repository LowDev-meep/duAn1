<div class="mb flgap30">
    <div class="boxleft">
        <div class="banner">
            <?php if(!empty($thongbao)){
                ?>
            <div class="alert alert-danger">
                <?= $thongbao ?>
            </div>
            <?php
            } ?>
            <div class="box_title">Giỏ hàng</div>
            <div class=" boxcontent form_account form_dslh">
                <div class=" boxcontent cart">
                    <table>
                        <?php
                        viewcart(1);
                        ?>

                    </table>
                </div>

            </div>
            <div class=" mb bill_vc" style="text-align:left; margin-top: 10px; padding: 0 0 0 2px;">
                <?php if (!empty($_SESSION['mycart'])) : ?>
                <a href="index.php?act=bill"><input type="button" value="Tiếp tục đặt hàng"></a>
                <!-- <a href="/main.js" onclick="checkCart()"><input type="button" value="Tiếp tục đặt hàng"></a> -->
                <a href="index.php?act=delcart"><input type="button" value="Xóa giỏ hàng"></a>
                <?php else :
                ?>
                <div class="alert alert-warning">
                    Hiện giỏ hàng của bạn không có sản phẩm nào
                </div>
                <?php endif ?>
                <?php if(empty($_SESSION['user'])){
                    ?>
                <div class="alert alert-danger">Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng</div>
                <?php
                } ?>
            </div>
        </div>


    </div>
    <?php
    include "view/boxright.php";
    ?>
    <script src="/main.js"></script>