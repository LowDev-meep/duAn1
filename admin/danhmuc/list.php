    <!-- hiển thị thông báo nếu có lỗi xảy ra -->
    <?php if (!empty($thongbao)) {
    ?>
        <div class="alert alert-danger">
            <?= $thongbao ?>
        </div>
    <?php
    } ?>

    <div class="form_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="boxcontent form_account form_dslh p-0">
        <table>
            <tr>
                <th class="text-center">MÃ LOẠI</th>
                <th class="text-center">TÊN LOẠI</th>
                <th width="5%">Sửa</th>
                <th width="5%">Xóa</th>
            </tr>
            <?php
            foreach ($listDanhmuc as $item) {
                extract($item);
                $suadm = "index.php?act=suadm&id=" . $id;
                $xoadm = "index.php?act=xoadm&id=" . $id;
                echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>
                                <a href="index.php?act=suadm&id=' . $id . '"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                </td>
                                <td>
                                <a href="index.php?act=xoadm&id=' . $id . '" onclick="return confirm(`Bạn có chắc chắn muốn xoá ?`)";><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                </td>
                                </tr>';
            }
            ?>
        </table>
    </div>
    <br>
    <hr>
    <div class="mb10 box_button" style="display: block; text-align: left;">
        <!-- <input type="button" value="CHỌN TẤT CẢ">
        <input type="button" value="BỎ CHỌN TẤT CẢ"> -->
        <a href="index.php?act=adddm"><input type="button" value="NHẬP THÊM"></a>
    </div>