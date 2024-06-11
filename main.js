var album=[];
for(var i=0;i<5;i++){
    album[i]=new Image();
    album[i].src="./img/anh"+i+".jpg";
}
 var interval=setInterval(slideshow,2200);
index=0;
function slideshow(){
    index++;
    if(index>4){
        index=0;
    }
    document.getElementById("banner").src=album[index].src;
}
function next(){
    index++;
    if(index>4){
        index=0;
    }
    document.getElementById("banner").src=album[index].src;
   
}
function pre(){
    index--;
    if(index<0){
        index=4;
    }
    document.getElementById("banner").src=album[index].src;
   
}

// function checkCart() {
//     $sql = "SELECT SUM(soluong) AS tongsoluong FROM cart";

//     // Thực thi truy vấn
//     $result = mysqli_query($conn, $sql);

//     // Lấy kết quả
//     $row = mysqli_fetch_assoc($result);

//     // Gán biến
//     $soluong = $row['tongsoluong'];
    
//     // Lấy số lượng sản phẩm trong giỏ hàng
//     var quantity = $soluong ;

//     if(quantity > 0) {
//       // Chuyển hướng đến trang đặt hàng
//       window.location.href = "index.php?act=bill"; 
//     }
//     else {
//       // Hiển thị thông báo lỗi
//       alert("Số lượng sản phẩm phải lớn hơn 0");
//     }
//   }
