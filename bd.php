<?php if(isset($_GET["irt"])){
	$sql="SELECT prog_php FROM menus WHERE id_menu=".$_GET["irt"]." OR tlt_menu=".$_GET["irt"];
		if($fila=$bd1->sub_fila($sql)){
			include($fila["prog_php"]);
		} 
		else {
                        include("no.php");
		}
			}
		else {    
                        include_once("inicio.php");
                }
?>