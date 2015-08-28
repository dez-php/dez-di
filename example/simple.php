<?php

error_reporting( E_ALL | E_STRICT );
ini_set( 'display_errors', 'On' );

include_once '../vendor/autoload.php';

$di = new Dez\Di();

$di->set( 'connection', function() {
    return new \stdClass;
} );

$di->get( 'connection', [
    'host'  => '127.0.0.1'
] );