<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../../lib/database.php');

$db = new Database;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
$result_check = $db->select($check_email);
if ($name == "") {
    echo "<strong>Thông báo: </strong> Chưa nhập tên";
} else if ($email == "") {
    echo "<strong>Thông báo: </strong> Chưa nhập email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<strong>Thông báo: </strong> Sai định dạng email";
} else if ($password == "") {
    echo "<strong>Thông báo: </strong> Chưa nhập mật khẩu";
} else if ($result_check) {
    echo "<strong>Thông báo: </strong> Email đã tồn tại";
} else {
    $query = "INSERT INTO tbl_customer(name,email,address,phone,password) VALUES('$name','$email','$address','$phone','$password')";
    $result = $db->insert($query);
    if ($result) {
        echo 1;
    }
}
