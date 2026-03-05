<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$raw = Illuminate\Support\Facades\DB::select('SELECT * FROM bookings WHERE id = 18');
echo json_encode($raw, JSON_PRETTY_PRINT);
