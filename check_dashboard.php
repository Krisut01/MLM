<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$user = App\Models\User::find(1); // Root user

// Get dashboard data like the controller does
$totalEarnings = App\Models\Transaction::where('user_id', $user->id)
    ->whereIn('type', ['referral_bonus', 'pairing_bonus', 'farming_reward'])
    ->where('status', 'completed')
    ->sum('amount');

$activeFarming = App\Models\FarmingLog::where('user_id', $user->id)
    ->where('status', 'active')
    ->sum('total_earned');

$binaryTree = App\Models\BinaryTree::where('user_id', $user->id)->first();

$recentTransactions = App\Models\Transaction::where('user_id', $user->id)
    ->latest()
    ->take(5)
    ->get();

echo "🎯 ROOT USER DASHBOARD DATA:\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

echo "👤 User: {$user->name} (ID: {$user->id})\n";
echo "📧 Email: {$user->email}\n";
echo "🎯 Sponsor: " . ($user->sponsor_id ? "ID {$user->sponsor_id}" : "None (Root)") . "\n\n";

echo "💰 Total Earnings: $" . number_format($totalEarnings, 2) . "\n";
echo "🌾 Active Farming: $" . number_format($activeFarming, 2) . "\n";
echo "🌳 Binary Position: " . ($binaryTree ? ucfirst($binaryTree->position) : 'Not Set') . "\n\n";

echo "📊 Binary Tree Details:\n";
if ($binaryTree) {
    echo "- Left Volume: {$binaryTree->left_volume}\n";
    echo "- Right Volume: {$binaryTree->right_volume}\n";
    echo "- Pairs Today: {$binaryTree->pairs_today}\n";
} else {
    echo "- No binary tree record yet\n";
}

echo "\n💸 Recent Transactions:\n";
if ($recentTransactions->count() > 0) {
    foreach ($recentTransactions as $transaction) {
        echo "- " . ucfirst(str_replace('_', ' ', $transaction->type)) .
             ": $" . number_format($transaction->amount, 2) .
             " ({$transaction->status})\n";
    }
} else {
    echo "- No transactions yet\n";
}

echo "\n📈 Downline Summary:\n";
$directDownlines = App\Models\User::where('sponsor_id', $user->id)->count();
$activeDownlines = App\Models\User::where('sponsor_id', $user->id)
    ->whereHas('farmingLogs', function($q) {
        $q->where('status', 'active');
    })->count();

echo "- Total Downlines: {$directDownlines}\n";
echo "- Active (Package Purchased): {$activeDownlines}\n";

echo "\n🎉 Root user now has REAL earnings data to display!\n";