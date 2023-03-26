<?php

namespace Nathan\Http\Controllers;

class UserController
{
  public function getAll()
  {
    if (AuthController::checkAuth()) {
      return array(1 => 'Rafael', 2 => 'Bruna', 3 => 'Marcelo');
    };

    throw new \Exception('Não autenticado');
  }
}
