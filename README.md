# Hi, Welcome to Electrogati, Please visit the hosted website on **[Electrogati](https://www.electrogati.com/)**
## Server Requirements for running

PHP version 7.4 or higher is required, with the following extensions installed:


- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- xml (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)

## Steps to Follow for running on local computer

- Git clone the repository on your local desktop
- Download & Install [Xammp Control Panel](https://downloadsapachefriends.global.ssl.fastly.net/8.0.19/xampp-windows-x64-8.0.19-0-VS16-installer.exe?from_af=true)
- Download & Install [Composer Package Manager](https://getcomposer.org/Composer-Setup.exe)
- Download [Codeigniter zip file](https://api.github.com/repos/codeigniter4/CodeIgniter4/zipball/v4.2.4)
- Click on admin option in mysql in Xammp control panel
- Then make a new database named mobility and then import **mobility.sql** from the cloned repo
- Open the code in VS-code or any other code editor
- Open terminal and go to the cloned folder and write "Composer Update"
- Open the web browser and write "localhost/Electrogati" to view the project
- Thank you
## Running CodeIgniter Tests

Information on running the CodeIgniter test suite can be found in the [README.md](tests/README.md) file in the tests directory.
