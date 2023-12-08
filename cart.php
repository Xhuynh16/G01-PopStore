<?php

      session_start();
      if(isset($_POST['add_to_cart'])){
// nếu giỏ hàng đã có sản phẩm
        if(isset($_SESSION['cart'])){
          $product_array_ids = array_column($_SESSION['cart'],"product_id");
         //kiểm tra sản phẩm đã được thêm hay chưa
          if(!in_array($_POST['product_id'], $product_array_ids) ){

            $product_id = $_POST['product_id'];

            $product_array = array(
             'product_id'=> $_POST['product_id'],
             'product_name'=> $_POST['product_name'],
             'product_price'=> $_POST['product_price'],
             'product_image'=> $_POST['product_image'],
             'product_quantity'=> $_POST['product_quantity'],
   
            );
   
            $_SESSION['cart'][$product_id]=$product_array;

            //sản phẩm đã được thêm
          }else{
              echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng")</script>';
              //echo '<script>window.location="index.php"</script>';
            }


          //nếu chưa có sản phẩm
        }else{

         $product_id = $_POST['product_id'];
         $product_name =$_POST['product_name'];
         $product_price =$_POST['product_price'];
         $product_image =$_POST['product_image'];
         $product_quantity =$_POST['product_quantity'];


         $product_array = array(
          'product_id'=> $product_id,
          'product_name'=> $product_name,
          'product_price'=> $product_price,
          'product_image'=> $product_image,
          'product_quantity'=> $product_quantity,

         );

         $_SESSION['cart'][$product_id]=$product_array;
        }






//xóa sản phẩm khỏi giỏ hàng
      }else if(isset($_POST['remove_product'])){

      $product_id = $_POST['product_id'];
      unset($_SESSION['cart'][$product_id]);

//Tổng
calculateTotalCart();




      }else if( isset($_POST['edit_quantity'])){
// lấy id và số lượng từ form
      $product_id = $_POST['product_id'];
      $product_quantity = $_POST['product_quantity'];
 // lấy mảng từ sesstion     
      $product_array = $_SESSION['cart'][$product_id];
     // cập nhật số lượng 
      $product_array['product_quantity'] = $product_quantity;
      // trả lại mảng
      $_SESSION['cart'][$product_id] = $product_array;
      

//Tổng
calculateTotalCart();


      }else{
       //header('location: index.php');
      }


      function calculateTotalCart(){

        $total = 0;

          foreach($_SESSION['cart'] as $key => $value){

            $product = $_SESSION['cart'][$key];

            $price = $product['product_price'];
            $quantity = $product['product_quantity'];
            
            $total += $price * $quantity;
        }
        $_SESSION['total'] = $total;
      }



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
        <img class="logo" src="assets/imgs/logo.jpg" >
        <h2 class="pop">Popstore</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>

              <li class="nav-item">
                <i class="fas fa-shopping-bag"></i>
                <i class="fas fa-user-circle"></i>
              </li>


          </div>
        </div>
      </nav>
<!--  Cart -->

<section class="cart container my-5 py-5">
    <div class="container mt-5 pt-5">
        <h2 class="font-weight-bolde text-center">GIỎ HÀNG CỦA BẠN</h2>
        <hr>
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>


        <?php foreach($_SESSION['cart'] as $key => $value){?>
        <tr>
            <td>
                <div class="product-info">
                    <img src="assets/imgs/<?php echo $value['product_image'];?>">
                    <div>
                        <p><?php echo $value['product_name'];?></p>
                        <small><?php echo $value['product_price'];?><span>VNĐ</span></small>
                        <br>
                        <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value ="<?php echo $value['product_id']; ?>">
                        <input type="submit" name="remove_product" class="remove-btn" value="Remove"></input> 
                        </form>
                      </div>
                </div>
                
            </td>
            <td>
                
                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                  <input type="number" name = "product_quantity" value="<?php echo $value['product_quantity'];?>"/>
                  <input type ="submit" class="edit-btn" value="edit" name="edit_quantity">

                </form>
                
            </td>
            <td>
                <span class="product-price"><?php echo $value['product_quantity']* $value['product_price'];?></span>
                <span>VNĐ</span>
            </td>
        </tr>

        <?php }?>
    </table>

    <div class ="cart-total">
      <table>
  

        <tr>
          <td>ToTal</td>
          <td><?php echo $_SESSION['total'];?>VND</td>
        </tr>
       
      </table>
</div>
    <div class="checkout-container">
      <form method = "POST" action="checkout.php">
      <input type="submit" class="btn checkout-btn" value="Checkout"  name = "checkout"></input>
      </form>
    </div>
</section>







<!-- Footer -->
<footer>
    <div class="mt-5 py-5">
      <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <img class="logo" src="assets/imgs/logo.jpg">
          <h2 class="pop">Popstore</h2>
          <p class="pt-3">Chúng tôi mang đến tri thức cho bạn</p>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Loại Sách</h5>
          <ul class="text-uppercase">
            <li><a href="#">TIỂU THUYẾT</a></li>
            <li><a href="#">TRINH THÁM</a></li>
            <li><a href="#">TRUYỆN TRANH</a></li>
            <li><a href="#">ĐỜI SỐNG</a></li>
            <li><a href="#">GIÁO DỤC</a></li>
            <li><a href="#">TÀI CHÍNH</a></li>
          </ul>
      </div>
    
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <h5 class="pb-2">Liên Hệ</h5>
      <div>
        <h6 class="text-uppercase">Địa Chỉ</h6>
        <p>79 Hồ Tùng Mậu</p>
      </div>
      <div>
        <h6 class="text-uppercase">SĐT</h6>
        <p>(+84) 345 666 888</p>
      </div>
      <div>
        <h6 class="text-uppercase">Email</h6>
        <p>Popstore@gmai.com</p>
      </div>
    </div>
    
    <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <h5 class="pb-2">Sản Phẩm</h5>
      <div class="row">
        <img src="assets/imgs/1.jpg" class="img-fluid w-25 h-100 m-2">
        <img src="assets/imgs/2.jpg" class="img-fluid w-25 h-100 m-2">
        <img src="assets/imgs/3.jpg" class="img-fluid w-25 h-100 m-2">
        <img src="assets/imgs/dragonball.jpg" class="img-fluid w-25 h-100 m-2">
        <img src="assets/imgs/doraemon.jpg" class="img-fluid w-25 h-100 m-2">
      </div>
    </div>
      </div>
    
      <div class="copyright mt-5">
        <div class="row container mx-auto">
          <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
            <img src="assets/imgs/payment.jpg">
          </div>
          <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
           <p>eCommerce @ 2023 All Right Reserved</p>
          </div>
          <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
           </div>
        </div>
      </div>
    </footer>


    <script src="https://kit.fontawesome.com/609946b990.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>