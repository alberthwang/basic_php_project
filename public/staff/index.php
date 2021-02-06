<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = 'Staff'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


		<div id="content">
			<div id="main-menu">
				<h2>Main Menu</h2>
				<ul>
					<?php ## used relative path (without forward /)instead of absolute path (with forward/)for subject?>
					<li><a href="<?php echo url_for('staff/subjects/index.php');?>">Subjects</a></li>
					<li><a href="<?php echo url_for('staff/pages/index.php');?>">Pages</a></li>
				</ul>
			</div>
		</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
		