# Thematic Test Suite #

To be able to run the tests, you will need to have PHPUnit and the WordPress test suite installed. The tests are designed to run in the terminal, not in the browser.

## Installing PHPUnit ##

Installation instructions for PHPUnit can be found at their [website](http://phpunit.de/manual/current/en/installation.html). In many cases, it is easiest done using pear

```
pear config-set auto_discover 1
pear install pear.phpunit.de/PHPUnit
```

Windows users might get help from [these directions](http://www.viper007bond.com/2012/08/21/installing-phpunit-on-windows/).

## Installing the WordPress test suite ##

If you have wp-cli installed, you can use that to install the wordpress test suite. More details can be found [here](http://wp-cli.org/blog/plugin-unit-tests.html). The installation command is

```
wp core init-tests ~/svn/wp-tests --dbname=wp_test --dbuser=root --dbpass=asd
mysql -u'root' -p'asd' -e 'CREATE DATABASE IF NOT EXISTS wp_test'
```

This will download the WordPress tests, add a new database and setup the `wp-tests-config.php` file for you.

### Manual install ###

To install manually, checkout the wordpress tests using svn. 

```
svn co http://develop.svn.wordpress.org/trunk/ ~/svn/wp-tests
cd ~/svn/wp-tests
```

Create a new empty database for the tests. (Important! The test suite will **delete all data** from the database so use a separate one for testing). Copy `wp-tests-config-sample.php` to `wp-tests-config.php` and enter the database credentials.

## Running the tests ##

The Thematic unit tests are configured to use a variable called `WP_TESTS_DIR` in order to find the WordPress test suite. This needs to point to the folder where you just downloaded the test suite files. You can supply it directly with the command when you run the tests.

The tests are divided into groups: default, legacy and overrides. Since some of these tests conflict with eachother they need to be run separately using the `--group` command line parameter 

```
cd wp-content/themes/thematic/library/tests
WP_TESTS_DIR=~/svn/wp-tests phpunit --group default
```

Or if you want, you can add the variable to your .bash_profile or equivalent. You can then run the tests simply with

```
phpunit --group default
```

The other test groups are run with 

```
phpunit --group legacy
```
and 
```
phpunit --group overrides
```

## Resources ##

- [PHPUnit installation instructions](http://phpunit.de/manual/current/en/installation.html)
- [WP-CLI WordPress unit test installation](http://wp-cli.org/blog/plugin-unit-tests.html)
- [The WordPress unit tests](http://make.wordpress.org/core/handbook/automated-testing/)