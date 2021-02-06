<?php
require_once('../../../private/initialize.php');

/*
get variable page if not set default 1

if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = '1';
}

below uses ternary conjuction
condition, 2 choice?, true or(:) false
if value set, get value ? if not default 1

for php >7.0
$page = $_GET['page'] ?? 1;

$page = isset($_GET['page']) ? $_GET['page'] : '1';


$id = $_GET['id'] ?? 1;
*/


?>

<?php 
/*
rawurlencode the path
path is before "?"
spaces encoded as %20

urlencode the query string  <-- will be used moreo ften
query is the part after "?"
spaces are better encoded as "+" 

htmlspecialchars - prevents dynamic data to be used in xss

echo htmlspecialchars($id);
*/



/*

<a href="show.php?name=<?php echo urlencode('John Doe'); ?>">Link</a><br>
<a href="show.php?name=<?php echo urlencode('Widgets&More'); ?>">Link</a><br>
<a href="show.php?name=<?php echo u('!#*?'); ?>">Link</a><br>
*/

?>


<?php require_once('../../../private/initialize.php'); ?>

<?php
$id= $_GET['id'] ?? '1';

/*
made into helper function
$sql = "SELECT * FROM subjects ";
$sql .= "WHERE id='" . $id . "'";
$result= mysqli_query($db, $sql);
confirm_result_set($result);

$subject = mysqli_fetch_assoc($result);
mysqli_free_result($result);
                vvv
*/
$subject = find_subject_by_id($id);

?>

<?php $page_title = 'Show Subject' ?>
<?php include(SHARED_PATH .'/staff_header.php'); ?>

<div id="content">
	<a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

	<div class="subject show">

		<h1>Subject: <?php echo h($subject['menu_name']); ?> </h1>

		<div class="attributes">
			<dl>
				<dt>Menu Name</dt>
				<dd><?php echo h($subject['menu_name']); ?> </dd>
			</dl>
			<dl>
				<dt>Postion</dt>
				<dd><?php echo h($subject['position']); ?> </dd>
			</dl>
			<dl>
				<dt>Visible</dt>
				<dd><?php echo $subject['visible'] == '1' ? 'true' : 'false'; ?> </dd>
			</dl>

	</div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
