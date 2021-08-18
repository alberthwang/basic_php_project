<?php require_once('../../private/initialize.php'); 

if(!isset($_GET['id'])){
	redirect_to(url_for('staff/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()){
	$result = delete_admin($id);
	$_SESSION['message'] = 'Admin deleted.';
	redirect_to(url_for('staff/admins/index.php'));
}else{
	$admin = find_admin_by_id($id);
}

?>

<?php $page_title = 'Delete Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

	<a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

	<div class="admin delete">
	</div>
</div>

