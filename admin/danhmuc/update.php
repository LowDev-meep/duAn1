<?php
if (is_array($danhmuc)) {
    extract($danhmuc);
}
?>

<div class=" form_title">
    <h1>CẬP NHẬT HÀNG HÓA</h1>
</div>
<div class=" box_content form_account">
    <form action="index.php?act=updatedm" method="POST">
        <!-- <p class="mb10" style="color: #c72092; float: left;">
            Mã loại</p> -->
        <input type="hidden" name="id" placeholder="nhập vào mã loại" value="<?= $id ?>">

        <p class="mb10" style="color: #c72092;   float: left;">
            Tên loại</p>
        <input type="text" name="name" placeholder="nhập vào tên loại" value="<?= $name ?>">

        <div class="mb10" style="display: block; text-align: left;">
            <input type="submit" name="updatedm" value="CẬP NHẬT">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
        </div>
    </form>
</div>
<hr>