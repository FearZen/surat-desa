<?php

use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);

try {
    $status = $kernel->call('migrate:fresh', ['--force' => true]);
    echo "Migration Status: $status\n";
    echo $kernel->output();
} catch (Throwable $e) {
    echo 'Error Message: '.$e->getMessage()."\n";
    if ($e->getPrevious()) {
        echo 'Previous Error: '.$e->getPrevious()->getMessage()."\n";
    }
}
