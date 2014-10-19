<?php
include "config.php";
include "functions.php";

if(isset($_GET['pagina'])){
	$pagina = $_GET['pagina'];
}else{
	$pagina = '';
}

if(isset($_POST['register']))
{
	
	register($_POST);
}
if(isset($_POST['login']))
{
	
	login($_POST);
}
if(isset($_POST['submit_image'])){
	bagapoza($_FILES);
}
if(isset($_POST['intrebariblog'])){
	intrebariblog($_POST);
}



?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="description" content="DojoBook">
	    <meta name="keywords" content="DojoBook, dojobook, Dojo, Book, dojo, book, karate, coder" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <meta name="robots" content="index, follow" />
	    <meta name="revisit-after" content="30 days" />
	    <meta name="author" content="hege refsnes" />
	    <meta charset="UTF-8" />
	    <script src=" js/script.js"></script>
	    <link href="css/style.css" rel="stylesheet" />
	    <link rel="shortcut icon" href="imagini/logo/logo.png" />
	    <link rel="apple-touch-icon" href="imagini/logo/logo.png" />
	</head>
	<div id="container">
		<div id="header">
			<?php include "header.php"; 
				if(isset($_POST['submit_profile'])){
					modifyProfile($_POST,$_SESSION['id']);
				}
			?>

		</div>

		<div id="content">
			<?php 
				//include "html/homepage.html"; 
				if (empty($pagina)) {

					include "html/homepage.html";
				}
				else if ($pagina != 'homepage' && $pagina != 'register' && $pagina != 'login' && $pagina != 'member_area' && $pagina != 'blog' && $pagina != 'contact')  {
					include "html/error.html";

				}
				else
				{
					include "html/".$pagina.".html";
				}
			?>
		</div>

		<div id="footer">
			<?php include "footer.php"; ?>
		</div>
		
	</div>
</body>
</html>