<?php

    session_start();
    include('connect.php');

    if(isset($_POST['place_order'])){

        //1. lấy thông tin người dùng và lưu vào dababase
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $order_cost = $_SESSION['total'];
        $order_status = "on_hold";
        $user_id = 1;
        $order_date = date('Y-m-d H:i:s');


        $stmt = $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
                        VALUE (?,?,?,?,?,?,?); ");
        $stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date);
        
        $stmt->execute();

        $order_id = $stmt->insert_id;

        
        
        //2. lấy sản phẩm từ giỏ hàng
    
        foreach($_SESSION['cart'] as $key => $value){


            $product = $_SESSION['cart'] [$key];
            $product_id = $product['product_id'];
            $product_name = $product['product_name'];
            $product_image = $product['product_image'];
            $product_price = $product['product_price'];
            $product_quantity = $product['product_quantity'];
      
            $stmt1 = $conn->prepare("INSERT INTO order_items (order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date)
                                VALUE (?,?,?,?,?,?,?,?) ");
            $stmt1->bind_param('iissiiis',$order_id,$product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date);
            $stmt1->execute();
            
        
        }




        //3. lưu trữ thông tin đơn hàng vào database




        //4.lưu trữ sản phẩm trong order_items 


 

        //5. xóa mọi sản phẩm từ giỏ hàng



        //6.thông báo cho người dùng đặt hàng thành công hoặc gặp lỗi
    
    
    
    }else{

    }




?>