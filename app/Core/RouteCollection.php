<?php

namespace App\Core;

class RouteCollection
{
  private array $routes;

  public function addRoute(Route $route)
  {
    $this->routes[] = $route;
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }

  public function getParams(string $uri, Route $route){
    $route_uri = $route->getUri();

    $route_uri = static::transformUri($route_uri);      

    if (preg_match("#^$route_uri$#", $uri, $matches)) {
      $params = array_slice($matches, 1);

      return $params;
    }
  }

  public function getRouteByUri(string $uri): ?Route
  {
    foreach ($this->routes as $route) {
        $route_uri = $route->getUri();


        if($route->getMethodHttp() !== $_SERVER['REQUEST_METHOD']){
          continue;
        }
        
        $route_uri = static::transformUri($route_uri);

        if (preg_match("#^$route_uri$#", $uri)) {

          return $route;
        }
    }

    return null;
  }

  private static function transformUri($uri): string
  {
    if(strpos($uri, '{') !== false){
      $uriTransform = preg_replace('#{[a-zA-Z]+}#', '([0-9]+)', $uri);
      return $uriTransform;
    }

    return $uri;
  }
}
