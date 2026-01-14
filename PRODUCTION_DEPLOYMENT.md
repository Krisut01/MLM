# 🚀 LeafChain Production Deployment Guide

## 📋 Pre-Deployment Checklist

### ✅ Environment Setup
- [ ] Create production `.env` file from `.env.example`
- [ ] Set `APP_ENV=production` and `APP_DEBUG=false`
- [ ] Configure production database credentials
- [ ] Set up SSL certificate (HTTPS required for Web3)

### ✅ Blockchain Configuration
- [ ] Choose production network (Polygon Mainnet recommended)
- [ ] Deploy smart contracts to chosen network
- [ ] Update contract addresses in configuration
- [ ] Set company wallet address for payments
- [ ] Configure Infura/Alchemy API keys

---

## 🌐 Network Selection & Configuration

### Supported Networks

| Network | Chain ID | Status | Gas Cost | Recommendation |
|---------|----------|--------|----------|----------------|
| **Polygon Mainnet** | 137 | 🟢 Production | Low | ⭐ **Recommended** |
| **Ethereum Mainnet** | 1 | 🟢 Production | High | Alternative |
| **Polygon Mumbai** | 80001 | 🧪 Testnet | Free | Development only |
| **Ethereum Sepolia** | 11155111 | 🧪 Testnet | Free | Development only |
| **Localhost** | 31337 | 🧪 Local | Free | Development only |

### Configuration Steps

#### 1. Update `.env` File
```env
# Choose your network
BLOCKCHAIN_NETWORK=polygon  # Options: polygon, ethereum

# Company wallet (where payments go)
COMPANY_WALLET=0xYOUR_COMPANY_WALLET_ADDRESS

# Contract addresses (after deployment)
LEAFX_TOKEN_CONTRACT_POLYGON=0xDEPLOYED_CONTRACT_ADDRESS
FARMING_CONTRACT_POLYGON=0xDEPLOYED_CONTRACT_ADDRESS
```

#### 2. Deploy Smart Contracts
```bash
# Switch to production network in hardhat.config.js
# Deploy contracts
npm run deploy:polygon  # or deploy:ethereum

# Update .env with deployed addresses
```

#### 3. Update Frontend Configuration
The network configurations in `packages/show.blade.php` will automatically use the correct settings based on your `.env` file.

---

## 🔐 Security Considerations

### Before Going Live

#### ✅ Smart Contract Security
- [ ] Professional security audit ($500-2000)
- [ ] Bug bounty program setup
- [ ] Contract verification on blockchain explorer
- [ ] Multi-signature wallet for contract ownership

#### ✅ Application Security
- [ ] HTTPS enabled (required for MetaMask)
- [ ] Environment variables properly set
- [ ] Database backups configured
- [ ] API rate limiting implemented

#### ✅ Web3 Security
- [ ] Input validation for all blockchain interactions
- [ ] Gas limit protections
- [ ] Reentrancy guard implementations
- [ ] Emergency pause functions

---

## 🚀 Deployment Steps

### Phase 1: Testnet Deployment
```bash
# 1. Deploy to Mumbai testnet
npm run deploy:mumbai

# 2. Update .env to use mumbai network
BLOCKCHAIN_NETWORK=mumbai

# 3. Test all functionality
# - User registration
# - Package purchases
# - Farming rewards
# - Referral system
```

### Phase 2: Mainnet Deployment
```bash
# 1. Final security audit
# 2. Deploy to Polygon mainnet
npm run deploy:polygon

# 3. Update .env for production
BLOCKCHAIN_NETWORK=polygon
APP_ENV=production
APP_DEBUG=false

# 4. Final testing with small amounts
# 5. Go live!
```

---

## 📊 Cost Analysis

### Development Costs (One-time)
- Smart contract development: ₱50,000-100,000
- Security audit: ₱50,000-100,000
- Contract deployment: ₱5,000-10,000
- **Total setup: ₱105,000-210,000**

### Monthly Operational Costs
- Polygon RPC/API: ₱2,000-5,000/month
- Database hosting: ₱1,000-3,000/month
- Server hosting: ₱2,000-5,000/month
- **Total monthly: ₱5,000-13,000**

### Transaction Costs (Per User)
- Package purchase: ₱50-200 (gas fees)
- Daily farming claim: ₱10-50
- Referral bonus: ₱20-100

---

## 🔧 Configuration Files to Update

