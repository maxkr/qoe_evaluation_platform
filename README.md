## Automated Web based Subjective evaluation Platform (WESP+)

This Web-based management framework shall enable easy and simple configuration of SQAs.


## Design and Architecture

- Based on [Symfony PHP framework](http://symfony.com/)
- [Doctrine ORM](https://github.com/doctrine/DoctrineBundle) database bundle
- [FOSUserBundle](https://github.com/FriendsOfSymfony/FOSUserBundle)
- [EasyAdminBundle](https://github.com/javiereguiluz/EasyAdminBundle)


## Installation

Please use composer to install.

- Download the repository from GitHub
- use 'composer -install' in the directory where the composer.json file is located
- add a 'parameters.yml' file for database information. [Check here](http://symfony.com/doc/current/best_practices/configuration.html)
- use 'php app/console doctrine:database:create' to create the database
- use 'php app/console doctrine:fixtures:load --append' to add type and some sample data
- use 'php app/console fos:user:create --super-admin' to add an admin user
- go to /admin and start adding your evaluations! 

## Documentation

Currently we devided the evaluation methods in three different categories.
- ACR, ACR-HR and SS are related to the single-stimulus methodology, as they differentiate only in terms of related content
- DCR, PC and DSIS are all related to double-stimulus methodology, for the same reason. 
- DSCQS is related to continuous evaluation methodology

Double stimulus rating time, min/max values, ratings and collected metrics will always be taken from and stored related to the second content.  
For the moment, double stimulus evaluation which needs to run synchronized, must be prepared in one video stream.

- Slider Questions: if you want to add a slider question, you need to specify answers with the text "sliderMin" and "sliderMax" and relate them to the question.

## License

For licence information please see /docs/LICENSE.txt