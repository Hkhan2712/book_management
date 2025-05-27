<?php 
function myAutoload($classname) {
    if (strpos($classname, "Controller") !== false) {
        $filename = "controllers/" . $classname . ".php";
    } else if (strpos($classname, "Model") !== false) {
        $filename = "models/" . $classname . ".php";
    } else if ($classname == "ConnectDb") {
        $filename = "config/" . $classname . ".php";
    } else if (strpos($classname, "Utils") !== false) {
        $filename = "utils/" . $classname . ".php";
    } else {
        $filename = null;
    }

    if ($filename && is_file($filename)) {
        include_once($filename);
    } else {
        echo "Failed to load: " . ($filename ?? 'unknown') . "<br>";
        exit("Your requested file does not exist!");
    }
}
spl_autoload_register('myAutoload');
?>