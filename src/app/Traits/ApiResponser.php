<?php

namespace App\Traits;

trait ApiResponser
{
  protected function success($data = null, string $message = null, int $code = 200)
  {
    return response()->json([
      'status' => true,
      'message' => $message,
      'data' => $data
    ], $code);
  }

  protected function error(string $message = null, int $code = 404)
  {
    return response()->json([
      'status' => false,
      'message' => $message
    ], $code);
  }

  protected function notFound(string $message = '該当するリソースが見つかりません')
  {
    return $this->error($message, 404);
  }
}
