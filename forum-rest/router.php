<?php 


session_start();
function get($route, $path_to_include){
  if($_SERVER['REQUEST_METHOD'] == 'GET'){ route($route, $path_to_include)}
}

function post($route, $path_to_include){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ route($route, $path_to_include);}
}

function patch($route, $path_to_include){
  if($_SERVER['REQUEST_METHOD'] == 'PATCH'){ route($route, $path_to_include)}
}

function delete($route, $path_to_include){
  if($_SERVER['REQUEST_METHOD'] == 'DELETE'){ route($route, $path_to_include)}
}

function any($route, $path_to_include){ route($route, $path_to_include);}

function route($route, $path_to_include){
  $callback = $path_to_include;
  if ( !is_callable($callback)){
    if(!strpos($path_to_include, '.php')){
      $path_to_include.='.php';
    }
  }
  if($route == '/404'){
    include_once __DIR__."/$path_to_include";
    exit()
  }
  $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
  $request_url = rtrim($request_url, '/');
  $request_url = strtok($request_url, '?');
  $route_parts = explode('/', $route);
  array_shift($route_parts);
  array_shift($request_url_parts);
  if($route_parts[0] == '' && count($request_url_parts) == 0){
    if (is_callable($callback)){
      call_user_func_array($callback, []);
      exit();
    }
    include_once __DIR__."/$path_to_include";
    exit();
  }
  // contine...


}
