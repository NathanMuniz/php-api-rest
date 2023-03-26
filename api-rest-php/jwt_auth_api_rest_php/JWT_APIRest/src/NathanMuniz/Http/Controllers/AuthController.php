<?php

namespace Nathan\Http\Controllers;

class AuthController
{

  private static $key = '123456';

  public function login()
  {


    if ($_POST['email'] == 'teste@gmail.com' && $_POST['password'] === '123') {

      //Header Token 
      $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
      ];

      //Payload - Content 
      $payload = [
        'name' => 'Nathan Gabriel',
        'email' => $_POST['email'],
      ];

      //Json 
      $header = json_encode($header);
      $payload = json_encode($payload);

      // Base 64 
      $header = self::base64urlEncode($header);
      $payload = self::base64urlEncode($payload);

      //Sign
      $sign = hash_hmac('sha256', $header . "." . $payload, self::$key, true);
      $sign = self::base64urlEncode($sign);


      //Token 
      $token = $header . '.' . $payload . '.' . $sign;

      return $token;
    }

    throw new \Exception('Não autenticado');
  }

  public static function checkAuth()
  {

    $http_header = apache_request_headers();

    if (isset($http_header['Authorization']) && $http_header['Authorization'] != null) {

      $bearer = explode(' ', $http_header['Authorization']);
      //$bearer[0] 'bearer';
      //$bearer[1] = 'token jwt';




      $token = explode('.', $bearer[1]);
      $header = $token[0];
      $payload = $token[1];
      $sign = $token[2];


      //Conferir Assinatura 
      $valid = hash_hmac('sha256', $header . "." . $payload, '123456', true);
      $valid = self::base64urlEncode($valid);

      if ($sign === $valid) {
        return true;
      }
    }

    return false;
  }

  private static function base64urlEncode($data)
  {
    // First of all you should encode $data to Base 64 string 

    $b64 = base64_encode($data);

    // Mkae sure get a valid result, otherwise, return False, as the base_64_encode() function do 
    if ($b64 === false) {
      return false;
    }

    // Convert Base64 to Base64URL by replacig "+" with "-" and "/" with "_"
    $url = strtr($b64, '+/', '-_');


    // Remove padding character from the end of line and return the Base64URL result 
    return rtrim($url, '=');
  }
}
