@echo off
echo Cleaning Laravel cache...

php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo Rebuilding Laravel cache...
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo Cache cleared and rebuilt successfully!
pause


@REM Run this file using: ./clear-cache.bat 