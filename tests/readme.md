.htaccess subdomain tests
=========================

Initial setup
-------------
1. Add content of file ```setup/hosts``` into ```/etc/hosts```
2. Add content of file ```setup/apache.conf``` into config file in Apache directory (on Ubuntu ```/etc/apache2/sites-available/default```)
3. Install dependencies by [Composer](http://getcomposer.org/)

```
cd ..
composer install --dev
```

Tests for HTTPS
---------------
Configure Apache for HTTPS and change value of constant TEST_HTTPS from FALSE to TRUE in Tests/bootstrap.php file.

Run tests
---------
Run ```./run-tests.sh```.

