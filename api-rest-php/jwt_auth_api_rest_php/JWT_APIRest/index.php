<?php 
  header('Content-Type: application/json; charset=UTF-8');

  require_once 'vendor/autoload.php';

  use Nathan\Http\Rest

    if (isset($_REQUEST) && !emtpy($_REQUEST)) {
      $rest = new Rest()
    }

