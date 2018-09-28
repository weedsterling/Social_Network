<?php 
  if (isset($errors) && count($errors) !=0 )
  {
	echo '<div  class="alert alert-danger" role="alert">';
	
   
  
    
	foreach($errors as $error)
	{
		echo $error .'<br/>';
		}  
		echo '<div/>'; 
	  }
	  
  
  