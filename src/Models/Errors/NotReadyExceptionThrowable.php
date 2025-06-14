<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Screenshothis\Screenshothis\Models\Errors;

class NotReadyExceptionThrowable extends \RuntimeException
{
    public NotReadyException $container;

    public function __construct(string $message, int $statusCode, NotReadyException $container)
    {
        parent::__construct($message, $statusCode);
        $this->container = $container;
    }
}