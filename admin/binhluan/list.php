<div class="form_title">
    <h1>DANH SÁCH BÌNH LUẬN</h1>
</div>
<div class="boxcontent form_account form_dslh">
    <table>
        <tr>
            <th>ID</th>
            <th>Nội dung</th>
            <th>user</th>
            <th>IDpro</th>
            <th>Ngày bình luận</th>
            <th style="width: 5%;">Xóa</th>
        </tr>
        <?php

        foreach ($listbl as $bl) {
            extract($bl);
            $suabl = "index.php?act=suabl&id=" . $id;
            $xoabl = "index.php?act=xoabl&id=" . $id;
            echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $noidung . '</td>
                                <td>' . $idpro . '</td>
                                <td>' . $iduser . '</td>
                                <td>' . $ngaybinhluan . '</td>
                                <td>
                                <a href="' . $xoabl . '" onclick="return confirm(`Bạn có chắc chắn muốn xoá ?`)";><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </tr>';
        }
        ?>
    </table>
</div>
<br>
<div class="mb10 box_button" style="display: block; text-align: left;">
    <!-- <input type="button" value="CHỌN TẤT CẢ">
    <input type="button" value="BỎ CHỌN TẤT CẢ"> -->
</div>