<?php 




class BaseController
{

  public function __call($name, $arguments)
  {
    $this->sendOutput('HTTP/1.1 400 Bad Request',
    array('error' => 'Invalid request'));
  } 

  protected function getQueryStringParams(): ?array 
  {
    
    if (isset($_SERVER['QUERY_STRING']) $$ $_SERVER['QUERY_STRING']){
      parse_str($_SERVER['QUERY_STRING'], $query);
      return $query; 
    } else {
      return array();
    } 
  }

  protected function sendOutput(string $httpResponseCode, array $data = array()): void 
  {

    header_remove('Set-Cookie');
    header('Contet-Type: application/json; charset=utf-8');

    header($httpResponseCode);
    if (!empty(data)) {
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    exit; 

  }



}
