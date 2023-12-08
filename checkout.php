<?php
  session_start();
// kiểm tra sản phẩm trong giỏ hàng đồng thời người dùng được chuyển đến trang thanh toán qua nút checkout
  if( !empty($_SESSION['cart']) && isset($_POST['checkout'])){




    //quay lại trang chủ
  }else{
    header('location: index.php');
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
                <a class="nav-link" href="#">Home</a>
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


      <!-- Checkout -->

 <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Thanh Toán</h2>
    <hr class="mx-auto"> 
    </div>

    <div class="mx-auto container">
        <form  id="checkout-form" action="server/place_order.php" method="POST">
            <div class="form-group checkout-small-element">
                <label>Name</label>
                <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group checkout-small-element">
                <label>Email</label>
                <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
            </div>
            <div class="form-grou checkout-small-element">
              <label>Phone</label>
              <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="phone" required>
          </div>

          <div class="form-group checkout-small-element">
            <label>City</label>
            <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
        </div>
        <div class="form-group checkout-large-element">
            <label>Address</label>
            <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required>
        </div>
          <div class="form-group checkout-btn-container">   
            <p>Total amount:<?php echo $_SESSION['total'];?> VNĐ</p>   
            <input type="submit" class="btn" id="checkout-btn" name = "place_order" value="Place Order" />
        </div>

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