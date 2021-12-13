# Developers Rough Code Layout Guide

This will help any software developers find where things are kept to make future LabFinder customisation easier.

This is intended to supplement the official [Code Igniter User Guide](https://codeigniter.com/user_guide/index.html) and local [user guide](user_guide).
It mostly describes the files modified to adapt Microscopy Australia's TechniqueFinder.

## "application" directory

In the "application" directory there is the usual Model-View-Controller layout, with files in "controllers", "models" and "views" directories.
The table below maps out which web pages are associated with which files.

| Web Page                                | View Files ("views" directory)       |  Controller Files ("controllers" directory)  | Model File ("models" directory) |
|-----------------------------------------|--------------------------------------|----------------------------------------------|---------------------------------|
| Home                                    | Portal/index.php                     | Portal.php                                   |                                 |
| Option 1: Experimental Procedure        | Portal/experimental_proc.php         | Portal.php                                   | ExperimentalProc_model.php      |
| Option 1: Experimental Procedure Details | Portal/technique_view.php           | Portal.php                                   | Techniques_model.php            |
| Option 1: Sample Preparation            | Portal/sample_preparation.php        | Portal.php                                   | SamplePrep_model.php,  Media_model.php |
| Option 1: Geochemical Analysis          | Portal/geochem_options_selection.php | Portal.php                                   | OptionChoice_model.php, OptionCombination.php, Elements_model.php   |
| Option 1: Geochemical Analysis Details  | Portal/geochem_analysis_view.php     | Portal.php                                   | Techniques_model.php, Elements_model.php |
| Option 2: Search                        | Portal/technique_search.php          | Portal.php                                   | Techniques_model.php, Media_model.php |
| Option 3: List of techniques page       | Portal/technique_list.php            | Portal.php                                   | Techniques_model.php            |
| Admin - Techniques                      | Techniques/*                         | Techniques.php                               | Techniques_model.php            |     
| Admin - Images and Movies               | Media/*                              | Media.php                                    | Media_model.php                 |     
| Admin - Elements                        | Elements/*                           | Elements.php                                 | Elements_model.php              | 
| Admin - Contacts                        | Contact/*                            | Contact.php                                  | Contact_model.php               | 
| Admin - Locations                       | Location/*                           | Location.php                                 | Location_model.php              | 
| Admin - Localisation                    | Localisation/*                       | Localisation.php                             | Localisation_model.php          | 
| Admin - Static content                  | static/*                             | StaticContent.php                            | Static_model.php                | 
| Admin - Metadata                        | Metadata/*                           | Metadata.php                                 | Metadata_model.php              | 

## "assets" directory ##

1) Website specific CSS rules are kept in "assets/css/technique-finder.css"
2) Website icons and images are kept in "assets/css/images"

## Other NOTES ##

1) Case Studies are not used
2) Only media type of "LIST" is used
3) LabFinder does not store usernames and passwords, so all the user management functions are not used. Instead "Auth0" is used to manage logins. 
4) Docker images are not used
