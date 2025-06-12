# Check


## Fields

| Field                                                            | Type                                                             | Required                                                         | Description                                                      |
| ---------------------------------------------------------------- | ---------------------------------------------------------------- | ---------------------------------------------------------------- | ---------------------------------------------------------------- |
| `name`                                                           | *string*                                                         | :heavy_check_mark:                                               | Name of the health check                                         |
| `status`                                                         | [Components\CheckStatus](../../Models/Components/CheckStatus.md) | :heavy_check_mark:                                               | Status of the health check                                       |
| `duration`                                                       | *?float*                                                         | :heavy_minus_sign:                                               | Duration of the health check in milliseconds                     |
| `details`                                                        | array<string, *mixed*>                                           | :heavy_minus_sign:                                               | Detailed information about the health check                      |
| `error`                                                          | *?string*                                                        | :heavy_minus_sign:                                               | Error message if the health check failed                         |