#!/bin/bash

echo "Starting Laravel build process for Vercel..."

# Create necessary directories
mkdir -p .vercel/output/static
mkdir -p .vercel/output/functions/api

# Copy entire Laravel application to the functions directory (necessary for framework)
cp -R * .vercel/output/functions/api/ 2>/dev/null || :
cp -R .env* .vercel/output/functions/api/ 2>/dev/null || :
cp -R composer.* .vercel/output/functions/api/ 2>/dev/null || :

# Copy static assets for direct access
cp -R public/* .vercel/output/static/ 2>/dev/null || :

# Ensure the Laravel storage directory exists and has proper permissions
mkdir -p .vercel/output/functions/api/storage/framework/{sessions,views,cache}
mkdir -p .vercel/output/functions/api/storage/logs
touch .vercel/output/functions/api/storage/logs/laravel.log
chmod -R 755 .vercel/output/functions/api/storage

# Create symbolic link from public/storage to storage/app/public if it doesn't exist
if [ ! -d ".vercel/output/static/storage" ]; then
  mkdir -p .vercel/output/functions/api/storage/app/public
  ln -sf ../../storage/app/public .vercel/output/static/storage
fi

# Make sure PHP files are executable
chmod +x .vercel/output/functions/api/*.php

echo "Laravel build process complete!"