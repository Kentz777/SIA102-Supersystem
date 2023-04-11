<?php
session_start();
class Action
{
	private $db;

	public function __construct()
	{
		ob_start();
		include 'db_connect.php';

		$this->db = $conn;
	}
	function __destruct()
	{
		$this->db->close();
		ob_end_flush();
	}

	function login()
	{
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '" . $username . "' and password = '" . $password . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			return 1;
		} else {
			return 3;
		}
	}

	function login2()
	{
		extract($_POST);
		
		$qry = $this->db->query("SELECT * FROM user_info where email = '" . $email . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}

			$ip = isset($_SERVER['HTTP_CLIENT_IP'])
				? $_SERVER['HTTP_CLIENT_IP']
				: (isset($_SERVER['HTTP_X_FORWARDED_FOR'])
					? $_SERVER['HTTP_X_FORWARDED_FOR']
					: $_SERVER['REMOTE_ADDR']);
			$this->db->query("UPDATE cart set user_id = '" . $_SESSION['login_user_id'] . "' where client_ip ='$ip' ");
			return 1;
		} else {
			return 3;
		}
	}

	function qr(){
		extract($_POST);
		$qry = $this->db->query("SELECT * from booking_details where room_no = '" . $qr . "'");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			return 1;
		} else {
			return 3;
		}
	}

	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:index.php");
	}
	function logout2()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../landing.php");
	}

	function save_user()
	{
		extract($_POST);
		$data = " name = '$name' ";
		//$data .= ", username = '$username' ";
		//$data .= ", password = '$password' ";
		//$data .= ", type = '$type' ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set " . $data);
		} else {
			$save = $this->db->query("UPDATE users set " . $data . " where id = " . $id);
		}
		if ($save) {
			return 1;
		}
	}

	function signup()
	{
		extract($_POST);
		$data = " first_name = '$first_name' ";
		$data .= ", last_name = '$last_name' ";
		$data .= ", email = '$email' ";
		$data .= ", password = '" . md5($password) . "' ";
		$data .= ", mobile = '$contact' ";
		$data .= ", address = '$room' ";
		$data .= ", bill = '$bill' ";

		$chk = $this->db->query("SELECT * FROM user_info where email = '$email' ")->num_rows;
		if ($chk > 0) {
			return 2;
			exit;
		}
		$save = $this->db->query("INSERT INTO user_info set " . $data);
		if ($save) {
			$login = $this->login2();
			return 1;
		}
	}

	function save_settings()
	{
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '" . htmlentities(str_replace("'", "&#x2019;", $about)) . "' ";
		if ($_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/img/' . $fname);
			$data .= ", cover_img = '$fname' ";
		}

		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if ($chk->num_rows > 0) {
			$save = $this->db->query("UPDATE system_settings set " . $data . " where id =" . $chk->fetch_array()['id']);
		} else {
			$save = $this->db->query("INSERT INTO system_settings set " . $data);
		}
		if ($save) {
			$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
			foreach ($query as $key => $value) {
				if (!is_numeric($key))
					$_SESSION['setting_' . $key] = $value;
			}

			return 1;
		}
	}

	function save_category()
	{
		extract($_POST);
		$data = " name = '$name' ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO category_list set " . $data);
		} else {
			$save = $this->db->query("UPDATE category_list set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function delete_category()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM category_list where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_menu()
	{
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", description = '$description' ";
		if (isset($status) && $status  == 'on')
			$data .= ", status = 1 ";
		else
			$data .= ", status = 0 ";

		if ($_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/img/' . $fname);
			$data .= ", img_path = '$fname' ";
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO product_list set " . $data);
		} else {
			$save = $this->db->query("UPDATE product_list set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}

	function delete_menu()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM product_list where id = " . $id);
		if ($delete)
			return 1;
	}

	function add_to_cart()
	{
		extract($_POST);
		$data = " product_id = $pid ";
		$qty = isset($qty) ? $qty : 1;
		$data .= ", qty = $qty ";
		if (isset($_SESSION['login_user_id'])) {
			$data .= ", user_id = '" . $_SESSION['login_user_id'] . "' ";
		} else {
			$ip = isset($_SERVER['HTTP_CLIENT_IP'])
				? $_SERVER['HTTP_CLIENT_IP']
				: (isset($_SERVER['HTTP_X_FORWARDED_FOR'])
					? $_SERVER['HTTP_X_FORWARDED_FOR']
					: $_SERVER['REMOTE_ADDR']);
			$data .= ", client_ip = '" . $ip . "' ";
		}
		$save = $this->db->query("INSERT INTO cart set " . $data);
		if ($save)
			return 1;
	}
	function get_cart_count()
	{
		extract($_POST);
		if (isset($_SESSION['login_user_id'])) {
			$where = " where user_id = '" . $_SESSION['login_user_id'] . "'  ";
		} else {
			$ip = isset($_SERVER['HTTP_CLIENT_IP'])
				? $_SERVER['HTTP_CLIENT_IP']
				: (isset($_SERVER['HTTP_X_FORWARDED_FOR'])
					? $_SERVER['HTTP_X_FORWARDED_FOR']
					: $_SERVER['REMOTE_ADDR']);
			$where = " where client_ip = '$ip'  ";
		}
		$get = $this->db->query("SELECT sum(qty) as cart FROM cart " . $where);
		if ($get->num_rows > 0) {
			return $get->fetch_array()['cart'];
		} else {
			return '0';
		}
	}

	function update_cart_qty()
	{
		extract($_POST);
		$data = " qty = $qty ";
		$save = $this->db->query("UPDATE cart set " . $data . " where id = " . $id);
		if ($save)
			return 1;
	}

	function delete_cart()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM cart where id = " . $id);
		if ($delete)
			return 1;
	}

	function save_order()
	{
		extract($_POST);

		$data = " address = '".$room_no."' ";

		$save = $this->db->query("INSERT INTO orders set " . $data);
		if ($save) {
			$id = $this->db->insert_id;
			$qry = $this->db->query("SELECT * FROM cart where user_id =" . $_SESSION['login_user_id']);
			while ($row = $qry->fetch_assoc()) {

				$data = " order_id = '$id' ";
				$data .= ", product_id = '" . $row['product_id'] . "' ";
				$data .= ", qty = '" . $row['prod_qty'] . "' ";
				$save2 = $this->db->query("INSERT INTO order_list set " . $data);
				if ($save2) {
					$this->db->query("DELETE FROM cart where id= " . $row['id']);
				}
			}
			return 1;
		}
	}
	function confirm_order()
	{
		extract($_POST);
		$save = $this->db->query("UPDATE orders set status = 1 where id= " . $id);
		if ($save)
			return 1;
	}



	// Services

	function save_service_category()
	{
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO laundry_categories set " . $data);
		} else {
			$save = $this->db->query("UPDATE laundry_categories set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}

	function delete_service_category()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM laundry_categories where id = " . $id);
		if ($delete)
			return 1;
	}

	function save_supply()
	{
		extract($_POST);
		$data = " name = '$name' ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO supply_list set " . $data);
		} else {
			$save = $this->db->query("UPDATE supply_list set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}

	function delete_supply()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM supply_list where id = " . $id);
		if ($delete)
			return 1;
	}

	function save_laundry()
	{
		extract($_POST);
		$data = " customer_name = '$customer_name' ";
		$data .= ", remarks = '$remarks' ";
		$data .= ", total_amount = '$tamount' ";
		$data .= ", amount_tendered = '$tendered' ";
		$data .= ", amount_change = '$change' ";
		if (isset($pay)) {
			$data .= ", pay_status = '1' ";
		}
		if (isset($status))
			$data .= ", status = '$status' ";
		if (empty($id)) {
			$queue = $this->db->query("SELECT `queue` FROM laundry_list where status != 3 order by id desc limit 1");
			$queue = $queue->num_rows > 0 ? $queue->fetch_array()['queue'] + 1 : 1;
			$data .= ", queue = '$queue' ";
			$save = $this->db->query("INSERT INTO laundry_list set " . $data);
			if ($save) {
				$id = $this->db->insert_id;
				foreach ($weight as $key => $value) {
					$items = " laundry_id = '$id' ";
					$items .= ", laundry_category_id = '$laundry_category_id[$key]' ";
					$items .= ", weight = '$weight[$key]' ";
					$items .= ", unit_price = '$unit_price[$key]' ";
					$items .= ", amount = '$amount[$key]' ";
					$save2 = $this->db->query("INSERT INTO laundry_items set " . $items);
				}
				return 1;
			}
		} else {
			$save = $this->db->query("UPDATE laundry_list set " . $data . " where id=" . $id);
			if ($save) {
				$this->db->query("DELETE FROM laundry_items where id not in (" . implode(',', $item_id) . ") ");
				foreach ($weight as $key => $value) {
					$items = " laundry_id = '$id' ";
					$items .= ", laundry_category_id = '$laundry_category_id[$key]' ";
					$items .= ", weight = '$weight[$key]' ";
					$items .= ", unit_price = '$unit_price[$key]' ";
					$items .= ", amount = '$amount[$key]' ";
					if (empty($item_id[$key]))
						$save2 = $this->db->query("INSERT INTO laundry_items set " . $items);
					else
						$save2 = $this->db->query("UPDATE laundry_items set " . $items . " where id=" . $item_id[$key]);
				}
				return 1;
			}
		}
	}
	function delete_laundry()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM laundry_list where id = " . $id);
		$delete2 = $this->db->query("DELETE FROM laundry_items where laundry_id = " . $id);
		if ($delete && $delete2)
			return 1;
	}

	function save_inv()
	{
		extract($_POST);
		$data = " supply_id = '$supply_id' ";
		$data .= ", qty = '$qty' ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO inventory set " . $data);
		} else {
			$save = $this->db->query("UPDATE inventory set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}

	function save_prod_inv()
	{
		extract($_POST);
		$data = " prod_id = '$prod_id' ";
		$data .= ", prod_qty = '$prod_qty' ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO product_inventory set " . $data);
		} else {
			$save = $this->db->query("UPDATE product_inventory set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}


	function delete_inv()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM inventory where id = " . $id);
		if ($delete)
			return 1;
	}
	function delete_prod_inv()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM product_list where id = " . $id);
		if ($delete)
			return 1;
	}
	function select_category()
	{
		extract($_POST);
		$data = " category_id = '$data' ";
		$search = $this->db->query("SELECT id FROM category");
		while ($row = $search->fetch_assoc()) {
			if ($row['category_id']) {
				$this->db->query("SELECT FROM product_list where " . $data);
			}
		}
	}
}
