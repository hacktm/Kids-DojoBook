<?php session_start(); ?>
<div class="cssmenu">
	<ul>
		<li>
			<a href='http://localhost/index.php?pagina=homepage'>Home</a>
		</li>

		<li class='active'>
			<a href='http://localhost/index.php?pagina=blog'>Blog</a>
		</li>
		<li>
			<a href='http://localhost/index.php?pagina=contact'>Contact</a>
		</li>
		<?php if (empty($_SESSION)) { ?>
			<li class="stanga">
				<a href='http://localhost/index.php?pagina=login'>Register</a>
			</li>
			<li class="totstanga">
				<a href="#">|</a>
			</li >
			<li class="totstangaa">
				<a href="http://localhost/index.php?pagina=login">Login</a>
			</li>
			<?php } else { ?>
			<li class="stanga">
				<a href='http://localhost/index.php?pagina=member_area'><?php echo $_SESSION['user']; ?></a>
			</li>
			<li class="totstanga">
				<a href="#">|</a>
			</li >
			<li class="totstangaa">
				<a href="logout.php">Logout</a>
			</li>
		<?php } ?>

	</ul>
</div>


	