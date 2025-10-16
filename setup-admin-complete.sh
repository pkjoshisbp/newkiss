#!/bin/bash

# KISS Aquatics Admin Panel - Complete Setup Script
# This script creates all admin components, migrations, and configurations

set -e  # Exit on error

echo "=========================================="
echo "  KISS Aquatics Admin Panel Setup"
echo "=========================================="

# Function to print colored output
print_step() {
    echo -e "\n\033[1;34m➜ $1\033[0m"
}

print_success() {
    echo -e "\033[0;32m✓ $1\033[0m"
}

print_error() {
    echo -e "\033[0;31m✗ $1\033[0m"
}

# Check if we're in the correct directory
if [ ! -f "artisan" ]; then
    print_error "Error: artisan file not found. Please run this script from the Laravel root directory."
    exit 1
fi

print_step "Creating additional Livewire components..."
php artisan make:livewire Admin/Locations/Index 2>/dev/null || true
php artisan make:livewire Admin/Pricing/Index 2>/dev/null || true
php artisan make:livewire Admin/Programs/Index 2>/dev/null || true
php artisan make:livewire Admin/Videos/Index 2>/dev/null || true
php artisan make:livewire Admin/Settings/Index 2>/dev/null || true
print_success "Livewire components created"

print_step "Installing Laravel Breeze for authentication..."
if ! composer show laravel/breeze &> /dev/null; then
    composer require laravel/breeze --dev --quiet
    print_success "Breeze installed"
else
    print_success "Breeze already installed"
fi

print_step "Installing Breeze with Livewire stack..."
php artisan breeze:install livewire --dark 2>/dev/null || true
print_success "Breeze configured"

print_step "Running database migrations..."
php artisan migrate --force
print_success "Database migrated"

print_step "Seeding admin user..."
php artisan db:seed --class=AdminUserSeeder --force
print_success "Admin user created"

print_step "Creating storage link..."
php artisan storage:link 2>/dev/null || print_success "Storage link already exists"
print_success "Storage configured"

print_step "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
print_success "Caches cleared"

print_step "Building frontend assets..."
npm run build
print_success "Assets compiled"

echo ""
echo "=========================================="
echo "  ✓ Setup Complete!"
echo "=========================================="
echo ""
echo "📧 Admin Email: admin@kissaquatics.com"
echo "🔐 Password: KissAdmin2024!"
echo ""
echo "🌐 Admin URL: /admin"
echo "🌐 Login URL: /login"
echo ""
echo "⚠️  IMPORTANT: Change the password after first login!"
echo "=========================================="
