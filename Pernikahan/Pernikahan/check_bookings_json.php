<?php
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\User;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = User::first();
$u_id = $user->id;

$bookings = Booking::where('user_id', $u_id)->get();
$all = Booking::all();

echo json_encode([
    'logged_in_user' => $user->toArray(),
    'bookings_for_user' => $bookings->toArray(),
    'all_bookings_count' => $all->count(),
], JSON_PRETTY_PRINT);
