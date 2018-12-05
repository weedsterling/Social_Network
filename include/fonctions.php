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
// Verifie si l'utilisateur courant a deja liké le micropost
if(!function_exists('user_has_already_liked_the_micropost'))
{
function user_has_already_liked_the_micropost($micropost_id)
{
	global $db;
	$q = $db->prepare('SELECT id FROM micropost_like where user_id = :user_id and micropost_id = :micropost_id');
 $q->execute([
 'user_id' =>get_session('user_id'),
 'micropost_id' => $micropost_id

 ]);
	return(bool)$count = $q->rowcount();

		}
			}
			//checks if a friend request has already sent
		if(!function_exists('if_a_friend_request_has_already_sent'))
{
function if_a_friend_request_has_already_sent($id1,$id2)
{
		global $db;
		  
		  $q = $db->prepare("SELECT statuts FROM friends_relationships WHERE user_id1 = :user_id1 AND user_id2 = :user_id2 OR (user_id1 = :user_id2 AND user_id2 = :user_id1) "); 
		  $q->execute([
		  'user_id1'=>$id1,
		  'user_id2'=>$id2
		  ]);
		  
		  $count = $q->rowcount();
		  
		  $q->closecursor();
		  
		  return(bool) $count;
	
		}
			}
		//friends count
	if(!function_exists('friends_count'))
{
function friends_count($id)
{
	global $db;
		  
		  $q = $db->prepare("SELECT statuts FROM friends_relationships WHERE user_id1 = :user_connected OR user_id2 = :user_connected AND statuts = '1' "); 
		  $q->execute([
		  'user_connected'=>$id
		  ]);
		  
		  $count = $q->rowcount();
		  
		  $q->closecursor();
		  
		  return $count;
	
		}
			}
		
			if(!function_exists('redirect_intent_or'))
{
function redirect_intent_or($default_url)
{
	if($_SESSION['forwarding_url'])
	{
		$url = $_SESSION['forwarding_url'];
		}
		else
		{
			$url = $default_url;
			
			}
	 $_SESSION['forwarding_url'] = null;
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
	$q = $db->prepare('SELECT name, pseudo, email, city, country, sex , twitter, github, available_for_hiring, bio, photo, url FROM users WHERE id = ?');
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
	
	// Remenber me
	if(!function_exists('remenber_me'))
{
function remenber_me($user_id)
{
	global $db;
	// Generer le token de maniere aleatoire
	$token = openssl_random_pseudo_bytes(24);
	
	//generer le selecteur de maniere aleatoire et s'assurer que ce dernier est unique
	do{
	$selector = openssl_random_pseudo_bytes(9);
	}while(cell_count('auth_tokens','selector',$selector) > 0);
	//Sauver ces informations (user_id, selector, expires(14 jours), tokens(hasard)) en bdd
	$q = $db->prepare('INSERT INTO auth_tokens(expires, selector, user_id, token) VALUES(DATE_ADD(NOW(), INTERVAL 14 DAY), :selector, :user_id, :token)');
	$q->execute([
	'selector' => $selector,
	'user_id' => $user_id,
	'token' => hash('sha256',$token)
]);
	//creer un cookie 'auth' (14 jours expires) httponly => true
	//contenu: base64_encode(selector).':'.based64_encode(token)
	setcookie(
	'auth',
	base64_encode($selector).':'.base64_encode($token),
	time()+1209600,
	null,
	null,
	false,
	true
	);
	
		}
			}
			
		// Auto login
		if(!function_exists('auto_login'))
{
function auto_login()
{
//Verifier  que notre cookie 'auth' exsiste
if(!empty($_COOKIE['auth'])){
	$split = explode(':',$_COOKIE['auth']);
	if(count($split) !== 2)
	{
		return false;
	}
	// recuperer via ce cookie $selector, $token
$selector = $split[0];
$token = $split[1];
global $db;
$q = $db->prepare('SELECT  auth_tokens.token, auth_tokens.user_id, 
users.id , users.pseudo, users.url, users.email
FROM auth_tokens
LEFT JOIN users
on users.id = auth_tokens.user_id
 WHERE selector = ? AND expires >= CURDATE()');
$q->execute([base64_decode($selector)]);
$data = $q->fetch(PDO::FETCH_OBJ);


if($data)
{
	if(hash_equals($data->token,hash('sha256', base64_decode($token))))
	{
		session_regenerate_id(true); 
$_SESSION['user_id'] =$data->id;
$_SESSION['pseudo'] =$data->pseudo;
$_SESSION['email'] =$data->email;
$_SESSION['url'] =$data->url;	
return true;
	}
	
	}
}	
return false;

		}
}
//	cell count
//retourne le nombre d'enregistrement trouvés respectant une certaine condition		
if(!function_exists('cell_count'))
{
function cell_count($table, $field_name, $field_value)
{
	global $db;
	$q= $db->prepare("SELECT * FROM $table WHERE $field_name = ?");
	$q->execute([$field_value]);
	return $q->rowcount();
		}
			}
			
			//Permet de rendre tous les liens d'une chaine de caracteres cliquable
		if(!function_exists('replace_links'))
{
function replace_links($texte)
{
	$regex_url = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";

	return preg_replace($regex_url,"<a href=\"$0\" target=\"_blank\">$0</a>",$texte);
	
		}
			}	
	// function_exists permet de verifier l'existence d'une fonction par contre defined() permet de verifier l'existence d'une constante
if(!function_exists('relation_link_to_display'))
{
function relation_link_to_display($string)
{
	global $db;
	$q=$db->prepare('SELECT user_id1, user_id2, statuts FROM friends_relationships WHERE user_id1 = :user_id1 and user_id2 = :user_id2 OR user_id1 = :user_id2 and user_id2 = :user_id1');
	$q->execute([
	'user_id1' =>get_session('user_id'),
	'user_id2' =>$_GET['id']
	]);
	$data= $q->fetch();
	if($data['user_id1'] == $_GET['id'] && $data['statuts'] == '0')
		{
		// Lien pour accepter ou refuser la demande d'amitié
		return "accept_reject_relation_link";
			}
		else if($data['user_id1'] == get_session('user_id') && $data['statuts'] == '0')
		{
			//Msg pour dire que la demande a deja ete envoye lien pour annuler la demande
			return "cancel_relation_link";
			}
			else if(($data['user_id1'] == get_session('user_id') or $data['user_id1'] == $_GET['id']) AND $data['statuts'] == '1')
		{
			//Lien pour supprimer la demande d'amitié
			return "delete_relation_link";
			}
			else
			{
				//Lien pour ajouter la personne comme ami(e)
				return "add_relation_link";
				}
	$q->closecursor();
	die($data->statuts);

		}
			}				
  ?>