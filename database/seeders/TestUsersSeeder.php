<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Package;
use App\Models\Transaction;
use App\Models\BinaryTree;
use App\Models\FarmingLog;
use App\Services\BinaryTreeService;
use App\Services\CommissionService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Creates a realistic MLM network with users and package purchases:
     * - Root User (ID: 1) - Network founder, earns from referrals
     * - User A (ID: 2) - Buys $50 Starter, earns $2.50 referral from D&E
     * - User B (ID: 3) - Buys $100 Bronze, creates pairing bonus for Root
     * - User C (ID: 4) - Registered but hasn't bought yet
     * - User D (ID: 5) - Buys $50 Starter under User A
     * - User E (ID: 6) - Registered but hasn't bought yet
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Transaction::truncate();
        BinaryTree::truncate();
        FarmingLog::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Initialize services
        $binaryService = new BinaryTreeService();
        $commissionService = new CommissionService();

        // Get packages
        $starterPackage = Package::where('name', 'Starter')->first();  // $50, 1 point
        $bronzePackage = Package::where('name', 'Bronze')->first();   // $100, 3 points

        // Create Root User (No Sponsor)
        $root = User::create([
            'name' => 'Root User',
            'email' => 'root@leafchain.test',
            'password' => Hash::make('password'),
            'sponsor_id' => null,
            'wallet_address' => '0x742d35Cc6634C0532925a3b844Bc9e7595f0bEb1',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info("✅ Created Root User (ID: {$root->id})");

        // Create User A (Sponsored by Root) - Will buy Starter package
        $userA = User::create([
            'name' => 'User A',
            'email' => 'usera@leafchain.test',
            'password' => Hash::make('password'),
            'sponsor_id' => $root->id,
            'wallet_address' => '0x1234567890abcdef1234567890abcdef12345678',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info("✅ Created User A (ID: {$userA->id}, Sponsor: Root)");

        // Create User B (Sponsored by Root) - Will buy Bronze package
        $userB = User::create([
            'name' => 'User B',
            'email' => 'userb@leafchain.test',
            'password' => Hash::make('password'),
            'sponsor_id' => $root->id,
            'wallet_address' => '0xabcdef1234567890abcdef1234567890abcdef12',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info("✅ Created User B (ID: {$userB->id}, Sponsor: Root)");

        // Create User C (Sponsored by Root) - Just registered, no purchase
        $userC = User::create([
            'name' => 'User C',
            'email' => 'userc@leafchain.test',
            'password' => Hash::make('password'),
            'sponsor_id' => $root->id,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info("✅ Created User C (ID: {$userC->id}, Sponsor: Root)");

        // Create User D (Sponsored by User A) - Will buy Starter package
        $userD = User::create([
            'name' => 'User D',
            'email' => 'userd@leafchain.test',
            'password' => Hash::make('password'),
            'sponsor_id' => $userA->id,
            'wallet_address' => '0x1111111111111111111111111111111111111111',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info("✅ Created User D (ID: {$userD->id}, Sponsor: User A)");

        // Create User E (Sponsored by User A) - Just registered, no purchase
        $userE = User::create([
            'name' => 'User E',
            'email' => 'usere@leafchain.test',
            'password' => Hash::make('password'),
            'sponsor_id' => $userA->id,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info("✅ Created User E (ID: {$userE->id}, Sponsor: User A)");

        // ========================================
        // SIMULATE PACKAGE PURCHASES
        // ========================================

        $this->command->info("\n🛒 Simulating Package Purchases...");

        // 0. Root buys Gold Package ($320) - needed for pairing bonuses
        $goldPackage = Package::where('name', 'Gold')->first(); // $320, 10 points, $21 pairing bonus
        $this->simulatePackagePurchase($root, $goldPackage, $binaryService, $commissionService);
        $this->command->info("✅ Root purchased Gold Package ($320) - enables pairing bonuses");

        // 1. User A buys Starter Package ($50)
        $this->simulatePackagePurchase($userA, $starterPackage, $binaryService, $commissionService);
        $this->command->info("✅ User A purchased Starter Package ($50)");

        // 2. User B buys Bronze Package ($100)
        $this->simulatePackagePurchase($userB, $bronzePackage, $binaryService, $commissionService);
        $this->command->info("✅ User B purchased Bronze Package ($100)");

        // 3. User D buys Starter Package ($50)
        $this->simulatePackagePurchase($userD, $starterPackage, $binaryService, $commissionService);
        $this->command->info("✅ User D purchased Starter Package ($50)");

        // ========================================
        // DISPLAY RESULTS
        // ========================================

        $this->command->info("\n📊 Final Network Structure:");
        $this->command->info("       Root (1)");
        $this->command->info("      /   |   \\");
        $this->command->info("   A(2) B(3) C(4)");
        $this->command->info("   / \\");
        $this->command->info(" D(5) E(6)");
        $this->command->info("");

        $this->displayEarningsSummary();
    }

    /**
     * Simulate a complete package purchase with all business logic
     */
    private function simulatePackagePurchase($user, $package, $binaryService, $commissionService)
    {
        // 1. Create purchase transaction
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'purchase',
            'amount' => $package->price,
            'currency' => 'USDT',
            'status' => 'completed',
            'description' => "Purchased {$package->name} Package",
            'metadata' => [
                'tx_hash' => '0x' . str_repeat('0', 64), // Dummy hash
                'wallet_address' => $user->wallet_address,
                'package_id' => $package->id
            ]
        ]);

        // 2. Place user in binary tree
        $binaryTree = $binaryService->placeUser($user, $package);

        // 3. Process direct referral bonus
        if ($user->sponsor_id) {
            $commissionService->processDirectReferralBonus($user->sponsor_id, $package->price);
        }

        // 4. Process pairing bonuses
        $commissionService->processPairingBonuses($user->id);

        // 5. Create farming log
        FarmingLog::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'daily_rate' => 0.0050, // 0.50%
            'package_value' => $package->price,
            'status' => 'active'
        ]);
    }

    /**
     * Display comprehensive earnings summary
     */
    private function displayEarningsSummary()
    {
        $users = User::with('transactions')->get();

        $this->command->info("💰 Earnings Summary:");
        $this->command->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");

        foreach ($users as $user) {
            $earnings = $user->transactions->whereIn('type', ['referral_bonus', 'pairing_bonus', 'farming_reward'])
                                          ->where('status', 'completed')
                                          ->sum('amount');

            $referralBonuses = $user->transactions->where('type', 'referral_bonus')->sum('amount');
            $pairingBonuses = $user->transactions->where('type', 'pairing_bonus')->sum('amount');
            $farmingRewards = $user->transactions->where('type', 'farming_reward')->sum('amount');

            $this->command->info(sprintf(
                "%-12s | Total: $%-6s | Ref: $%-6s | Pair: $%-6s | Farm: $%-6s",
                $user->name,
                number_format($earnings, 2),
                number_format($referralBonuses, 2),
                number_format($pairingBonuses, 2),
                number_format($farmingRewards, 2)
            ));
        }

        $this->command->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");
        $this->command->info("\n🔐 All passwords: password");
        $this->command->info("📧 Root login: root@leafchain.test / password");
        $this->command->info("🌐 Start: http://127.0.0.1:8000/login");
    }
}
