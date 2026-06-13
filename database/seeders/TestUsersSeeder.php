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
     * - Users A-Z (ID: 2-27) - All sponsored by Root to test binary tree structure
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
        $bronzePackage = Package::where('name', 'Bronze')->first();   // $100, 2 points
        $goldPackage = Package::where('name', 'Gold')->first();       // $320, 10 points

        // Create Root User (No Sponsor)
        $root = User::create([
            'name' => 'Root User',
            'email' => 'root@leafchain.test',
            'password' => Hash::make('password'),
            'sponsor_id' => null,
            'wallet_address' => '0x742d35Cc6634C0532925a3b844Bc9e7595f0bEb1',
            'is_active' => true,
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info("✅ Created Root User (ID: {$root->id})");

        // Purchase Gold package for Root first
        $this->simulatePackagePurchase($root, $goldPackage, $binaryService, $commissionService);
        $this->command->info("✅ Root purchased Gold Package ($320)");

        // Create Users A-Z (all sponsored by Root)
        $users = [];
        $letters = range('A', 'Z');
        $packages = [$starterPackage, $bronzePackage, $goldPackage];
        
        foreach ($letters as $index => $letter) {
            $user = User::create([
                'name' => "User {$letter}",
                'email' => "user{$letter}@leafchain.test",
                'password' => Hash::make('password'),
                'sponsor_id' => $root->id,
                'wallet_address' => '0x' . str_pad(dechex($index + 100), 40, '0', STR_PAD_LEFT),
                'is_active' => true,
                'email_verified_at' => now(),
            ]);

            $users[$letter] = $user;
            $this->command->info("✅ Created User {$letter} (ID: {$user->id}, Sponsor: Root)");

            // Each user purchases a package (rotating between packages)
            $package = $packages[$index % 3];
            $this->simulatePackagePurchase($user, $package, $binaryService, $commissionService);
            $this->command->info("   └─ Purchased {$package->name} Package (\${$package->price})");
        }

        // ========================================
        // DISPLAY RESULTS
        // ========================================

        $this->command->info("\n📊 Network Structure Created:");
        $this->command->info("Root User with 26 direct referrals (Users A-Z)");
        $this->command->info("All users purchased packages and placed in binary tree");
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
