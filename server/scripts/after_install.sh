#!/bin/bash

set -eux

cd ~/tp-ci/server
php artisan migrate --force
php artisan config:cache
