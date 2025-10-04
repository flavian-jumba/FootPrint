<?php

// For Vercel, we need to make sure the paths are correct
$basePath = __DIR__ . '/../';

// Check if this is running in a Vercel environment
if (getenv('VERCEL') || getenv('VERCEL_URL')) {
    // In Vercel, the function is in /var/task/api/
    // but the application is in /var/task/
    $basePath = realpath(__DIR__ . '/../');
}

// Check if we're in maintenance mode
if (file_exists($basePath . '/storage/framework/maintenance.php')) {
    require $basePath . '/storage/framework/maintenance.php';
}

// Make sure vendor exists
if (!file_exists($basePath . '/vendor/autoload.php')) {
    http_response_code(500);
    echo "Server Error: Vendor directory not found. Please run 'composer install'.";
    exit;
}

// Load Composer
require $basePath . '/vendor/autoload.php';

// Debug information
if (isset($_GET['debug']) && $_GET['debug'] === 'vercel') {
    phpinfo();
    exit;
}

// Bootstrap Laravel application
$app = require_once $basePath . '/bootstrap/app.php';

// Run the application
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);