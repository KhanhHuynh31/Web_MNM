<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../../lib/database.php');

$db = new Database;

$crpass = $_POST['crpass'];
$newpass = $_POST['newpass'];
$repass = $_POST['repass'];
$id = $_POST['id_customer'];

$check_login = "SELECT * FROM tbl_customer WHERE customer_Id ='$id' and password='$crpass'";
$result_check = $db->select($check_login);
$check_newpass = "SELECT * FROM tbl_customer WHERE customer_Id ='$id' and password='$newpass'";
$result_new_check = $db->select($check_newpass);
if ($crpass == "") {
    echo "<strong>Thông báo: </strong> Chưa nhập mật khẩu hiện tại";
} else if ($result_check == false) {
    echo "<strong>Thông báo: </strong> Mật khẩu hiện tại không đúng";
} else if ($newpass == "") {
    echo "<strong>Thông báo: </strong> Chưa nhập mật khẩu mới";
} else if ($result_new_check) {
    echo "<strong>Thông báo: </strong> Mật khẩu mới không được trùng mật khẩu hiện tại";
} else if ($repass == "") {
    echo "<strong>Thông báo: </strong> Chưa nhập lại mật khẩu mới";
} else if ($repass !== $newpass) {
    echo "<strong>Thông báo: </strong> Nhập lại mật khẩu không khớp";
} else {
    $query = "UPDATE tbl_customer SET password='$newpass' WHERE customer_Id ='$id'";
    $result = $db->update($query);
    if ($result) {
        echo 1;
    }
}
