<?php
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\User;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = User::first();
echo "Logged in User ID: " . $u_id = $user->id . "\n";

$bookings = Booking::where('user_id', $u_id)->get();
echo "Total Bookings found for User $u_id: " . $bookings->count() . "\n";

foreach ($bookings as $b) {
    echo "ID: {$b->id}, Item: {$b->item_type} #{$b->item_id}, Status: {$b->status}, Created: {$b->created_at}\n";
}

$all_count = Booking::count();
echo "Grand Total Bookings in table: $all_count\n";
