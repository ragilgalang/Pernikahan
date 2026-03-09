<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$reviews = Illuminate\Support\Facades\DB::select('SELECT * FROM reviews');
echo json_encode($reviews, JSON_PRETTY_PRINT);
