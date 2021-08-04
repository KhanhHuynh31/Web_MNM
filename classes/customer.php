<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 *
 */
class customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customers($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        if ($name == "" || $email == "" || $address == "" || $phone == "" || $password == "") {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            $check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "Email đã tồn tại!";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_customer(name,email,address,phone,password) VALUES('$name','$email','$address','$phone','$password')";
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
    }
    public function login_customers($data)
    {
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
        $result_check = $this->db->select($check_login);
        if ($result_check) {
            $value = $result_check->fetch_assoc();
            Session::set('customer_login', true);
            Session::set('customer_id', $value['customer_Id']);
            Session::set('customer_name', $value['name']);
            $alert = "Đăng nhập thành công";
            return $alert;
        } else {
            $alert = "Mật khẩu hoặc tài khoảng không đÚng";
            return $alert;
        }
    }
    public function show_customers($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE customer_Id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_pass_customer($data, $id)
    {
        $crpass = mysqli_real_escape_string($this->db->link, $data['crpass']);
        $newpass = mysqli_real_escape_string($this->db->link, $data['newpass']);
        $check_login = "SELECT * FROM tbl_customer WHERE password='$crpass'";
        $result_check = $this->db->select($check_login);
        if ($result_check) {
            $query = "UPDATE tbl_customer SET password='$newpass' WHERE customer_Id ='$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Customer Updated Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Customer Updated Not Successfully</span>";
                return $alert;
            }
        } else {
            $alert = "Mật khẩu không đÚng";
            return $alert;
        }
    }
    public function update_customers($data, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);

        if ($name == "" || $email == "" || $address == "" || $phone == "") {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            $query = "UPDATE tbl_customer SET name='$name',email='$email',address='$address',phone='$phone' WHERE customer_Id ='$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Customer Updated Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Customer Updated Not Successfully</span>";
                return $alert;
            }
        }
    }
    public function delete_order($order_id)
	{
		$query = "UPDATE tbl_order SET order_status = '5' WHERE order_id = '$order_id' ";
		$result = $this->db->update($query);
		return $result;
	}
}
?>