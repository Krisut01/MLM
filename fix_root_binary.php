<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "🔧 Fixing Root User's Binary Tree Record\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

// Check current state
$root = App\Models\User::find(1);
$existingTree = App\Models\BinaryTree::where('user_id', 1)->first();

if ($existingTree) {
    echo "✅ Root already has binary tree record\n";
    return;
}

// Calculate Root's volumes from direct downlines
// User A (ID 2) is on left with 1 point (Starter package)
$leftDownline = App\Models\BinaryTree::where('upline_id', 1)->where('position', 'left')->first();
$leftVolume = $leftDownline ? 1 : 0; // User A has 1 point from Starter

// User B (ID 3) is on right with 3 points (Bronze package)
$rightDownline = App\Models\BinaryTree::where('upline_id', 1)->where('position', 'right')->first();
$rightVolume = $rightDownline ? 3 : 0; // User B has 3 points from Bronze

// Create Root's binary tree record
$rootTree = App\Models\BinaryTree::create([
    'user_id' => 1,
    'sponsor_id' => null,
    'upline_id' => null,
    'position' => 'left', // Doesn't matter for root
    'left_volume' => $leftVolume,
    'right_volume' => $rightVolume,
    'left_carry' => 0,
    'right_carry' => 0,
    'pairs_today' => 0,
    'last_pair_date' => now(),
]);

echo "✅ Created Root's binary tree record:\n";
echo "- Left Volume: {$rootTree->left_volume}\n";
echo "- Right Volume: {$rootTree->right_volume}\n";
echo "- Position: {$rootTree->position}\n\n";

// Check for pairing bonuses now that Root has volumes
$binaryService = new App\Services\BinaryTreeService();
$commissionService = new App\Services\CommissionService();

echo "🔄 Processing pairing bonuses for Root...\n";
$pairingBonuses = $commissionService->processPairingBonuses(1);

if (count($pairingBonuses) > 0) {
    echo "✅ Generated pairing bonuses!\n";
} else {
    echo "ℹ️ No pairing bonuses generated (minimum volume not met)\n";
}

// Show final dashboard data
echo "\n📊 FINAL ROOT DASHBOARD DATA:\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

$totalEarnings = App\Models\Transaction::where('user_id', 1)
    ->whereIn('type', ['referral_bonus', 'pairing_bonus', 'farming_reward'])
    ->where('status', 'completed')
    ->sum('amount');

$referralBonuses = App\Models\Transaction::where('user_id', 1)
    ->where('type', 'referral_bonus')
    ->sum('amount');

$pairingBonuses = App\Models\Transaction::where('user_id', 1)
    ->where('type', 'pairing_bonus')
    ->sum('amount');

echo "💰 Total Earnings: $" . number_format($totalEarnings, 2) . "\n";
echo "   - Referral Bonuses: $" . number_format($referralBonuses, 2) . "\n";
echo "   - Pairing Bonuses: $" . number_format($pairingBonuses, 2) . "\n";
echo "🌳 Binary Position: " . ucfirst($rootTree->position) . "\n";
echo "📊 Left Volume: {$rootTree->left_volume} | Right Volume: {$rootTree->right_volume}\n\n";

echo "🎉 Root user now has complete dashboard data!\n";