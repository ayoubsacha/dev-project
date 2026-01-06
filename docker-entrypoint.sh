#!/bin/bash
set -e

# 1. Force the PATH to include /usr/local/bin where composer lives
export PATH="/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:$PATH"

# 2. Fix permissions ONLY if necessary (faster startup)
# Check if the owner of the current directory is 'dev' (ID 1000)
if [ "$(stat -c '%u' /var/www/html)" != "1000" ]; then
    echo "Fixing permissions for /var/www/html (this may take a moment)..."
    sudo chown -R dev:dev /var/www/html
fi

if [ "$(stat -c '%u' /home/dev)" != "1000" ]; then
    sudo chown -R dev:dev /home/dev
fi

# 3. Execute the CMD (Apache)
exec "$@"
