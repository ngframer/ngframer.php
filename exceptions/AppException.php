<?php

namespace app\exceptions;

use NGFramer\NGFramerPHPExceptions\exceptions\BaseException;
use Throwable;

class AppException extends BaseException
{
    /**
     * AppException constructor.
     *
     * @param string $message
     * @param int $code
     * @param string $label
     * @param Throwable|null $previous
     * @param int $statusCode
     * @param array $details
     */
    public function __construct(string $message = "", int $code = 0, string $label = '', Throwable $previous = null, int $statusCode = 500, array $details = [])
    {
        parent::__construct($message, $code, $label, $previous, $statusCode, $details);
    }
}