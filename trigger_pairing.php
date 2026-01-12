<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "🔄 Triggering Pairing Bonuses for Root User\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

$commissionService = new App\Services\CommissionService();

// Process pairing bonuses for Root (this should create pairing bonuses)
$bonuses = $commissionService->processPairingBonuses(1);

echo "📊 Pairing Bonus Processing Results:\n";
if (count($bonuses) > 0) {
    echo "✅ Generated " . count($bonuses) . " pairing bonuses!\n";
    foreach ($bonuses as $bonus) {
        echo "- Bonus: $" . number_format($bonus->amount, 2) . "\n";
    }
} else {
    echo "❌ No pairing bonuses generated\n";
}

// Check Root's current volumes and pairings
$rootTree = App\Models\BinaryTree::where('user_id', 1)->first();
echo "\n🌳 Root's Binary Tree Status:\n";
echo "- Left Volume: {$rootTree->left_volume}\n";
echo "- Right Volume: {$rootTree->right_volume}\n";
echo "- Matched Pairs: " . min($rootTree->left_volume, $rootTree->right_volume) . "\n";
echo "- Pairs Today: {$rootTree->pairs_today}\n";

// Check if Root has an active package (needed for pairing bonuses)
$rootPackage = App\Models\FarmingLog::where('user_id', 1)->where('status', 'active')->first();
echo "- Has Active Package: " . ($rootPackage ? 'YES (' . $rootPackage->package_value . ')' : 'NO') . "\n";

if (!$rootPackage) {
    echo "\n⚠️ ISSUE: Root needs an active package to receive pairing bonuses!\n";
    echo "💡 Root must purchase a package to get pairing bonus rates.\n";
}

// Show final earnings
$totalEarnings = App\Models\Transaction::where('user_id', 1)
    ->whereIn('type', ['referral_bonus', 'pairing_bonus', 'farming_reward'])
    ->where('status', 'completed')
    ->sum('amount');

$pairingBonuses = App\Models\Transaction::where('user_id', 1)
    ->where('type', 'pairing_bonus')
    ->sum('amount');

echo "\n💰 Root's Final Earnings:\n";
echo "- Total: $" . number_format($totalEarnings, 2) . "\n";
echo "- Referral Bonuses: $15.00\n";
echo "- Pairing Bonuses: $" . number_format($pairingBonuses, 2) . "\n";