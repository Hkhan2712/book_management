<?php 
class HtmlHelpers {
    public static function url($options = null){
        if ($options == '/') {
            return 'index.php';
        }
        global $cn, $app;
        if (!isset($options['ctl'])) {
            $options['ctl'] = $cn;
        }
        $act = '';
        if (isset($options['act'])) {
            $act = '&act=' . $options['act'];
        }
        $params = '';
        if (isset($options['params']) and $options['params']) {
            foreach ($options['params'] as $key => $value) {
                $params .= '&' . $key . '=' . $value;
            }
        }
        return 'index.php?ctl=' . $options['ctl'] . $act . $params;
    }
    public static function cssHeader() {
        global $mediaFiles;
        $cssFiles = "";
        if (isset($mediaFiles['css']) && count($mediaFiles['css'])) {
            foreach ($mediaFiles['css'] as $css) {
                $cssFiles .= '<link href='.$css.' rel="stylesheet"';
            }
        }
        return $cssFiles;
    }
    public static function jsFooter() {
        global $mediaFiles;
        $jsFiles = "";
        if (isset($mediaFiles['js']) && count($mediaFiles['js'])) {
            foreach ($mediaFiles['js'] as $js) {
                $jsFiles .= '<script src="'.$js.'"></script>';
            }
        }
        return $jsFiles;
    }
    public static function header($layout) {
        include_once 'views/layouts/'.$layout.'header.php';
    }
    public static function footer($layout) {
        include_once 'views/layouts/'.$layout.'footer.php';
    }
}
?>