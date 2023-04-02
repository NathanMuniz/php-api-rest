<?php

namespace App\Models;

use App\Config\Libaray;
use App\Models\DataAccess;

class User
{
  private $DataAccess;

  public function __construct()
  {
    $this->DataAccess = new DataAccess();
  }

  public function create(array $data): bool|array
  {
    $sql = "INSERT INTO users (username, email, phone, password, userToken)
      VALUES (:username, :email, :phone, :password, :userToken)";

    $passEncypt = password_hash($data['password'], PASSWORD_DEFAULT);

    $token = Libaray::generateKey();

    $res = $this->DataAccess->queryCustomData($sql, [
      $data['username'],
      $data['email'],
      $data['phone'],
      $passEncypt,
      $token,
    ]);

    return array(
      'username' => $data['username'],
      'email' => $data['email'],
      'token' => $token . '@@' . $res,
      'status' => $res,
    );
  }
}
