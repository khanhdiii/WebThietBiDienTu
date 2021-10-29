<?php include './master/header.php' ?>

    <form action="signup.php" method="POST">
    <div class="modal-signup">
        <div class="signup-container">
            <img src="./assets/img/signin.png" alt="">
            <div class="signup-area">
                <div class="signup-form">
                    <span>Đăng ký tài khoản</span>
                    <span>Chú ý các nội dung có dấu * bạn cần phải nhập</span>
                    <span id="notok1" class="signup-notif notif1">Tài khoản đã tồn tại. Vui lòng nhập tài khoản khác</span>
                    <span id="notok2" class="signup-notif notif2">Email đã được dùng. Vui lòng nhập email khác</span>
                    <span id="notok3" class="signup-notif notif3">Không được để trống các trường có dấu *</span>
                    <span id="notok4" class="signup-notif notif4">Mật khẩu nhập lại không đúng</span>
                    <div class="signup-content">
                        <div class="signup-row">
                            <label for="">Tài khoản:</label>
                            <input type="text" placeholder="Tài khoản*" name="txt_user-id" id="txt_user-id"
                                title="Tên tài khoản > 5 ký tự">
                            <div class="check">
                                <i class="far fa-check-circle check-id"></i>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Họ Tên:</label>
                            <input type="text" placeholder="Họ tên*" name="txt_name" id="txt_name">
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
                                <input type="password" placeholder="Mật khẩu*" name="signup_password" id="signup_password">
                                <div class="btn-showpass">
                                    <i class="far fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Nhập lại mật khẩu:</label>
                            <div class="show-repassword">
                                <input type="password" placeholder="Nhập lại mật khẩu*" name="signup_repassword" id="signup_repassword">
                                <div class="btn-showrepass">
                                    <i class="far fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Email:</label>
                            <input type="email" placeholder="Email" name="email" id="txt_email">
                            <div class="check">
                                <i class="far fa-check-circle check-email"></i>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Ngày tháng năm sinh:</label>
                            <input type="date" placeholder="Ngày tháng năm sinh" name="txt_birthday" id="">
                        </div>
                        <div class="signup-row">
                            <label class="abe" for="">Điện thoại:</label>
                            <input type="" placeholder="Điện thoại*" name="txt_phone" id="txt_phone">
                            <div class="check">
                                <i class="far fa-check-circle check-phone"></i>
                            </div>
                        </div>
                        <div class="signup-row">
                            <label for="">Tỉnh/Thành phố:</label>
                            <select class="city_input" name="calc_shipping_provinces">
                                <option value="">Tỉnh / Thành phố</option>
                            </select>
                            <input class="billing_address_1" name="txt_provinces" type="hidden" value="">
                        </div>
                        <div class="signup-row">
                            <label for="">Quận/Huyện:</label>
                            <select class="dictric_input" name="calc_shipping_district">
                                <option value="">Quận / Huyện</option>
                            </select>
                            <input class="billing_address_2" name="txt_district" type="hidden" value="">
                        </div>
                        <div class="signup-row">
                            <label for="">Địa chỉ:</label>
                            <input type="text" placeholder="Địa chỉ*" name="txt_address" id="txt_address">
                            <div class="check">
                                <i class="far fa-check-circle check-address"></i>
                            </div>
                        </div>
                        <div class="signup-row">
                            <button id="btn_signup" name="btn-signup" type="submit">Đăng ký tài khoản</butdton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
<!------------------------------------------------------------------------------- backend-signup -------------------------------------------------------------------------->
<?php  
    include 'connect.php';
    $username = filter_input(INPUT_POST,'txt_user-id');
    $fullname = filter_input(INPUT_POST,'txt_name');
    $password = filter_input(INPUT_POST,'signup_password');
    $repassword = filter_input(INPUT_POST,'signup_repassword');
    $email = filter_input(INPUT_POST,'email');
    $birthday = filter_input(INPUT_POST,'txt_birthday');
    $phone_number = filter_input(INPUT_POST,'txt_phone');
    $address= filter_input(INPUT_POST,'txt_address');
    $address2= filter_input(INPUT_POST,'txt_district');
    $address3= filter_input(INPUT_POST,'txt_provinces');
    $btn_signup = filter_input(INPUT_POST,'btn-signup');
    $permitted_chars = '0123456789ABCDEFGHIJKLMNOPKRSTUVWXYZ';
    $verify_code = substr(str_shuffle($permitted_chars), 0, 6);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    if(isset($btn_signup)){
        $query1 = mysqli_query($connect,"SELECT UserName FROM accounts WHERE UserName = '$username'");
        $query2 = mysqli_query($connect,"SELECT Email FROM accounts WHERE Email = '$email'");
        $query3 = mysqli_query($connect,"SELECT PhoneNumber FROM accounts WHERE PhoneNumber = '$phone_number'");
        $sql_insert = "INSERT INTO accounts(Id_role,UserName,Password,FullName,PhoneNumber,Email,BirthDay,City,District,Address,Status,Verify_Key,Verify_Status) VALUES ('2','$username','$repassword','$fullname','$phone_number','$email','$birthday','$address3','$address2','$address','1','$verify_code','')";
        
        if($username==""||$fullname==""||$password==""||$repassword==""||$phone_number==""||$address==""||$address2==""||$address3==""){
            echo '<script>var element = document.getElementById("notok3");
            element.classList.remove("notif3");</script>';
        }else if(mysqli_num_rows($query1)){
            echo '<script>var element = document.getElementById("notok1");
            element.classList.remove("notif1");</script>';
        }
        else if(mysqli_num_rows($query2)){
            echo '<script>var element = document.getElementById("notok2");
            element.classList.remove("notif2");</script>';
        }else if($repassword != $password){
            echo '<script>var element = document.getElementById("notok4");
            element.classList.remove("notif4");</script>';
        }else{
            $result_insert = mysqli_query($connect,$sql_insert);
            if($result_insert){
                $sql = "SELECT * FROM accounts ORDER BY Id_account DESC LIMIT 1 ";
                            $result = mysqli_query($connect, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $verify_key = $row['Verify_Key'];
                                    $id_account = $row['Id_account'];
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
                    $mail->Subject = "Email verification";
                    $mail->Body = "Your verification code is: "."$verify_key" ;
                    $mail->AltBody = "check"; //None HTML
                    $result = $mail->send();
                        if (!$result) {
                            echo '<script>alert("Có lỗi xảy ra trong quá trình gửi mail");</script>';
                        }else{
                            echo '<script>alert("Đăng ký thành công. Kiểm tra Email và xác minh tài khoản");location.href ="verify_email.php?id_account='.$id_account.'";</script>';
                        }
                    } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;}
                
            }else{
                echo '<script>alert("Đăng ký thất bại");location.href = "javascript: history.go(-1)";</script>';
            }
        }
    }
?>
<!------------------------------------------------------------------------------------- END ------------------------------------------------------------------------------->    
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
                                <img src="connect.php">
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
    <script src="./assets/js/validation.js"></script>
</body>
</html>