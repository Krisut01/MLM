<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$user = App\Models\User::find(1);
$binaryTree = App\Models\BinaryTree::where('user_id', 1)->first();

echo "Root User (ID: 1):\n";
echo "- Name: " . $user->name . "\n";
echo "- Email: " . $user->email . "\n";
echo "- Has Sponsor: " . ($user->sponsor_id ? 'Yes (ID: ' . $user->sponsor_id . ')' : 'No (Root User)') . "\n";
echo "- Binary Tree: " . ($binaryTree ? 'EXISTS (Position: ' . $binaryTree->position . ')' : 'NOT FOUND') . "\n";

$downlines = App\Models\User::where('sponsor_id', 1)->count();
echo "- Direct Downlines: " . $downlines . "\n";

$earnings = App\Models\Transaction::where('user_id', 1)
    ->whereIn('type', ['referral_bonus', 'pairing_bonus', 'farming_reward'])
    ->where('status', 'completed')
    ->sum('amount');

echo "- Total Earnings: $" . number_format($earnings, 2) . "\n";