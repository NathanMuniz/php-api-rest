<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class DataAccess
{
  private $conn;

  public function __construct()
  {

    $this->conn = (new Database())->connect();
  }

  // Query the Database 
  public function insertCustomData(string $query, array $params)
  {

    $stmt = $this->conn->prepare($query);
    $stmt->execute($params);

    $id = $this->conn->lastInsertId();
    return $id;
  }

  // Query Data 
  public function queryCustomData(string $query, array $params)
  {
    $stmt = $this->conn->prepare($query);
    $stmt->execute($params);

    return $stmt->rowCount();
  }

  // Fetch Custom Data Array 
  public function fetchCustomData(string $query, array $params)
  {
    $stmt = $this->conn->prepare($query);
    $stmt->execute($params);

    $data = array();

    if ($stmt->rowCount() > 0) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
      return $data;
    }

    return false;
  }
}
