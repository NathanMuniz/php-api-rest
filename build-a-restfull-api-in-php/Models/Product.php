<?php 
namespace App\Models;

class Product 
{
  private $DataAccess;

  private function __construct()
  {
    $this->DataAccess = new DataAccess();
  }

  public function getAll(): array {
    $sql = "SELECT * FROM books_data";
    
    return $this->DataAccess->fetchAll($sql);
  }

  public function get(int|string $keyword): bool|array 
  {
    $sql = "SELECT * FROM books_data WHERE bookID = :id OR title = :title";

    return $this->DataAccess->
      fetchCustomData($sql, [$keyword, $keyword]);
  }

  public function createBook(array $data): int|bool 
  {
    $sql = "INSERT INTO books_data (title, author, description, ULR, categoryID, userID)
      VALUES (:title, :author, :description, :URL, :categoryID, :userID)";

    return $this->DataAccess-> 
      insertCustomData($sql, [
        $data['title'],
        $data['author'],
        $data['description'],
        $data['URL'],
        $data['categoryID'];
        $data['userID'];
      ]);

    public function delteBook(int|string $id, string $auth_key): int 
    {
      // implementar
    }

  }



}
