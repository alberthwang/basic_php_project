<?php
require_once('../../../private/initialize.php');

require_login();

if(is_post_request()){

	// Handle form values sent by new.php
	$page = [];

	$page['menu_name'] = $_POST['menu_name'] ?? '';
	$page['position'] = $_POST['position'] ?? '';
	$page['visible'] = $_POST['visible'] ?? '';

	$result = insert_page($page);
	$new_id= mysqli_insert_id($db);
	redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));

}else{
	//redirect if not a post request, no data submitted
	redirect_to(url_for('/staff/pages/new.php'));
}

?>
