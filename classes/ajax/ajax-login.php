<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../../lib/session.php');
Session::checkLogin();
include($filepath . '/../../lib/database.php');

$db = new Database;

$email = $_POST['email'];
$password = $_POST['pass'];
$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
$result_check = $db->select($check_login);
if ($result_check) {
    $value = $result_check->fetch_assoc();
    Session::set('customer_login', true);
    Session::set('customer_id', $value['customer_Id']);
    Session::set('customer_name', $value['name']);
    echo 1;
}
else if($email == ""){
    echo "<strong>Thông báo: </strong> Chưa nhập email";
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<strong>Thông báo: </strong> Sai định dạng email";
}
else if($password == ""){
    echo "<strong>Thông báo: </strong> Chưa nhập mật khẩu";
}  
else {
    echo "<strong>Thông báo: </strong>Tài khoản hoặc mật khẩu không đúng";
}
