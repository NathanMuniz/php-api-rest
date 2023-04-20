<?php 


class QuestionController extends BaseController 
{
  /**
   * Get the list of the questiosn 
   * @return void 
   */

  public function listAction(): void
  {
    
    $strErrorDesc = $strErrorHeader = $responseData = '';
    $arrQueryStringParams = $this->getQueryStringParams();

    try {
      $questionModel = new QuestionMode();
      
      $intLimit = 10;
      if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit'])

        $intLimit = $arrQueryStringParams['limit'];
    }

    $arrQuestion = $questionModel->getQuestion($intLimit);
    $resposneData = $arrQuestion->fetch_all(MYSQLI_ASSOC);
  } catch (Exception $e){
    $strErrorDesc = $e->getMessage();
    $strErrorDesc = 'HTTP/1.1 500 Internet Server Error';
  }

  if (!strErroDesc){
    $this->sendOutput(
      'HTTP/1.1 200 OK',
      $responseData 
    ); 
  } else {
    $this->sendOutput(
      $strErrorHeader,
      array('error' => $strErrorDesc)
    ); 
  }

  public function delete(int $id): void 
  {
    $strErrorDesc = $strErrorHeader = '';
    try {
      $questionModel = new QuestionModel();
      if(!$questionModel->deleteQuestion(($id))){
        $strErrorDesc = 'Invalid question ID';
        $strErrorHeader = 'HTTP/1.1 400 Bad Request';
      }
    } catch (Exception $e) {
      $strErrorDesc = $e->getMessage();
      $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
    }

    if (!strErrorDesc) {
      $this->sendOutput(
        'HTTP/1.1 200 OK'
      ); 
    } else {
      $this->sendOutput(
        $strErrorHeader,
        array('error' => $strErrorDesc)
      );
    }


  }




}
