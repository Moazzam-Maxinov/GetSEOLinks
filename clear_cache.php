<?php

// Load the Laravel application
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

// Create an instance of the console kernel
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Run the Artisan commands
try {
    echo "Clearing application cache...\n";
    $kernel->call('cache:clear');
    echo $kernel->output();

    echo "Clearing route cache...\n";
    $kernel->call('route:clear');
    echo $kernel->output();

    echo "Clearing config cache...\n";
    $kernel->call('config:clear');
    echo $kernel->output();

    echo "Clearing view cache...\n";
    $kernel->call('view:clear');
    echo $kernel->output();

    echo "Cache cleared successfully!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
