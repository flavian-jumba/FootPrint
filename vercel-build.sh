#!/bin/bash

# Create necessary directories
mkdir -p .vercel/output/static
mkdir -p .vercel/output/functions/api

# Copy static assets
cp -R public/* .vercel/output/static/

# Copy API function
cp -R api/* .vercel/output/functions/api/

# Ensure PHP files are executable
chmod +x .vercel/output/functions/api/*.php

echo "Deployment preparation complete!"