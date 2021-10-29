<?php
//Khai báo sử dụng session
session_start();

//Khai báo utf-8 để hiển thị được tiếng việt

//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) {

    //Kết nối tới database
    include('connect.php');

    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txt_username']);
    $password = addslashes($_POST['txt_password']);

    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // mã hóa pasword

    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($connect, "SELECT UserName, Password FROM accounts WHERE username='$username'");
    $queryCheck = mysqli_query($connect, "SELECT UserName, Password FROM accounts WHERE username='$username' and Id_role='1'");
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
    
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    } // //So sánh 2 mật khẩu có trùng khớp hay không
    else if ($password != $row['Password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }// Kiểm tra nếu phân quyền =1 là đúng thì đưa đến trang admin
     else if (mysqli_num_rows($queryCheck) == true) {
        $_SESSION['username'] = $username;
        echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='./admincode/accounts.php'>Về trang chủ</a>";
        die();
    } // Kiểm tra nếu phân quyền sai thì đưa đến trang người dùng
    else if (mysqli_num_rows($queryCheck) == false) {
        $_SESSION['username'] = $username;
        echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='accountManagement.php'>Về trang chủ</a>";
        die();
    }
}

