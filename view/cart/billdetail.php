<h4 class="text-center">Chi Tiết đơn hàng</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Thông tin</th>
            <th>PTTT</th>
            <th>Ngày đặt hàng</th>
            <th>Tổng</th>
            <th>Tình trạng</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($bill_info)) :
            foreach ($bill_info as $key => $item) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td>
                        Họ tên: <?= $item['bill_name'] ?> <br />
                        Địa chỉ: <?= $item['bill_address'] ?> <br />
                        Email: <?= $item['bill_email'] ?><br />
                        SĐT: <?= $item['bill_tel'] ?> <br />
                    </td>
                    <td>
                        <?php if ($item['bill_pttt'] == 1) {
                            echo 'Thanh toán trực tiếp';
                        } else if ($item['bill_pttt'] == 2) {
                            echo 'Chuyển khoản';
                        } else if ($item['bill_pttt'] == 3) {
                            echo 'Thanh toán online';
                        } ?>
                    </td>
                    <td><?= $item['ngaydathang'] ?></td>
                    <td><?= number_format($item['total']) ?> <u style="color: crimson;">VNĐ</u></td>
                    <td>
                        <?php if ($item['bill_status'] == 0) {
                            echo '<button class ="btn btn-danger">Đơn hàng mới</button>';
                        } else  if ($item['bill_status'] == 1) {
                            echo '<button class ="btn btn-warning">Đang xử lý</button>';
                        } else  if ($item['bill_status'] == 2) {
                            echo '<button class ="btn btn-primary">Đang giao hàng</button>';
                        } else  if ($item['bill_status'] == 3) {
                            echo '<button class ="btn btn-success">Hoàn tất</button>';
                        } ?>
                    </td>
                </tr>
        <?php endforeach;
        endif ?>
    </tbody>
</table>

<h4 class="text-center">Thông tin sản phẩm</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th width="15%">Ảnh minh họa</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($listBillDetail)) :
            foreach ($listBillDetail as $key => $item) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><img src="<?= "./img/" . $item['img'] ?>" width="100%"></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= number_format($item['price']) ?> <u style="color: crimson;">VNĐ</u></td>
                    <td class="text-center"><button class="btn btn-success"><?= $item['soluong'] ?></button></td>
                    <td><?= number_format($item['soluong'] * $item['price']) ?> <u style="color: crimson;">VNĐ</u></td>
                </tr>
        <?php endforeach;
        endif ?>
    </tbody>
</table>

<a href="index.php?act=mybill"><button class="btn btn-primary"><i class="fa fa-home"></i> Quay lại</button></a>
<hr>