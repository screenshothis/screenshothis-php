# HealthCheck

Performs a comprehensive health check of all critical system components including database connectivity, storage availability, job queue status, and S3 functionality. Returns detailed status information for monitoring and alerting systems.


## Fields

| Field                                                       | Type                                                        | Required                                                    | Description                                                 | Example                                                     |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| `status`                                                    | [Components\Status](../../Models/Components/Status.md)      | :heavy_check_mark:                                          | Overall health status of the system                         |                                                             |
| `timestamp`                                                 | *string*                                                    | :heavy_check_mark:                                          | Timestamp of the health check                               |                                                             |
| `uptime`                                                    | *float*                                                     | :heavy_check_mark:                                          | Uptime of the service in seconds                            |                                                             |
| `checks`                                                    | array<[Components\Check](../../Models/Components/Check.md)> | :heavy_check_mark:                                          | Array of health check results                               |                                                             |
| `version`                                                   | *?string*                                                   | :heavy_minus_sign:                                          | Application version or commit hash                          | 1.0.0                                                       |