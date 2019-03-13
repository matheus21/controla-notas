<?php

namespace ControlaNotas\Domain\Exception;

use Exception;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

abstract class AbstractException extends UnprocessableEntityHttpException
{
    /**
     * @var MessageBag
     */
    protected $errors;

    public function __construct($errors = null, $message = "", $code = 0, Exception $previous = null)
    {
        $this->setError($errors);
        parent::__construct($this->errors->first(), $previous, $code);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    protected function setError($errors)
    {
        if (is_string($errors)) {
            $errors = ['error' => $errors];
        }

        if (is_array($errors)) {
            $errors = new MessageBag($errors);
        }
        $this->errors = $errors;
    }
}
