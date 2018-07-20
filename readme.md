## It's a fork from : Automatic Theme & Plugin Updater for Self-Hosted Themes/Plugins

Why fork it ? Too many years without update and need to change lot of file implementation for security reason (move the update folder out of web scope)

Only used for plugin update because no need for me too have theme update


**Support This Developer: https://www.paypal.com/donate/?token=gNsLOeiju9RlIZaJQXiPpwuRtSBSkk7h-A7U2o85TCVDAMMp8ybrs7or9Ncpmxm1Y1T7l0&country.x=FR&locale.x=FR**

*Any amount is always appreciated*
 

## General Info

For themes and plugins that can't be submitted to official WordPress repository, ie ... commercial themes/plugins/, non-gpl licensed, written for one client.

### Folder structure
* api (Folder to upload to server where updates will be housed)
    * index.php (holds code used to check request for new versions)
    * packages.php (file containing all info about plugins)
    * download.php (send the zip file to website, with key control)

* update (default folder for holding theme and plugin zip files)

* plugin (folder contain the example test plugin file only)
	
---------------	
	
**Important:**

*Change $api_url to your api server url in:*

    /plugin/test-plugin-update/test-plugin-update.php
    
You need to rename the file 
    licence-example.php to licence.php
    packages_example.php to packages.php
    
You have to add your zip file to the update folder according with the speciefied name into the packages.php file

## Changelog

1.0 : 
    - Adding licence gestion
    - Move update's directory upstair
     