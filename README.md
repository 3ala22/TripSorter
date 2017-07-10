## TripSorter
A small API that takes a list of unordered boarding passes, sorts them and output in a readable format. 

## Installation
To install TripSorter, run the composer install command from the root directory
of the project (make sure you have [Composer](http://getcomposer.org) installed):

```bash
php composer.phar install --prefer-dist
```

## Assumptions
- Input is read from a json file.
- A train and a flight must have a seat assignment.


## Unit Tests
Unit tests are located in the test folder. To run the tests: 
```bash
./vendor/phpunit/phpunit/phpunit
```