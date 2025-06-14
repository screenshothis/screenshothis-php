<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Screenshothis\Screenshothis\Models\Operations;


/** ReadyResponseBody - Service is ready */
class ReadyResponseBody
{
    /**
     *
     * @var ReadyStatus $status
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status')]
    #[\Speakeasy\Serializer\Annotation\Type('\Screenshothis\Screenshothis\Models\Operations\ReadyStatus')]
    public ReadyStatus $status;

    /**
     *
     * @var string $timestamp
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('timestamp')]
    public string $timestamp;

    /**
     * @param  ReadyStatus  $status
     * @param  string  $timestamp
     * @phpstan-pure
     */
    public function __construct(ReadyStatus $status, string $timestamp)
    {
        $this->status = $status;
        $this->timestamp = $timestamp;
    }
}