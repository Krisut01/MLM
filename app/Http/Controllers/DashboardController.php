<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\FarmingLog;
use App\Models\BinaryTree;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get user's statistics
        $totalEarnings = Transaction::where('user_id', $user->id)
            ->whereIn('type', ['referral_bonus', 'pairing_bonus', 'farming_reward'])
            ->where('status', 'completed')
            ->sum('amount');
            
        $activeFarming = FarmingLog::where('user_id', $user->id)
            ->where('status', 'active')
            ->sum('total_earned');
            
        $binaryTree = BinaryTree::where('user_id', $user->id)->first();
        
        $recentTransactions = Transaction::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();
            
        return view('dashboard', compact(
            'totalEarnings', 
            'activeFarming', 
            'binaryTree', 
            'recentTransactions'
        ));
    }
}