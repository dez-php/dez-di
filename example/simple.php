<?php

error_reporting( E_ALL | E_STRICT );
ini_set( 'display_errors', 'On' );

include_once '../vendor/autoload.php';

$di = new Dez\Di();

$di->set( 'component1', function() {
    return new \stdClass;
} );

$di->set( 'component2', 'stdClass' );

$di['component3']   = new stdClass();

$di['component4']   = function() {
    return new \stdClass;
};

die(var_dump( $di, $di['component2']->getName(), $di['component4']->getDefinition() ));