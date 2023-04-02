<?php


class ErrorHanlder
{
  public static function handleException(Throwable $throwable): void
  {

    http_response_code(500);

    echo json_encode([
      'code' => $exeption->getCode(),
      'message' => $exeption->getMessage(),
      'file' => $exeption->getFile(),
      'line' => $exeption->getLine(),
    ]);
    exit;
  }

  public static function hanldeError(
    int $errno,
    string $errstr,
    string $errfile,
    int $errline
  ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
  }
}
