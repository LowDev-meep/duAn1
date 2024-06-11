<div class="row">
    <div class="row form_title">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row box_content form_account">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label style="color: #c72092;"> Danh mục</label> <br>
                <select name="iddm" id="">
                    <?php
                                foreach($listdm as $item){
                                    extract($item);
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            ?>
                </select>
            </div>

            <p class="mb10" style="color: #c72092; float:left">
                Tên sản phẩm</p>
            <input type="text" name="name" placeholder="nhập vào tên sản phẩm">

            <p class="mb10" style="color: #c72092; float:left">
                Giá</p>
            <input type="text" name="price" placeholder="nhập vào giá">

            <div class="row2 mb10">
                <label style="color: #c72092;">Ảnh</label> <br>
                <input type="file" name="img">
            </div>
            <label style="color: #c72092;">Mô tả</label> <br>
            <textarea name="mota" id="" cols="30" rows="10" style="padding: 5px;"></textarea>

            <div class="mb10" style="display: block; text-align: left;">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                        if(isset($thongbao) && $thongbao !="")
                        echo $thongbao;
                    ?>
        </form>
    </div>
</div>