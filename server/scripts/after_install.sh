#!/bin/bash

set -eux

cd ~/tp-ci/sever
php artisan migrate --force
php artisan config:cache
