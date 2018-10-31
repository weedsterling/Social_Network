<? xml version= " 1.0 " encoding="iso −8959−1" ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="Reseau social">
<meta name="author" content=" Fofana Mohamed">
<title>
<?=
  isset($title)? $title  .' - '. WEBSITE_NAME : WEBSITE_NAME - 'simple, rapide, Efficace';
?>
</title>

<!-- Bootstrap core CSS -->
<link href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link  href="assets/css/main.css" rel="stylesheet">
<link href="assets/js/prettify-small/google-code-prettify/prettify.css"/>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <?php include('partials/menu.php'); ?>
    <?php include('partials/flash.php'); ?>