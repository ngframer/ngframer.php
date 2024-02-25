#!/bin/sh

# Download the composer at the beginning.
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

# Get the signature
SIGNATURE=$(php -r "echo hash_file('sha384', 'composer-setup.php');")

# Grab the expected signature from Composer Github.
EXPECTED_SIGNATURE=$(wget -q -O - https://composer.github.io/installer.sig)

# Compare the signature
if [ "$SIGNATURE" != "$EXPECTED_SIGNATURE" ]; then
    # Echo an error.
    echo 'ERROR: Invalid installer signature'
    # Remove the installer file.
    rm composer-setup.php
    # Exit with an error code 1 (for error).
    exit 1
fi

# If everything is okay, Run the installer.
php composer-setup.php --quiet --install-dir=/usr/local/bin --filename=composer

# Save the result status code in a variable called as Result.
RESULT=$?

# Remove the installer file.
rm composer-setup.php

# Exit with the result status code.
exit $RESULT

# Status: Complete