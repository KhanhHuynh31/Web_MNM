<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class admin
{
    private $db;
    private $fm;


    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_user($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $user = mysqli_real_escape_string($this->db->link, $data['user']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $level = mysqli_real_escape_string($this->db->link, $data['level']);

        $check_user = "SELECT * FROM tbl_admin WHERE adminUser='$user' LIMIT 1";
        $result_check = $this->db->select($check_user);
        if ($result_check) {
            $alert = "User đã tồn tại!";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_admin(adminName, adminEmail, adminPhone, adminUser, adminPass, adminLevel) VALUES('$name','$email','$phone','$user','$password','$level')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "Đăng ký thành công";
                return $alert;
            } else {
                $alert = "Đăng ký thất bại";
                return $alert;
            }
        }
    }
    public function show_user($id)
    {
        $query = "SELECT * FROM tbl_admin WHERE adminid='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_all_user()
    {
        $query = "SELECT * FROM tbl_admin";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_user($data, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $level = mysqli_real_escape_string($this->db->link, $data['level']);

        $query = "UPDATE tbl_admin SET adminName='$name',adminEmail='$email',adminPhone='$phone',adminPass='$password', adminLevel='$level' WHERE adminid ='$id'";
        $result = $this->db->insert($query);
        if ($result) {
            $alert = "<span class='success'>User Updated Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>User Updated Not Successfully</span>";
            return $alert;
        }
    }
    public function del_user($id)
    {
        $query = "DELETE FROM tbl_admin where adminid = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Brand Deleted Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Brand Deleted Not Success</span>";
            return $alert;
        }
    }
}
?>