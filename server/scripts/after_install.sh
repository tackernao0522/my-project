#!/bin/bash

set -eux

cd ~/tp-ci
php artisan migrate --force
php artisan config:cache
