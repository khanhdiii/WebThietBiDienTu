<?php session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/66f79e327f.js" crossorigin="anonymous"></script>
    <script src="js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/master.css">
    <link rel="stylesheet" href="./assets/css/slide.css">
    <link rel="stylesheet" href="./assets/css/signIn.css">
    <link rel="stylesheet" href="./assets/css/signUp.css">
    <link rel="stylesheet" href="./assets/css/responvise.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/quickOrder.css">
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/css/purchase.css">
    <title>Document</title>

</head>

<body>
    <?php
    function product_price($priceFloat)
    {
        $symbol = 'đ';
        $symbol_thousand = '.';
        $decimal_place = 0;
        $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
        return $price . $symbol;
    }
    ?>
    <div class="whole">
        <div class="header">
            <div class="header-mobile-search">
                <div class="mobile-menu">
                    <div id="mobile-menu">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="header-top">
                        <ul class="header-top header-top__nav">
                            <li><a href="">Bản mobile</a><i class="fas fa-chevron-right"></i></li>
                            <li><a href="">Giới thiệu</a><i class="fas fa-chevron-right"></i></li>
                            <li><a href="">Sản phẩm đã xem</a><i class="fas fa-chevron-right"></i></li>
                            <li><a href="">Trung tâm bảo hành</a><i class="fas fa-chevron-right"></i></li>
                            <li><a href="">Hệ thống 75 siêu thị</a><i class="fas fa-chevron-right"></i></li>
                            <li><a href="">Tuyển dụng</a><i class="fas fa-chevron-right"></i></li>
                            <li><a href="">Tra cứu đơn hàng</a><i class="fas fa-chevron-right"></i></li>
                            <li id="func1" class="btn-signin hide1">
                                <img src="./assets/img/no-avatar.png" alt="">
                                <div class="user-name">
                                    <a href="signin.php">Đăng nhập</a>
                                    <span>Đăng nhập để nhận nhiều ưu đãi</span>
                                </div>
                                <div class="close-mobile-menu">
                                    <i class="fas fa-times"></i>
                                </div>
                            </li>
                            <li id="func2" class="btn-signin hide2">
                                <img src="./assets/img/no-avatar.png" alt="">
                                <div class="user-name">
                                    <a href="accountManagement.php">Xin chào! <?php echo $_SESSION['username'] ?></a>
                                    <span>Đăng nhập để nhận nhiều ưu đãi</span>
                                </div>
                                <div class="close-mobile-menu">
                                    <i class="fas fa-times"></i>
                                </div>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<script>var element1 = document.getElementById("func2");
                            element1.classList.remove("hide2");</script>';
                                } else {
                                    echo '<script>var element1 = document.getElementById("func1");
                            element1.classList.remove("hide1");</script>';
                                }
                                ?>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header header__with-search-box">
                    <div class="header-purchase mg20">
                        <a href="index.php">
                            <img src="./assets/img/nlogoo.png" width="220px" height="49px" alt="" class="header__search__logo">
                        </a>
                        <h2>Thanh toán</h2>        
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="POST">
        <div class="purchase-container">
            <div class="receive-inf">
                <div class="line-header"> 
                </div>
                <div class="header-line">
                    <div>
                        <h3><i class="far fa-question-circle"></i>Thông tin người nhận</h3>
                    </div>
                </div>
                <?php
                    $username = $_SESSION['username'];
                $sql = "SELECT * FROM accounts WHERE UserName = '$username'" ;
                $result = mysqli_query($connect, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="header-inf">
                    <div class="header-inf-item">
                        <label for="">Tên người nhận</label>
                        <input type="text" value="<?php echo $row['FullName'] ?>"> 
                        <input type="hidden" name="id_account" value="<?php echo $row['Id_account'] ?>">       
                    </div>
                    <div class="header-inf-item">
                        <label for="">Số điện thoại</label>
                        <input type="text" value="<?php echo $row['PhoneNumber'] ?>">        
                    </div>
                    <div class="header-inf-item">
                        <label for="">Địa chỉ</label>
                        <input type="text" value="<?php echo $row['Address']." - ".$row['District']." - ".$row['City'] ?>">         
                    </div>
                </div>
                <?php }}?>
            </div>
            <div class="product-inf">
                <div class="product-inf-header">
                    <h4>Sản phẩm</h4>
                    <p>Đơn giá</p>
                    <p>Số lượng</p>
                    <p>Thành tiền</p>
                </div>

                <?php 
                    $total_price = 0;
                    foreach ($_SESSION['cart'] as $key  => $val) :
                            $sql = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product WHERE products.Id_product='$key'";
                            $result = mysqli_query($connect, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $total_price_of_product = $_SESSION['cart'][$key]['qty']*($row['Price'] - $row['GiaKM']);
                                    $total_price = $total_price + $total_price_of_product;
                        ?>
                <div class="product-inf-body">
                     <div class="column-1">
                        <div class="start">
                            <div class="product-img"><img src="./admincode/uploads/<?php echo $row['ProductImage']; ?>" alt="" width="50px"></div>
                            <div class="product-name"><p><?php echo $row['ProductName']; ?></p></div>
                        </div>        
                         <div class="end">
                            <span><?php if($row['Ratio'] != NULL) echo '<span style="color:red; margin-left: 15px; background-color:tomato; border-radius:5px; color:#fff; font-size: 11pt; padding: 3px">KM'." ".$row['Ratio']." % ".'</span>' ?></span>
                        </div>
                     </div>
                     <div class="column-2"><span><?=number_format($row['Price'],0,',','.')?>đ</span></div>
                     <div class="column-2"><?php echo $_SESSION['cart'][$key]['qty'] ?></div>
                     <div class="column-2"><?=number_format($total_price_of_product,0,',','.')?>đ</div>               
                </div>
                <?php }
                            } ?>
                        <?php endforeach; ?>
                <div class="purchase-note">
                    <label for="">Lời nhắn: </label>
                    <input type="text" name="txt_note" placeholder="Lưu ý cho người bán...">
                </div>
                <div class="purchase-totalprice">
                    <div>
                        <p>Tổng số tiền(<?php $item = $_SESSION['cart'];echo count($item); ?> sản phẩm):</p>
                        <span><?=number_format($total_price,0,',','.')?>đ</span>
                    </div>
                </div>
            </div>
            <div class="func-purchase">
                <div class="payment-method">
                    <p>Phương thức thanh toán:</p><span>Thanh toán khi nhận hàng</span>
                </div>
                <input class="btn-purchase" type="submit" name="btn-buy" value="Đặt hàng">
            </div>
        </div>
        </form>
