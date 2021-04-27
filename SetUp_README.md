# Getting Started

This project is based on BLT, an open-source project template and tool that enables building, testing, and deploying Drupal installations following Acquia Professional Services best practices. While this is one of many methodologies, it is our recommended methodology. 

1. Review the [Required / Recommended Skills](https://docs.acquia.com/blt/developer/skills/) for working with a BLT project.
2. Ensure that your computer meets the minimum installation requirements (and then install the required applications). See the [System Requirements](https://docs.acquia.com/blt/install/).
3. Request access to organization that owns the project repo in GitHub (if needed).
4. Fork the project repository in GitHub.
5. Request access to the Acquia Cloud Environment for your project (if needed).
6. Setup a SSH key that can be used for GitHub and the Acquia Cloud (you CAN use the same key).
    1. [Setup GitHub SSH Keys](https://help.github.com/articles/adding-a-new-ssh-key-to-your-github-account/)
    2. [Setup Acquia Cloud SSH Keys](https://docs.acquia.com/acquia-cloud/ssh/generate)
7. Clone your forked repository. By default, Git names this "origin" on your local.
    ```
    $ git clone git@github.com:<account>/#GITHUB_PROJECT.git
    ```
8. To ensure that upstream changes to the parent repository may be tracked, add the upstream locally as well.
    ```
    $ git remote add upstream git@github.com:#GITHUB_ORG/#GITHUB_PROJECT.git
    ```

9. Update your the configuration located in the `/blt/blt.yml` file to match your site's needs. See [configuration files](#important-configuration-files) for other important configuration files.


----
# Setup Local Environment.

BLT provides an automation layer for testing, building, and launching Drupal 8 applications. For ease when updating codebase it is recommended to use  Drupal VM. If you prefer, you can use another tool such as Docker, [DDEV](https://docs.acquia.com/blt/install/alt-env/ddev/), [Docksal](https://docs.acquia.com/blt/install/alt-env/docksal/), [Lando](https://docs.acquia.com/blt/install/alt-env/lando/), (other) Vagrant, or your own custom LAMP stack, however support is very limited for these solutions.
1. Install Composer dependencies.
After you have forked, cloned the project and setup your blt.yml file install Composer Dependencies. (Warning: this can take some time based on internet speeds.)
    ```
    $ composer install
    ```
2. Setup VM.
Setup the VM with the configuration from this repositories [configuration files](#important-configuration-files).

    ```
    $ vagrant up
    ```

3. Setup a local blt alias.
If the blt alias is not available use this command outside and inside vagrant (one time only).
    ```
    $ composer run-script blt-alias
    ```

4. SSH into your VM.
SSH into your localized Drupal VM environment automated with the BLT launch and automation tools.
    ```
    $ vagrant ssh
    ```

5. Setup a local Drupal site with an empty database.
Use BLT to setup the site with configuration.  If it is a multisite you can identify a specific site.
   ```
     $ blt setup
    ```
   or
   ```
   $ blt setup --site=[sitename]
   ```

6. Log into your site with drush.
Access the site and do necessary work at #LOCAL_DEV_URL by running the following commands.
    ```
    $ cd docroot
    $ drush uli
    ```

---
## Other Local Setup Steps

1. Set up frontend build and theme.
By default BLT sets up a site with the lightning profile and a cog base theme. You can choose your own profile before setup in the blt.yml file. If you do choose to use cog, see [Cog's documentation](https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/README.md#create-cog-sub-theme) for installation.
See [BLT's Frontend docs](https://docs.acquia.com/blt/developer/frontend/) to see how to automate the theme requirements and frontend tests.
After the initial theme setup you can configure `blt/blt.yml` to install and configure your frontend dependencies with `blt setup`.

2. Pull Files locally.
Use BLT to pull all files down from your Cloud environment.

   ```
   $ blt drupal:sync:files
   ```

3. Sync the Cloud Database.
If you have an existing database you can use BLT to pull down the database from your Cloud environment.
   ```
   $ blt sync
   ```


---

# Resources 

Additional [BLT documentation](https://docs.acquia.com/blt/) may be useful. You may also access a list of BLT commands by running this:
```
$ blt
``` 

Note the following properties of this project:
* Primary development branch: #GIT_PRIMARY_DEV_BRANCH
* Local environment: #LOCAL_DEV_SITE_ALIAS
* Local site URL: #LOCAL_DEV_URL

## Working With a BLT Project

BLT projects are designed to instill software development best practices (including git workflows). 

Our BLT Developer documentation includes an [example workflow](https://docs.acquia.com/blt/developer/dev-workflow/).

### Important Configuration Files

BLT uses a number of configuration (`.yml` or `.json`) files to define and customize behaviors. Some examples of these are:

* `blt/blt.yml` (formerly blt/project.yml prior to BLT 9.x)
* `blt/local.blt.yml` (local only specific blt configuration)
* `box/config.yml` (if using Drupal VM)
* `drush/sites` (contains Drush aliases for this project)
* `composer.json` (includes required components, including Drupal Modules, for this project)

## Resources

* JIRA - #JIRA_URL
* GitHub - https://github.com/#GITHUB_ORG/#GITHUB_PROJECT
* Acquia Cloud subscription - #ACQUIA_CLOUD_URL
* TravisCI - #TRAVIS_URL

---

# BLT Tests Commands

The following BLT Tests commands are available for use:

* tests:acsf:validate              -  Executes the acsf-init-validate command.
* tests:behat:init:config          -  [tbic|setup:behat] Generates tests/behat/local.yml file for executing Behat tests locally.   
* tests:behat:list:definitions     -  [tbd|tests:behat:definitions] Lists available Behat step definitions.                      
* tests:behat:run                  -  [tbr|behat|tests:behat] Executes al behat tests. This optionally launch Selenium execution.
* tests:composer:validate          -  [tcv|validate:composer] Validates root composer.json and composer.lock files.      
* tests:drupal:run                 -  [tdr] Executes tests with Drupal core's testing framework. Launches chromedriver prior to  execution.
* tests:frontend:run               -  [tfr|tests:frontend|frontend:test] Executes frontend-test target hook.                         
* tests:php:lint                   -  [tpl|lint|validate:lint] Runs a PHP Lint against all validate.lint.filesets files.
* tests:phpcs:sniff:all            -  [tpsa|phpcs|tests:phpcs:sniff|validate:phpcs] Executes PHP Code Sniffer against configured files      
* tests:phpcs:sniff:files          -  [tpsf] Executes PHP Code Sniffer against a list of files.
* tests:phpcs:sniff:modified       -  [tpsm] Executes PHPCS against (unstaged) modified or untracked files in repo.                           
* tests:phpcs:sniff:staged         -  [tpss] Executes PHPCS against staged files in repo.
* tests:phpunit:run                -  [tpr|phpunit|tests:phpunit] Executes all PHPUnit tests.
* tests:security:check:compose     -  [tscom|security|tests:composer] Check composer.lock for security updates.                             
* tests:security:check:updates     -  [tscu|security|tests:security-updates] Check local Drupal installation for security updates.                             
* tests:server:kill                -  [tsk] Kills running PHP web server.
* tests:server:start               -  [tss] Starts a temporary PHP web server.
* tests:twig:lint:all              -  [ttla|twig|tests:twig:lint|validate:twig] Executes Twig validator against all validate.twig.filesets files.
* tests:twig:lint:files            -  [ttlf] Executes Twig validator against a list of files, if in twig.filesets.       
*  tests:yaml:lint:all             -  [tyla|yaml|tests:yaml:lint|validate:yaml] Executes YAML validator against all validate.yaml.filesets files.
*  tests:yaml:lint:files           -  [tylf] Executes YAML validator against files, if in validate.yaml.filesets.     

# Testing Documentation

* Reference - https://docs.acquia.com/blt/developer/testing/