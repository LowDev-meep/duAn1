<div class="row mb bill">
    <form action="index.php?act=billconfirm" method="post">
    <?php
        if(isset($_SESSION['user'])){
            $name=$_SESSION['user']['user'];
            $address=$_SESSION['user']['address'];
            $email=$_SESSION['user']['email'];
            $tel=$_SESSION['user']['tel'];
        }else{
            $name="";
            $address="";
            $email="";
            $tel="";
        }
    ?>
        <input type="hidden" name="name" value="<?= $name ?>">
        <input type="hidden" name="address" value="<?= $address ?>">
        <input type="hidden" name="email" value="<?= $email ?>">
        <input type="hidden" name="tel" value="<?= $tel ?>"> <br>
        <input type="radio" name="pttt" value="1" checked> Thanh toán trước khi nhận hàng <br>
        <input type="radio" name="pttt" value="2"> Thanh toán khi nhận hàng <br/>
        <input type="radio" name="pttt" value="3"> Thanh toán qua momo <br/>
        <!-- <a href="index.php?act=billconfirm"><input type="button" value="Đồng ý đặt hàng" name="dongydathang"></a> -->
        <button type="submit" name="dongydathang" value="1">Đồng ý đặt hàng</button>
    </form>
        </div>