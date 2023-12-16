<?php


namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

abstract class BaseException extends Exception
{

    protected $statusCode;
    protected $fields = [];

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function response(): JsonResponse
    {
        return response_exception(
            $this->getMessage(),
            $this->getStatusCode(),
            $this->getFile(),
            $this->getLine(),
            $this->getTraceAsString(),
            $this->getFields()
        );
    }

}
