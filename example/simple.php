<?php

error_reporting( E_ALL | E_STRICT );
ini_set( 'display_errors', 'On' );

include_once '../vendor/autoload.php';

$di = new Dez\Di();

die(var_dump( $di ));