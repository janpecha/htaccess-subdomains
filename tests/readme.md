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

Run tests
---------
Run ```./run-tests.sh```.

