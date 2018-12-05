<?php 
session_start();

require("include/init.php");
require('filters/auth_filter.php');


 if(!empty($_GET['id'])) {
	  $data = find_code_by_id($_GET['id']);
	  
	  if(!$data) {
redirect('share_code.php');
	  } 
} else {
	 redirect('share_code.php');

	}
include("views/show_codes.views.php");
   ?>