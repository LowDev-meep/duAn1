<div class="mb flgap30">

            <div class="boxleft">
                 <div class="banner">
                  <div class="box_title">Đăng ký tài khoản</div>
                        <div class="box_content form_account">
                            <form action="#" method="post">
                            <div>
                                <p style="text-align: left; color: #c72092;">Email</p>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div>
                                <p style="text-align: left; color: #c72092;">Tên đăng nhập</p>
                                <input type="text" name="user"  placeholder="User" required>
                            </div>
                            <p style="text-align: left; color: #c72092;">Mật khẩu</p>
                            <div>
                                <input type="password" name="pass"  placeholder="Pass" required>
                            </div>
                            <div>
                                <p style="text-align: left; color: #c72092;">Địa chỉ</p>
                                <input type="text" name="address" placeholder="Địa chỉ" required>
                            </div>
                            <div>
                                <p style="text-align: left; color: #c72092;">Tel</p>
                                <input type="text" name="tel" placeholder="Phone" required>
                            </div>
                            <input type="submit" value="Đăng ký" name="dangky">
                            <input type="reset" value="Nhập lại">
                            </form>
                            <?php

                                if(isset($thongbao)&&($thongbao != "")){
                                    echo $thongbao;
                                }
                        
                            ?>
                        </div>

                 </div>
           
            
            </div>
            <?php include "boxright.php"; ?>
      </div>
            