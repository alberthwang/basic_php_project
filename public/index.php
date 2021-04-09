<?php require_once('../private/initialize.php'); ?>

<?php 

$preview = false;
if(isset($_GET['preview'])){
	//previwing should require admin to be logged in
	$preview = $_GET['preview'] == 'true' ? true : false;
}
$visible = !$preview;

if(isset($_GET['id'])){
	$page_id = $_GET['id'];
	$page = find_page_by_id($page_id, ['visible' => true]);

	if(!$page){
		redirect_to(url_for('/index.php'));
	}
	$subject_id = $page['subject_id'];
}elseif(isset($_GET['subject_id'])){
	//find page content
	$subject_id = $_GET['subject_id'];
	//check if subject/page is visible
	$subject = find_subject_by_id($subject_id, ['visible' => true]);
	if(!$subject){
		redirect_to(url_for('/index.php'));
	}
	$page_set = find_pages_by_subject_id($subject_id, ['visible' => true]);
	$page = mysqli_fetch_assoc($page_set);  //first page
	if(!$page){
		redirect_to(url_for('/index.php'));
	}
	$page_id = $page['id'];
}else{
//nothign selected; show homepage
}
?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

	<?php include(SHARED_PATH . '/public_navigation.php'); ?>

  <div id="page">

  	<?php 
  	if(isset($page)){
  		//show page from db
  		$allowed_tags = '<div><img><h1><h2><p><br><strong><em><ul><li>';
  		//use strip tags to display html formatting safely
  		echo strip_tags(($page['content']), $allowed_tags);
  	}else{
	  	//show home page of website, can be static or db driven
	  	include(SHARED_PATH . '/static_homepage.php');
	}
  	?>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>