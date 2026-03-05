<?php
use App\Models\Booking;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$all = Booking::all();
$out = "Total Bookings in DB (Laravel view): " . $all->count() . "\n";
foreach($all as $b) {
    $out .= "ID: " . $b->id . " | UID: " . $b->user_id . " | Status: " . $b->status . "\n";
}

file_put_contents('diag_all.txt', $out);
echo "Diagnostics written to diag_all.txt\n";
