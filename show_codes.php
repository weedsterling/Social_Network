<?php 
session_start();

require('filters/auth_filter.php');
require('config/database.php');
require('include/fonctions.php');
require('include/constante.php');

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