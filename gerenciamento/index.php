<?php 
	require 'php/functions.php';
	

	if( file_exists( __DIR__ . '/config.php' ) ) require  __DIR__ . '/config.php';
	$route = get_route( rop_require(__DIR__ . '/php/routes.php'), BASE_URL );


	if( $route ){
		$contents = process_route( $route, BASE_PATH );
	}else{
		$contents = process_route( (object) array( "view" => "404" ), BASE_PATH );
	} 
	
	
	if( ( !isset( $route ) || !isset($route->isAjax) ) && !isset($_SERVER['HTTP_X_PJAX']) ) include 'php/partial/header.php';
	echo $contents;
	if( ( !isset( $route ) || !isset($route->isAjax) ) && !isset($_SERVER['HTTP_X_PJAX']) ) include 'php/partial/footer.php';