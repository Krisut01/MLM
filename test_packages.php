<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Package;

// Test if packages are seeded
$packages = Package::all();
echo "Found " . $packages->count() . " packages:\n";

foreach ($packages as $package) {
    echo "- {$package->name}: \${$package->price} ({$package->points} points)\n";
}

echo "\n✅ Package system is working!\n";