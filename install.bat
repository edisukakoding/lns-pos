@ECHO OFF 
:: This batch file details Windows 10, hardware, and networking configuration.
TITLE LNS POS by Edi Hartono
ECHO Please wait... Checking system information.
:: Section 1: Windows 10 information
ECHO ============================
ECHO WINDOWS INFO
ECHO ============================
systeminfo | findstr /c:"OS Name"
systeminfo | findstr /c:"OS Version"
systeminfo | findstr /c:"System Type"
:: Section 2: Hardware information.
ECHO ============================
ECHO HARDWARE INFO
ECHO ============================
systeminfo | findstr /c:"Total Physical Memory"
wmic cpu get name
wmic diskdrive get name,model,size
wmic path win32_videocontroller get name
wmic path win32_VideoController get CurrentHorizontalResolution,CurrentVerticalResolution
:: Section 3: Networking information.
ECHO ============================
ECHO NETWORK INFO
ECHO ============================
ipconfig | findstr IPv4
ipconfig | findstr IPv6
:: Section 4: PHP Information.
ECHO ============================
ECHO ENVIRONTMENT INFO
ECHO ============================
php -v | findstr /c:"PHP"
php -v | findstr /c:"Zend Engine"
composer -V | findstr /c:"Composer"
ECHO.
ECHO NODE Version: 
node -v
ECHO.
:: Section 4: Create Database
type NUL > database/database.sqlite
ECHO - database has been created...
:: Section 5: Create Env file
ECHO APP_NAME=Laravel > .env
ECHO APP_ENV=local >> .env
ECHO APP_KEY= >> .env
ECHO APP_DEBUG=true >> .env
ECHO APP_URL=http://localhost >> .env
ECHO. >> .env
ECHO LOG_CHANNEL=stack >> .env
ECHO LOG_DEPRECATIONS_CHANNEL=null >> .env
ECHO LOG_LEVEL=debug >> .env
ECHO. >> .env
ECHO DB_CONNECTION=sqlite >> .env
ECHO. >> .env
ECHO BROADCAST_DRIVER=log >> .env
ECHO CACHE_DRIVER=file >> .env
ECHO FILESYSTEM_DISK=local >> .env
ECHO QUEUE_CONNECTION=sync >> .env
ECHO SESSION_DRIVER=file >> .env
ECHO SESSION_LIFETIME=120 >> .env
ECHO. >> .env
ECHO MEMCACHED_HOST=127.0.0.1 >> .env
ECHO. >> .env
ECHO REDIS_HOST=127.0.0.1 >> .env
ECHO REDIS_PASSWORD=null >> .env
ECHO REDIS_PORT=6379 >> .env
ECHO. >> .env
ECHO MAIL_MAILER=smtp >> .env
ECHO MAIL_HOST=mailhog >> .env
ECHO MAIL_PORT=1025 >> .env
ECHO MAIL_USERNAME=null >> .env
ECHO MAIL_PASSWORD=null >> .env
ECHO MAIL_ENCRYPTION=null >> .env
ECHO MAIL_FROM_ADDRESS="hello@example.com" >> .env
ECHO MAIL_FROM_NAME="${APP_NAME}" >> .env
ECHO. >> .env
ECHO AWS_ACCESS_KEY_ID= >> .env
ECHO AWS_SECRET_ACCESS_KEY= >> .env
ECHO AWS_DEFAULT_REGION=us-east-1 >> .env
ECHO AWS_BUCKET= >> .env
ECHO AWS_USE_PATH_STYLE_ENDPOINT=false >> .env
ECHO. >> .env
ECHO PUSHER_APP_ID= >> .env
ECHO PUSHER_APP_KEY= >> .env
ECHO PUSHER_APP_SECRET= >> .env
ECHO PUSHER_APP_CLUSTER=mt1 >> .env
ECHO. >> .env
ECHO MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}" >> .env
ECHO MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}" >> .env
ECHO - .env file has been created...
ECHO.
ECHO ============================
ECHO INSTALL PHP DEPENDENCY
ECHO ============================
composer install
php artisan key:generate
ECHO ============================
ECHO INSTALL NODE DEPENDENCY
ECHO ============================
npm install && npm run dev
npm run watch
ECHO ============================
ECHO RUNNING SERVER
ECHO ============================
php artisan serve
PAUSE