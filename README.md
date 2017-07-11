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


## Run the application
The input file used for the application is "data/cards.json". To run the application:
```bash
php index.php
```

## Unit Tests
Unit tests are located in the test folder. To run the tests: 
```bash
./vendor/phpunit/phpunit/phpunit
```

### Extending to new types
In order to introduce a new type of transportation with different characteristics, you only have to extend `AbstractBoardingCard` class.
 
### Complexity
The sorting algorithm has a linear complexity of O(n).