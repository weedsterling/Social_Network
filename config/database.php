 <?php
 /*
   var_dump(PDO::getAvailableDrivers());
	 */
	 define('DB_HOST', 'localhost');
	 define('DB_NAME', 'Boom');
	 define('DB_USERNAME', 'root');
	 define('DB_PASSWORD', 'Azertyuiop@123');

  try
 {
 $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOexception $e)
 {
	die( 'Erreur '.$e->getMessage()); 
 }
 

 ?>