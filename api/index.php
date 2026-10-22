<?php

require __DIR__ . '/../vendor/autoload.php';

$dbPath = '/tmp/database.sqlite';
$needInit = !file_exists($dbPath) || filesize($dbPath) === 0;

if ($needInit) {
    @touch($dbPath);
}

$app = require_once __DIR__ . '/../bootstrap/app.php';

if ($needInit) {
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->call('migrate', ['--force' => true, '--seed' => true]);
}

$app->handleRequest(Illuminate\Http\Request::capture());
