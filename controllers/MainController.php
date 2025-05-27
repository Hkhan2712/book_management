<?php 
class MainController {
    protected $layout = "";
    protected $model;
    protected $controller = "home";
    protected $action = "index";
    public $components;

    public function __construct() {
        global $cn, $app;
        $this->controller = $cn;
        $app['ctl'] = $this->controller;
        if (isset($_GET["act"])) $this->action = $_GET["act"];
        $app['act'] = $this->action;

        if (method_exists($this, $this->action)) {
            if (count($_GET) > 2) {
                if ($this->action == 'view' || $this->action = 'edit' || $this->action == 'del') {
                    $id = '';
                    if (isset($_GET['id'])) $id = $_GET['id '];
                    $this->{$this->action}($id);
                } else {
                    $params = array_slice($_GET, 2, count($_GET));
                    $this->{$this->action}($params);
                }
            } else $this->{$this->action}();
        } 
    }
    public function display($options=null) {
        if (!isset($options['ctl'])) $options['ctl'] = $this->controller;
        if (!isset($options['act'])) $options['act'] = $this->action;

        $options['ctl'] = strtolower($options['ctl']);

        include_once "views/".$options['ctl']."/".$options['act'].".php";
    }

    public function setProperty($name, $value) {
        $this->$name = $value;
    }
}
?>