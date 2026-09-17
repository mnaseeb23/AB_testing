#!/usr/bin/env bash
set -Eeuo pipefail

# Background setup runner for automatic initialization
(
    echo "==> [Entrypoint] Waiting for web server and MySQL to initialize..."
    sleep 5
    
    # Check if custom setup script exists
    if [ -f "/wp-cli/setup.sh" ]; then
        echo "==> [Entrypoint] Running automated WordPress + WooCommerce setup..."
        bash /wp-cli/setup.sh || echo "==> [Entrypoint] Warning: Setup script finished with status $?"
    fi
) &

# Execute original WordPress docker entrypoint
exec docker-entrypoint.sh "$@"
