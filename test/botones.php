<?php
$bots=array(
	array(1=>"agenda",2=>"blog",3=>"qr",4=>"directorio",5=>"descargas",6=>"discursos",7=>"boletines",8=>"encuestas",9=>"fotografias",10=>"videos",11=>"perfil",12=>"usuario",13=>"testimonios",14=>"citas",15=>"menus",16=>"plantillas",17=>"gadgets",18=>"ligas",19=>"mensajes",20=>"catalogo",21=>"faq",22=>"contador",23=>"corporativa",24=>"banners",25=>"respaldo"),
	array(1=>"agenda",2=>"articulos",3=>"qr",4=>"directorio",5=>"descargar",6=>"discursos",7=>"noticias",8=>"encuestas",9=>"fotos",10=>"video",11=>"perfil",12=>"usuario",13=>"testimonios",14=>"citas",15=>"menus",16=>"plantillas",17=>"gadgets",18=>"ligas",19=>"mensajes",20=>"catalogo",21=>"faq",22=>"contador",23=>"corporativa",24=>"banners",25=>"respaldo")
	);
		$c_bots=count($bots[0]);
		for($i=1;$i<=$c_bots;$i++){
	?>
			<div class="alba">
				<a href="">
					<img src="../images/<?php echo $bots[0][$i]?>.png"><br>
					<span><?php echo $bots[1][$i]?></span>
				</a>
			</div>
<?php
		}
?>