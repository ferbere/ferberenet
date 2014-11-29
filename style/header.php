<?php session_start(); ?>
<span id="titulo">
	<a href="index.php">Panel de control</a><br>
</span>
<span id="subtitulo">
	<?php echo $_SESSION['admin']; ?>
</span>
