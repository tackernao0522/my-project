#!/bin/bash

set -eux

cd ~/server
php artisan migrate --force
php artisan config:cache
