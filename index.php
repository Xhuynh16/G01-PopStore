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
                <a class="nav-link" href="index.html">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>

              <li class="nav-item">
                <a href="cart.php"><i class="fas fa-shopping-bag"></i></a>
                <a href="account.html"><i class="fas fa-user-circle"></i></a>
              </li>


          </div>
        </div>
      </nav>

<!-- Home -->
<section id="home">
  <div class="container">
    <h5>NEW ARRIVALS</h5>
    <h1><span>Giá Tốt Nhất</span> Hôm Nay</h1>
    <p>Mở Cánh Cửa Tri Thức - Tại Popstore</p>
    <button>MUA NGAY</button>
  </div>
</section>

<!-- Book -->
<br>
<h3 class="text-center">NXB</h3>
<br>
<section id="brand" class="container">
  <div class="row">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.png">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpg">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand5.png">
  </div>
</section>
<br>
<!-- New -->
<section id="new" class="w-100">
 <div class="row p-0 m-0"> <!--padding = 0 margin = 0 -->
  <!-- San pham 1 -->
<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="assets/imgs/1.jpg" >
  <div class="details">
    <h2>Tuổi trẻ đáng giá bao nhiêu </h2>
    <button class="text-uppercase">MUA NGAY</button>
  </div>
</div>
<!-- San pham 2 -->
<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="assets/imgs/2.jpg" >
  <div class="details">
    <h2>Ten san pham</h2>
    <button class="text-uppercase">MUA NGAY</button>
  </div>
</div>
<!-- San pham 3 -->
<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="assets/imgs/3.jpg" >
  <div class="details">
    <h2>Ten san pham</h2>
    <button class="text-uppercase">MUA NGAY</button>
  </div>
</div>

</div>
</section>

<!-- Featured -->
<?php include('server/get_featured_products.php'); ?>

<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3> SELF-HELP </h3>
    <hr>
    <p>Những cuốn sách giúp bạn hoàn thiện bản thân </p>
  </div>
  <div class="row mx-auto container-fluid">
    <?php while($row = $featured_products->fetch_assoc()): ?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img src="assets/imgs/<?php echo $row['product_image'];?>" class="img-fluid mb-3">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name"><?php echo $row['product_name'];?></h5>
        <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
       <a href=<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">MUA NGAY</button></a>
      </div>
    <?php endwhile; ?>
  </div>
</section>



 <!-- Banner -->
 <section id="banner" class="my-5 py-5">
  <div class="container">
    <h4>SALE CỰC LỚN</h4>
    <h1>MUA sách thả ga <br>KHÔNG lo về giá</h1>
    <button class="text-uppercase">MUA NGAY</button>
  </div>
 </section>
  

 <!--Combo Book -->
 <?php include ('server/get_combo.php')?>
 <section id="featured" class="my-5">
  <div class="container text-center mt-5">
    <h3> COMBO SÁCH HOT </h3>
    <hr>
    <p>Mua sách thả ga - không lo về giá</p>
  </div>
  <div class="row mx-auto container-fluid">
    <!-- 1 -->
  
    <?php while($row = $combo_products->fetch_assoc()): ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img src="assets/imgs/<?php echo $row['product_image'];?>" alt="" class="img-fluid mb-3">
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name'];?></h5>
      <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
      <button class="buy-btn">MUA NGAY</button>
    </div>
    
    <?php endwhile; ?>
  </div>
</section>

<!-- Sách thiếu nhi -->
<section id="featured" class="my-5">
  <div class="container text-center mt-5">
    <h3> TRUYỆN TRANH </h3>
    <hr>
    <p>Nơi hội tụ những câu chuyện đầy màu sắc và kỳ ảo</p>
  </div>
  <div class="row mx-auto container-fluid">
    <!-- 1 -->
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img src="assets/imgs/conan100.jpg" alt="" class="img-fluid mb-3">
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Truyện Tranh Thám Tử Lừng Danh Conan - Tập 101 - Bản Quyền</h5>
      <h4 class="p-price">25.000VNĐ</h4>
      <button class="buy-btn">MUA NGAY</button>
    </div>
    <!-- 2 -->
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img src="assets/imgs/dragonball.jpg" alt="" class="img-fluid mb-3">
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Dragon Ball Super 20 (Japanese Edition)</h5>
      <h4 class="p-price">150.660VNĐ</h4>
      <button class="buy-btn">MUA NGAY</button>
    </div>
    <!-- 3 -->
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img src="assets/imgs/doraemon.jpg" alt="" class="img-fluid mb-3">
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Truyện - Doraemon Movie Story: Nobita Và Viện Bảo Tàng Bảo Bối</h5>
      <h4 class="p-price">27.000VNĐ</h4>
      <button class="buy-btn">MUA NGAY</button>
    </div>
    <!-- 4 -->
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img src="assets/imgs/dragonball2.jpg" alt="" class="img-fluid mb-3">
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name"> Dragon Ball Super Tập 18 [2023]</h5>
      <h4 class="p-price">22.500VNĐ</h4>
      <button class="buy-btn">MUA NGAY</button>
    </div>

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