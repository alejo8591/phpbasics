    <?php
        /*
     * Usando la función animate, al pasar el ratón por encima de cada entrada
     * del submenú se cambiará la propiedad background-position, deslizando 
     * la imagen del gradiente y creando un efecto de fundido rápido,
     * para que la transición sea más suave que si utilizáramos simplemente
     * a:hover para cambiar el color de fondo del enlace activo.
    */
    ?>
    <script type="text/javascript">
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
    <div class="span-24">
        <ul id="nav">
            <?php
                $Menu = mysql_query("SELECT * FROM menus WHERE id_parent=0 ORDER BY id_menu") or die(mysql_error());
                while($filaMenu = mysql_fetch_array($Menu)){
                echo '<li><a href="index.php?irt='.$filaMenu['id_menu'].'">'.$filaMenu['tlt_menu'].'</a>'; // echo main menu
                $subMenu = mysql_query("SELECT * FROM menus WHERE id_parent=".$filaMenu['id_menu']." ORDER BY id_menu") or die(mysql_error());
                if(mysql_num_rows($subMenu) >= 1){
            ?>
            <ul class="submenu">
                    <?php
                        while($filaSubMenu = mysql_fetch_array($subMenu)){
                        echo '<li><a href="index.php?irt='.$filaSubMenu['id_menu'].'">'.$filaSubMenu['tlt_menu'].'</a></li>'; // echo sub menu
                    }
                    ?>
            </ul>
            <?php
            } ?>
            </li>
            <?php
        }
        ?>
        </ul>
    </div>
   
  <?php /*$resultMainMenu = mysql_query("SELECT * FROM tblmenu WHERE parentid=0 ORDER BY menuname ASC") or die(mysql_error());
while($row = mysql_fetch_array($resultMainMenu)){
    echo $row['menutitle'] . '<br >'; // echo main menu
    $resultSubmenu = mysql_query("SELECT * FROM tblmenu WHERE parentid=" . $row['id'] . " ORDER BY menuname ASC") or die(mysql_error());
    if(mysql_num_rows($resultSubmenu) >= 1){
        while($rowSub = mysql_fetch_array($resultSubmenu)){
            echo ' -- ' . $rowSub['menutitle'] . '<br >'; // echo sub menu
        }
    }
}*/
 ?>