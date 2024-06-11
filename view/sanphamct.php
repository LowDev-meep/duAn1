<div class="mb flgap30">

    <div class="boxleft">
        <div class="banner">
            <?php
            extract($onesp);
            ?>
            <div class="box-title">
                <form action="index.php?act=addtocart" method="POST" class="title">
                    <div class="name"><?= $name ?></div>
                </form>
            </div>
            <div class="box_content form_product">
                <div class="row">
                    <div class="col-6">
                        <img src="<?= 'img/' . $img ?>" width="100%" height="430px">
                    </div>
                    <div class="col-6">
                        <h4 style="text-align: left;">Mô tả ngắn</h4>
                        <p style="text-align: left;">Tên sản phẩm: <b><?= $name ?></b></p>
                        <p style="text-align: left;">Giá: <b><?= number_format($price) ?> <u style="color: crimson;">VNĐ</u></b></p>
                        <p style="text-align: left;"><?= $mota ?></p>
                        <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="name" value="<?= $name ?>">
                            <input type="hidden" name="img" value="<?= $img ?>">
                            <input type="hidden" name="price" value="<?= $price ?>">
                            <p style="text-align: left;">
                                    <!-- <button type="button" class="btn btn-danger btn-sm"
                                    name="buynow" value="1">Mua ngay <i class="fa-solid fa-cart-plus"></i></button> -->
                                <button class="btn btn-success btn-sm" name="addtocart" value="1">Thêm vào giỏ hàng <i
                                        class="fa-solid fa-cart-plus"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#binhluan").load("view/binhluan/binhluanform.php", {
                idpro: <?= $id ?>
            });
        });
        </script>
        <br>

        <div class="banner">
            <div class="box_title">Bình luận</div>
            <div class="box_content form_product">
                <div class="boxbinhluan" id="binhluan"></div>
            </div>

        </div><br>

        <div class="banner">
            <div class="box_title">Sản phẩm cùng loại</div>
            <div class="box_content form_product" style="text-align:left;">
                <div class="row">
                    <?php
                    foreach ($spcl as $item) {
                        extract($item);
                        $linksp = "index.php?act=sanphamct&id=" . $id;
                    ?>

                    <div class="col-3">
                        <a href="<?= $linksp ?>"> <img src="img/<?= $img ?>" width="100%"></a>
                        <li class="py-2"><a href="<?= $linksp ?>" style="text-decoration: none;"><?= $name ?></a></li>
                        <li>Giá: <b><?= number_format($price) ?></b> <u style="color: crimson;">VNĐ</u></li>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div><br>


    </div>
    <?php
    include "view/boxright.php";
    ?>
    <!-- </div> -->