#!/bin/sh

# copy .htaccess
cp -f ../src/.htaccess ./DocumentRoot/.htaccess

# run scripts
../vendor/bin/tester -p php -j 50 -c setup/curl.ini Tests

