
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
    <link rel="stylesheet" href="./assets/css/Ordermana.css">
    <title>Document</title>

</head>

<body>
    <div class="whole">
        <div class="header" style="width: unset">
            <?php
            include 'dangnhap.php';
            include 'connect.php';
            $user_name = $_SESSION['username'];
            ?>
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
                        <a href="accountManagement.php"><i class="far fa-user"></i><span>Thông tin tài
                                khoản</span></a>
                    </li>
                    <li>
                        <a style="border-right: 3px solid #000" href="OrderMana.php"><i style="color: #000" class="fas fa-box-open"></i><span style="font-weight: bold; color: #000">Đơn hàng của
                                bạn</span></a>
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
            <div class="order-mana-right">
                <div class="order-mana__menu">
                    <a href="OrderMana.php">Tất cả</a>
                    <a href="Ordermana1.php">Chờ xác nhận</a>
                    <a href="OrderMana2.php">Đang giao hàng</a>
                    <a style="border-bottom: 2px solid rgb(13, 80, 17); color: rgb(24, 116, 30); font-weight: bold" href="OrderMana3.php">Đã giao hàng</a>
                    <a href="OrderMana4.php">Đã hủy</a>
                </div>
                <div class="order-mana__search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Nhập từ khóa muốn tìm kiếm">
                </div>
                <form action="OrderMana.php">
                    <?php
                    include 'Priceformat.php';
                    $user_name = $_SESSION['username'];
                    $rs10 = mysqli_query($connect, "SELECT Id_account from accounts where UserName='$user_name'");
                    if ($rs10->num_rows > 0) {
                        while ($row10 = mysqli_fetch_array($rs10)) {
                            $Id_account = $row10["Id_account"];
                        }
                    }
                    $rs5 = mysqli_query($connect, "SELECT orders.Id_orders, orders.OrderDate, orders.Status FROM orders WHERE Id_account='$Id_account' and orders.Status=3 order by orders.OrderDate desc");
                    if ($rs5->num_rows > 0) {
                        while ($row5 = mysqli_fetch_array($rs5)) {
                            $Id_orders = $row5["Id_orders"];
                            $Status= $row5["Status"];
                    ?>
                            <div class="order-mana-UI1">
                                <div class="order-mana-con">
                                    <div class="order-mana-con-status">
                                        <?php
                                        $rs9 = mysqli_query($connect, "SELECT * FROM orders where Id_orders='$Id_orders' and Status='$Status' ");
                                        if ($rs9->num_rows > 0) {
                                            while ($row9 = mysqli_fetch_array($rs9)) {
                                        ?>
                                                <div class="order-mana-status-col">
                                                    <span>Đặt hàng ngày</span>
                                                    <span><?php echo $row9["OrderDate"]; ?></span>
                                                </div>
                                                <div class="order-mana-con-status-<?php echo $row9["Status"]; ?>">
                                                    <div class="order-mana-status-col">
                                                        <i class="fas fa-truck"></i>
                                                        <label class="js-status-ship">ádasd </label>
                                                    </div>
                                                    <div class="order-mana-status-col">
                                                        <span class="js-title-status">ádasd</span>
                                                        <i class="far fa-check-circle order-icon-check"></i>
                                                        <i class="far fa-times-circle order-icon-no"></i>
                                                    </div>

                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="order-mana-con-product">
                                        <?php
                                        $id = filter_input(INPUT_GET, 'id');
                                        $user_name = $_SESSION['username'];
                                        $rs7 = mysqli_query($connect, "SELECT products.ProductImage, orders_detail.Price, products.ProductName,orders_detail.Quantity,( orders_detail.Quantity * orders_detail.Price ) As Total  FROM accounts, orders_detail,products, orders WHERE orders.Id_orders=orders_detail.Id_orders and accounts.Id_account=orders.Id_account and products.Id_product=orders_detail.Id_product and UserName='$user_name' and orders_detail.Id_orders='$Id_orders' ORDER BY orders.OrderDate desc");
                                        if ($rs7->num_rows > 0) {
                                            while ($row7 = mysqli_fetch_array($rs7)) {
                                        ?>
                                                <div class="order-mana-con-product-col">
                                                    <div class="order-mana-con-product-col-left">
                                                    <img src="./admincode/uploads/<?php echo $row7['ProductImage']?>" alt="">
                                                        <div class="order-mana-con-product-col-left-title">
                                                            <?php echo $row7["ProductName"]; ?>
                                                            <div>
                                                                <label for="">Số lượng:</label>
                                                                <span class="orderManaQt"><?php echo $row7["Quantity"]; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order-mana-con-product-col-right">
                                                        <span class="orderManaPrice" data-value="<?php echo ($row7['Price']); ?>"><?php echo product_price($row7['Price']); ?></span>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="order-mana-con-total">
                                        <?php
                                        $user_name = $_SESSION['username'];
                                        $rs6 = mysqli_query($connect, "SELECT SUM( orders_detail.Quantity * orders_detail.Price ) As Total  FROM orders_detail WHERE Id_orders='$Id_orders'");
                                        if ($rs6->num_rows > 0) {
                                            while ($row6 = mysqli_fetch_array($rs6)) {
                                        ?>
                                                <div class="order-mana-con-total-col">
                                                    <a href="" class="">Đánh giá</a>
                                                    <a href="" class="">Mua lại</a>
                                                </div>
                                                <div class="order-mana-con-total-col">
                                                    <span>Tổng số tiền:</span>
                                                    <span class="orderManaTotal"><?php echo product_price($row6['Total']); ?></span>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </form>

            </div>
        </div>
        <div class="modal-search">
            <div class="modal__overlay">
            </div>
        </div>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js"></script>
        <script type="text/javascript" src="./assets/js/filter.js"></script>
        <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
        <script src="./assets/js/OrderMana.js"></script>
</body>

</html>
<?php
if (isset($_POST['capnhat'])) {
    $fullname  = $_POST['txt_name'];
    $PhoneNumber  = $_POST['txt_phone'];
    $Address  = $_POST['txt_address'];
    $password = $_POST['txt_password'];
    $results = mysqli_query($connect, "UPDATE accounts SET Fullname='$fullname', PhoneNumber ='$PhoneNumber', Address='$Address'  WHERE username='$user_name'");
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' . $location . '">';
    exit;
}
?>