<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>


<?php
class cart
{
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function add_to_cart($quantity, $id)
	{

		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$id = mysqli_real_escape_string($this->db->link, $id);
		$sId = session_id();
		$check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId ='$sId'";
		$result_check_cart = $this->db->select($check_cart);
		if ($result_check_cart) {
			$msg = "<span class='error'>Sản phẩm đã được thêm vào</span>";
			return $msg;
		} else {

			$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->select($query)->fetch_assoc();

			$image = $result["image"];
			$price = $result["price"];
			$productName = $result["productName"];

			$query_insert = "INSERT INTO tbl_cart(productId,quantity,sId,image,price,productName) VALUES('$id','$quantity','$sId','$image','$price','$productName')";
			$insert_cart = $this->db->insert($query_insert);
			if ($insert_cart) {
				$msg = "<span class='error'>Thêm sản phẩm thành công</span>";
				return $msg;
			}
		}
	}

	public function get_product_cart()
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function update_quantity_cart($quantity, $cartId)
	{
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		$query = "UPDATE tbl_cart SET

					quantity = '$quantity'

					WHERE cartId = '$cartId'";
		$result = $this->db->update($query);
		if ($result) {
			$msg = "<span class='error'>Cập nhật thành công</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Product Quantity Updated Not Successfully</span>";
			return $msg;
		}
	}
	public function del_product_cart($cartid)
	{
		$cartid = mysqli_real_escape_string($this->db->link, $cartid);
		$query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
		$result = $this->db->delete($query);
		if ($result) {
			$msg = "<span class='error'>Xóa sản phẩm thành công</span>";
			return $msg;
		}
	}

	public function check_cart()
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function check_order($customer_id)
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function del_all_data_cart()
	{
		$sId = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->delete($query);
	}
	public function show_all_order()
	{
		$query = "SELECT * FROM tbl_order order by date_order desc";
		$result = $this->db->select($query);
		return $result;
	}

	public function update_order_status($order_id, $status)
	{
		$query = "UPDATE tbl_order SET order_status = '$status' WHERE order_id = '$order_id' ";
		$result = $this->db->update($query);
		return $result;
	}

	public function get_order_by_customer($customer_id)
	{
		$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' order by date_order desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_order_by_id($order_id)
	{
		$query = "SELECT * FROM tbl_order WHERE order_id = '$order_id' ";
		$result = $this->db->select($query);
		return $result;
	}
	public function del_order($order_id)
	{
		$query = "DELETE FROM tbl_order WHERE order_id = '$order_id' ";
		$result = $this->db->delete($query);
		return $result;
	}
	public function get_order_deatils($order_id)
	{
		$query = "SELECT tbl_order_details.order_id, tbl_order_details.order_details_id,tbl_order_details.quantity, tbl_product.productId, tbl_order_details.order_price, tbl_product.productName, tbl_product.image FROM tbl_order_details INNER JOIN tbl_product ON tbl_product.productId = tbl_order_details.product_id WHERE tbl_order_details.order_id = '$order_id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function insertOrder($customer_id, $total_price, $data)
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$get_product = $this->db->select($query);
		if ($get_product) {
			while ($get_product->fetch_assoc()) {
				$customer_id = $customer_id;
				$customer_name = mysqli_real_escape_string($this->db->link, $data['name']);
				$customer_phone = mysqli_real_escape_string($this->db->link, $data['phone']);
				$customer_address = mysqli_real_escape_string($this->db->link, $data['address']);
				$customer_note = mysqli_real_escape_string($this->db->link, $data['note']);
				$total_price = $total_price;
				$query_order = "INSERT INTO tbl_order(customer_id,customer_name,customer_phone,customer_address,customer_note,total_price,date_order,order_status) VALUES('$customer_id','$customer_name','$customer_phone','$customer_address','$customer_note','$total_price',NOW(),'0')";
				$insert_order = $this->db->insert($query_order);
				if ($insert_order) {
					$msg = "Thêm đơn thành công";
					return $msg;
				} else {
					$msg = "Thêm đơn thất bại";
					return $msg;
				}
			}
		}
	}
	public function insertOrderDetails()
	{
		$sId = session_id();
		$get_order_id = $this->db->select("SELECT order_id FROM `tbl_order` ORDER BY date_order DESC LIMIT 1");
		if ($get_order_id) {
			$result_order = $get_order_id->fetch_assoc();
			$orderid = $result_order['order_id'];
		}
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$get_product = $this->db->select($query);
		$rows_count_value = mysqli_num_rows($get_product);
		for ($i = 0; $i < $rows_count_value; $i++) {
			if ($get_product) {
				while ($result = $get_product->fetch_assoc()) {
					$productid = $result['productId'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$query_order_details = "INSERT INTO tbl_order_details(order_id,product_id,quantity,order_price) VALUES('$orderid','$productid','$quantity','$price')";
					$insert_order_details = $this->db->insert($query_order_details);
				}
				if ($insert_order_details) {
					$msg = "Thêm chi tiết đơn thành công";
					return $msg;
				} else {
					$msg = "Thêm chi tiết đơn thất bại";
					return $msg;
				}
			}
		}
	}
}
?>