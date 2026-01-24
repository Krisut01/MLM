# LeafChain User Journey & System Overview

## User Actions & System Flow Diagram

```mermaid
graph TD
    %% User Registration & Onboarding
    A[👤 New User] --> B[Register Account]
    B --> C[Verify Email]
    C --> D[Login to Dashboard]

    %% Package Selection & Purchase
    D --> E[Choose Package]
    E --> F{Select Tier}
    F --> G[Starter<br/>$25<br/>1 Point]
    F --> H[Bronze<br/>$50<br/>2 Points]
    F --> I[Gold<br/>$160<br/>6 Points]
    F --> J[Mobile<br/>$1000<br/>62 Points]

    %% Payment & Blockchain Verification
    G --> K[Connect Wallet<br/>MetaMask/SafePal/etc.]
    H --> K
    I --> K
    J --> K

    K --> L[Pay with USDT<br/>Blockchain TX]
    L --> M[Transaction Verified<br/>Smart Contract]
    M --> N[Receive Digital Assets]

    %% Binary Tree Placement
    N --> O[Placed in Binary Tree<br/>Extreme Left Algorithm]
    O --> P[Assigned Position<br/>Left/Right under Sponsor]

    %% Farming System Activation
    N --> Q[Activate Farming<br/>0.50% Daily]
    Q --> R[3X Cap Limit<br/>$Investment × 3]
    R --> S[500 Day Duration]

    %% Commission Earnings
    P --> T[Start Earning Commissions]

    T --> U[Direct Referral<br/>10% of Downline Purchase]
    T --> V[Pairing Bonus<br/>When Volume Matches<br/>$3.75-$150 per Pair]
    T --> W[Leadership Bonus<br/>50-Level Unilevel<br/>2%-50% of Farming]

    %% Network Building
    P --> X[Build Downlines<br/>Sponsor New Users]
    X --> Y[Share Referral Link]
    Y --> Z[Track Network Growth<br/>Binary Tree View]

    %% Additional Features
    D --> AA[View Dashboard<br/>Earnings & Stats]
    AA --> BB[Manage Profile<br/>Wallet Settings]
    AA --> CC[Transaction History<br/>Commission Tracking]

    N --> DD[Generate QR Code<br/>Product Verification]
    DD --> EE[Scan Products<br/>Verify Authenticity]

    %% Ongoing Earnings
    U --> FF[Receive Payments<br/>Direct to Wallet]
    V --> FF
    W --> FF
    Q --> FF

    %% Styling
    classDef userAction fill:#e1f5fe,stroke:#01579b,stroke-width:2px
    classDef systemProcess fill:#f3e5f5,stroke:#4a148c,stroke-width:2px
    classDef earning fill:#e8f5e8,stroke:#1b5e20,stroke-width:2px
    classDef package fill:#fff3e0,stroke:#e65100,stroke-width:2px

    class A,B,C,D userAction
    class E,F,G,H,I,J,K,L,M,N package
    class O,P,Q,R,S systemProcess
    class T,U,V,W earning
    class X,Y,Z userAction
    class AA,BB,CC userAction
    class DD,EE userAction
    class FF earning
```

## Detailed User Capabilities & System Features

### 👤 **User Profile Management**
- **Account Settings**: Email, password, profile photo
- **Wallet Integration**: MetaMask, Trust Wallet, SafePal, TokenPocket
- **Security**: 2FA, password reset, session management
- **Verification**: Email verification, KYC compliance

### 💰 **Package Investment System**
| Package | Price | Binary Points | Buy Basket | Farming Allocation | Max Daily Pairs |
|---------|-------|---------------|------------|-------------------|-----------------|
| Starter | $25 | 1 | $10 (40%) | $15 (60%) | 12 |
| Bronze | $50 | 2 | $20 (40%) | $30 (60%) | 18 |
| Gold | $160 | 6 | $48 (30%) | $112 (70%) | 36 |
| Mobile | $1000 | 62 | $200 (20%) | $800 (80%) | 96 |

### 🌳 **Binary Network System**
- **Placement Algorithm**: Extreme left strategy
- **Tree Visualization**: Interactive zoom/pan controls
- **Network Analytics**: Volume tracking, balance ratios
- **Downline Management**: Direct referrals table

### 💎 **Commission Structure**
1. **Direct Referral**: 10% of downline's package purchase
2. **Pairing Bonus**: Fixed amounts when left/right volumes match
3. **Leadership Bonus**: Unilevel commissions (50 levels, 1%-50%)

### 🌾 **DeFi Farming System**
- **Daily Rate**: 0.50% compounded daily
- **Duration**: Up to 500 days
- **ROI Cap**: 300% maximum return
- **Auto-Harvest**: Daily rewards credited automatically

### 🔐 **Security & Verification**
- **Blockchain Verification**: Transaction hash validation
- **QR Code System**: Product authenticity verification
- **Wallet Security**: Non-custodial asset management
- **Transaction History**: Complete audit trail

### 📊 **Analytics & Reporting**
- **Dashboard Metrics**: Total earnings, network size, active members
- **Transaction History**: All commissions and purchases
- **Performance Tracking**: Farming progress, bonus achievements
- **Network Visualization**: Interactive binary tree view

### 🎯 **User Goals & Benefits**
- **Financial Growth**: Multiple income streams (commissions + farming)
- **Network Building**: Recruit and sponsor new members
- **Asset Ownership**: Digital tokens and physical products
- **Community Participation**: DAO governance (future feature)

---

## Key User Journey Milestones

```mermaid
journey
    title LeafChain User Journey
    section Registration
      Create Account: 5: User
      Verify Email: 5: System
      Login Success: 5: User
    section Investment
      Choose Package: 5: User
      Connect Wallet: 3: User, System
      Complete Payment: 5: User, Blockchain
    section Network Building
      Get Placed in Tree: 5: System
      Start Farming: 5: System
      Recruit First Member: 4: User
    section Earnings
      First Referral Bonus: 5: System
      Pairing Commissions: 4: System
      Farming Rewards: 5: System
    section Growth
      Expand Network: 5: User
      Upgrade Package: 3: User
      Reach Leadership: 4: User, System
```

This diagram provides a comprehensive overview of the LeafChain user experience, from initial registration through network building and ongoing earnings generation.