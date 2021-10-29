<?php
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
                        <h2>Lấy lại mật khẩu</h2>        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="purchase-container">
        <form action="reset_password.php" method="POST">
            <div class="receive-inf" style="margin-bottom: 30px; height: 250px;">
                <div class="line-header"> 
                </div>
                <div class="header-line">
                    <div>
                        <h3><i class="far fa-question-circle"></i>Reset mật khẩu: Sử dụng email đã đăng ký trước đó, hệ thống sẽ gửi lại mật khẩu mới vào email</h3>
                    </div>
                </div>
                <div class = "verify-email">
                    <label for="">Nhập email lấy mật khẩu</label>
                    <input type="email" style="width: 300px; padding-left:20px" name="txt-code">
                    <input style="width: 80px" class="input-code" type="submit" name="btn-ok" value="Gửi">
                </div>
                <span id="notok1" class="reset-password notif1">Bạn phải nhập email đăng ký</span>
                <span id="notok2" class="reset-password notif2">Email không đúng</span>
            </div>
            </form>
            <?php
                    $permitted_chars = '123456789abcdefghijklmnopkrstuvwxyz';
                    $pass_code = substr(str_shuffle($permitted_chars), 0, 6);
                    $email = filter_input(INPUT_POST,'txt-code');
                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;
                if(isset($_POST['btn-ok'])){
                    if($email == ""){
                        echo '<script>var element = document.getElementById("notok1");
                        element.classList.remove("notif1");</script>'; 
                    }
                    else {
                        $query = mysqli_query($connect, "SELECT Email FROM accounts WHERE Email = '$email'");
                        if (mysqli_num_rows($query)==0) {
                            echo '<script>var element = document.getElementById("notok2");
                            element.classList.remove("notif2");</script>';
                        }else{
                            $query1 = mysqli_query($connect, "UPDATE `accounts` SET `Password`='$pass_code' WHERE Email ='$email'");
                            if($query1){
                                $query3 = mysqli_query($connect, "SELECT * FROM accounts WHERE Email = '$email'");
                                if ($query3) {
                                    while ($row = mysqli_fetch_array($query3)) {
                                        $new_password = $row['Password'];
                                    }}
                                    include 'library.php'; // include the library file
                                    require 'vendor/autoload.php';
                                    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                                    try {
                                        //Server settings
                                        $mail->CharSet = "UTF-8";
                                        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                                        $mail->isSMTP();                                      // Set mailer to use SMTP
                                        $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                        $mail->Username = SMTP_UNAME;                 // SMTP username
                                        $mail->Password = SMTP_PWORD;                           // SMTP password
                                        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port = SMTP_PORT;                                    // TCP port to connect to
                                        //Recipients
                                        $mail->setFrom(SMTP_UNAME, "TechZone");
                                        $mail->addAddress($email, 'Customer');     // Add a recipient | name is option
                                        $mail->addReplyTo(SMTP_UNAME, 'TechZone');
                    //                    $mail->addCC('CCemail@gmail.com');
                    //                    $mail->addBCC('BCCemail@gmail.com');
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = "Email reset password";
                                        $mail->Body = "New your password is: "."$new_password" ;
                                        $mail->AltBody = "check"; //None HTML
                                        $result = $mail->send();
                                            if (!$result) {
                                                echo '<script>alert("Có lỗi xảy ra trong quá trình gửi mail");</script>';
                                            }else{
                                                echo '<script>alert("Đã gửi mật khẩu mới về mail của bạn");location.href ="signin.php";</script>';
                                            }
                                        } catch (Exception $e) {
                                        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;}    
                            }else{
                                echo '<script>alert("Thất bại");location.href = "javascript: history.go(-1)";</script>';
                            }

                        }
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