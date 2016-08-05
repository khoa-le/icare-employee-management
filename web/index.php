<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#checking-symfony-application-configuration-and-setup
// for more information
umask(0000);

/**
 * @var Composer\Autoload\ClassLoader $loader
 */
$loader = require __DIR__.'/../config/autoload.php';
require_once __DIR__.'/../AppKernel.php';

//load the environmental variables
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

$env = $_SERVER['SYMFONY_ENV'];
$debug = $_SERVER['SYMFONY_DEBUG'];

if($debug){
    Debug::enable();
}

$kernel = new AppKernel($env, $debug);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);