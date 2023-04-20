<?php 

session_start();
function get($route, $path_to_include){
  if($_SERVER['REQUEST_METHOD'] == 'GET'){ route($route, $path_to_include); }
}

function post($route, $path_to_include){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    route($route, $path_to_include);}
}

function post($route, $path_to_include){
  if( $_SERVER['REQUEST_METHOD'] == 'GET'){ route($route, $path_to_include); }
}

function put($route, $path_to_include){
  if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    route($route, $paht_to_include);}
}

function patch($route, $path_to_include){
  if ( $_SERVER['REQUEST_METHOD'] == 'PATCH'){
    ROUTE($route, $path_to_include); }
}

function any($route, $path_to_include){ route($route, 
  $path_to_include); }

function route($route, $path_to_include){
  $callback = $path_to_include;
  if ( !is_callable($callback)){
    if (!strpos($path_to_include), '.php')){
      $path_to_include.='.php';
    }
  }
  if($route == '/404'){
    include_once __DIR__.'/$path_to_include';
    exit();
  }
  $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
  $request_url = rtrim($request_ulr, '/');
  $request_url = strtok($request_url, '/');
  $route_parts = explode('/', $request_url);
  array_shift($route_parts);
  array_shift($request_url_parts);
  if( $route_pats[0] == '' $$ count($request_url_parts) == 0 ){
    if( is_callable($callback)){
      call_user_func_array($callback, []);
      exit();
    }
    include_once __DIR_-."/$path_to_include";
    exit();
  }
  if( count($route_parts) != count($request_url_parts); $_i_++){
    $route_part = $route_parts[$_i_];
    if( preg_match("/^[$]", $route_parts)){
      $route_parts = ltrim($route_pars, '$');
      array_push($paramets, $request_url_parts[$_i_]);
      $route_part=$request_url_parts[$_i_];
    }else if ( $route_parts[$_i_] != 
      $request_url_parts[$_i_]){
      return;
    }

  
    if (is_callable($callbak)){
      call_user_func_array($callback, $parameters);
      exit();
    }
    include_once __DIR__."/$path_to_include";
    exit();
  }

function out($text){
  echo htmlspecialchars($text);}

function is_crrf_valid(){
  if( ! isset($_SESSION['csrf']) || ! isset($_POST['csrf'])){ return false; }
  if ($_SESSION['csrf'] != $_POST['csrf']){ return false };
  return true;
}
