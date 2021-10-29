<?php include 'master/header.php'?>


        <div class="breadcrumbs">
            <div class="container">
            <?php
                $id = filter_input(INPUT_GET, 'id');
                $sql_getdata = "SELECT * FROM products, category,supplier Where category.Id_category = products.Id_category AND products.Id_supplier = supplier.Id_supplier AND Id_product = $id";
                $result_getdata = mysqli_query($connect, $sql_getdata);
                if ($result_getdata) {
                    while ($row = mysqli_fetch_array($result_getdata)) {
            ?>           
                <ul>
                    <li><a href="index.php">
                            <i class="fas fa-home"></i>
                            Trang chủ
                        </a></li>
                    <li><a href="Category.php?&id_category=<?php echo $row['Id_category'] ?>"><?php echo $row['CategoryName']?></a></li>
                    <li><a href="#"><?php echo $row['Supplier_Name']?></a></li>
                    <li><a href="#"><?php echo $row['ProductName']?></a></li>
                </ul>
            <?php }}?>    
            </div>
        </div>
        <div class="product-detail-area">
        <?php
            $id = filter_input(INPUT_GET, 'id');
            $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product 
            FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product WHERE products.Id_product='$id'";
            $result_getdata = mysqli_query($connect, $sql_getdata);
            if ($result_getdata) {
                while ($row = mysqli_fetch_array($result_getdata)) {
       ?>
            <h1><?php echo $row['ProductName']?><?php if($row['Ratio'] != NULL) echo '<span style="color:red; margin-left: 15px; background-color:tomato; border-radius:5px; color:#fff; font-size: 11pt; padding: 3px">SP đang được khuyến mãi</span>' ?></h1>
            <div class="product-detail">
                <div class="product-detail__left">
                    <div class="img-slider">
                        <div class="slide active">
                            <img src="./admincode/uploads/<?php echo $row['ProductImage']?>" alt="NoImage">
                        </div>
                    </div>
                    <div class="navigation">
                        <div class="btn active">
                            <img src="./admincode/uploads/<?php echo $row['ProductImage']?>" alt="NoImage">
                        </div>
                    </div>
                    <!-- <script type="text/javascript">
                        var slides = document.querySelectorAll('.slide');
                        var btns = document.querySelectorAll('.btn');
                        let currentSlide = 1;

                        // Javascript for image slider manual navigation
                        var manualNav = function (manual) {
                            slides.forEach((slide) => {
                                slide.classList.remove('active');

                                btns.forEach((btn) => {
                                    btn.classList.remove('active');
                                });
                            });

                            slides[manual].classList.add('active');
                            btns[manual].classList.add('active');
                        }

                        btns.forEach((btn, i) => {
                            btn.addEventListener("click", () => {
                                manualNav(i);
                                currentSlide = i;
                            });
                        });

                        // Javascript for image slider autoplay navigation
                        var repeat = function (activeClass) {
                            let active = document.getElementsByClassName('active');
                            let i = 1;

                            var repeater = () => {
                                setTimeout(function () {
                                    [...active].forEach((activeSlide) => {
                                        activeSlide.classList.remove('active');
                                    });

                                    slides[i].classList.add('active');
                                    btns[i].classList.add('active');
                                    i++;

                                    if (slides.length == i) {
                                        i = 0;
                                    }
                                    if (i >= slides.length) {
                                        return;
                                    }
                                    repeater();
                                }, 5000);
                            }
                            repeater();
                        }
                        repeat();
                    </script> -->
                </div>
                <div class="product-detail__center">
                    <div class="product-prises">
                        <span id="prices" class="origin-prise"><?= number_format($row['Price'] - $row['GiaKM'], 0, ',', '.') ?> ₫</span>
                        <?php if($row['Ratio'] != NULL) echo '<span>Giá niêm yết:</span><span class="sale-prise">'.number_format($row['Price'], 0, ',', '.').'đ</span>' ?>
                    </div>
                    <div class="detail__center__freeship">
                        <i class="fas fa-truck"></i>
                        <span>Miễn phí vận chuyển toàn quốc</span>
                    </div>
                    <div class="product-options">
                        <span>Mô tả:</span>
                        <div style="margin-bottom: 20px;width: 370px;" class="des">
                            <p><?php echo $row['Description'] ?></p>
                        </div>

                    </div>
                    <div class="product-detail__center__btn">
                        <a id="product-detail-buy1" name="buy1" title="Mua ngay" href="buyProduct.php?id=<?php echo $row['Id_product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                            <span>Mua ngay</span>
                            <span>Trả tiền khi nhận hàng (COD)</span>
                        </a>
                        <a id="product-detail-buy2" name="buy1" title="Mua ngay" href="signin.php">
                            <span>Mua ngay</span>
                            <span>Trả tiền khi nhận hàng (COD)</span>
                        </a>
                        <a href="addcart.php?item=<?php echo $row['Id__product']; ?>" type="submit" title="Thêm vào giỏ hàng">
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="product-detail__right">
                    <div class="product-right-container">
                        <div class="product-detail__right__shop">
                            <span>Thông tin bảo hành</span>
                            <p>
                                <i class="fas fa-shield-alt"></i>
                                <span>Bảo hành 12 tháng chính hãng. Bao xài, đổi trả trong 15 ngày đầu.</span>
                            </p>
                        </div>
                        <div class="product-detail__right__check">
                            <span>Mua ngay để nhận các phần quà hấp dẫn</span>
                        </div>
                    </div>

                </div>
            </div>
            <?php }}?>
            <div class="similar-product">
                <div class="products iphone-products">
                    <h4>
                        <a href="">Các sản phẩm tương tự</a>
                    </h4>
                </div>
                <div class="product-slider"> 
                    <div class="slider" id="slider">
                        <div class="slide" id="slide">
                        <?php
                            $id_category = filter_input(INPUT_GET, 'id_category');
                            $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product where Id_category ='$id_category'";
                            $result_getdata = mysqli_query($connect, $sql_getdata);
                            if ($result_getdata) {
                                while ($row = mysqli_fetch_array($result_getdata)) {
                        ?>
                            <div class="item">
                                <div class="products-containers">
                                    <div class="product">
                                        <div class="product product__img">
                                            <a href="ProductDetail.php?id=<?php echo $row['Id__product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                                <img src="./admincode/uploads/<?php echo $row['ProductImage']?>" alt="">
                                            </a>
                                        </div>
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
                        <?php }}?>
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
            </div>
        </div>
        <div class="footer">
            <div class="footer_image">
                <img class="footer__img" src="./assets/img/footer.png" alt="">
            </div>
            <div class="footer__with-email">
                <img class="footer__img1" src="./assets/img/footer2.png" alt="">
                <span>Đăng ký nhận tin khuyến mãi</span>
                <div class="footer__with-email--box">
                    <input type="email" placeholder="Nhập E-mail của bạn" name="" id="">
                    <button type="submit" value="">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
            <div class="footer__inforr">
                <div class="col-contentt">
                    <div class="col-content--block">
                        <h4><a>Hỗ Trợ - Dịch Vụ</a></h4>
                        <ul>
                            <li><a href="/mua-hang-tra-gop">Mua hàng trả góp</a></li>
                            <li><a href="/huong-dan-dat-hang">Hướng dẫn đặt hàng và thanh toán</a>
                            </li>
                            <li><a href="/chinh-sach-bao-hanh">Chính sách bảo hành</a></li>
                            <li><a href="/cau-hoi-thuong-gap">Câu hỏi thường gặp</a></li>
                            <li><a href="/order/check">Tra cứu đơn hàng</a></li>
                            <li><a href="/chinh-sach-bao-mat">Chính sách bảo mật</a></li>
                            <li><a href="/chinh-sach-huy-giao-dich-doi-tra">Chính sách hủy giao dịch, đổi
                                    trả</a></li>
                            <li><a href="/chinh-sach-giai-quyet-khieu-nai">Chính sách giải quyết khiếu
                                    nại</a></li>
                            <li><a href="/dieu-khoan-mua-ban-hang-hoa">Điều khoản mua bán hàng hóa</a></li>
                            <li><a href="/dat-hang/bao-hanh-mo-rong">Phạm vi, điều khoản gói bảo hành mở
                                    rộng</a></li>
                        </ul>
                    </div>
                    <div class="col-content--block">
                        <h4><a>Thông Tin Liên Hệ</a></h4>
                        <ul>
                            <li><a href="/mua-hang-online">Bán hàng Online</a></li>
                            <li><a>Chăm sóc khách hàng</a></li>
                            <li><a>Hỗ Trợ Kỹ thuật</a></li>
                            <li><a>Hỗ trợ Bảo hiểm & Sửa chữa</a></li>
                            <li><a>Liên hệ khối văn phònng</a></li>
                        </ul>
                    </div>

                    <div class="tel-phone">
                        <h4>Tổng đài</h4>
                        <a class="hotline" href="tel:0347981234">1900.2091</a>
                    </div>

                    <div class="other-image">
                        <h4>Thanh toán miễn phí</h4>
                        <ul class="list-logo">
                            <li>
                                <img src="./assets/img/logo-visa.png">
                                <img src="./assets/img/logo-master.png">
                            </li>
                            <li>
                                <img src="./assets/img/logo-jcb.png">
                                <img src="./assets/img/logo-samsungpay.png">
                            </li>
                            <li>
                                <img src="./assets/img/logo-atm.png">
                                <img src="./assets/img/logo-vnpay.png">
                            </li>
                        </ul>
                    </div>

                    <div class="other-image">
                        <h4>Hình thức vận chuyển</h4>
                        <ul class="list-logo">
                            <li>
                                <img src="./assets/img/nhattin.jpg">
                                <img src="./assets/img/vnpost.jpg">
                            </li>
                        </ul>
                        <div class="mg-top20">
                            <a href="http://online.gov.vn/Home/WebDetails/28738" target="_blank"><img
                                    src="./assets/img/logo-bct.png"></a>
                        </div>
                    </div>
                </div>

                <div class="info-content">
                    <p>© 2020. CÔNG TY CỔ PHẦN XÂY DỰNG VÀ ĐẦU TƯ THƯƠNG MẠI TECHZONE. MST: 0106713191. (Đăng ký
                        lần
                        đầu: Ngày 15 tháng 9 năm 2021, Đăng ký thay đổi ngày 12/10/2021)</p>
                    <p><strong>GP số 426/GP-TTĐT do sở TTTT Đà Nẵng cấp ngày 22/10/2021</strong></p>
                    <p>Địa chỉ: 12 Lê Duẩn, P.Tân Chính, Q. Thanh Khê, Đà Nẵng. Điện thoại:
                        1900.2091. Chịu trách nhiệm nội dung: <strong>Trương Phước Nguyên</strong>.</p>
                    <p>Designed by: <strong>Kent Lee</strong> @kentlee.design</p>
                </div>
            </div>
        </div>
        <div class="banner-bot">
            <img src="./assets/img/bannerbot.jpg" alt="">
        </div>
    </div>
    </div>
        <div class="banner-bot">
            <img src="./assets/img/bannerbot.jpg" alt="">
        </div>
    </div>

    </div>
    <div class="nav-social">
        <div class="social-list">
            <ul class="nav-social social-list--links">
                <li class="social-list--links__fb"><i class="fab fa-facebook-f"></i></li>
                <li class="social-list--links__youtube"><i class="fab fa-youtube"></i></li>
                <li class="social-list--links__insta"><i class="fab fa-instagram"></i></li>
                <li class="social-list--links__tiktok"><i class="fab fa-tiktok"></i></li>
            </ul>
        </div>
    </div>
    <div class="modal-search">
        <div class="modal__overlay">
        </div>
    </div>
    <div class="modal-products" style="display: none;">
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
                                <span class="origin-prises" data-value="2500000">2500000</span>
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
    <?php
        if (isset($_SESSION['username'])) {
            echo '<script>
            var hideee=document.getElementById("product-detail-buy2")
            hideee.style.display="none"
            </script>';
        } else {
            echo '<script>
            const hidee = document.querySelector("#product-detail-buy1") 
            hidee.style.display = "none"
            </script>';
        }
        ?>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js"></script>
    <script type="text/javascript" src="./assets/js/filter.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/productDetai.js"></script>
    <script src="./assets/js/indexx.js"></script>
</body>

</html>