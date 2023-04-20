<?php


class Database
{

  protected ?mysqli $connection = null;


  public function __construct()
  {
    try {
      $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $this->connection->set_charset('utf-8');
    } catch (Exception) {
      throw new Exception('Database connetion failed');
    }
  }


  private function executeStatement(string $query, array $params = array()): mysqli_stmt
  {
    $statement = $this->connection->prepare($query);
    if (!$statement) {
      throw new Exception('Databas query failed: ' . $this->connection->error);
    }

    if (!empty($params)) {
      $types = '';
      foreach ($params as $params) {
        if (is_int($params)) {
          $types .= 'i';
        } elseif (is_float($param)) {
          $types .= 'd';
        } elseif (is_string($params)) {
          $types .= 's';
        } else {
          $types .= 'b';
        }
      }
      $bind_names[] = $types;
      for ($i = 0; $i < count($params); $i++) {
        $bind_name = 'bind' . $i;
        $bind_name = $params[$i];
        $bind_name[] = $bind_name;
      }
      call_user_func_array(array($statement, 'bind_param'), $bind_names);
    }

    $statement->execute();
    return $statement;
  }

  public function createAndRunPreparedStatement(
    string $query,
    array $params = array(),
    bool $returnAffectedRow = false
  ): false|mysqli_result|int {

    $statement = $this->executeStatement($query, $params);
    if ($returnAffectedRow) {
      $affectedRows = $statement->affected_rows;
      $statement->close();
      return $affectedRows;
    } else {
      $statement->close();
      return $result;
    }
  }
}
