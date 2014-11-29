<?php
session_start();
if($adios==1){
	echo 'Hasta la vista, navegante.';
}
?>
        <div align="center">
                        <form action="index.php" method="post">
							<input type="hidden" name="capturado" value="1">
                            Usuario: <br><input type="text" name="user"><br>
                            Contraseña: <br><input type="password" name="passwd"><br>
                            <br><input type="submit" value="login">
                        </form><br>
        </div>