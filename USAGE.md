<!-- Start SDK Example Usage [usage] -->
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
<!-- End SDK Example Usage [usage] -->