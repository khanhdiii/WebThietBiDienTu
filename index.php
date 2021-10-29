<?php include './master/header.php' ?>

<!---------------------------------------------------------------------------- START CONTENT --------------------------------------------------------------------->
<style>
.product__promotion {
  position: absolute;
  display: flex;
  flex-direction: column;
  top: 0;
  right: 0;
  border-top-right-radius: 8px;
  background-color: rgba(255,212,36,.9);
  color: red;
  height: 45px;
  width: 36px;
}
.product__promotion::after {
    content: "";
    width: 0;
    height: 0;
    left: 0;
    bottom: -4px;
    position: absolute;
    border-color: transparent rgba(255,212,36,.9);
    border-style: solid;
    border-width: 0 18px 4px;
}
</style>
<div class="main-banner">
    <script type="text/javascript" src="./assets/js/slide.js"></script>
    <div id="jssor_1">
        <div data-u="slides" style="border-radius: 15px;cursor:default;width:1200px;height:380px;overflow:hidden;">
            <div style="background-color:#000000;">
                <img data-u="image" src="./assets/img/banner.png" />
            </div>
            <div>
                <img data-u="image" src="./assets/img/banner2.jpg" />
            </div>
            <div>
                <img data-u="image" src="./assets/img/banner3.png" />
            </div>
            <div>
                <img data-u="image" src="./assets/img/banner4.jpg" />
            </div>
            <div>
                <img data-u="image" src="./assets/img/banner5.jpg" />
            </div>
            <div>
                <img data-u="image" src="./assets/img/banner6.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:13px;height:13px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>

    </div>
    <script type="text/javascript">
        jssor_1_slider_init();
    </script>
</div>
<div class="sub-banner">
    <img src="./assets/img/subbanner1.png" alt="">
    <img src="./assets/img/subbanner2.png" alt="">
    <img src="./assets/img/subbanner3.png" alt="">
    <img src="./assets/img/subbanner4.png" alt="">
</div>
<div class="container">
    <div class="cooldown-date">
        <h2>F<i class="fas fa-bolt"></i>ASH SALE ONLINE</h2>
        <div id="cooldown-timer"></div>
    </div>
