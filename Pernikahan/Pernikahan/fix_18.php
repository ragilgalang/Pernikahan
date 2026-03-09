<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$booking = App\Models\Booking::find(18);
if ($booking) {
    echo "Current UID for ID 18: " . $booking->user_id . "\n";
    $booking->user_id = 1;
    $booking->save();
    echo "Updated UID for ID 18 to 1\n";
} else {
    echo "Booking ID 18 not found\n";
}
