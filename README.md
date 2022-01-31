# Requirement

Docker and Docker-compose
For Windows, you need to have WSL and Ubuntu installed and use the Ubuntu terminal, clone this repo in Ubuntu system.

# How to start this project

Refer to https://laravel.com/docs/master/sail

## Run Composer

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

## There is quite much to do to use Laravel Sail in Windows

```
1. Docker Desktop
2. go Windows Store and install Ubuntu
3. Enable Docker Desktop WSL Integration, check the Ubuntu distro
4. open a Ubuntu Terminal
```

## You will find alias sail here useful
`alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`

## Configure .env file from .env.example

## First Sail Up!
`sail up -d`

## Generate key

`sail artisan key:generate`

## Migrate Database

`sail artisan migrate`

## Seed User Table

`sail artisan db:seed`


## install NPM package (sail npm run dev needed to be run 1 more time)

`sail npm i && sail npm run dev && sail npm run dev`

## Now you should be able to go `http://localhost/` to see the page

# Additional: About Xdebug in Windows WSL

Use sail built-in config, add `SAIL_XDEBUG_MODE=develop,debug` in `.env` file

then run `sail build --no-cache` to rebuild the image it use

In order to run Xdebug in Windows WSL2 with docker setup, you need to set firewall rule for WSL network as by default Windows see it as public network.

To do this, run following line in PowerShell

`New-NetFirewallRule -DisplayName "WSL" -Direction Inbound  -InterfaceAlias "vEthernet (WSL)"  -Action Allow`

And for example, in VSCode add this launch profile in your .vscode/launch.json with a PHP Debug extension
```
{
  "hostname": "0.0.0.0",
  "name": "Listen for Xdebug",
  "type": "php",
  "request": "launch",
  "port": 9003,
  "pathMappings": {
    "/var/www/html": "${workspaceFolder}",
  },
},
```
