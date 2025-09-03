## Laravel PEST
<p>Installation</p>
<pre>
composer require pestphp/pest --dev --with-all-dependencies<br>
composer require pestphp/pest-plugin-laravel --dev<br>
./vendor/bin/pest --init
</pre>


## Test Logic
<pre>
php artisan test --testsuite=Unit<br>
./vendor/bin/pest tests/Unit/SlugServiceTest.php
</pre>
