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
    <link rel="stylesheet" href="./assets/css/search.css">
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
                            <li><a href="">Giới thiệu</a><i class="fas fa-chevron-right"></i></li>
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
                                    <a href="accountManagement.php"><?php echo $_SESSION['username'] ?></a>
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
                    <div class="header__search-box mg20">
                        <a href="index.php">
                            <img src="./assets/img/nlogoo.png" width="270px" height="42px" alt="" class="header__search__logo">
                        </a>
                        <form action="search.php" method="get">
                            <div class="header-with__search-box">
                                <input type="text" id="search-bar" name="search" class="js-search" placeholder="Hôm nay bạn cần tìm gì?" name="" id="">
                                <button type="submit" name="ok" value="search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <div class="header__order">
                        <div class="header__order">
                            <a href="<?php if(isset($_SESSION['username'])){echo 'OrderMana.php';}else{Echo 'signin.php';} ?>" class="header__order-andCart header__order--buy">
                                <i class="fas fa-shipping-fast"></i>
                                <span>Lịch sử mua <br> hàng</span>
                            </a>
                        </div>
                        </div>
                        <div class="header__cart--shopping">
                            <a href="cart.php" class="">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <label><?php
                                    if (isset($_SESSION['cart'])) {
                                        $item = $_SESSION['cart'];
                                        echo count($item);
                                    } else {
                                        echo '0';
                                    } ?></label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="back">
            <a href='javascript: history.go(-1)'><i class="fas fa-reply back"></i>Quay lại</a>
        </div>
        <div class="cart-container">
            <div class="container">
                <!-- Kiểm tra giỏ hàng có tồn tại -->
                <?php
                $total_price = 0;
                if (isset($_SESSION['cart']) && count($item) > 0) : ?>
                    <section id="cart">
                        <!-- duyệt session lấy id sản phẩm  -->
                        <?php foreach ($_SESSION['cart'] as $key  => $val) :
                            $sql = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product WHERE products.Id_product='$key'";
                            $result = mysqli_query($connect, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) {
                        ?>
                                    <article class="product">
                                        <header>
                                            <a href="ProductDetail.php?id=<?php echo $row['Id_product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                                <img src="./admincode/uploads/<?php echo $row['ProductImage']; ?>" alt="">
                                            </a>
                                        </header>

                                        <div class="content">
                                            <div class="f-cart-l">
                                                <h1><?php echo $row['ProductName'] ?><?php if($row['Ratio'] != NULL) echo '<span style="color:red; margin-left: 15px; background-color:tomato; border-radius:5px; color:#fff; font-size: 11pt; padding: 3px">KM'." ".$row['Ratio']." % ".'</span>' ?></h1>
                                                <a href="remove_cart_item.php?id=<?php echo $row['Id__product']; ?>" onClick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng?')">Xóa</a>
                                            </div>
                                            <div style="display: flex;" >Giá gốc:<h2 class="price" style="font-size: 12pt; margin: 0 0 0 10px;"><?=number_format($row['Price'],0,',','.')?></h2>đ</div>
                                        </div>

                                        <footer class="content">
                                            <a href="qt-minus.php?key=<?php echo $key ?>" class="qt-minus">-</a>
                                            <span class="qt" ><?php echo $_SESSION['cart'][$key]['qty'] ?></span>
                                            <a href="qt-plus.php?key=<?php echo $key ?>" class="qt-plus">+</a>         
                                            <?php $total_price_of_product = ($row['Price'] - $row['GiaKM'])* $_SESSION['cart'][$key]['qty'];
                                            $total_price = $total_price + $total_price_of_product;
                                            ?>
                                            <span style="width: 250px;font-size:13pt" class="full-price" data-value="<?php echo product_price($total_price_of_product) ?>">Thành tiền:<?php echo " " ?><?=number_format($total_price_of_product,0,',','.')?>đ</span>
                                            <h2 class="price">
                                                <?php if($row['Ratio'] != NULL) echo 'Giá KM: '.number_format($row['Price'] - $row['GiaKM'],0,',','.').'đ' ?>
                                            </h2>
                                        </footer>
                                    </article>
                            <?php }
                            } ?>
                        <?php endforeach; ?>
                    </section>
                <?php else : ?>
                    <div style="min-height: 700px; background-color:#fff; margin-bottom:18px">
                        <p style=" height: 300px;text-align: center;line-height: 287px; font-size:14pt">Không có sản phẩm nào trong giỏ hàng</p>
                    </div>
                <?php endif; ?>

            </div>

            <footer id="site-footer">
                <div class="container clearfix">
                    <div class="right">
                        <h1 class="total">Tổng tiền: <span><span><?=number_format($total_price,0,',','.')?></span>đ</h1>
                        <a href="check_login.php" name="haha" class="btn" style="text-decoration: none ;">Mua hàng</a>
                    </div>
                </div>
            </footer>
        </div>
        <?php
                if (isset($_POST['haha'])){
                    echo '<script type="text/javascript">alert("Mật khẩu cập nhật thành công")</script>';
                }

                ?>
        <div class="modal-search">
            <div class="modal__overlay">
            </div>
        </div>
        <div class="modal-products">
            <div class="product-container">
                <div class="model-close js-close-product">
                    <i class="fas fa-times"></i>
                </div>
                <div class="quick-order">
                    <div class="form-quick-order">
                        <div class="quick-order__left">
                            <img src="./assets/img/iphone-11.png" alt="">
                            <div class="product product-title">
                                <div class="product-name">
                                    <span>Apple iPhone 13 Pro Max - 128GB - Chính hãng VN/A</span>
                                </div>
                                <div class="product-prises">
                                    <span class="prices" class="origin-prise" data-value="2500000">2500000</span>
                                    <span class="sale-prise">19,990,000</span>
                                </div>
                            </div>
                            <div class="hot-line">
                                <a href="tel:0347981234">
                                    <i class="fas fa-headset"></i>
                                    <strong>1900.2091</strong>
                                </a>
                                <p>Phím 1 - Hotline bán hàng online</p>
                            </div>
                        </div>
                        <div class="quick-order__right">
                            <h3>Đặt hàng sản phẩm</h3>
                            <div class="quick-order__right--row">
                                <label for="">Số lượng</label>
                                <div class="control">
                                    <button type="button" id="btnMinus">-</button>
                                    <input type="text" value="1" id="txt_quantity">
                                    <button type="button" id="btnPlus">+</button>
                                </div>
                            </div>

                            <div class="quick-order__right--row">
                                <div class="row-input">
                                    <label for="">Họ Tên</label>
                                    <input type="text" placeholder="Họ và tên*">
                                </div>

                            </div>
                            <div class="quick-order__right--row">
                                <div class="order__right--row">
                                    <div class="row-input">
                                        <label for="">Tỉnh/Thành phố:</label>
                                        <select class="order-city-input" name="calc_shipping_provinces" required="">
                                            <option value="">Tỉnh / Thành phố</option>
                                        </select>
                                        <input class="billing_address_1" name="" type="hidden" value="">
                                    </div>
                                    <div class="row-input">
                                        <label for="">Quận/Huyện:</label>
                                        <select class="order-city-input" name="calc_shipping_district" required="">
                                            <option value="">Quận / Huyện</option>
                                        </select>
                                        <input class="billing_address_2" name="" type="hidden" value="">
                                    </div>
                                </div>
                                <div class="row-input">
                                    <input type="text" placeholder="Địa chỉ*" name="" id="">
                                </div>

                            </div>
                            <div class="quick-order__right--row">
                                <div class="order__right--row">
                                    <div class="row-input">
                                        <label for="">Điện thoại</label>
                                        <input type="text" placeholder="Số điện thoại*" value="">
                                    </div>
                                    <div class="row-input">
                                        <label for="">Email</label>
                                        <input type="text" placeholder="Email" value="">
                                    </div>
                                </div>
                                <div class="row-input">
                                    <textarea name="" id="" placeholder="Ghi chú" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row-submit">
                                <input type="text " placeholder="Mã giảm giá nếu có">
                                <p>Bằng cách đặt hàng bạn đã đồng ý với điều khoản sử dụng và chính sách đổi trả</p>
                                <button type="submit">
                                    Tiến hành đặt hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js"></script>
        <script type="text/javascript" src="./assets/js/filter.js"></script>
        <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
        <script src="./assets/js/main.js"></script>
        <script src="./assets/js/cart.js"></script>
</body>

</html>