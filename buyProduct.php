<?php include 'master/header.php' ?>
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
                    <li><a href="">
                            <i class="fas fa-home"></i>
                            Trang chủ
                        </a></li>
                    <li><a href=""><?php echo $row['CategoryName']?></a></li>
                    <li><a href=""><?php echo $row['Supplier_Name']?></a></li>
                    <li><a href=""><?php echo $row['ProductName']?></a></li>
                </ul>
            <?php }}?>    
            </div>
        </div>
        <div class="product-detail-area">
        <?php
            $id = filter_input(INPUT_GET, 'id');
            $sql_getdata = "SELECT (Price-(Price*15/100)) as GiaKM,products.* FROM products Where Id_product = '$id'";
            $result_getdata = mysqli_query($connect, $sql_getdata);
            if ($result_getdata) {
                while ($row = mysqli_fetch_array($result_getdata)) {
       ?>
            <h1><?php echo $row['ProductName']?></h1>
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
                        <span id="prices" class="origin-prise"><?= number_format($row['Price'], 0, ',', '.') ?>đ</span>
                        <span>Giá niêm yết:</span>
                        <span class="sale-prise"><?= number_format($row['Price'], 0, ',', '.') ?>đ</span>
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
                                <a id="product-detail-buy1" title="Mua ngay">
                                    <span>Mua ngay</span>
                                    <span>Trả tiền khi nhận hàng (COD)</span>
                                </a>
                                <a type="submit" title="Thêm vào giỏ hàng">
                                    <i class="fas fa-plus"></i>
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                <?php }
        } ?>

                <div class="product-detail__right">
                    <div class="product-right-container">
                        <div class="product-detail__right__shop">
                            <span>Chỉ có tại FRESHfood</span>
                            <p>
                                <i class="fas fa-shield-alt"></i>
                                <span>Vận chuyển nội thành. Freeship đơn hàng từ 400k.</span>
                            </p>
                        </div>
                        <div class="product-detail__right__check">
                            <span>Bảo hành đổi trả trong vòng 12h tại nhà</span>
                        </div>
                    </div>

                </div>
                    </div>
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
                            $sql_getdata = "SELECT * FROM products Where Id_category = '$id_category'";
                            $result_getdata = mysqli_query($connect, $sql_getdata);
                            if ($result_getdata) {
                                while ($row = mysqli_fetch_array($result_getdata)) {
                        ?>
                            <div class="item">
                                <div class="products-containers">
                                    <div class="product">
                                        <div class="product product__img">
                                            <a href="ProductDetail.php?id=<?php echo $row['Id_product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                                <img src="./admincode/uploads/<?php echo $row['ProductImage']?>" alt="">
                                            </a>
                                        </div>
                                        <div class="product product-title">
                                            <div class="product-name">
                                                <span><?php echo $row['ProductName']?></span>
                                            </div>
                                            <div class="product-prises">
                                                <span class="origin-prise"><?= number_format($row['Price'], 0, ',', '.') ?>₫</span>
                                                <span class="sale-prise"><?= number_format($row['Price'], 0, ',', '.') ?>₫</span>
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
                                        <img src="/assets/img/logo-master.png">
                                    </li>
                                    <li>
                                        <img src="/assets/img/logo-jcb.png">
                                        <img src="/assets/img/logo-samsungpay.png">
                                    </li>
                                    <li>
                                        <img src="/assets/img/logo-atm.png">
                                        <img src="/assets/img/logo-vnpay.png">
                                    </li>
                                </ul>
                            </div>

                            <div class="other-image">
                                <h4>Hình thức vận chuyển</h4>
                                <ul class="list-logo">
                                    <li>
                                        <img src="/assets/img/nhattin.jpg">
                                        <img src="/assets/img/vnpost.jpg">
                                    </li>
                                </ul>
                                <div class="mg-top20">
                                    <a href="http://online.gov.vn/Home/WebDetails/28738" target="_blank"><img src="/assets/img/logo-bct.png"></a>
                                </div>
                            </div>
                        </div>

                        <div class="info-content">
                            <p>© 2020. CÔNG TY CỔ PHẦN XÂY DỰNG VÀ ĐẦU TƯ THƯƠNG MẠI HOÀNG HÀ. MST: 0106713191. (Đăng ký
                                lần
                                đầu: Ngày 15 tháng 12 năm 2014, Đăng ký thay đổi ngày 29/12/2020)</p>
                            <p><strong>GP số 426/GP-TTĐT do sở TTTT Hà Nội cấp ngày 22/01/2021</strong></p>
                            <p>Địa chỉ: 26 Phù Đổng Thiên Vương, P.Phạm Đình Hổ, Q. Hai Bà Trưng, Hà Nội. Điện thoại:
                                1900.2091. Chịu trách nhiệm nội dung: <strong>Hoàng Ngọc
                                    Chiến</strong>. </p>
                            <p>Designed by: <strong>Kent Lee</strong> @kentlee.design</p>
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
    <div class="modal-sign-in" style="display: none;">
        <div class="sign-in-container">
            <a class="model-close js-modal-close">
                <i class="fas fa-times"></i>
            </a>
            <img src="./assets/img/signin.png" alt="">
            <div class="sign-in-area">
                <div class="sign-in-form">
                    <h2>Đăng nhập</h2>
                    <p class="signup--success"></p>
                    <div class="sign-in__links">
                        <button type="submit">
                            <img src="./assets/img/login-facebook.png" alt="">
                            <span>Tiếp tục với Facebook</span>
                        </button>
                        <button type="submit">
                            <img src="./assets/img/login-google.png" alt="">
                            <span>Đăng nhập với Google</span>
                        </button>
                    </div>
                    <div class="sign-in__or">
                        <p>Hoặc</p>
                    </div>
                    <div class="sign-in__login">
                        <label for="">Tài khoản</label>
                        <input type="text" placeholder="Nhập tên tài khoản" name="" id="">
                        <label for="">Mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu" name="" id="txt_password">
                        <div class="sign-in__login__captcha">
                            <div class="captcha-area">
                                <input type="text" name="" placeholder="Nhập captcha" id="captcha-input">
                                <div class="check">
                                    <i class="far fa-check-circle check-captcha"></i>
                                </div>
                            </div>

                            <div class="capcha-img">
                                <p class="captcha-code">
                                    12345
                                </p>
                            </div>
                            <div class="captcha-icons">
                                <span class="re-text" title="Renew Captcha">
                                    <i class="fas fa-sync-alt"></i>
                                </span>
                                <span class="captcha-read" title="Read Captcha">
                                    <i class="fas fa-headphones-alt"></i>
                                </span>
                            </div>
                        </div>
                        <span class="captcha-alert"></span>
                        <div class="sign-in__login__remember">
                            <input type="checkbox" name="" id="">
                            <span>Nhớ đăng nhập</span>
                        </div>
                    </div>

                    <div class="sign-in__btn">
                        <button type="submit" id="login-btn">Đăng Nhập</button>
                        <button class="js-show-sign-up" type="submit">Đăng Ký</button>
                    </div>
                    <div class="sign-in__missing">
                        <a href="">Quên mật khẩu ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-signup" style="display: none;">
        <div class="signup-container">
            <div class="model-close js-modal-close-sign-up">
                <i class="fas fa-times"></i>
            </div>
            <img src="./assets/img/signin.png" alt="">
            <div class="signup-area">
                <div class="signup-form">
                    <span>Đăng ký tài khoản</span>
                    <span>Chú ý các nội dung có dấu * bạn cần phải nhập</span>
                    <div class="signup-content">
                        <div class="signup-row">
                            <label for="">Tài khoản:</label>
                            <input type="text" placeholder="Tài khoản*" pattern="[a-z]{1,15}" name="" id="txt_user-id" title="Tên tài khoản > 5 ký tự">
                            <div class="check">
                                <i class="far fa-check-circle check-id"></i>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Họ Tên:</label>
                            <input type="text" placeholder="Họ tên*" name="" id="txt_name">
                            <div class="check">
                                <i class="far fa-check-circle check-id"></i>
                            </div>
                            <div class="check">
                                <i class="far fa-check-circle check-name"></i>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Mật khẩu:</label>
                            <div class="show-password">
                                <input type="password" placeholder="Mật khẩu*" name="" id="signup_password">
                                <div class="btn-showpass">
                                    <i class="far fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Nhập lại mật khẩu:</label>
                            <div class="show-repassword">
                                <input type="password" placeholder="Nhập lại mật khẩu*" name="" id="signup_repassword">
                                <div class="btn-showrepass">
                                    <i class="far fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Email:</label>
                            <input type="email" placeholder="Email" id="txt_email" name="email" id="txt_email">
                            <div class="check">
                                <i class="far fa-check-circle check-email"></i>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Ngày tháng năm sinh:</label>
                            <input type="date" placeholder="Ngày tháng năm sinh" name="" id="">
                        </div>
                        <div class="signup-row">
                            <label class="abe" for="">Điện thoại:</label>
                            <input type="" placeholder="Điện thoại*" name="" id="txt_phone">
                            <div class="check">
                                <i class="far fa-check-circle check-phone"></i>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Địa chỉ:</label>
                            <input type="text" placeholder="Địa chỉ*" name="" id="txt_address">
                            <div class="check">
                                <i class="far fa-check-circle check-address"></i>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Tỉnh/Thành phố:</label>
                            <select class="city_input" name="calc_shipping_provinces" required="">
                                <option value="">Tỉnh / Thành phố</option>
                            </select>
                            <input class="billing_address_1" name="" type="hidden" value="">
                        </div>
                        <div class="signup-row">
                            <label for="">Quận/Huyện:</label>
                            <select class="dictric_input" name="calc_shipping_district" required="">
                                <option value="">Quận / Huyện</option>
                            </select>
                            <input class="billing_address_2" name="" type="hidden" value="">
                        </div>
                        <div class="signup-row">
                            <button id="btn_signup" type="submit">Đăng ký tài khoản</butdton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    $id = filter_input(INPUT_GET, 'id');
    $sql_getdata = "SELECT *  FROM products where Id_product='$id'";
    $result_getdata = mysqli_query($connect, $sql_getdata);
    if ($result_getdata) {
        while ($row = mysqli_fetch_array($result_getdata)) {
    ?>
            <form action="" method="POST">
                <?php
                $user_name = $_SESSION['username'];
                $sql_getdata1 = "SELECT *  FROM accounts where UserName='$user_name'";
                $result_getdata1 = mysqli_query($connect, $sql_getdata1);

                if ($result_getdata1 && $user_name != "") {
                    while ($row1 = mysqli_fetch_array($result_getdata1)) {
                ?>
                        <div class="modal-products" style="display: flex;">
                            <div class="product-container">
                                <a href="javascript: history.go(-2)" class="model-close js-close-productt">
                                    <i class="fas fa-times"></i>
                                </a>
                                <div class="quick-order">
                                    <div class="form-quick-order">
                                        <div class="quick-order__left">
                                            <img src="./admincode/uploads/<?php echo $row['ProductImage']; ?>" alt="">
                                            <div class="product product-title">
                                                <div class="product-name">
                                                    <span><?php echo $row['ProductName']; ?></span>
                                                </div>
                                                <div class="product-prises">
                                                    <span class="origin-prises" data-value="<?php echo $row['Price']; ?>"><?= number_format($row['Price'], 0, ',', '.') ?>đ</span>
                                                    <span class="sale-prise"></span>
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
                                                    <input type="number" value="1" min="0" max="10" id="txt_quantity" name="qt">
                                                    <button type="button" id="btnPlus">+</button>
                                                </div>
                                            </div>

                                            <div class="quick-order__right--row">
                                                <div class="row-input">
                                                    <label for="">Họ và tên</label>
                                                    <input type="text" placeholder="Họ và tên*" value="<?php echo $row1['FullName']; ?>">
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
                                                    <input type="text" placeholder="Địa chỉ*" value="<?php echo $row1['Address']; ?>" name="" id="">
                                                </div>

                                            </div>
                                            <div class="quick-order__right--row">
                                                <div class="order__right--row">
                                                    <div class="row-input">
                                                        <label for="">Điện thoại</label>
                                                        <input type="text" placeholder="Số điện thoại*" value="<?php echo $row1['PhoneNumber']; ?>">
                                                    </div>
                                                    <div class="row-input">
                                                        <label for="">Email</label>
                                                        <input type="text" placeholder="Email" value="<?php echo $row1['Email']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row-input">
                                                    <textarea name="text_note" id="" placeholder="Ghi chú" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="row-submit">
                                                <input type="text " placeholder="Mã giảm giá nếu có">
                                                <p>Bằng cách đặt hàng bạn đã đồng ý với điều khoản sử dụng và chính sách đổi trả</p>
                                                <button type="submit" name="buynoww" value="<?php echo $row['Id_product']; ?>&id_category=<?php echo $row['Id_category']; ?>">
                                                    Tiến hành đặt hàng
                                                </button>
                                            </div>
                                        <?php }
                                } else {
                                        ?>
                                        <div class="quick-order__right--row">
                                            <div class="row-input">
                                                <label for="">Họ và tên</label>
                                                <input type="text" placeholder="Họ và tên*" value="">
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
                                                <input type="text" placeholder="Địa chỉ*" value="">
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
                                    <?php
                                }
                                    ?>
            </form>
            <?php
            if (isset($_POST['buynoww'])) {

                $permitted_chars = '0123456789ABCDEFGHIJKLMNOPKRSTUVWXYZ';
                // Output: 54esmdr0qf
                $code_order = substr(str_shuffle($permitted_chars), 0, 10);

                $rs = mysqli_query($connect, "SELECT Id_account FROM accounts Where username='$user_name'");
                if ($rs->num_rows > 0) {
                    while ($row = $rs->fetch_assoc()) {
                        $Id_account = $row['Id_account'];
                    }
                }

                // lấy giá
                $id = filter_input(INPUT_GET, 'id');
                $rs3 = mysqli_query($connect, "SELECT price FROM products where Id_product='$id'");
                if ($rs3->num_rows > 0) {
                    while ($row3 = $rs3->fetch_assoc()) {
                        $price = $row3['price'];
                    }
                }
                // insert vào order và lấy ra id_order
                $text_note  = $_POST['text_note'];
                $date = date('Y-m-d H:i:s');
                $rs1 = mysqli_query($connect, "INSERT INTO orders (Id_orders, CodeOrder, Id_account, Quantity, Note, OrderDate, Status) VALUES ('', '$code_order', '$Id_account', '2', '$text_note', '$date', '1')");
                $rs2 = mysqli_query($connect, "SELECT Id_orders, OrderDate FROM orders WHERE Id_account='$Id_account' ORDER BY Id_orders DESC LIMIT 1;");
                if ($rs2->num_rows > 0) {
                    while ($row1 = $rs2->fetch_assoc()) {
                        $Id_orders = $row1['Id_orders'];
                    }
                }
                //insert vào order detail
                $qt  = $_POST['qt'];
                $rs4 = mysqli_query($connect, "INSERT INTO orders_detail (Id_order_detail, Id_orders, Id_product, Quantity, Price) VALUES (NULL, '$Id_orders', '$id', '$qt', '$price')");
                echo '<script type="text/javascript">alert("Mua thành công")</script>';
            }
            ?>
            </div>
            </div>
            </div>
            </div>
            </div>
    <?php }
    } ?>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js"></script>
    <script type="text/javascript" src="./assets/js/filter.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/productDetai.js"></script>
    <script src="./assets/js/indexx.js"></script>
</body>

</html>