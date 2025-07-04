<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Screenshothis\Screenshothis\Models\Errors;

class NotAliveExceptionThrowable extends \RuntimeException
{
    public NotAliveException $container;

    public function __construct(string $message, int $statusCode, NotAliveException $container)
    {
        parent::__construct($message, $statusCode);
        $this->container = $container;
    }
}