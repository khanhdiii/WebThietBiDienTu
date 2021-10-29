<?php session_start();
include 'connect.php';
$user_name = $_SESSION['username'];
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
    <link rel="stylesheet" href="./assets/css/quickOrder.css">
    <link rel="stylesheet" href="./assets/css/acountMana.css">
    <title>Document</title>

</head>

<body>
    <div class="whole">
        <div class="header" style="width: unset">
            <div class="header-mobile-search">
                <div class="mobile-menu">
                    <div id="mobile-menu">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="header-top ">
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
                        if(isset($_SESSION['username'])){
                            echo '<script>var element1 = document.getElementById("func2");
                            element1.classList.remove("hide2");</script>';
                        }else{
                            echo '<script>var element1 = document.getElementById("func1");
                            element1.classList.remove("hide1");</script>';
                        }
                        ?>

                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="user-mana">
            <div class="user-mana__left">
            <div class="left__img">
                    <a href="index.php">
                        <img src="./assets//img/nlogoo.png" width="220px" alt="" class="header__search__logo">
                    </a>
                </div>
                <div class="left__info">
                    <img src="./assets/img/no-avatar.png" alt="">
                    <div class="left__info__name">

                        <?php
                        $rs = mysqli_query($connect, "SELECT FullName  FROM accounts where UserName='$user_name'");
                        if ($rs->num_rows > 0) {
                            // output data of each row
                            while ($row = $rs->fetch_assoc()) {
                        ?>
                                <span><?php echo $row["FullName"]; ?></span>
                        <?php
                            }
                        }
                        ?>
                        <button>
                            <i class="far fa-user"></i>
                            <span>Thay đổi ảnh đại diện</span>
                        </button>
                    </div>
                </div>
                <ul class="left__control">
                    <li>
                        <a style="border-right: 3px solid #000" href=""><i style="color: #000" class="far fa-user"></i><span style="font-weight: bold; color: #000">Thông tin tài
                                khoản</span></a>
                    </li>
                    <li>
                        <a href="OrderMana.php"><i class="fas fa-box-open"></i><span>Đơn hàng của bạn</span></a>
                    </li>
                    <li>
                        <a href=""><i class="far fa-comment-alt"></i><span>Quản lý bình luận</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fas fa-box-open"></i><span>Quản lý đánh giá</span></a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Đăng xuất</span></a>
                    </li>
                </ul>
                <div class="hot-line">
                    <p style="text-align:center">Bạn cần hỗ trợ?</p>
                    <a href="tel:0347981234">
                        <i class="fas fa-headset"></i>
                        <strong>1900.2091</strong>
                    </a>
                </div>
            </div>
            <div class="user-mana__right">
                <h3 style="margin: 32px 0 20px;">Cập nhật thông tin cá nhân</h3>
                <div class="signup-area">
                    <div class="signup-form">
                        <div class="signup-content">

                            <form action="" method="POST">
                                <?php
                                $rs = mysqli_query($connect, "SELECT *  FROM accounts where UserName='$user_name'");
                                if ($rs->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $rs->fetch_assoc()) {
                                ?>
                                        <div class="signup-row">
                                            <label for="">Họ Tên:</label>
                                            <input type="text" placeholder="Họ tên*" value="<?php echo $row["FullName"]; ?>" name="txt_name" id="txt_name">
                                            <div class="check">
                                                <i class="far fa-check-circle check-id"></i>
                                            </div>
                                            <div class="check">
                                                <i class="far fa-check-circle check-name"></i>
                                            </div>
                                        </div>
                                        <div class="signup-row">
                                            <label for="">Ngày tháng năm sinh:</label>
                                            <input type="date" placeholder="Ngày tháng năm sinh" name="" id="" value="<?php echo $row["BirthDay"]; ?>">
                                        </div>
                                        <div class="signup-row">
                                            <label class="abe" for="">Điện thoại:</label>
                                            <input type="" placeholder="Điện thoại*" value="<?php echo $row["PhoneNumber"]; ?>" name="txt_phone" id="txt_phone">
                                            <div class="check">
                                                <i class="far fa-check-circle check-phone"></i>
                                            </div>
                                        </div>
                                        <div class="signup-row">
                                            <label for="">Địa chỉ:</label>
                                            <input type="text" placeholder="Địa chỉ*" value="<?php echo $row["Address"]; ?>" name="txt_address" id="txt_address">
                                            <div class="check">
                                                <i class="far fa-check-circle check-address"></i>
                                            </div>
                                        </div>
                                        <div class="signup-row">
                                            <label for="">Tỉnh/Thành phố:</label>
                                            <select class="city_input" name="calc_shipping_provinces" required="">
                                                <option name="" value="<?php echo $row["City"]; ?>"><?php echo $row["City"]; ?></option>
                                            </select>
                                            <input class="billing_address_1" name="city" type="hidden" value="<?php echo $row["City"]; ?>">
                                        </div>
                                        <div class="signup-row">
                                            <label for="">Quận/Huyện:</label>
                                            <select class="dictric_input" name="calc_shipping_district" required="">
                                                <option value="<?php echo $row["District"]; ?>"><?php echo $row["District"]; ?></option>
                                            </select>
                                            <input class="billing_address_2" name="district" type="hidden" value="<?php echo $row["District"]; ?>">
                                        </div>
                                        <h3>Để trống nếu không muốn thay đổi</h3>
                                        <div class="signup-row">
                                            <label for="">Mật khẩu mới:</label>
                                            <div class="show-password">
                                                <input type="password" placeholder="Mật khẩu*" name="txt_password" id="signup_password">
                                                <div class="btn-showpass">
                                                    <i class="far fa-eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="signup-row">
                                            <label for="">Nhập lại mật khẩu mới:</label>
                                            <div class="show-repassword">
                                                <input type="password" placeholder="Nhập lại mật khẩu*" name="txt_repass" id="signup_repassword">
                                                <div class="btn-showrepass">
                                                    <i class="far fa-eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="signup-row">
                                            <button id="btn_signup" name="capnhat" type="submit">Cập nhật</butdton>
                                        </div>
                                        <script>
                                            document.getElementById('btn_signup').addEventListener('click', function(e) {
                                                if (document.getElementById('signup_password').value != document.getElementById('signup_repassword').value) {
                                                    document.getElementById('signup_repassword').setCustomValidity("Mật khẩu không trùng khớp")
                                                    if (document.getElementById('signup_password').value.length < 5 || document.getElementById('signup_repassword').value.length < 5) {
                                                        document.getElementById('signup_password').setCustomValidity("Mật khẩu lớn hơn 5 ký tự")
                                                    } else {
                                                        document.getElementById('signup_password').setCustomValidity("")
                                                    }
                                                } else {
                                                    document.getElementById('signup_repassword').setCustomValidity("")
                                                }
                                                if (isNaN(document.getElementById('txt_phone').value)) {
                                                    document.getElementById('txt_phone').setCustomValidity("Vui lòng nhập số")
                                                } else {
                                                    document.getElementById('txt_phone').setCustomValidity("")
                                                }
                                            })
                                        </script>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                            <?php
                            if (isset($_POST['capnhat'])) {
                                $fullname  = $_POST['txt_name'];
                                $PhoneNumber  = $_POST['txt_phone'];
                                $Address  = $_POST['txt_address'];
                                $City  = $_POST['city'];
                                $District  = $_POST['district'];
                                $password = $_POST['txt_password'];
                                if ($password == "") {
                                    $results = mysqli_query($connect, "UPDATE accounts SET City='$City', District='$District', Fullname='$fullname', PhoneNumber ='$PhoneNumber', Address='$Address'  WHERE username='$user_name'");
                                } else {
                                    $results = mysqli_query($connect, "UPDATE accounts SET City='$City', District='$District', Fullname='$fullname', PhoneNumber ='$PhoneNumber', Address='$Address',Password='$password'  WHERE username='$user_name'");
                                    echo '<script type="text/javascript">alert("Mật khẩu cập nhật thành công")</script>';
                                }
                                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' . $location . '">';
                                exit;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-search">
        <div class="modal__overlay">
        </div>
    </div>
    <div class="modal-sign-in" style="display:none">
        <div class="sign-in-container">
            <div class="model-close js-modal-close">
                <i class="fas fa-times"></i>
            </div>
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
                        <a class="js-show-sign-up" href="signup.php">Đăng Ký</a>
                    </div>
                    <div class="sign-in__missing">
                        <a href="">Quên mật khẩu ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-signup" style="display:none">
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
                                <option class="hehe" value="">Tỉnh / Thành phố</option>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js"></script>
    <script type="text/javascript" src="./assets/js/filter.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
    <script src="assets/js/validation.js"></script>
</body>

</html>