# Health
(*health*)

## Overview

### Available Operations

* [get](#get) - Comprehensive health check
* [getReady](#getready) - Readiness probe
* [getLive](#getlive) - Liveness probe

## get

Performs a comprehensive health check of all critical system components including database connectivity, storage availability, job queue status, and S3 functionality. Returns detailed status information for monitoring and alerting systems.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Screenshothis\Screenshothis;

$sdk = Screenshothis\Screenshothis::builder()->build();



$response = $sdk->health->get(

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

## getReady

Kubernetes-compatible readiness probe that verifies the service is ready to accept traffic. Checks database connectivity to ensure the service can handle requests. Used by orchestrators to determine when to route traffic to this instance.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Screenshothis\Screenshothis;

$sdk = Screenshothis\Screenshothis::builder()->build();



$response = $sdk->health->getReady(

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

## getLive

Kubernetes-compatible liveness probe that indicates whether the service is alive and functioning. This lightweight check verifies the application is responsive and should be used by orchestrators to determine if the container needs to be restarted.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Screenshothis\Screenshothis;

$sdk = Screenshothis\Screenshothis::builder()->build();



$response = $sdk->health->getLive(

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