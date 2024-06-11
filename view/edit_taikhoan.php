<div class="mb flgap30">
    <div class="boxleft">
        <div class="banner">
            <div class="box_title">CẬP NHẬT THÔNG TIN</div>
            <div class="box_content form_account">
                <?php
                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                ?>
                <form action="index.php?act=edit_taikhoan" method="post">
                    <p style="text-align: left; color: #c72092;">Email</p>
                    <input type="email" name="email" id="" placeholder="Email" value="<?= $email ?>"><br><br>

                    <p style="text-align: left; color: #c72092;">user</p>
                    <input type="text" name="user" id="" placeholder="user" value="<?= $user ?>"><br><br>

                    <p style="text-align: left; color: #c72092;">password</p>
                    <input type="password" name="pass" id="" placeholder="password" value="<?= $pass ?>"><br><br>

                    <p style="text-align: left; color: #c72092;">address</p>
                    <input type="text" name="address" id="" placeholder="địa chỉ" value="<?= $address ?>"><br><br>
                    
                    <p style="text-align: left; color: #c72092;">sdt</p>
                    <input type="text" name="tel" id="" placeholder="tel" value="<?= $tel ?>"><br><br>
                    
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="submit" value="Cập nhật" name="capnhat">
                    <input type="reset" value="Nhập lại">
                </form>
                <h2 class="thongbao">
                    <?php
                    if (isset($thongbao) && $thongbao != "") {
                        echo $thongbao;
                    }
                    ?>

                </h2>
            </div>

        </div>


    </div>
    <?php include "boxright.php"; ?>
</div>
