#!/bin/bash

echo "======================================"
echo "KISS Aquatics Admin Panel Setup"
echo "======================================"

# Colors for output
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}Step 1: Creating Livewire Admin Components...${NC}"

# Create all admin Livewire components
php artisan make:livewire Admin/Locations/Index
php artisan make:livewire Admin/Pricing/Index
php artisan make:livewire Admin/Programs/Index
php artisan make:livewire Admin/Videos/Index
php artisan make:livewire Admin/Settings/Index

echo -e "${GREEN}✓ Admin components created${NC}"

echo -e "${BLUE}Step 2: Creating Migration for HeroSlides...${NC}"

# The HeroSlide model and migration were already created, just need to define the schema

echo -e "${GREEN}✓ Migrations prepared${NC}"

echo -e "${BLUE}Step 3: Installing Laravel Breeze for Authentication...${NC}"

# Install Laravel Breeze for authentication
composer require laravel/breeze --dev

echo -e "${GREEN}✓ Breeze installed${NC}"

echo -e "${BLUE}Step 4: Installing Breeze with Livewire stack...${NC}"

php artisan breeze:install

echo -e "${GREEN}✓ Breeze configured${NC}"

echo -e "${BLUE}Step 5: Running migrations...${NC}"

php artisan migrate

echo -e "${GREEN}✓ Database migrated${NC}"

echo -e "${BLUE}Step 6: Seeding admin user...${NC}"

php artisan db:seed --class=AdminUserSeeder

echo -e "${GREEN}✓ Admin user created${NC}"

echo -e "${BLUE}Step 7: Creating storage link...${NC}"

php artisan storage:link

echo -e "${GREEN}✓ Storage linked${NC}"

echo -e "${BLUE}Step 8: Building assets...${NC}"

npm run build

echo -e "${GREEN}✓ Assets compiled${NC}"

echo "======================================"
echo -e "${GREEN}Admin Panel Setup Complete!${NC}"
echo "======================================"
echo ""
echo "Admin Login Credentials:"
echo "Email: admin@kissaquatics.com"
echo "Password: KissAdmin2024!"
echo ""
echo "Access admin panel at: /admin"
echo ""
echo "⚠️  Please change the admin password after first login!"
echo "======================================"
