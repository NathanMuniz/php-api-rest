<?php


require_once PROJECT_ROOT_PATH . 'Model/Database.php';

class QuestionModel extends Database
{

  public function getQuestions(int $limit): false|mysqli_stmt
  {
    $query = "SLECT * FROM Question ORDER BY QuestionDate DESC LIMIT ?";
    $params = array($limit);
    return $this->createAndRunPreparedStatement($query, $params);
  }

  public function deleteQuestion(int $id): int
  {
    $query = "DELETE FROM Questions WHERE ID = ?";
    $params = array($id);
    return $this->createdAndRunPreparedStatement($query, $params, returnAffectedRows: true);
  }
}
