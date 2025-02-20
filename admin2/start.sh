#!/bin/bash

# Enable error reporting
set -e
set -x

echo "Starting services..."

# Start MariaDB
echo "Starting MariaDB..."
mysqld_safe --user=mysql &

# Wait for MariaDB to be ready
echo "Waiting for MariaDB to be ready..."
max_tries=30
count=0
while ! mysqladmin ping -h localhost --silent; do
    sleep 1
    count=$((count + 1))
    if [ $count -gt $max_tries ]; then
        echo "Error: MariaDB failed to start"
        exit 1
    fi
    echo "Waiting for MariaDB... ($count/$max_tries)"
done
echo "MariaDB is ready!"

# Initialize root user without password
mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED BY ''; FLUSH PRIVILEGES;"

# Run SQL scripts
echo "Importing SQL scripts..."
for script in /sql/script*.sql; do
    echo "Importing $script..."
    mysql -u root < "$script"
    if [ $? -eq 0 ]; then
        echo "Successfully imported $script"
    else
        echo "Error importing $script"
        exit 1
    fi
done

# Check Apache configuration
echo "Checking Apache configuration..."
apache2ctl -t

# Check web root contents
echo "Checking web root contents:"
ls -la /var/www/html

# Start Apache in the foreground
echo "Starting Apache..."
exec apache2-foreground