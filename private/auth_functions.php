<?php

  // Performs all actions necessary to log in an admin
  function log_in_admin($admin) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    return true;
  }

  //contains the logic for determining if a request should be
  //considered a "logged in" user request or not.
  //it is the core of require_login() but it can also be called on its own 
  //in other contexts (display one link if an admin is logged in and else if they are not)
  function is_logged_in(){
  	//having a admin_id in the session has dual purpose;
  	//its presence indicates the admin is loggin in.
  	//it value tells which admin for looking for their record
  	return isset($_SESSION['admin_id']);
  }

  //call require_login() at the top of any pafe which needs to 
  //require a valid login before granting access to the page.
  function require_login(){
  	if(!is_logged_in()){
  		redirect_to(url_for('/staff/login.php'));
  	}else{
  		//do nothing, let the rest of the page proceed
  	}
  }

?>
