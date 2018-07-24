<?php

function rop_require($file, $vars = null){

    if(isset($vars)) extract( $vars );
    return include $file;
};

function get_route($routes, $base_dir){

        
    $base = str_replace("index.php", "", $_SERVER['SCRIPT_NAME']);
    
    $uri = str_replace($base, "", $_SERVER['REQUEST_URI']);

    if( substr($uri, -1) == "/" ) $uri = substr($uri, 0, -1);

    $uri = explode('?', $uri);
    $uri = $uri[0];

    foreach ($routes as $url => $action) {

        $reg = preg_replace("/:([^\/]+)/", "(?'$1'[^/]+)", $url);
        $reg = '/^' . preg_replace("/\//", '\/', $reg) . '$/';
        if( preg_match($reg, $uri, $urlVars) == false ) continue;
        
       $action->url_vars = $urlVars;
       $action->post = $_POST;
       $action->get = $_GET;
       $action->request = $_REQUEST;

        return $action;
    }


};

function process_route($route, $base_path){
    extract( (array) $route );
    if( 
        ( property_exists( $route, 'isAjax' ) && $route->isAjax )
        &&
        ( property_exists( $route, 'data') && file_exists( $base_path . '/' . $route->data ) )
    ) return rop_require($base_path . "/" . $route->data, (array) $route );

    ob_start();
        if( property_exists( $route, 'data') && file_exists( $base_path . '/' . $route->data ) ) extract( (array) rop_require($base_path . "/" . $route->data, (array) $route ) );
        if( property_exists( $route, 'view' ) ) include "php/pages/$view.php";
        $contents = ob_get_contents();
    ob_end_clean();
    
	return $contents;
}