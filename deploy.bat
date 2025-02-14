@echo off
setlocal enabledelayedexpansion

echo Cleaning and rebuilding Laravel caches...
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

@REM echo Building React assets...
@REM npm run build || (echo Failed to build React assets. Exiting... & exit /b 0)

:: Get the current user's desktop path
set "DESKTOP=%USERPROFILE%\Desktop"
set "ZIP_NAME=%DESKTOP%\backup-%date:~10,4%%date:~4,2%%date:~7,2%.zip"

:: Define exclude list
set EXCLUDE_LIST=node_modules .git vendor storage/framework storage/logs bootstrap/cache/config.php .env .htaccess

:: Convert list to proper tar format
set "EXCLUDES="
for %%E in (%EXCLUDE_LIST%) do (
    set "EXCLUDES=!EXCLUDES! --exclude=%%E"
)

echo Creating backup ZIP...
tar %EXCLUDES% -a -c -f "%ZIP_NAME%" *

echo Backup created successfully: %ZIP_NAME%
pause
