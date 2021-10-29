<?php
include 'connect.php';

if (isset($_GET['id_account'])){
    $id_account = $_GET['id_account']; 
    $sql = "SELECT * FROM accounts WHERE Id_account = '$id_account'";
    $account = mysqli_query($connect, $sql);
    $acc = mysqli_fetch_assoc($account);
}
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
                        <h2>Xác minh tài khoản</h2>        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="purchase-container">
        <form action="verify_email.php" method="POST">
            <div class="receive-inf" style="margin-bottom: 30px; height: 250px;">
                <div class="line-header"> 
                </div>
                <div class="header-line">
                    <div>
                        <h3><i class="far fa-question-circle"></i>xác minh email: Vui lòng kiểm tra email đăng ký và nhập mã xác minh</h3>
                    </div>
                </div>
                <div class = "verify-email">
                    <label for="">Nhập mã xác minh</label>
                    <input type="text" style="width: 300px; padding-left:20px" name="txt-code">
                    <input type="hidden" name="txt_vkey" value="<?php echo $acc['Verify_Key'] ?>">
                    <input type="hidden" name="txt_id" value="<?php echo $acc['Id_account'] ?>">
                    <input class="input-code" type="submit" name="btn-ok" value="Xác nhận">
                </div>
            </div>
            </form>
            <?php
                $id = filter_input(INPUT_POST,'txt_id');
                $code = filter_input(INPUT_POST,'txt-code');
                $verify_key = filter_input(INPUT_POST,'txt_vkey');
                echo $verify_key;
                echo $code;
                if(isset($_POST['btn-ok'])){
                            if($verify_key==$code){
                                $result1 = mysqli_query($connect, "UPDATE accounts SET Verify_Status = '1' WHERE Id_account = '$id'");
                                if($result1){
                                    echo '<script>alert("Xác minh email thành công");location.href = "signin.php";</script>';
                                }

                            }else{
                                echo '<script>alert("Mã xác minh không chính xác");location.href = "javascript: history.go(-1)";</script>';
                            }    
                }              
            
            ?>

<div class="footer">
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
        
    </body>

</html>