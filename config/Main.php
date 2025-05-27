<?php 

    // Config global constant variables
    $domain = $_SERVER["SERVER_NAME"];
    if ($_SERVER["SERVER_PORT"] != 80) 
        $domain .= ":".$_SERVER["SERVER_PORT"];
    $relRoot = dirname($_SERVER["SCRIPT_NAME"]);
    if (substr($relRoot, -1) != '/') {
        $relRoot .= '/';
    }
    define('RootREL', $relRoot);
    // Config for database
    define("DB_HOST", "localhost");
    define('DB_USER','admin');
    define('DB_PASSWORD','admin');
    define('DB_NAME','bookdb');

    $app = [];
    $mediaFiles = [
        'css'	=>	[],
        'js'	=>	[]
    ];
?>