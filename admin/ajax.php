<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'qr'){
	$qr = $crud->qr();
	if($qr)
		echo $qr;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}

if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_category"){
	$save = $crud->save_category();
	if($save)
		echo $save;
}

if($action == "save_room_cat"){
	$save = $crud->save_room_cat();
	if($save)
		echo $save;
}
if($action == "save_rooms"){
	$save = $crud->save_rooms();
	if($save)
		echo $save;
}
if($action == "delete_category"){
	$save = $crud->delete_category();
	if($save)
		echo $save;
}
if($action == "delete_rooms_cat"){
	$save = $crud->delete_rooms_cat();
	if($save)
		echo $save;
}
if($action == "delete_rooms"){
	$save = $crud->delete_rooms();
	if($save)
		echo $save;
}
if($action == "save_menu"){
	$save = $crud->save_menu();
	if($save)
		echo $save;
}
if($action == "delete_menu"){
	$save = $crud->delete_menu();
	if($save)
		echo $save;
}
if($action == "add_to_cart"){
	$save = $crud->add_to_cart();
	if($save)
		echo $save;
}
if($action == "get_cart_count"){
	$save = $crud->get_cart_count();
	if($save)
		echo $save;
}

if($action == "delete_cart"){
	$save = $crud->delete_cart();
	if($save)
		echo $save;
}

if($action == "update_cart_qty"){
	$save = $crud->update_cart_qty();
	if($save)
		echo $save;
}
if($action == "save_order"){
	$save = $crud->save_order();
	if($save)
		echo $save;
}

if($action == "confirm_order"){
	$save = $crud->confirm_order();
	if($save)
		echo $save;
}

if($action == "confirm_order1"){
	$save = $crud->confirm_order1();
	if($save)
		echo $save;
}

// Services

if($action == "save_service_category"){
	$save = $crud->save_service_category();
	if($save)
		echo $save;
}
if($action == "delete_service_category"){
	$save = $crud->delete_service_category();
	if($save)
		echo $save;
}
if($action == "save_supply"){
	$save = $crud->save_supply();
	if($save)
		echo $save;
}
if($action == "delete_supply"){
	$save = $crud->delete_supply();
	if($save)
		echo $save;
}
if($action == "save_laundry"){
	$save = $crud->save_laundry();
	if($save)
		echo $save;
}
if($action == "delete_laundry"){
	$save = $crud->delete_laundry();
	if($save)
		echo $save;
}
if($action == "save_inv"){
	$save = $crud->save_inv();
	if($save)
		echo $save;
}

if($action == "save_prod_inv"){
	$save = $crud->save_prod_inv();
	if($save)
		echo $save;
}

if($action == "delete_inv"){
	$save = $crud->delete_inv();
	if($save)
		echo $save;
}

if($action == "select_category"){
	$save = $crud->select_category();
	if($save)
		echo $save;
}