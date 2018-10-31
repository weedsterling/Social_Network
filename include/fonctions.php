<?php
// function_exists permet de verifier l'existence d'une fonction par contre defined() permet de verifier l'existence d'une constante
if(!function_exists('e'))
{
function e($string)
{
	if($string)
	{
		return htmlspecialchars($string);
		}
	
		}
			}
		
		
			if(!function_exists('redirect_intent_or'))
{
function redirect_intent_or($default_url)
{
	if($_SESSION['forwarding_url'])
	{
		$url = $_SESSION['forwarding_url'];
		 $_SESSION['forwarding_url'] = null;
		}
		else
		{
			$url = $default_url;
			
			}
	
	 redirect($url);
		}
			}
	
	
if(!function_exists('not_empty'))
{
function not_empty($fields = [] )
{
if(count($fields) != 0)
{
	foreach($fields as $fields)
	{
	if(empty($_POST[$fields]) || trim($_POST[$fields]) == "")
	{
		return false;
	}
	     }
	return true;	 
   }
	}
   }
   
   
   if(!function_exists('is_already_in_use')){
	   function is_already_in_use($field, $value, $table)
	   {
		  global $db;
		  
		  $q = $db->prepare("SELECT id FROM $table WHERE $field = ?"); 
		  $q->execute([$value]);
		  
		  $count = $q->rowcount();
		  
		  $q->closecursor();
		  
		  return $count;
	   }
   }
    if(!function_exists('set_flash')){
		function set_flash($message, $type = 'info'){
			$_SESSION['notification']['message'] = $message;
			$_SESSION['notification']['type'] = $type;
			
			}
	}	
	// Permet de faire des redirections de pages 
	if(!function_exists('redirect')){
		function redirect($page){
			header('location: '. $page);
			exit();
			}
	}	
	// Permet de sauvegarder les valeurs dans les inputs
	 if(!function_exists('save_input_data')){
		function save_input_data(){
			foreach($_POST as $key => $value){
				if(strpos($key, 'Password') === false){
					$_SESSION['input'][$key] = $value;
				}
			}
		}
	}	
	//Recupere les inputs de formulaire stockes de maniere temporaire en SESSION
	if(!function_exists('get_input')){
		function get_input($key){
			return !empty($_SESSION['input'][$key])
			? e($_SESSION['input'][$key])
			: null;
			
		}
	}
	// Obtenir l'url de l'avatar
	if(!function_exists('get_avatar_url')){
		function get_avatar_url($email, $size=25){
			return "http://gravatar.com/avatar/".md5(strtolower(trim(e($email))))."?s=".$size;
			
		}
	}
	// Obtenir la valeur d'une session par sa clé
	if(!function_exists('get_session')){
		function get_session($key){
			if($key){
				return !empty($_SESSION[$key])
				? e($_SESSION[$key])
			: null;
				}	
		}
	}
	//Verifie si un utilisateur est connecté
	if(!function_exists('is_logged_in')){
		function is_logged_in(){
			
				return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);
			
		}
	}
	//Supprime tous les inputs de formulaires stockes de maniere temporaire en SESSION	
	if(!function_exists('clear_input_data')){
		function clear_input_data(){
			if(isset($_SESSION['input'])){
			$_SESSION['input'] = [];
			
			}
		}
	}
	//Gere l'etat actif des liens
	if(!function_exists('set_active'))
{
function set_active($file)
{
$a=explode('/', $_SERVER['SCRIPT_NAME']);
$page = array_pop($a);
	if($page == $file.'.php'){
		return "active";
		} else
		{
			return "";
			}
			}
}
//Trouver l'user par l'id 
	if(!function_exists('find_user_by_id'))
{
function find_user_by_id($id)
{
	global $db;
	$q = $db->prepare('SELECT name, pseudo, email, city, country, sex , twitter, github, available_for_hiring,  bio FROM users WHERE id = ?');
	$q->execute([$id]);
 $data = $q->fetch(PDO::FETCH_OBJ);
	$q->closecursor();
	return $data;
	}
	}
	//Trouver l'user par l'id 
	if(!function_exists('find_code_by_id'))
{
function find_code_by_id($id)
{
	global $db;
	$q = $db->prepare('SELECT code FROM codes where id = ?');
	  $success = $q->execute([$id]);
    $data = $q->fetch(PDO::FETCH_OBJ);
	$q->closecursor();
	return $data;
	}
	}
  ?>