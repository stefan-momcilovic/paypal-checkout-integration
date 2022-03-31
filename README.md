<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

1. Run 

        composer install
        
2.  In console paste

        php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider" 
        
3. Copy everything from .env.example to .env and check config/paypal.php folder and change everything what is need for paypal in .env

4. Start the server and test it
