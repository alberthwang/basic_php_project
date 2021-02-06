<?php 
//default value to prevent error
$page_id = $page_id ?? '';
$subject_id = $subject_id ?? '';

?>

<navigation>
  <?php $nav_subjects = find_all_subjects(); ?>
  <ul class="subjects">
    <?php //loads subjects into nav bar from db
    while($nav_subject = mysqli_fetch_assoc($nav_subjects)) { 
      //highlight subject of page currently on
      ?>
      <li class="<?php if($nav_subject['id'] == $subject_id){ echo 'selected';} ?>">
        <a href="<?php echo url_for('index.php?subject_id=' . h(u($nav_subject['id']))); ?>">
          <?php echo h($nav_subject['menu_name']); ?>
        </a>

        <?php 
        //only expand menus by one subject at a time
        if($nav_subject['id'] == $subject_id){ ?>
          <?php $nav_pages = find_pages_by_subject_id($nav_subject['id']); ?>
        <ul class="pages">
          <?php //loads pages into nav bar from db under its subject
          while($nav_page = mysqli_fetch_assoc($nav_pages)) { 
            //$page_id set in index and on top 
            //echo selected for page to highlight what page user is currently on
            ?>
            <li class="<?php if($nav_page['id'] == $page_id){ echo 'selected';} ?>">
              <a href="<?php echo url_for('index.php?id=' . h(u($nav_page['id']))); ?>">
                <?php echo h($nav_page['menu_name']); ?>
              </a>
            </li>
          <?php } // while $nav_pages ?>
        </ul>
        <?php mysqli_free_result($nav_pages); ?>
      <?php } // if($nav_subject['id'] == $subject_id) ?>

      </li>
    <?php } // while $nav_subjects ?>
  </ul>
  <?php mysqli_free_result($nav_subjects); ?>
</navigation>
