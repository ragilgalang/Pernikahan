<?php
use App\Models\Booking;
use App\Models\User;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = User::first();
if (!$user) {
    file_put_contents('diag_final.txt', "No user found in DB");
    exit;
}

$u_id = $user->id;
$bookings = Booking::where('user_id', $u_id)->get();

$out = "User ID: " . $u_id . " (" . $user->name . ")\n";
$out .= "Total Bookings for this user: " . $bookings->count() . "\n";
foreach($bookings as $b) {
    $out .= "- ID: " . $b->id . ", Created: " . $b->created_at . ", Price: " . $b->total_price . "\n";
}

file_put_contents('diag_final.txt', $out);
echo "Diagnostics written to diag_final.txt\n";
