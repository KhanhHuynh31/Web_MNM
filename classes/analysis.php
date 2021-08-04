<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class analysis
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function get_total_price_order_by_month($month)
	{
		$query = "SELECT SUM(total_price) as total  FROM tbl_order where order_status=3 and DATE_FORMAT(date_order, '%m')= '$month' group by DATE_FORMAT(date_order, '%m')";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_total_status_order()
	{
		$query = "SELECT COUNT(order_id) as total  FROM tbl_order where order_status =0";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_total_customer()
	{
		$query = "SELECT COUNT(customer_Id) as total  FROM tbl_customer";
		$result = $this->db->select($query);
		return $result;
	}
	public function line_chart($date_start, $date_end)
	{
		$host = "localhost";
		$user = "root";
		$password = "";
		$dbname = "web_mnm";
		$con = mysqli_connect($host, $user, $password, $dbname);
		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$chartQuery = "SELECT date_order, total_price FROM tbl_order where date_order BETWEEN '$date_start' and '$date_end' group by DATE_FORMAT(date_order, '%y-%m-%d')";
		return $chartQueryRecords = mysqli_query($con, $chartQuery);
	}
	public function line_chart_7()
	{
		$host = "localhost";
		$user = "root";
		$password = "";
		$dbname = "web_mnm";
		$con = mysqli_connect($host, $user, $password, $dbname);
		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$chartQuery = "SELECT date_order, total_price FROM tbl_order where (CURDATE()-date_order)<7  group by DATE_FORMAT(date_order, '%y-%m-%d')";
		return $chartQueryRecords = mysqli_query($con, $chartQuery);
	}

}
?>