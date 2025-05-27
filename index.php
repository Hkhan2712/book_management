<?php 
    include_once('config/Main.php');
    include_once('config/Autoload.php');

    $cn = isset($_GET["ctl"])? $_GET["ctl"]: "home";
    if(!is_file('controllers/'.$cn.'Controller.php')) 	$cn = '';
    $c = $cn."Controller";

    $controller = new $c();
?>