</div>
<div class="product-slider">
    <div class="slider" id="slider">
        <div class="slide" id="slide">
            <?php
            $id = filter_input(INPUT_GET, 'id');
            $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product WHERE promotion_detail.Ratio != 'NULL'";
            $result_getdata = mysqli_query($connect, $sql_getdata);
            if ($result_getdata) {
                while ($row = mysqli_fetch_array($result_getdata)) {
            ?>
                    <div class="item">
                        <div class="products-containers">
                            <div class="product">
                                <div class="product product__img">
                                    <a href="ProductDetail.php?id=<?php echo $row['Id__product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                        <img src="./admincode/uploads/<?php echo $row['ProductImage'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product product__brand">
                                    <?php if($row['Id_supplier'] == 5) echo '<img src="./assets/img/apple.png" alt="">' ?>
                                    <?php if($row['Ratio'] != NULL) echo '<img src="./assets/img/gia-soc.png" alt="">' ?> 
                                </div>
                                <?php if($row['Ratio'] != NULL) echo '<div class="product__promotion">
                                    <span style="font-size: 10pt;margin-top:5px">'.$row['Ratio'].'%</span>
                                    <span style="font-size: 10pt; color: #fff;text-shadow: 2px 2px 8px rgba(136, 117, 41, 0.9);">Giảm</span>
                                    </div>' 
                                ?>
                                <div class="product product-title">
                                    <div class="product-name">
                                        <span><?php echo $row['ProductName']; ?></span>
                                    </div>
                                    <div class="product product-sales">
                                        <i class="fas fa-bolt"></i>
                                        <span class="aabb">Giảm <?= number_format($row['GiaKM'], 0, ',', '.') ?> đ</span>
                                    </div>
                                    <div class="product-prises">
                                        <span class="origin-prise"><?= number_format($row['Price'] - $row['GiaKM'], 0, ',', '.') ?> ₫</span>
                                        <span class="sale-prise"><?= number_format($row['Price'], 0, ',', '.') ?> ₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
        <button class="ctrl-btn pro-prev">
            <i class="fa fas fa-chevron-left"></i>
        </button>
        <button class="ctrl-btn pro-next">
            <i class="fa fas fa-chevron-right"></i>
        </button>
    </div>
    <script type="text/javascript" src="./assets/js/slide.js"></script>
</div>
<div class="content-center">
    <div class="content-product">
        <img src="./assets/img/bannercenter1.jpg" alt="">
        <div class="products iphone-products">
            <h4>
                <a href="#">Apple authorised Reseller</a>
            </h4>
        </div>
        <div class="products-list">
            <?php
            $id = filter_input(INPUT_GET, 'id');
            $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product where Id_supplier ='5' limit 10";
            $result_getdata = mysqli_query($connect, $sql_getdata);
            if ($result_getdata) {
                while ($row = mysqli_fetch_array($result_getdata)) {
            ?>
                    <div class="products-container">
                        <div class="product">
                            <div class="product product__img">
                                <a href="ProductDetail.php?id=<?php echo $row['Id__product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                    <img src="./admincode/uploads/<?php echo $row['ProductImage'] ?>" alt="">
                                </a>
                            </div>
                            <div class="product product__brand">
                                <?php if($row['Id_supplier'] == 5) echo '<img src="./assets/img/apple.png" alt="">' ?>
                                <?php if($row['Ratio'] != NULL) echo '<img src="./assets/img/gia-soc.png" alt="">' ?> 
                            </div>
                            <?php if($row['Ratio'] != NULL) echo '<div class="product__promotion">
                                    <span style="font-size: 10pt;margin-top:5px">'.$row['Ratio'].'%</span>
                                    <span style="font-size: 10pt; color: #fff;text-shadow: 2px 2px 8px rgba(136, 117, 41, 0.9);">Giảm</span>
                                    </div>' 
                                ?>
                            <div class="product product-title">
                                <div class="product-name">
                                    <span><?php echo $row['ProductName']; ?></span>
                                </div>
                                <div class="product product-sales">
                                    <i class="fas fa-bolt"></i>
                                    <span class="aabb">Giảm <?= number_format($row['GiaKM'], 0, ',', '.') ?> đ</span>
                                </div>
                                <div class="product-prises">
                                    <span class="origin-prise"><?= number_format($row['Price'] - $row['GiaKM'], 0, ',', '.') ?> ₫</span>
                                    <span class="sale-prise"><?= number_format($row['Price'], 0, ',', '.') ?> ₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<div class="content-center">
    <div class="content-product">
        <div class="products iphone-products">
            <h4>
                <a href="#">Có thể bạn sẽ thích</a>
            </h4>
        </div>
        <div class="products-list">
            <?php
            $id = filter_input(INPUT_GET, 'id');
            $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product order by rand() limit 5";
            $result_getdata = mysqli_query($connect, $sql_getdata);
            if ($result_getdata) {
                while ($row = mysqli_fetch_array($result_getdata)) {
            ?>
                    <div class="products-container">
                        <div class="product">
                            <div class="product product__img">
                                <a href="ProductDetail.php?id=<?php echo $row['Id__product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                    <img src="./admincode/uploads/<?php echo $row['ProductImage'] ?>" alt="">
                                </a>
                            </div>
                            <div class="product product__brand">
                                <?php if($row['Id_supplier'] == 5) echo '<img src="./assets/img/apple.png" alt="">' ?>
                                <?php if($row['Ratio'] != NULL) echo '<img src="./assets/img/gia-soc.png" alt="">' ?> 
                            </div>
                            <?php if($row['Ratio'] != NULL) echo '<div class="product__promotion">
                                    <span style="font-size: 10pt;margin-top:5px">'.$row['Ratio'].'%</span>
                                    <span style="font-size: 10pt; color: #fff;text-shadow: 2px 2px 8px rgba(136, 117, 41, 0.9);">Giảm</span>
                                    </div>' 
                                ?>
                            <div class="product product-title">
                                <div class="product-name">
                                    <span><?php echo $row['ProductName']; ?></span>
                                </div>

                                <div class="product product-sales">
                                    <i class="fas fa-bolt"></i>
                                    <span class="aabb">Giảm <?= number_format($row['GiaKM'], 0, ',', '.') ?> đ</span>
                                </div>
                                <div class="product-prises">
                                    <span class="origin-prise"><?= number_format($row['Price'] - $row['GiaKM'], 0, ',', '.') ?> ₫</span>
                                    <span class="sale-prise"><?= number_format($row['Price'], 0, ',', '.') ?> ₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<div class="content-center">
    <div class="content-product">
        <div class="products iphone-products">
            <h4>
                <a href="#">Điện thoại nổi bật</a>
            </h4>
        </div>
        <div class="products-list">
            <?php
            $id = filter_input(INPUT_GET, 'id');
            $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product where Id_category ='1' limit 10";
            $result_getdata = mysqli_query($connect, $sql_getdata);
            if ($result_getdata) {
                while ($row = mysqli_fetch_array($result_getdata)) {
            ?>
                    <div class="products-container">
                        <div class="product">
                            <div class="product product__img">
                                <a href="ProductDetail.php?id=<?php echo $row['Id__product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                    <img src="./admincode/uploads/<?php echo $row['ProductImage'] ?>" alt="">
                                </a>
                            </div>
                            <div class="product product__brand">
                                <?php if($row['Id_supplier'] == 5) echo '<img src="./assets/img/apple.png" alt="">' ?>
                                <?php if($row['Ratio'] != NULL) echo '<img src="./assets/img/gia-soc.png" alt="">' ?> 
                            </div>
                            <?php if($row['Ratio'] != NULL) echo '<div class="product__promotion">
                                    <span style="font-size: 10pt;margin-top:5px">'.$row['Ratio'].'%</span>
                                    <span style="font-size: 10pt; color: #fff;text-shadow: 2px 2px 8px rgba(136, 117, 41, 0.9);">Giảm</span>
                                    </div>' 
                                ?>
                            <div class="product product-title">
                                <div class="product-name">
                                    <span><?php echo $row['ProductName']; ?></span>
                                </div>
                                <div class="product product-sales">
                                    <i class="fas fa-bolt"></i>
                                    <span class="aabb">Giảm <?= number_format($row['GiaKM'], 0, ',', '.') ?> đ</span>
                                </div>
                                <div class="product-prises">
                                    <span class="origin-prise"><?= number_format($row['Price'] - $row['GiaKM'], 0, ',', '.') ?> ₫</span>
                                    <span class="sale-prise"><?= number_format($row['Price'], 0, ',', '.') ?> ₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<div class="content-center">
    <div class="content-product">
        <div class="products iphone-products">
            <h4>
                <a href="#">Đồng hồ thông minh</a>
            </h4>
        </div>
        <div class="products-list">
            <?php
            $id = filter_input(INPUT_GET, 'id');
            $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product where Id_category ='2' limit 5";
            $result_getdata = mysqli_query($connect, $sql_getdata);
            if ($result_getdata) {
                while ($row = mysqli_fetch_array($result_getdata)) {
            ?>
                    <div class="products-container">
                        <div class="product">
                            <div class="product product__img">
                                <a href="ProductDetail.php?id=<?php echo $row['Id__product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                    <img src="./admincode/uploads/<?php echo $row['ProductImage'] ?>" alt="">
                                </a>
                            </div>
                            <div class="product product__brand">
                                <?php if($row['Id_supplier'] == 5) echo '<img src="./assets/img/apple.png" alt="">' ?>
                                <?php if($row['Ratio'] != NULL) echo '<img src="./assets/img/gia-soc.png" alt="">' ?> 
                            </div>
                            <?php if($row['Ratio'] != NULL) echo '<div class="product__promotion">
                                    <span style="font-size: 10pt;margin-top:5px">'.$row['Ratio'].'%</span>
                                    <span style="font-size: 10pt; color: #fff;text-shadow: 2px 2px 8px rgba(136, 117, 41, 0.9);">Giảm</span>
                                    </div>' 
                                ?>
                            <div class="product product-title">
                                <div class="product-name">
                                    <span><?php echo $row['ProductName']; ?></span>
                                </div>
                                <div class="product product-sales">
                                    <i class="fas fa-bolt"></i>
                                    <span class="aabb">Giảm <?= number_format($row['GiaKM'], 0, ',', '.') ?> đ</span>
                                </div>
                                <div class="product-prises">
                                    <span class="origin-prise"><?= number_format($row['Price'] - $row['GiaKM'], 0, ',', '.') ?> ₫</span>
                                    <span class="sale-prise"><?= number_format($row['Price'], 0, ',', '.') ?> ₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<div class="content-center">
    <div class="content-product">
        <div class="products iphone-products">
            <h4>
                <a href="#">Tablet</a>
            </h4>
        </div>
        <div class="products-list">
            <?php
            $id = filter_input(INPUT_GET, 'id');
            $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product where Id_category ='4' limit 5";
            $result_getdata = mysqli_query($connect, $sql_getdata);
            if ($result_getdata) {
                while ($row = mysqli_fetch_array($result_getdata)) {
            ?>
                    <div class="products-container">
                        <div class="product">
                            <div class="product product__img">
                                <a href="ProductDetail.php?id=<?php echo $row['Id__product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                    <img src="./admincode/uploads/<?php echo $row['ProductImage'] ?>" alt="">
                                </a>
                            </div>
                            <div class="product product__brand">
                                <?php if($row['Id_supplier'] == 5) echo '<img src="./assets/img/apple.png" alt="">' ?>
                                <?php if($row['Ratio'] != NULL) echo '<img src="./assets/img/gia-soc.png" alt="">' ?> 
                            </div>
                            <?php if($row['Ratio'] != NULL) echo '<div class="product__promotion">
                                    <span style="font-size: 10pt;margin-top:5px">'.$row['Ratio'].'%</span>
                                    <span style="font-size: 10pt; color: #fff;text-shadow: 2px 2px 8px rgba(136, 117, 41, 0.9);">Giảm</span>
                                    </div>' 
                                ?>
                            <div class="product product-title">
                                <div class="product-name">
                                    <span><?php echo $row['ProductName']; ?></span>
                                </div>
                                <div class="product product-sales">
                                    <i class="fas fa-bolt"></i>
                                    <span class="aabb">Giảm <?= number_format($row['GiaKM'], 0, ',', '.') ?> đ</span>
                                </div>
                                <div class="product-prises">
                                    <span class="origin-prise"><?= number_format($row['Price'] - $row['GiaKM'], 0, ',', '.') ?> ₫</span>
                                    <span class="sale-prise"><?= number_format($row['Price'], 0, ',', '.') ?> ₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<div class="content-center">
    <div class="content-product">
        <div class="products iphone-products">
            <h4>
                <a href="#">Laptop</a>
            </h4>
        </div>
        <div class="products-list">
            <?php
            $id = filter_input(INPUT_GET, 'id');
            $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product where Id_category ='3' limit 5";
            $result_getdata = mysqli_query($connect, $sql_getdata);
            if ($result_getdata) {
                while ($row = mysqli_fetch_array($result_getdata)) {
            ?>
                    <div class="products-container">
                        <div class="product">
                            <div class="product product__img">
                                <a href="ProductDetail.php?id=<?php echo $row['Id__product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                    <img src="./admincode/uploads/<?php echo $row['ProductImage'] ?>" alt="">
                                </a>
                            </div>
                            <div class="product product__brand">
                                <img src="./assets/img/apple.png" alt="">
                            </div>
                            <div class="product product__brand">
                                <?php if($row['Id_supplier'] == 5) echo '<img src="./assets/img/apple.png" alt="">' ?>
                                <?php if($row['Ratio'] != NULL) echo '<img src="./assets/img/gia-soc.png" alt="">' ?> 
                            </div>
                            <?php if($row['Ratio'] != NULL) echo '<div class="product__promotion">
                                    <span style="font-size: 10pt;margin-top:5px">'.$row['Ratio'].'%</span>
                                    <span style="font-size: 10pt; color: #fff;text-shadow: 2px 2px 8px rgba(136, 117, 41, 0.9);">Giảm</span>
                                    </div>' 
                                ?>
                            <div class="product product-title">
                                <div class="product-name">
                                    <span><?php echo $row['ProductName']; ?></span>
                                </div>
                                <div class="product product-sales">
                                    <i class="fas fa-bolt"></i>
                                    <span class="aabb">Giảm <?= number_format($row['GiaKM'], 0, ',', '.') ?> đ</span>
                                </div>
                                <div class="product-prises">
                                    <span class="origin-prise"><?= number_format($row['Price'] - $row['GiaKM'], 0, ',', '.') ?> ₫</span>
                                    <span class="sale-prise"><?= number_format($row['Price'], 0, ',', '.') ?> ₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    const aabbs = document.querySelectorAll('.aabb')
    console.log(aabbs)
    const productSales = document.querySelectorAll('.product-sales')
    console.log(productSales);
    const originPrices=document.querySelectorAll('.origin-prise')
    console.log(originPrices);
    const salePrices=document.querySelectorAll('.sale-prise')
    console.log(salePrices);
    for (let i = 0; i < aabbs.length; i++) {
        let aabb = aabbs[i]
        let productSale = productSales[i]
        if (aabb.innerText == 'Giảm 0 đ') {
            productSale.style.display = "none";
        } else {
            productSale.style.display = "block";
        }
        let originPrice = originPrices[i]
        let salePrice = salePrices[i]
        if(salePrice.innerText==originPrice.innerText){
            salePrice.style.display="none";
        }
    }
</script>
<!-------------------------------------------------------------------------------- END CONTENT ---------------------------------------------------------------------------->

<?php include './master/footer.php' ?>