### 1. `.env` (Production)
```env
# Application
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Database
DB_CONNECTION=mysql
DB_HOST=your_production_db_host
DB_DATABASE=your_production_db
DB_USERNAME=your_db_user
DB_PASSWORD=your_secure_password

# Blockchain
BLOCKCHAIN_NETWORK=polygon
COMPANY_WALLET=0xYOUR_PRODUCTION_WALLET
LEAFX_TOKEN_CONTRACT_POLYGON=0xDEPLOYED_TOKEN_ADDRESS
FARMING_CONTRACT_POLYGON=0xDEPLOYED_FARMING_ADDRESS

# API Keys
INFURA_PROJECT_ID=your_infura_key
ALCHEMY_API_KEY=your_alchemy_key
```

### 2. `config/app.php` (Add blockchain config)
```php
'blockchain_network' => env('BLOCKCHAIN_NETWORK', 'mumbai'),
'company_wallet' => env('COMPANY_WALLET', '0x1E634ce86b9dC049C022E26441eF21026061e3A3'),
'local_usdt_contract' => env('LOCAL_USDT_CONTRACT', 'DEPLOY_YOUR_CONTRACT'),
```

### 3. MetaMask Network Setup (For Users)
**Polygon Mainnet:**
```
Network Name: Polygon Mainnet
RPC URL: https://polygon-rpc.com/
Chain ID: 137
Currency: MATIC
Block Explorer: https://polygonscan.com/
```

---

## 🧪 Testing Checklist (Pre-Launch)

### Functional Testing
- [ ] User registration works
- [ ] MetaMask connection succeeds
- [ ] Package purchases complete
- [ ] Farming rewards calculate correctly
- [ ] Referral bonuses trigger
- [ ] Binary tree displays properly
- [ ] Dashboard updates in real-time

### Security Testing
- [ ] Input validation works
- [ ] SQL injection prevented
- [ ] XSS attacks blocked
- [ ] Rate limiting active
- [ ] HTTPS enforced

### Performance Testing
- [ ] Page load times < 3 seconds
- [ ] MetaMask popup loads quickly
- [ ] Database queries optimized
- [ ] API responses fast

---

## 🚨 Emergency Procedures

### If Smart Contract Issues
1. **Pause contract functions** (if pause function exists)
2. **Notify users** of temporary issues
3. **Deploy fix** to new contract address
4. **Migrate users** to new contracts
5. **Resume operations**

### If Application Issues
1. **Rollback** to previous deployment
2. **Check logs** for error details
3. **Fix issues** in staging environment
4. **Redeploy** after testing

---

## 📞 Support & Monitoring

### Post-Launch Monitoring
- **Blockchain transactions** via PolygonScan
- **Application performance** via monitoring tools
- **User feedback** collection
- **Error logging** and alerting

### User Support
- **MetaMask connection issues** - network configuration
- **Transaction failures** - gas fees, network congestion
- **Reward calculation** - farming logic explanation
- **Referral system** - binary tree navigation

---

## 🎯 Success Metrics

### User Metrics
- Daily active users
- Transaction volume
- User retention rate
- Referral participation

### Technical Metrics
- Transaction success rate (>99%)
- Average response time (<2 seconds)
- Uptime (>99.9%)
- Gas fee efficiency

---

## 📚 Resources

### Documentation
- [Polygon Developer Docs](https://docs.polygon.technology/)
- [MetaMask Developer Docs](https://docs.metamask.io/)
- [Hardhat Documentation](https://hardhat.org/docs)

### Tools
- [PolygonScan](https://polygonscan.com/) - Transaction monitoring
- [Infura](https://infura.io/) - RPC provider
- [Alchemy](https://alchemy.com/) - Enhanced API

### Security
- [OpenZeppelin](https://openzeppelin.com/) - Contract templates
- [Certik](https://certik.com/) - Security audit
- [Immunefi](https://immunefi.com/) - Bug bounty

---

## 🎉 Launch Checklist

**2 Weeks Before Launch:**
- [ ] Contracts deployed to mainnet
- [ ] Security audit completed
- [ ] Full testing completed
- [ ] User documentation ready

**1 Week Before Launch:**
- [ ] Production server configured
- [ ] SSL certificates installed
- [ ] Database backups scheduled
- [ ] Monitoring tools set up

**Launch Day:**
- [ ] Final deployment completed
- [ ] DNS updated to production
- [ ] First transactions monitored
- [ ] User support ready

**Post-Launch:**
- [ ] Monitor for 48 hours
- [ ] Address any issues immediately
- [ ] Collect user feedback
- [ ] Plan for scaling

---

**🚀 Your LeafChain application is ready for production!**

**Remember: Start with Polygon Mainnet for lower gas costs and better user experience.**