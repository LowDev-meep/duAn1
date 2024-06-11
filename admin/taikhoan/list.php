    <!-- hiển thị thông báo nếu có lỗi xảy ra -->
    <?php if (!empty($thongbao)) {
    ?>
        <div class="alert alert-danger">
            <?= $thongbao ?>
        </div>
    <?php
    } ?>

<div class="form_title">
    <h1>DANH SÁCH TÀI KHOẢN</h1>
</div>
<div class="boxcontent form_account form_dslh">
    <table>
        <tr>
            <th>MÃ TK</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Vai trò</th>
        </tr>
        <?php

        foreach ($listtk as $taikhoan) {
            extract($taikhoan);
            $suatk = "index.php?act=suatk&id=" . $id;
            $xoatk = "index.php?act=xoatk&id=" . $id;
            echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $user . '</td>
                                <td>' . $email . '</td>
                                <td>' . $address . '</td>
                                <td>' . $tel . '</td>
                                <td>' . $role . '</td>
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