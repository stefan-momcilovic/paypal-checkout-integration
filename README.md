1. Run 

        composer install
        
2.  In console paste

        php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider" 
        
3. Copy everything from .env.example to .env and check config/paypal.php folder and change everything what is need for paypal in .env

4. Start the server and test it
