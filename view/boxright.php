<div class="boxright">
             <div class="mb">
                <div class="box_title">TÀI KHOẢN</div>
                <div class="box_content form_account ">
                <?php 
                     if(isset($_SESSION['user'])){
                     extract($_SESSION['user']);
                     ?>
                     Đăng nhập thành công !<br>
                     <h2><?=$user?></h2>
                     <li class="form_li">
                        <a href="index.php?act=mybill">Đơn hàng của tôi</a>
                     </li>
                     <li class="form_li">
                        <a href="index.php?act=quenmk">Quên mật khẩu</a>
                     </li>
                     <li class="form_li">
                        <a href="index.php?act=edit_taikhoan">Cập nhập thông tin</a>
                     </li>
                     <?php if($role == 1){ ?>
                        <li class="form_li">
                           <a href="admin/index.php">Đăng nhập Admin</a>
                        </li>
                     <?php } ?>
                     <li class="form_li">
                        <a href="index.php?act=addtocart">Giỏ hàng</a>
                     </li>
                     <li class="form_li">
                        <a href="index.php?act=thoat">Đăng xuất</a>
                     </li>
                     <?php 
                     }else{
                  ?>
                    <!-- <form action="index.php?act=dangnhap" method="POST">
                        <p style="text-align: left;">Tên đăng nhập</p>
                        <input type="text" name="user">

                        <p style="text-align: left;">Mật khẩu</p>
                        <input type="password" name="pass"><br>
                        <input type="checkbox" name="">Ghi nhớ tài khoản?
                        <br><input type="submit" name="dangnhap" value="Đăng nhập">
                        <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                        <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
                    </form> -->
                    <form action="index.php?act=dangnhap" method="POST">
                        <h4>Tên đăng nhập</h4><br>
                        <input type="text" name="user" id=""required>
                        <h4>Mật khẩu</h4><br>
                        <input type="password" name="pass" id=""required><br>
                        <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                        <br><input type="submit" name="dangnhap" value="Đăng nhập">
                        <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                        <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
                    </form>
                     

                  <?php }?>

                </div>
             </div>
             
           
            </div>
            </div>