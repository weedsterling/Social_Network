<?php 
 session_start();
		 
		 require("include/init.php");
		require('filters/auth_filter.php');
		

if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id') )
		{
		//recuperer les infos sur l'user en bdd en utilisant son id	
		$user = find_user_by_id($_GET['id']);
		
		if(!$user)
		{
			redirect('index.php');
		}
		} else
		
		{
			redirect('profil.php?id='.get_session('user_id'));
		}

//Si le formulaire a ete soumis
	 if(isset($_POST['update']))
	  {
		  $nomphoto =$_FILES['photo']['name'];
$fichierTempo = $_FILES['photo']['tmp_name'];
$fichier_dest = 'images/'.$nomphoto;
move_uploaded_file($fichierTempo,$fichier_dest);
		  $errors = [];
			 //si tous les champs ont été remplis
if(not_empty(['name', 'ville', 'pays','sexe', 'bio'])) {
	extract($_POST);
	if($nomphoto == "")
	{
	$q=$db->prepare("UPDATE users SET name = :name, city = :ville, country = :pays, sex = :sexe, twitter = :twitter, github = :github, available_for_hiring = :available_for_hiring, bio = :bio WHERE id = :id ");
		$q->execute([
		'name' => $name,
		'ville' => $ville,
		'pays' => $pays,
		'sexe' => $sexe,
		'twitter' => $twitter,
		'github' => $github,
		'available_for_hiring' => !empty($available_for_hiring) ? '1' : '0',
		'bio' => $bio,
		'id' => get_session('user_id'),

		  ]);
	set_flash(" Felicitations votre profil a été mis a jour ");
	redirect('profil.php?id='. get_session('user_id'));
 } 
 else
 {
	$q=$db->prepare("UPDATE users SET name = :name, city = :ville, country = :pays, sex = :sexe, twitter = :twitter, github = :github, available_for_hiring = :available_for_hiring, bio = :bio, photo = :photo, url = :url WHERE id = :id ");
		$q->execute([
		'name' => $name,
		'ville' => $ville,
		'pays' => $pays,
		'sexe' => $sexe,
		'twitter' => $twitter,
		'github' => $github,
		'available_for_hiring' => !empty($available_for_hiring) ? '1' : '0',
		'bio' => $bio,
		'photo' => $nomphoto,
		'url' => $fichier_dest,
		'id' => get_session('user_id'),
		  ]);
		  $_SESSION['url'] =$fichier_dest;
	set_flash(" Felicitations votre profil a été mis a jour ");
	redirect('profil.php?id='. get_session('user_id'));
 }  
 }
 else {
 	 save_input_data();
	 $errors[] = "Veuillez remplir tous les champs marqués d'un (*)";
	 }
	 
}
else {
		clear_input_data(); //S'il vient d'arriver fraichement sur la page, il n'y a aucune raison que les champs soit pre-remplis
	}
	 	require('views/edit_user.views.php');