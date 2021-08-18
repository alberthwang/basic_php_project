<?php require_once('../../private/initialize.php'); 

if(!isset($_GET['id'])){
	redirect_to(url_for('staff/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()){
	$admin=[];
	$admin['first_name'] = $_POST['first_name'] ?? '';
	$admin['last_name'] = $_POST['last_name'] ?? '';
	$admin['email'] = $_POST['email'] ?? '';
	$admin['username'] = $_POST['username'] ?? '';
	$admin['password'] = $_POST['password'] ?? '';
	$admin['confirm_password'] = $_POST['confirm_password'] ?? '';

	$result = insert_admin($admin);
	if($result === true){
		$_SESSION['message'] = 'Admin updated.';
		redirect_to(url_for('/staff/admins/show.php?id=' . $id));

	}else{
		$error = $result;
	}
}else{
	$admin= find_admin_by_id($id);
}
?>

<?php $page_title = 'Edit Admins'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

