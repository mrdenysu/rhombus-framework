# Rhombus-Framework
"rhombus-framework" it's PHP framework built on the basis of the pattern 'MVC'

[![GitHub license](https://img.shields.io/github/license/mrdenysu/rhombus-framework.svg)](https://github.com/mrdenysu/rhombus-framework/blob/master/LICENSE)

Rhombus-Framework - implementation of the MVC pattern in PHP using OOP.

### Libraries

All libraries, plugins and modules are connected to the abstract, parent Model class 'Model' by the path 'private/core/Model.php'. The following is a list of preinstalled components.

| Name | Status | README |
| ------ | ------ | ------ |
| DataBase | Integrated | Not created |

#### Installation
Download the latest build or copy the repository:
```sh
$ git@github.com:mrdenysu/rhombus-framework.git
```
Replace the routes and the data from the database in the folder 'private/settings':
Access levels: 0-all; 1-guest; 2-authorized; 3 - administrator

For convenience in the project as an example the group of the controller 'Demo' is given, be guided by it at creation of the site!

### Todos

 - Write MORE Tests
 - Write instructions for manual, automatic and semi-automatic installation of framework
 - Develop an automated installation on the server with database and system files configuration

### News

 - Fixed a bug with linux-like systems
 - It is recommended to check apache2 settings before installing on VDS/VPS. Support must work for the system to work .htaccess

License
----

MIT
**Free Software**
