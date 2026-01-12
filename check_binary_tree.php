<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "🌳 BINARY TREE ANALYSIS:\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

// Get all binary tree records
$trees = App\Models\BinaryTree::with('user')->orderBy('id')->get();

echo "📋 All Binary Tree Records:\n";
foreach ($trees as $tree) {
    $user = $tree->user;
    echo "- ID {$tree->id}: {$user->name} (User {$tree->user_id}) | Upline: " .
         ($tree->upline_id ?? 'Root') . " | Position: {$tree->position} | " .
         "Left: {$tree->left_volume} | Right: {$tree->right_volume}\n";
}

echo "\n🔍 Root User Analysis:\n";
$root = App\Models\User::find(1);
$rootTree = App\Models\BinaryTree::where('user_id', 1)->first();

if ($rootTree) {
    echo "- Root HAS binary tree: Position {$rootTree->position}\n";
} else {
    echo "- Root has NO binary tree record\n";
}

echo "\n📊 Volume Analysis:\n";
$rootDownlines = App\Models\User::where('sponsor_id', 1)
    ->whereHas('binaryTree')
    ->with('binaryTree')
    ->get();

echo "- Root's downlines with binary trees:\n";
foreach ($rootDownlines as $downline) {
    $tree = $downline->binaryTree;
    echo "  - {$downline->name}: Position {$tree->position}, Upline {$tree->upline_id}\n";
}

echo "\n💡 Issue: Root should have a binary tree record when first downline is placed!\n";