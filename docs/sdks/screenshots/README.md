# Screenshots
(*screenshots*)

## Overview

### Available Operations

* [take](#take) - Generate optimized website screenshot

## take

Captures high-quality screenshots of websites with advanced optimization features including smart caching, CDN integration, request deduplication, and quota management. Supports multiple image formats (JPEG, PNG, WebP) with customizable dimensions, device emulation, and viewport settings. Implements efficient S3 streaming for large images and conditional requests for optimal performance.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Screenshothis\Screenshothis;
use Screenshothis\Screenshothis\Models\Operations;

$sdk = Screenshothis\Screenshothis::builder()->build();

$request = new Operations\TakeScreenshotRequest(
    apiKey: 'sk_live_abcdef1234567890abcdef1234567890',
    url: 'https://example.com',
    selector: '.main-content',
    blockRequests: '*.doubleclick.net\n' .
    '*.googletagmanager.com\n' .
    '*/analytics/*',
    blockResources: [
        Operations\BlockResource::Script,
        Operations\BlockResource::Stylesheet,
        Operations\BlockResource::Font,
    ],
    cacheKey: 'homepage-desktop-light',
    headers: 'User-Agent: MyBot/1.0\n' .
    'Authorization: Bearer token123\n' .
    'X-Custom-Header: value',
    cookies: 'session_id=abc123; Domain=example.com; Path=/; Secure\n' .
    'user_pref=dark_mode; Max-Age=3600',
);

$response = $sdk->screenshots->take(
    request: $request
);

if ($response->twoHundredImageJpegBytes !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                            | Type                                                                                 | Required                                                                             | Description                                                                          |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `$request`                                                                           | [Operations\TakeScreenshotRequest](../../Models/Operations/TakeScreenshotRequest.md) | :heavy_check_mark:                                                                   | The request object to use for the request.                                           |

### Response

**[?Operations\TakeScreenshotResponse](../../Models/Operations/TakeScreenshotResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\ForbiddenException  | 403                        | application/json           |
| Errors\InternalServerError | 500                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |