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
    define('RootURI', dirname($_SERVER['SCRIPT_FILENAME']).'/');
    define('UploadREL', 'media/uploads/');
    define('UploadURI', $relRoot.UploadREL);
    // Config for database
    define("DB_HOST", "localhost");
    define('DB_USER','root');
    define('DB_PASSWORD','Hkhan2712@');
    define('DB_NAME','bookdb');

    $app = [];
    $mediaFiles = [
        'css'	=>	[],
        'js'	=>	[]
    ];
?>