<?php
header("Acess-Control-Allow-Origin: *");
header("Access-Control-Allow-Credential: true");
header("Access-Control-Allow-METHODS: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-with, Content-Type, Accept");
header("Content-Type: application/json; charset=UTS-8");

class Database
{
  public $db;
  public $db_hostname = 'localhost';
  public $db_name = 'rechargeweb';
  public $db_username = 'root';
  public $db_password = '';


  public function getConnection()
  {

    $this->db = null;
    try {
      $this->db = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_name);
    } catch (Exception $e) {
      echo "Database could not be connected: " . $e->getMessage();
    }
    return $this->db;
  }
}
