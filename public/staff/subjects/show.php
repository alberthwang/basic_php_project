<?php
require_once('../../../private/initialize.php');

require_login();

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
$page_set = find_pages_by_subject_id($id);

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

	<hr />

	  <div class="pages listing">
    <h2>Pages</h2>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/pages/new.php?subject_id=' . h(u($subject['id']))); ?>">Create New Page</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>Pages</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($page = mysqli_fetch_assoc($page_set)){ ?>
        <?php $subject = find_subject_by_id($page['subject_id']); ?>
        <tr>
          <td><?php echo h($page['id']); ?></td>
          <td><?php echo h($page['position']); ?></td>
          <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
    	  <td><?php echo h($page['menu_name']); ?></td>
    	  <td><</td>
          <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
  <?php mysqli_free_result($page_set); ?>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
