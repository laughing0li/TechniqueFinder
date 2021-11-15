# AuScope Geochmistry LabFinder

AGN Laborarory Finder is used to identify and understand the analysis techniques available to researchers through Australian Geochemistry Network.

It is a based on Microscopy Australia's "Technique Finder" web application. 

Technique Finder(TF) application aids researchers to find the techniques and facilities to fit their research project.

Use TF to identify and understand the microscopy and microanalyses techniques available to researchers through Microscopy Australia.
You will find the contact details of expert staff for each technique. They can provide you with all the information you need,
and guide you through the planning, training, data collection and interpretation stages of your experiments.

## Licensing
- The Technique Finder application licensed under a [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License.](https://creativecommons.org/licenses/by-nc-sa/4.0/)   ![CC-NC-SA](https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png)
- It is built on top of the [Code Igniter](https://www.codeigniter.com) PHP framework which is licensed using the [MIT](https://github.com/bcit-ci/CodeIgniter/blob/develop/license.txt) license.


## System requirements

| Requirement | Version|
|-----|-----|
| PHP | 5.6+|
| MySQL| 5.7+|

 
## Developer Instructions
TF application was developed on a Mac OSX using PHP storm and Docker applications.

#### Development environment software requirements

| PHP Storm | 2019.1.3+ |
|---------- |---------- |
| Docker    | 2.0.0.3 + |

### Steps to setup a developement environment for TF
1. Clone TF repository from Github
2. Set up a CLI interpreter using DockerFiles/docker-compose.yml and set Service to `php`
3. Add a new project configuration
    - Docker -> Docker-compose
    - Set appropriate Docker server
    - Set docker-compose file as DockerFiles/docker-compose.yml
    - Set services as `php, web, db,`
    - Tick `—build, force build images` (preferred)
4. On the OSX update `/etc/hosts` with ```127.0.0.1       localhost web.local```
5. Access the TF application on the web using the URL `http://web.local:8080`


## Notes:
- Sample data will be loaded to the dev environment by a database dump
- DDL commands for the database can be found here: TechniqueFinder/db/ddl.sql
- Dev environment use TechniqueFinder/DockerFiles/dev-config.php, use TechniqueFinder/application/config/config.php for other environments.
 





 
