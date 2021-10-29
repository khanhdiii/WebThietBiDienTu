<?php include './master/header.php' ?>
<div class="breadcrumbs">
  <div class="container">
    <?php
    $id = filter_input(INPUT_GET, 'id_category');
    $sql_getdata = "SELECT *  FROM category where Id_category = $id ";
    $result_getdata = mysqli_query($connect, $sql_getdata);
    if ($result_getdata) {
      while ($row = mysqli_fetch_array($result_getdata)) {
    ?>
        <ul>
          <li><a href="index.php">
              <i class="fas fa-home"></i>
              Trang chủ
            </a></li>
          <li><a href="#"><?php echo $row['CategoryName']; ?></a></li>
        </ul>
    <?php }
    } ?>
  </div>
</div>
<div class="back">
  <a href='javascript: history.go(-1)'>Quay lại</a>
</div>
<div class="pagination">
  <div class="physicianList">
    <input type='hidden' id='current_page' />
    <input type='hidden' id='show_per_page' />
    <form action="Category.php">
      <ul id="pagingBox">
        <?php
        include 'connect.php';
        $sql_getdata = "SELECT *,(products.Price - products.Price * (100 -  Ratio)/100) AS GiaKM,products.Id_product as Id__product FROM products LEFT JOIN promotion_detail ON products.Id_product = promotion_detail.Id_product where Id_category = $id";
        $result_getdata = mysqli_query($connect, $sql_getdata);
        if ($result_getdata) {
          while ($row = mysqli_fetch_array($result_getdata)) {
        ?>
            <li>
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

            </li>
        <?php
          }
        }
        ?>
      </ul>
    </form>

  </div>

  <div id='page_navigation'></div>


  <script src="./assets/js/Pagination.js"></script>
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
            <img src="./assets/img/logo-visa.png">
          </li>
          <li>
            <img src="./assets/img/logo-visa.png">
            <img src="./assets/img/logo-visa.png">
          </li>
          <li>
            <img src="./assets/img/logo-visa.png">
            <img src="./assets/img/logo-visa.png">
          </li>
        </ul>
      </div>

      <div class="other-image">
        <h4>Hình thức vận chuyển</h4>
        <ul class="list-logo">
          <li>
            <img src="./assets/img/logo-visa.png">
            <img src="./assets/img/logo-visa.png">
          </li>
        </ul>
        <div class="mg-top20">
          <a href="http://online.gov.vn/Home/WebDetails/28738" target="_blank"><img src="./assets/img/logo-visa.png"></a>
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
</div>
<script src="./assets/js/main.js"></script>
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
</body>


</html>