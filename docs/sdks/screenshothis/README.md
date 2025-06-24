# Screenshothis SDK

## Overview

Screenshothis API: API designed to take screenshots of websites

### Available Operations

* [takeScreenshot](#takescreenshot) - Generate optimized website screenshot
* [health](#health) - Comprehensive health check
* [ready](#ready) - Readiness probe
* [live](#live) - Liveness probe

## takeScreenshot

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
    userAgent: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
    headers: 'User-Agent: MyBot/1.0\n' .
    'Authorization: Bearer token123\n' .
    'X-Custom-Header: value',
    cookies: 'session_id=abc123; Domain=example.com; Path=/; Secure\n' .
    'user_pref=dark_mode; Max-Age=3600',
);

$response = $sdk->takeScreenshot(
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

## health

Performs a comprehensive health check of all critical system components including database connectivity, storage availability, job queue status, and S3 functionality. Returns detailed status information for monitoring and alerting systems.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Screenshothis\Screenshothis;

$sdk = Screenshothis\Screenshothis::builder()->build();



$response = $sdk->health(

);

if ($response->healthCheck !== null) {
    // handle response
}
```

### Response

**[?Operations\HealthResponse](../../Models/Operations/HealthResponse.md)**

### Errors

| Error Type                  | Status Code                 | Content Type                |
| --------------------------- | --------------------------- | --------------------------- |
| Errors\HealthCheckException | 503                         | application/json            |
| Errors\APIException         | 4XX, 5XX                    | \*/\*                       |

## ready

Kubernetes-compatible readiness probe that verifies the service is ready to accept traffic. Checks database connectivity to ensure the service can handle requests. Used by orchestrators to determine when to route traffic to this instance.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Screenshothis\Screenshothis;

$sdk = Screenshothis\Screenshothis::builder()->build();



$response = $sdk->ready(

);

if ($response->object !== null) {
    // handle response
}
```

### Response

**[?Operations\ReadyResponse](../../Models/Operations/ReadyResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\NotReadyException | 503                      | application/json         |
| Errors\APIException      | 4XX, 5XX                 | \*/\*                    |

## live

Kubernetes-compatible liveness probe that indicates whether the service is alive and functioning. This lightweight check verifies the application is responsive and should be used by orchestrators to determine if the container needs to be restarted.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Screenshothis\Screenshothis;

$sdk = Screenshothis\Screenshothis::builder()->build();



$response = $sdk->live(

);

if ($response->object !== null) {
    // handle response
}
```

### Response

**[?Operations\LiveResponse](../../Models/Operations/LiveResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\NotAliveException | 503                      | application/json         |
| Errors\APIException      | 4XX, 5XX                 | \*/\*                    |