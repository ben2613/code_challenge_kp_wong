# About Xdebug

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
