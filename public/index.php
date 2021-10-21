<?php

use App\Http\Request;
use App\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$request = new Request($pathInfo, $_GET);

$kernel = new Kernel;

$response = $kernel->handle($request);

$response->send();