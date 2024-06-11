<div class=" form_title">
    <h1>DANH SÁCH ĐƠN HÀNG</h1>
</div>
<hr>
<form action="index.php?act=listbill" method="POST">
    <div class="row">
        <div class="col-3">
            <select name="status" class="form-control">
                <option value="">-Tất cả-</option>
                <option value="0" <?= (isset($status) && $status == 0) ? 'selected' : false ?>>-Đơn hàng mới-</option>
                <option value="1" <?= (isset($status) && $status == 1) ? 'selected' : false ?>>-Đang xử lý-</option>
                <option value="2" <?= (isset($status) && $status == 2) ? 'selected' : false ?>>-Đang giao hàng-</option>
                <option value="3" <?= (isset($status) && $status == 3) ? 'selected' : false ?>>-Hoàn tất-</option>
            </select>
        </div>

        <div class="col-7">
            <input type="text" name="kyw" placeholder="nhập vào tên khách hàng..." class="form-control"
                value="<?= !empty($kyw)?$kyw:false ?>">
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary w-100" name="listOK" value="Search">Tìm kiếm</button>
        </div>
    </div>
</form>
<hr>

<div class=" boxcontent form_account form_dslh">

    <table class="table table-bordered">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Khách hàng</th>
            <th>Số lượng hàng</th>
            <th>Giá trị đơn hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Tình trạng đơn hàng</th>
            <th width="11%">Xem Chi Tiết</th>
            <th width="4%">Sửa</th>
            <th width="4%">Xóa</th>
        </tr>
        <?php
        foreach ($listbill as $bill) {
            extract($bill);
            $kh = $bill["bill_name"] . '
                                <br>' . $bill["bill_email"] . '
                                <br>' . $bill["bill_address"] . '
                                <br>' . $bill["bill_tel"];
            $ttdh = get_ttdh($bill['bill_status']);
            // $type: liên quan đến giao diện của bootstrap vd: btn btn-danger: màu đỏ, warning: màu vàng...
            if ($ttdh == "Đơn hàng mới") {
                $type = 'danger';
            } else if ($ttdh == "Đang xử lý") {
                $type = 'warning';
            } else if ($ttdh == "Đang giao hàng") {
                $type = 'primary';
            } else if ($ttdh == "Hoàn tất") {
                $type = 'success';
            }
            $countsp = loadall_cart_count($bill['id']);
            echo '<tr>
                                    <td>' . $bill['id'] . '</td>
                                    <td style="text-align: left; padding-left: 10px;">' . $kh . '</td>
                                    <td>' . $countsp . '</td>
                                    <td>' . number_format($bill['total']) . ' <u style="color: crimson;">VNĐ</u></td>
                                    <td>' . $bill['ngaydathang'] . '</td>
                                    <td><a href="index.php?act=updatestatus&id=' . $bill['id'] . '&status=' . $bill['bill_status'] . '"><button class="btn btn-' . $type . '">' . $ttdh . '</button></a></td>
                                    <td><a href="index.php?act=billdetail&idbill=' . $bill['id'] . '"><button class="btn btn-primary">Xem Chi Tiết</button></a></td>
                                    <td>
                                        <a href="index.php?act=suabill&id=' . $bill['id'] . '"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                    </td>
                                    <td>
                                        <a href="index.php?act=xoabill&id=' . $bill['id'] . '" onclick="return confirm(`Bạn có chắc chắn muốn xoá ?`)";><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>';
        }
        ?>

    </table>
</div>
<br>
<div class="mb10 box_button" style="display: block; text-align: left;">
    <!-- <input type="button" value="CHỌN TẤT CẢ">
    <input type="button" value="BỎ CHỌN TẤT CẢ"> -->
    <!-- <a href="index.php?act=addsp"><input type="button" value="NHẬP THÊM"></a> -->
</div>