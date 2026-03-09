<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$reviews = App\Models\Review::all();
echo "Total Reviews: " . $reviews->count() . "\n";
foreach($reviews as $r) {
    echo "ID: " . $r->id . " | Rating: " . $r->rating_overall . " | User: " . ($r->user ? $r->user->name : 'N/A') . " | Item: " . $r->item_type . " #" . $r->item_id . "\n";
}
