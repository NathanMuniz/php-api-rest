<?php

namespace Nathan\Http;

class Rest
{
  private $request;

  private $class;
  private $method;
  private $params = array();

  public function __construct($req)
  {
    $this->request = $req;
    $this->load();
  }

  public function load()
  {
    $newUrl = explode('/', $this->request['url']);

    array_shift($newUrl);



    if (isset($newUrl[0])) {
      $this->class = ucfirst($newUrl[0]) . 'Controller';
      print_r(ucfirst($newUrl[0]) . 'Controller');
      array_shift($newUrl);

      if (isset($newUrl[0])) {
        $this->method = $newUrl[0];
        array_shift($newUrl);

        if (isset($newUrl[0])) {
          $this->params = $newUrl;
        }
      }
    }
  }

  public function run()
  {

    if (class_exists('\Nathan\Http\Controller\\' . $this->class)) {
      try {

        $controll = "\Nathan\Http\Controllers\\" . $this->class;

        $response = call_user_func(array(new $controll, $this->method), $this->params);

        return json_encode(array('data' => $response, 'status' => 'sucesss'));
      } catch (\Exception $e) {
        return json_encode(array('data' => $e->getMessage(), 'status' => 'erro'));
      }
    }
  }
}
