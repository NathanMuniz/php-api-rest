<?php 
namespace App\Models;
use App\Config\Database;
use PDO;

class Master extends Database
{
  
  private $conn = null;

  public function __construct()
  {
    
    $this->conn = (new Database())->connect()

  }



}
