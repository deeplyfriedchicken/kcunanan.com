#!/bin/sh
cd $(dirname $0)
mv www/index.php index.php.saved
mv www/.htaccess .htaccess.saved
rm -rf www/*
# update project/ to your directory name
cp -a project/public/* www
cp project/public/.* www
rm -rf www/index.php
mv index.php.saved www/index.php
mv .htaccess.saved www/.htaccess

