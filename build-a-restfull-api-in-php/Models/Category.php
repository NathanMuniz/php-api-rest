<?php

namespace App\Models;

use App\Models\DataAccess;

class Categroy
{

  private $DataAcess;

  public function __construct()
  {
    $this->DataAcess = new DataAccess();
  }

  // Get itms/Collection
  public function getAll(): array
  {
    $sql = "SELECT * FROM categories";

    return $this->DataAccess->fetch($sql);
  }

  public function get(int|string $keyword): bool|array
  {
    $sql = "SELECT * FROM categories WHERE categoryID = :id OR title = :title";

    return $this->DataAccess->fetchCustomData($sql, [$keyword, $keyword]);
  }

  public function create_module(array $data): int|bool
  {

    $access_token = explode("@@", $data['_acc_token']);
    $tokne = $access_token[0];
    $userID = $access_token[1];

    $sql = "INSERT INTO categories (title, descriptions, userID) 
        VALUES (:title, :descriptions, :userID)";

    return $this->DataAccess->queryCustomData($sql, [
      $data['title'],
      $data['descriptions'],
      $userID,
    ]);
  }

  // Delete Book 
  public function deleteBoook(int|string $id, string $auth_key): int
  {

    // Authenticate User before Delete 
    $key = strtolower($auth_key);
    $users = ['asdf', 'aaaa', 'abcd', 'abab'];

    if (!in_array($key, $users)) {
      return 401;
    }

    $sql = "DELETE FROM categories WHERE categoryID = :key";

    return $this->DataAccess->queryCustomData($sql, $id);
  }

  public function updateBook($data)
  {

    $sql = "UPDATE categories SET title = :title, author = :author, description, URL = :URL, categoryID = :categoryID, WHERE
      userID = :user";

    return $this->DataAccess->queryCustomData($sql, [
      $data['title'],
      $data['author'],
      $data['description'],
      $data['URL'],
      $data['category'],
      $data['user'],
    ]);
  }

  // Get items/Collection 
  public function serachBook($keyword): array
  {
    $keyword = "%$keyword%";

    $sql = "SEELCT * FROM categores WHERE title LIKE :title OR authro LIKE :AUTHRO OR descriptions LIKE :description";

    return $this->DataAccess->fetchCustomDataArray($sql, [
      $keyword,
      $keyword,
      $keyword
    ]);
  }
}
