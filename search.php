<?php include 'master/header.php' ?>
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="index.php">
                            <i class="fas fa-home"></i>
                            Trang chủ
                        </a></li>
                    <li><a href="search.php">Tìm kiếm</a></li>
                </ul>
            </div>
        </div>
        <div class="back">
            <a href='javascript: history.go(-1)'><i class="fas fa-reply back"></i>Quay lại</a>
        </div>
        <div class="pagination">
            <?php
            function product_price($priceFloat)
            {
                $symbol = 'đ';
                $symbol_thousand = '.';
                $decimal_place = 0;
                $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
                return $price . $symbol;
            }
            // Nếu người dùng submit form thì thực hiện
            if (isset($_REQUEST['ok'])) {
                // Gán hàm addslashes để chống sql injection
                $search = addslashes($_GET['search']);

                // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                if (empty($search)) {
                    echo "Vui lòng nhập dữ liệu";
                } else {
                    // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                    $query = "select * from products where ProductName like '%$search%' or Price like '%$search%' ";

                    // Kết nối sql
                    include 'connect.php';

                    // Thực thi câu truy vấn
                    $sql = mysqli_query($connect, $query);

                    // Đếm số đong trả về trong sql.
                    $num = mysqli_num_rows($sql);

                    // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                    if ($num > 0 && $search != "") {
                        // Dùng $num để đếm số dòng trả về.
                        echo "Có $num kết quả trả về với từ khóa <b>$search</b>";
                        // echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
                        // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                        echo '<div class="physicianList">';
                        echo '<input type="hidden" id="current_page"></input> ';
                        echo '<input type="hidden" id="show_per_page"></input> ';
                        echo '<ul id="pagingBox">';
                        while ($row = mysqli_fetch_assoc($sql)) {
            ?>
                            <li>
                                <div class="products-container">
                                    <div class="product">
                                        <div class="product product__img">
                                            <a href="">
                                            <img src="./admincode/uploads/<?php echo $row['ProductImage']?>" alt="">
                                            </a>
                                        </div>
                                        <div class="product product-title">
                                            <div class="product-name">
                                                <?php echo $row['ProductName']; ?>
                                            </div>
                                            <div class="product-prises">
                                                <?php echo product_price($row['Price']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        <?php
                        }
                        echo '</ul>';
                        echo '</div>';
                        echo '<div id="page_navigation"></div>';
                        echo '<script src="./assets/js/Pagination.js"></script>';
                    } else {
                        echo "Không tìm thấy kết quả";
                        ?>
                        <h2>Bạn có thể thích</h2>
                        <div class="product-slider">
                            <div class="slider" id="slider">
                                <div class="slide" id="slide">
                                    <form action="index.php" method="POST">
                                        <?php

                                        include 'connect.php';
                                        $id = filter_input(INPUT_GET, 'id');
                                        $sql_getdata = "SELECT *  FROM products ORDER BY rand() limit 20";
                                        $result_getdata = mysqli_query($connect, $sql_getdata);
                                        if ($result_getdata) {
                                            while ($row = mysqli_fetch_array($result_getdata)) {
                                        ?>
                                                <div class="item">
                                                    <div class="products-containers">
                                                        <div class="product">
                                                            <div class="product product__img">
                                                                <a href="">
                                                                    <img src="./admincode/uploads/<?php echo $row['ProductImage']?>" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="product product-title">
                                                                <div class="product-name">
                                                                    <span>
                                                                        <?php echo $row['ProductName']; ?>
                                                                    </span>
                                                                </div>
                                                                <div class="product-prises">
                                                                    <span class="origin-prise"><?=number_format($row['Price']*(0.95),0,',','.')?> ₫</span>
                                                                    <span class="sale-prise"><?=number_format($row['Price'],0,',','.')?> ₫</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </form>
                            <?php
                                            }
                                        }
                            ?>
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
            <?php
                    }
                }
            }
            ?>
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
    <div class="modal-products">
        <div class="product-container">
            <div class="model-close js-close-product">
                <i class="fas fa-times"></i>
            </div>
            <div class="quick-order">
                <div class="form-quick-order">
                    <div class="quick-order__left">
                        <img src="./assets/img/1.jpg" alt="">
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

    <script src="./assets/js/cart.js"></script>
</body>

</html>