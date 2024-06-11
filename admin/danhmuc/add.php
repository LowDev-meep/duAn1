            <div class=" form_title">
                <h1>THÊM MỚI HÀNG HÓA</h1>
            </div>
            <div class=" box_content form_account">
                <form action="index.php?act=adddm" method="POST">
                    <!-- <p class="mb10" style="color: #c72092; float: left;">
                        Mã loại</p> -->
                    <input type="hidden" name="id" placeholder="nhập vào mã loại">

                    <p class="mb10" style="color: #c72092;   float: left;">
                        Tên loại</p>
                    <input type="text" name="name" placeholder="nhập vào tên loại" required>

                    <div class=" mb10" style="display: block; text-align: left;">
                        <input type="submit" name="themmoi" value="THÊM MỚI">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                    if (isset($thongbao) && $thongbao != "")
                        echo $thongbao;
                    ?>
                </form>
            </div>