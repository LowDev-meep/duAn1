    <div class=" form_title">
        <h1>THỐNG KÊ SẢN PHẨM</h1>
    </div>
    <div class=" boxcontent form_account form_dslh">
        <table class="tablelist formdangky">
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Số lượng</th>
                <th>Giá cao nhất</th>
                <th>Giá thấp nhất</th>
                <th>Giá trung bình</th>
            </tr>
            <?php
            foreach ($listthongke as $tk) {
                extract($tk);
                echo '<tr>
                    <td>' . $madm . '</td>
                    <td>' . $tendm . '</td>
                    <td>' . $countsp . '</td>
                    <td>' . number_format($maxprice) . ' <u style="color: crimson;">VNĐ</u></td>
                    <td>' . number_format($minprice) . ' <u style="color: crimson;">VNĐ</u></td>
                    <td>' . number_format($avgprice) . ' <u style="color: crimson;">VNĐ</u></td>
                </tr>';
            }
            ?>



        </table>

    </div>
    <br>
    <div class=" mb10 box_button" style="display: block; text-align: left;">
        <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
        <!-- <a href="index.php?act=bieudo1"><input type="button" value="Xem biểu đồ 1"></a> -->
    </div>