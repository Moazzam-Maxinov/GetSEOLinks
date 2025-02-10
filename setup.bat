@REM Run it from the terminal: setup.bat

@echo off
echo Setting up Laravel project...

REM Create necessary Laravel directories
mkdir storage\framework\sessions
mkdir storage\framework\views
mkdir storage\framework\cache

echo Directories created.

REM Install Composer dependencies
composer install

REM Install npm dependencies
npm install

REM Clear and cache configurations
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

REM Generate application key
@REM php artisan key:generate

echo Laravel setup completed successfully!
pause
