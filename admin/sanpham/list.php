    <!-- hiển thị thông báo nếu có lỗi xảy ra -->
    <?php if (!empty($thongbao)) {
    ?>
        <div class="alert alert-danger">
            <?= $thongbao ?>
        </div>
    <?php
    } ?>
    
    <div class="alert alert-success">
        <h3>DANH SÁCH HÀNG HÓA</h3>
    </div>

    <form action="" method="POST">
        <div class="row">
            <div class="col-3">
                <select name="iddm" class="form-control">
                    <option value="0" selected>-Tất cả-</option>
                    <?php
                    foreach ($listdm as $item) {
                        extract($item);
                    ?>
                        <option value="<?= $id ?>" <?= (!empty($iddm) && $iddm == $id) ? 'selected' : false ?>><?= $name ?>
                        </option>';
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="col-7">
                <input type="text" name="kyw" placeholder="nhập vào tên sản phẩm..." class="form-control" value="<?= !empty($kyw) ? $kyw : false ?>">
            </div>

            <div class="col-2 d-flex justify-content-end">
                <button class="btn btn-primary w-100" name="listok" value="Search">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <hr>

    <div class=" form_dslh p-0">

        <table class="table table-bordered">
            <tr>
                <th>Mã sản phẩm</th>
                <th width="16%">Tên sản phẩm</th>
                <th width="8%">Giá</th>
                <th>Hình ảnh</th>
                <th width="30%">Mô tả</th>
                <th>Danh mục</th>
                <th width="4%">Sửa</th>
                <th width="4%">Xóa</th>
            </tr>
            <?php
            if (!empty($listSanPham)) {
                foreach ($listSanPham as $item) {
                    extract($item);
                    echo '<tr>
                                    <td>' . $id . '</td>
                                    <td>' . $name . '</td>
                                    <td>' . number_format($price) . ' <u style="color: crimson;">VNĐ</u></td>
                                    <td><img src="../img/' . $img . '" width="100" height="100"></td>
                                    <td>' . $mota . '</td>
                                    <td>' . $danhmuc_name . '</td>
                                    <td>
                                        <a href="index.php?act=suasp&id=' . $id . '"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                    </td>
                                    <td>
                                        <a href="index.php?act=xoasp&id=' . $id . '" onclick="return confirm(`Bạn có chắc chắn muốn xoá ?`)";><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                    </tr>';
                }
            } else {
            ?>
                <tr>
                    <td class="text-center" colspan="10">
                        <div class="alert alert-warning">Thông tin bạn tìm kiếm không có</div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <br>
    <div class="mb10 box_button" style="display: block; text-align: left;">
        <!-- <input type="button" value="CHỌN TẤT CẢ">
        <input type="button" value="BỎ CHỌN TẤT CẢ"> -->
        <a href="index.php?act=addsp"><input type="button" value="NHẬP THÊM"></a>
    </div>