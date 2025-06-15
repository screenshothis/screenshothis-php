# screenshothis/php

Developer-friendly & type-safe Php SDK specifically catered to leverage *screenshothis/php* API.

<div align="left">
    <a href="https://www.speakeasy.com/?utm_source=screenshothis/php&utm_campaign=php"><img src="https://custom-icon-badges.demolab.com/badge/-Built%20By%20Speakeasy-212015?style=for-the-badge&logoColor=FBE331&logo=speakeasy&labelColor=545454" /></a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/badge/License-MIT-blue.svg" style="width: 100px; height: 28px;" />
    </a>
</div>

<!-- Start Summary [summary] -->
## Summary

Screenshothis API: API designed to take screenshots of websites
<!-- End Summary [summary] -->

<!-- Start Table of Contents [toc] -->
## Table of Contents
<!-- $toc-max-depth=2 -->
* [screenshothis/php](#screenshothisphp)
  * [SDK Installation](#sdk-installation)
  * [SDK Example Usage](#sdk-example-usage)
  * [Available Resources and Operations](#available-resources-and-operations)
  * [Error Handling](#error-handling)
  * [Server Selection](#server-selection)
* [Development](#development)
  * [Maturity](#maturity)
  * [Contributions](#contributions)

<!-- End Table of Contents [toc] -->

<!-- Start SDK Installation [installation] -->
## SDK Installation

The SDK relies on [Composer](https://getcomposer.org/) to manage its dependencies.

To install the SDK and add it as a dependency to an existing `composer.json` file:
```bash
composer require "screenshothis/php"
```
<!-- End SDK Installation [installation] -->

<!-- Start SDK Example Usage [usage] -->
## SDK Example Usage

### Example

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
<!-- End SDK Example Usage [usage] -->

<!-- Start Available Resources and Operations [operations] -->
## Available Resources and Operations

<details open>
<summary>Available methods</summary>

### [Screenshothis SDK](docs/sdks/screenshothis/README.md)

* [takeScreenshot](docs/sdks/screenshothis/README.md#takescreenshot) - Generate optimized website screenshot
* [health](docs/sdks/screenshothis/README.md#health) - Comprehensive health check
* [ready](docs/sdks/screenshothis/README.md#ready) - Readiness probe
* [live](docs/sdks/screenshothis/README.md#live) - Liveness probe

</details>
<!-- End Available Resources and Operations [operations] -->

<!-- Start Error Handling [errors] -->
## Error Handling

Handling errors in this SDK should largely match your expectations. All operations return a response object or throw an exception.

By default an API error will raise a `Errors\APIException` exception, which has the following properties:

| Property       | Type                                    | Description           |
|----------------|-----------------------------------------|-----------------------|
| `$message`     | *string*                                | The error message     |
| `$statusCode`  | *int*                                   | The HTTP status code  |
| `$rawResponse` | *?\Psr\Http\Message\ResponseInterface*  | The raw HTTP response |
| `$body`        | *string*                                | The response content  |

When custom error responses are specified for an operation, the SDK may also throw their associated exception. You can refer to respective *Errors* tables in SDK docs for more details on possible exception types for each operation. For example, the `takeScreenshot` method throws the following exceptions:

| Error Type                 | Status Code | Content Type     |
| -------------------------- | ----------- | ---------------- |
| Errors\ForbiddenException  | 403         | application/json |
| Errors\InternalServerError | 500         | application/json |
| Errors\APIException        | 4XX, 5XX    | \*/\*            |

### Example

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Screenshothis\Screenshothis;
use Screenshothis\Screenshothis\Models\Errors;
use Screenshothis\Screenshothis\Models\Operations;

$sdk = Screenshothis\Screenshothis::builder()->build();

try {
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
} catch (Errors\ForbiddenExceptionThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\InternalServerErrorThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\APIException $e) {
    // handle default exception
    throw $e;
}
```
<!-- End Error Handling [errors] -->

<!-- Start Server Selection [server] -->
## Server Selection

### Override Server URL Per-Client

The default server can be overridden globally using the `setServerUrl(string $serverUrl)` builder method when initializing the SDK client instance. For example:
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Screenshothis\Screenshothis;
use Screenshothis\Screenshothis\Models\Operations;

$sdk = Screenshothis\Screenshothis::builder()
    ->setServerURL('https://api.screenshothis.com')
    ->build();

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
<!-- End Server Selection [server] -->

<!-- Placeholder for Future Speakeasy SDK Sections -->

# Development

## Maturity

This SDK is in beta, and there may be breaking changes between versions without a major version update. Therefore, we recommend pinning usage
to a specific package version. This way, you can install the same version each time without breaking changes unless you are intentionally
looking for the latest version.

## Contributions

While we value open-source contributions to this SDK, this library is generated programmatically. Any manual changes added to internal files will be overwritten on the next generation.
We look forward to hearing your feedback. Feel free to open a PR or an issue with a proof of concept and we'll do our best to include it in a future release.

### SDK Created by [Speakeasy](https://www.speakeasy.com/?utm_source=screenshothis/php&utm_campaign=php)
