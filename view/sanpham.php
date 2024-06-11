<h2>SẢN PHẨM</h2><br>
<div class="items">
    <?php
   foreach ($dsSanpham as $item) {
      extract($item);
      $link_sp = "index.php?act=sanphamct&id=" . $id;
      echo '<div class="box_items">
                           <div class="box_items_img animation_transform_custom">
                           <a class="item_name" href="' . $link_sp . '"><img src="img/' . $img . '" alt="" width=100%></a>
                           <a class="item_name" href="' . $link_sp . '">' . $name . '</a>
                           <p class="price">' . number_format($price) . ' <u style="color: crimson;">VNĐ</u></p>
                           <form class="to_cart" action="index.php?act=addtocart" method="POST">
                              <input type="hidden" name="id" value="' . $id . '">
                              <input type="hidden" name="name" value="' . $name . '">
                              <input type="hidden" name="img" value="' . $img . '">
                              <input type="hidden" name="price" value="' . $price . '">
                              <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                           </form>
                           </div>
                           
                           </div>';
   }
   ?>
</div><br>