<div class="mb flgap30">

    <div class="boxleft">
        <div class="banner">
            <div class="box_title">Đơn hàng của tôi</div>
            <div class="boxcontent form_account form_dslh">
                <div class="boxcontent cart">
                    <table>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Số lượng mặt hàng</th>
                            <th>Tổng giá trị mặt hàng</th>
                            <th>Tình trạng đơn hàng</th>
                            <th>Xem chi tiết</th>
                        </tr>

                        <?php
                        if (is_array($listbill)) {
                            foreach ($listbill as $bill) {
                                extract($bill);
                                $ttdh = get_ttdh($bill['bill_status']);
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
                                                    <td>' . $bill['ngaydathang'] . '</td>
                                                    <td>' . $countsp . '</td>
                                                    <td>' . number_format($bill['total']) . ' <u style="color: crimson;">VNĐ</u></td>
                                                    <td><button class="btn btn-' . $type . '">' . $ttdh . '</button></td>
                                                    <td><a href="index.php?act=billdetail&idbill=' . $bill['id'] . '"><button class="btn btn-primary">Xem chi tiết</button></a></td>
                                                </tr>';
                            }
                        }
                        ?>



                    </table>
                </div>

            </div>
        </div>


    </div>
    <?php
    include "view/boxright.php";
    ?>