<?php include './master/header.php' ?> 

<!---------------------------------------------------------------------------- START CONTENT --------------------------------------------------------------------->

    <form action='signin.php' method='POST'>
        <div class="modal-sign-in">
            <div class="sign-in-container">
                <a href="index.php" class="model-close js-modal-close">
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
                        <span id="notok1" class="signin-notif notif1">Bạn phải nhập đầy đủ thông tin đăng nhập</span>
                        <span id="notok2" class="signin-notif notif2">Tài khoản hoặc mật khẩu không chính xác</span>
                        <span id="notok3" class="signin-notif notif3">Bạn phải nhập tên đăng nhập</span>
                        <span id="notok4" class="signin-notif notif4">Bạn phải nhập mật khẩu đăng nhập</span>
                        <span id="notok5" class="signin-notif notif5">Tài khoản của bạn đã bị khóa do vi phạm chính sách của trang web</span>
                        <div class="sign-in__login">
                            <label for="">Tài khoản</label>
                            <input type="text" placeholder="Nhập tên tài khoản" name="txt_username" id="txt_username">
                            <label for="">Mật khẩu</label>
                            <input type="password" placeholder="Nhập mật khẩu" name="txt_password" id="txt_signpass">
                            <div class="sign-in__login__captcha">
                                <div class="captcha-area">
                                    <input type="text" name="" placeholder="Nhập captcha" id="captcha-input">
                                    <div class="check">
                                        <i class="far fa-check-circle check-captcha"></i>
                                    </div>
                                </div>
    
                                <!-- <div class="capcha-img">
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
                                </div> -->
                            </div>
                            <span class="captcha-alert"></span>
                            <div class="sign-in__login__remember">
                                <input type="checkbox" name="" id="">
                                <span>Nhớ đăng nhập</span>
                            </div>
                        </div>
    
                        <div class="sign-in__btn">
                            <button type="submit" name="btn_login" id="login-btn">Đăng Nhập</button>
                            <a class="js-show-sign-up" href="signup.php">Đăng ký</a>
                        </div>
                        <div class="sign-in__missing">
                            <a href="reset_password.php">Quên mật khẩu ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<!------------------------------------------------------------------------------- backend-signin -------------------------------------------------------------------------->
<?php   
    //Xử lý đăng nhập
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    if (isset($_POST['btn_login'])) {
        include './admincode/connect.php';
        //Lấy dữ liệu nhập vào
        $username = addslashes($_POST['txt_username']);
        $password = addslashes($_POST['txt_password']);
   
        $query = mysqli_query($connect, "SELECT Id_account, UserName, Password, Status, Verify_Status FROM accounts WHERE username='$username'");
        $queryCheck = mysqli_query($connect, "SELECT UserName, Password FROM accounts WHERE username='$username' and Id_role='1'");
  
        $row = mysqli_fetch_array($query);
        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        if (!$username && !$password) {
            echo '<script>var element = document.getElementById("notok1");
            element.classList.remove("notif1");</script>';
        // kiểm tra đã nhập tên tài khoản chưa    
        }else if(!$username){
            echo '<script>var element = document.getElementById("notok3");
            element.classList.remove("notif3");</script>';
        }
        // kiểm tra đã nhập mật khẩu chưa
        else if(!$password){
            echo '<script>var element = document.getElementById("notok4");
            element.classList.remove("notif4");</script>';
        }
        //Kiểm tra tài khoản có tồn tại
        else if (mysqli_num_rows($query) == 0 || $password != $row['Password']) {
            echo '<script>var element = document.getElementById("notok2");
            element.classList.remove("notif2");</script>';
        }else if(mysqli_num_rows($query) > 0 && $password == $row['Password']){
            if($row['Status'] == 0){
                echo '<script>var element = document.getElementById("notok5");
                element.classList.remove("notif5");</script>';
            }else if($row['Verify_Status'] == 0){
                $permitted_chars = '0123456789ABCDEFGHIJKLMNOPKRSTUVWXYZ';
                $verify_code = substr(str_shuffle($permitted_chars), 0, 6);
                $id = $row['Id_account'];
                $sql_update = "UPDATE accounts SET Verify_Key = '$verify_code' WHERE Id_account='$id'";
                $result = mysqli_query($connect,$sql_update);
                if($result){
                    $result_get = mysqli_query($connect, "SELECT * FROM accounts WHERE Id_account='$id'");
                    if ($result_get) {
                        while ($row_n = mysqli_fetch_array($result_get)) {
                            $verify_key = $row_n['Verify_Key'];
                            $id_account = $row_n['Id_account'];
                            $email_verify = $row_n['Email'];
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
                            $mail->addAddress($email_verify, 'Customer');     // Add a recipient | name is option
                            $mail->addReplyTo(SMTP_UNAME, 'TechZone');
        //                    $mail->addCC('CCemail@gmail.com');
        //                    $mail->addBCC('BCCemail@gmail.com');
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = "Email verification";
                            $mail->Body = "Your verification code is: "."$verify_key" ;
                            $mail->AltBody = "check"; //None HTML
                            $result = $mail->send();
                                if (!$result) {
                                    echo '<script>alert("Có lỗi xảy ra trong quá trình gửi mail");</script>';
                                }else{
                                    echo '<script>alert("Tài khoản của bạn chưa được xác minh. Kiểm tra email và xác minh tài khoản");location.href ="verify_email.php?id_account='.$id_account.'";</script>';
                                }
                            } catch (Exception $e) {
                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;}
                }
            }else{
                // Kiểm tra nếu phân quyền =1 là đúng thì đưa đến trang admin
                if (mysqli_num_rows($queryCheck) == true) {
                    $_SESSION['username'] = $username;
                    echo '<script>location.href = "./admincode/overview.php";</script>';
                    die();
                } // Kiểm tra nếu phân quyền sai thì đưa đến trang người dùng
                else if (mysqli_num_rows($queryCheck) == false) {
                    $_SESSION['username'] = $username;
                    echo '<script>location.href = "index.php";</script>';
                    die();
                }
            }
        }
    }
?>
<!------------------------------------------------------------------------------------- END ------------------------------------------------------------------------------->

<!-------------------------------------------------------------------------------- END CONTENT ---------------------------------------------------------------------------->
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js"></script>
    <script type="text/javascript" src="./assets/js/filter.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/cool-down.js"></script>
    <script src="./assets/js/indexx.js"></script>
    <script src="./assets/js/sign.js"></script>
</body>    
</html>