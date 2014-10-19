<?php
session_start();
//var_dump($_SESSION);
?>
<a href="index.php?pagina=homepage" id="homepage">Homepage</a>
<?php if(empty($_SESSION)){?>
	<a href="index.php?pagina=register" id="register">Register</a>
	<a href="index.php?pagina=login" id="login">Login</a>
<?php }else {?>
	<b><p id="welcome">Bun venit, <a href="/index.php?pagina=member_area
		"><?php echo $_SESSION['user']; ?></a> pe acest website. (click pe numele tau pentru a ajunge la profilul tau)</p></b>
	<a href="/logout.php" id="logout">Logout</a>
<?php } ?>


