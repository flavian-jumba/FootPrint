<?php

/**
 * Laravel on Vercel - API entry point
 * This file acts as the serverless function entry point
 */

// Output home page directly for testing
if ($_SERVER['REQUEST_URI'] == '/' && !isset($_GET['laravel'])) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Footprints of Hope</title>
        <style>
            body { font-family: system-ui, sans-serif; background: #111827; color: white; display: flex; align-items: center; justify-content: center; height: 95vh; margin: 0; text-align: center; }
            .container { max-width: 800px; padding: 20px; }
            h1 { font-size: 2.5rem; margin-bottom: 1rem; }
            p { font-size: 1.2rem; color: #d1d5db; margin-bottom: 2rem; }
            .btn { background: #4f46e5; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: 600; }
            .btn:hover { background: #4338ca; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Footprints of Hope</h1>
            <p>This is a basic page served directly from the Vercel serverless function.</p>
            <p>To see the full Laravel application, click below:</p>
            <a href="/?laravel=1" class="btn">Launch Laravel App</a>
        </div>
    </body>
    </html>';
    exit;
}

// For debugging
if (isset($_GET['info'])) {
    phpinfo();
    exit;
}

// Standard Laravel bootstrap
require __DIR__ . '/../public/index.php';