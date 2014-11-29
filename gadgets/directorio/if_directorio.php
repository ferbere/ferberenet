<?php
session_start();
include("style/header_admin.html");
if($_SESSION["estado"]=="Autenticado"){
$link=Conectarse();
include("library/tinymce.php");
include("library/confirm.php");
if(isset($_GET['capturado'])){
$capturado=$_GET['capturado'];
}
if(empty($capturado)){
?>
<table border="0" cellpadding="10" width="600" align="center">
<form method="post" action="ip_directorio.php">
    <tr>
        <td>
            <h2>De primera mano</h2>
        </td>
    </tr>
        <tr>
            <td bgcolor="#7795B5">
                Tratamiento:<br><input type="text" name="tratamiento" size="20%"><br>
                Nombre:<br><input type="text" name="nombre" size="80%"><br>
                Apellidos:<br><input type="text" name="apellidos" size="100%"><br>
                grupo:<br><input type="text" name="apellidos"><br>
                imagen:<br><input type="text" name="imagen">.jpg<br>
                grupo:<br><input type="text" name="apellidos"><br>
                apodo:<br><input type="text" name="apodo" size="30%"><br>
                Correo-e:<br><input type="text" name="mail" size="30%"><br>
                Correo-e2:<br><input type="text" name="mail2" size="30%"><br>                
                MSN:<br><input type="text" name="msn"><br>
                Google Talk:<br><input type="text" name="google_talk"><br>
                Skype:<br><input type="text" name="skype"><br>
                Facebook:<br><input type="text" name="facebook"><br>
                Twitter:<br><input type="text" name="twitter"><br>
                Web:<br><input type="text" name="web" size="60%"><br>                
            </td>
        </tr>
            <tr>
                <td>
                    <h2>Trabajo</h2>
                </td>
            </tr>
                <tr>
                    <td bgcolor="#7795B5">
                    Empresa:<br><input type="text" name="empresa"><br>
                    Cargo:<br><input type="text" name="cargo"><br>
                    Teléfono 1:<br><input type="text" name="telefono_tr1"><br>
                    Teléfono 2:<br><input type="text" name="telefono_tr2"><br>
                    Fax:<br><input type="text" name="fax_tr"><br>
                    Dirección:<br><input type="text" name="direccion_tr"><br>
                    Ciudad:<br><input type="text" name="ciudad_tr"><br>
                    Estado:<br><input type="text" name="estado_tr"><br>
                    País:<br><input type="text" name="pais_tr"><br>
                    Código Postal:<br><input type="text" name="cp_tr"><br>
                    <h3>Otro domicilio Empresa</h3>
                    Dirección 2:<br><input type="text" name="direccion_tr2"><br>
                    Ciudad2:<br><input type="text" name="ciudad_tr2"><br>
                    Estado2:<br><input type="text" name="estado_tr2"><br>
                    País2:<br><input type="text" name="pais_tr2"><br>
                    Código Postal2:<br><input type="text" name="cp_tr2"><br>
                </td>
            </tr>
                <tr>
                    <td>
                        <h2>Personal</h2>
                    </td>
                </tr>
                    <tr>
                        <td bgcolor="#7795B5">
                            Teléfono 1:<br><input type="text" name="telefono_pa1"><br>
                            Teléfono 2:<br><input type="text" name="telefono_pa2"><br>
                            Fax:<br><input type="text" name="fax_pa"><br>
                            Dirección:<br><input type="text" name="direccion_pa"><br>
                            Ciudad:<br><input type="text" name="ciudad_pa"><br>
                            Estado:<br><input type="text" name="estado_pa"><br>
                            País:<br><input type="text" name="pais_pa"><br>
                            Código Postal:<br><input type="text" name="cp_pa"><br>

                        </td>
                    </tr>
                        <tr>
                            <td>
                                <h2>Personal</h2>
                            </td>
                        </tr>
                            <tr>
                                <td>
                                Cumpleaños:<br><input type="text" name="cumpleanos"><br>
                                Aniversario:<br><input type="text" name="telefono_pa2"><br>
                                </td>
                            </tr>
                                <tr>
                                    <td>
                                        <h2>Notas</h2>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>
                                            <br><textarea name="notas" rows=19 cols=70 width:300px height:40px></textarea>
                                        </td>
                                    </tr>
                                <tr>
                            <td valign="bottom">
                        <input type="submit" onClick="MM_popupMsg('Guardar');return false" value="enviar">
                        </form>
                            </td>
                                </tr>
</table>
<?php
}else{
	echo "El contenido ha sido capturado, debidamente. ¡Muy bien!";
}
}else{
echo "Usted no tiene acceso a esta seccción";
}
include("style/footer_admin.html"); ?>