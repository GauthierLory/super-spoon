<?php

namespace App;

use App\Container\Container;
use App\Http\Request;
use App\Http\Response;
use PDO;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Kernel
{
    public function handle(Request $request): Response
    {
        $container = new Container;

        require_once __DIR__ . '/../config/container.php';

        $routes = new RouteCollection;

        require_once __DIR__ . '/../config/routes.php';

        $requestContext = new RequestContext();

        $matcher = new UrlMatcher($routes, $requestContext);

        $test = $matcher->match($request->getPathInfo());

        $callable = $this->getControllerCallable($test, $container);

        return $callable($request);
    }

    private function getControllerCallable(array $matcherResult, Container $container): array
    {
        $controller = $matcherResult['controller']; // Chaine de caractère NOMDELACLASSE@NOMDELAMETHODE

        $parts = explode("@", $controller);

        [$className, $methodName] = $parts;

        $instance = $container->get($className);
        $callable = [$instance, $methodName];

        return $callable;
    }
}