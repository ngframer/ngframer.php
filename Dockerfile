# TODO: The code files are not being copied into the container.

# Use the official PHP image as a base image.
FROM php:8.1-apache

# Copy virtual host configuration into the container.
# 000-default.conf contains instructions for the server on how to handle requests for the web application.
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

# Now, enable (not modify/change/edit) the rewrite of configruation on the apache server.
RUN a2enmod rewrite

# Changes the apache configuration to allow the use of the .htaccess file.
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Update the package list and install the required packages and dependencies.
RUN apt-get update && \
	# Run the apt-get install only if the above block is executed successfully.
	apt-get install \
	# For the creation, handling, modification, or extraction of zip files.
	libzip-dev \
	# For downloading the files from the web via the command line.
	wget \
	# For the interaction with the version control system.
	git \
	# For the creation, handling, modification, or extraction of zip files.
	unzip \
	# Automatically answers yes to installation prompts.
	-y \
	# Avoids installing the suggested packages.
	--no-install-recommends

# Run the required PHP extensions.
RUN \
	#
	docker-php-ext-install \
	#
	zip \
	#
	pdo_mysql

# Copy composer installable file (composer.sh) into the container.
COPY docker/install-composer.sh ./

# Copy the php.ini file into the container.
COPY docker/php.ini /usr/local/etc/php/

# Cleanup packages and install composer.
RUN apt-get purge -y g++ \
	&& apt-get autoremove -y \
	&& rm -r /var/lib/apt/lists/* \
	&& rm -rf /tmp/* \
	# Install the composer installer.
	&& sh ./install-composer.sh \
	# Remove the composer installer.
	&& rm ./install-composer.sh

# Change the owner of the container document root.
# www-data:www-data is the new owner and group for the files and directories in web servers.
# Web server (example, Apache, Ngnix)
RUN chown -R www-data:www-data /var/www

# Start apache in foreground.
CMD ["apache2-foreground"]