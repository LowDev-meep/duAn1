<div class="mb flgap30">

            <div class="boxleft">
                 <div class="banner">
                  <div class="box_title">Quên mật khẩu</div>
                  <div class="box_content form_account">
                      <form action="#" method="post">
                      <div>
                          <p style="text-align: left; color: #c72092;">Email</p>
                          <input type="email" name="email" placeholder="email" required>
                      </div>

                      <input type="submit" value="Gửi" name="guiemail">
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
            <?php
                include "view/boxright.php";
            ?>