# DPUK Project Template - WP

## Installation

Copy the template folder to your project root.
Bring in WordPress and starter themes/plugins by running:
`Composer install` 

Re-name the .env.example to .env
Update: 
\* config for database
\* WP_HOME
\* WP_SITEURL
\* salts

## Xampp

In the .env file set the environment to: WP_ENV='development'

## Docksal

In the .env file set the environment to: WP_ENV='docksal'

Add seetings to .docksal\docksal.env. Ensure databse settings are correct.

open docksal
open ubuntu
cd /mnt
navigate to the project root
`fin init`

### database

### phpMyAdmin

https://pma.<VIRTUAL_HOST>

### ssl

Check if the mkcert addon is installed globally:

`fin addon install --global mkcert`

In the project directory, run:

`fin mkcert create`
`fin project restart`

