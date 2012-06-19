<?php require_once('.ww.conf/config.php'); $bd1=new subase(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="icon" type="image/gif" href="img/animated_favicon1.gif" />
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/grid.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/agile_carousel.css" type='text/css' />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/back.js"></script>
    <script type="text/javascript" src="js/agile_carousel.alpha.js"></script>
    <script type="text/javascript" src="js/haccordion.js"></script>
    <script type="text/javascript" src="js/haccordions.js"></script>   
    <title></title>
</head>
<body>
    <div id="wirt" class="container">
         <?php include('hd.php'); ?>
         <div class="clear"></div>
         <div class="span-24">
            <?php include('menu.php'); ?>
            </div>
         <div class="clear"></div>
         <?php include('bd.php'); ?>
    </div>
    <br/>
        <div class="clear"></div>
        <?php include('ft.php'); ?>