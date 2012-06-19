    <script type="text/javascript">
    /*
     * Usando la función animate, al pasar el ratón por encima de cada entrada
     * del submenú se cambiará la propiedad background-position, deslizando 
     * la imagen del gradiente y creando un efecto de fundido rápido,
     * para que la transición sea más suave que si utilizáramos simplemente
     * a:hover para cambiar el color de fondo del enlace activo.
    */
        $(function(){
            $('#nav>li').hover(
                function(){
                    $('.submenu',this).stop(true,true).slideDown('fast');
                },
                function(){
                  $('.submenu',this).slideUp('fast');  
                }              
            );
            $('.submenu li a').css({backgroundPosition: "0px 0px"}).hover(
                function(){
                    $(this).stop().animate({backgroundPosition: "(0px -99px)"},250);
                },
                function(){
                    $(this).stop().animate({backgroundPosition: "(0px 0px)"},250);
                });
        });
   </script>
 <?php /*   <strong>
        <ul id="nav">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Nuestra Empresa</a></li>
            <li><a href="#">Productos</a>
                <ul class="submenu">
                    <li><a href="#">Prodcutos de Hardware</a></li>
                    <li><a href="#">Prodcutos de Software</a></li>
                </ul>                
            </li>
            <li><a href="#">Servicios</a>
                <ul class="submenu">
                    <li><a href="#">Consultoria y Asesoria</a></li>
                    <li><a href="#">Activos Fijos e Inventarios</a></li>
                    <li><a href="#">Desarrollo Integral Web</a></li>
                    <li><a href="#">Posicionamiento Web</a></li>
                </ul>                
            </li>
            <li><a href="#">Contactenos</a></li>
        </ul>
    </strong>*/
 ?>
 <strong>
        <ul id="nav">
   <?php $resultMainMenu = mysql_query("SELECT * FROM menus WHERE id_parent=0 ORDER BY id_menu") or die(mysql_error());
while($row = mysql_fetch_array($resultMainMenu)){
    echo '<li><a href=".prog_php.">'.$row['tlt_menu'].'</a></li>'; // echo main menu
    $resultSubmenu = mysql_query("SELECT * FROM menus WHERE id_parent=".$row['id_parent']." ORDER BY id_menu") or die(mysql_error());
    if(mysql_num_rows($resultSubmenu) >= 1){
        ?>
        <ul class="submenu">
        <?php while($rowSub = mysql_fetch_array($resultSubmenu)){
            echo '<li><a href=".prog_php.">'.$rowSub['tlt_menu'].'</a></li>'; // echo sub menu
        }
        ?>
            </ul>
        <?php
    }
}
 ?>
 </ul>
    </strong>
  <?php /*$resultMainMenu = mysql_query("SELECT * FROM tblmenu WHERE parentid=0 ORDER BY menuname ASC") or die(mysql_error());
while($row = mysql_fetch_array($resultMainMenu)){
    echo $row['menutitle'] . '<br />'; // echo main menu
    $resultSubmenu = mysql_query("SELECT * FROM tblmenu WHERE parentid=" . $row['id'] . " ORDER BY menuname ASC") or die(mysql_error());
    if(mysql_num_rows($resultSubmenu) >= 1){
        while($rowSub = mysql_fetch_array($resultSubmenu)){
            echo ' -- ' . $rowSub['menutitle'] . '<br />'; // echo sub menu
        }
    }
}*/
 ?>