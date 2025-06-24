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