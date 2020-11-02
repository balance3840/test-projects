<?php
namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Trait ApiResponse
 * @package App\Traits
 */
trait ApiResponse {
    /**
     * @param array $data
     * @param int $code Response code
     * @return JsonResponse
     */
    public function successResponse(array $data, $code = Response::HTTP_OK): JsonResponse {
        return new JsonResponse($data, $code);
    }

    /**
     * @param string $error
     * @param string $message Error message
     * @param int $code Response code
     * @return JsonResponse
     */
    public function errorResponse(string $error, string $message, $code = Response::HTTP_BAD_REQUEST): JsonResponse {
        return new JsonResponse([
            'error' => $error,
            'message' => $message,
            'code' => $code
        ], $code);
    }
}