<!-------------------------------------------------- start-backend-order ----------------------------------------------------->
    <?php
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPKRSTUVWXYZ';
        $code_order = substr(str_shuffle($permitted_chars), 0, 10);
        $id_account = filter_input(INPUT_POST,'id_account');
        $note = filter_input(INPUT_POST,'txt_note');
        $date = date('Y-m-d H:i:s');
        $item = $_SESSION['cart'];
        $qt_product_of_the_order = count($item);
        if(isset($_POST['btn-buy'])){

        // insert vào order và lấy ra id_order
                $rs1 = mysqli_query($connect, "INSERT INTO orders (Id_orders, CodeOrder, Id_account, Quantity, Note, OrderDate, Status) VALUES ('', '$code_order', '$id_account', '$qt_product_of_the_order', '$note', '$date', '1')");
                $rs2 = mysqli_query($connect, "SELECT Id_orders, OrderDate FROM orders WHERE Id_account='$id_account' ORDER BY Id_orders DESC LIMIT 1;");
                if ($rs2->num_rows > 0) {
                    while ($row1 = $rs2->fetch_assoc()) {
                        $id_order = $row1['Id_orders'];
                    }
                } 

        //insert vào order detail
            foreach ($_SESSION['cart'] as $key  => $val){
                $rs3 = mysqli_query($connect, "SELECT products.Price as Price_product, (products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product WHERE products.Id_product='$key'");
                if ($rs3->num_rows > 0) {
                    while ($row3 = $rs3->fetch_assoc()) {
                        $price = $row3['Price_product'] - $row3['GiaKM'];
                    }
                }
                $qt = $_SESSION['cart'][$key]['qty'];
                $rs4 = mysqli_query($connect, "INSERT INTO orders_detail (Id_order_detail, Id_orders, Id_product, Quantity, Price) VALUES (NULL, '$id_order', '$key', '$qt', '$price')");
                unset($_SESSION['cart'][$key]);
            }

            $item = $_SESSION['cart'];
            if(count($item)==0){
                echo '<script>alert("Đặt hàng thành công");location.href = "index.php";</script>';
            }else{
                echo '<script>alert("Đặt hàng không thành công");window.history.go(-1);</script>'; 
            }
        }
        ?>
            
<!------------------------------------------------------- end-order ---------------------------------------------------------->

    </body>

</html>