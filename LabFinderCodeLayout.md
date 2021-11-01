# Developers Rough Code Layout Guide

This will help any software developers find where things are kept to make future LabFinder customisation easier.

This is intended to supplement the official [Code Igniter User Guide](https://codeigniter.com/user_guide/index.html) and local [user guide](user_guide).
It mostly describes the files modified to adapt TechniqueFinder.

## "application" directory

In the "application" directory there are the usual "controllers", "models" and "views" directories.
The table below maps out which web pages are association with which files.

| Web Page                   | View Files              |  Controller Files                    | Model File                      |
|----------------------------|-------------------------|--------------------------------------|---------------------------------|
| Home                       | views/                  | controllers/                         | models/                         |
| Geochemical Analysis       | views/                  | controllers/                         | models/                         |
| Search                     | views/                  | controllers/                         | models/                         |
| List of techniques page    | views/Portal            | controllers/                         | models/                         |
| Admin - Techniques         | views/Techniques/*      | controllers/Techniques.php           | models/Teechniques_model.php    |     
| Admin - Images and Movies  | views/Media/*           | controllers/Media.php                | models/Media_model.php          |     
| Admin - Elements           | views/Elements/*        | controllers/Elements.php             | models/Elements_model.php       | 
| Admin - Contacts           | views/Contact/*         | controllers/Contact.php              | models/Contact_model.php        | 
| Admin - Locations          | views/Location/*        | controllers/Location.php             | models/Location_model.php       | 
| Admin - Localisation       | views/Localisation/*    | controllers/Localisation.php         | models/Localisation_model.php   | 
| Admin - Static content     | views/static/*          | controllers/StaticContent.php        | models/Static_model.php         | 
| Admin - Metadata           | views/Metadata/*        | controllers/Metadata.php             | models/Metadata_model.php       | 


## Other NOTES ##

1) Case Studies are not used
2) Only media type of "LIST" is used
3) LabFinder does not store usernames and passwords, so all the user management functions are not used. Instead "Auth0" is used to manage logins. 
