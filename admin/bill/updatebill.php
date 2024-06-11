<?php
if (isset($listbill) && (is_array($listbill))) {
    extract($listbill);
} else {
    echo "Không thể truy cập mảng";
}
?>

<div class=" form_title">
    <h1>CẬP NHẬT ĐƠN HÀNG</h1>
</div>
<div class=" box_content form_account">
    <form action="index.php?act=updatebill" method="POST" enctype="multipart/form-data">
        <input name="id" type="hidden" value="<?= $listbill['id'] ?>">
        <p class="mb10" style="color: #c72092; float:left">
            Tình trạng đơn hàng</p>
        <select name="ttdh" class="form-control">
            <option value="0" <?= $listbill['bill_status'] == 0 ? 'selected' : false ?>>Đơn hàng mới</option>
            <option value="1" <?= $listbill['bill_status'] == 1 ? 'selected' : false ?>>Đang xử lý</option>
            <option value="2" <?= $listbill['bill_status'] == 2 ? 'selected' : false ?>>Đang giao hàng</option>
            <option value="3" <?= $listbill['bill_status'] == 3 ? 'selected' : false ?>>Hoàn tất</option>
        </select>
        <p></p>

        <hr>
        <div class=" mb10" style="display: block; text-align: left;">
            <input type="submit" name="updatebill" value="CẬP NHẬT">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listbill"><input type="button" value="DANH SÁCH"></a>
        </div>
    </form>
</div>
<br>