# Gilded Rose Refactoring Kata
PHP Solution
------------
Updated PHP solution to the [Gilded Rose Refactoring Kata](https://github.com/emilybache/GildedRose-Refactoring-Kata).

It's using Docker container with PHP 7.4, Behat, PHPUnit, Infection.

This solution has `100% coverage` and `98% MSI`.

To enforce business rules there are Behat scenarios that use Gherkin language.

I've used Gold Master test strategy to ensure successful refactoring,
however, I've later switch to regular Behat and Unit tests.

Non-Anemic domain models were chosen for Inventory.

They are responsible for how they are built and how the behave
as the day passes.

`Quality` and `SellIn` are self-validating value objects.

Getting Started
---------------

To run the container, use
```
docker-compose up
```

To run unit / functional tests, use

```
docker-compose exec php vendor/bin/phpunit
```

To generate coverage report, use

```
docker-compose exec php vendor/bin/phpunit --coverage-html ./coverage
```

To run Behat tests, use

```
docker-compose exec php vendor/bin/behat
```

To run Infection (mutation) tests, use

```
docker-compose exec php ./infection.phar
```

Gold Master
---------------

`ResultGeneratorTest` compares GildedRose results with Gold Master `results.txt` data.

If you want to update `results.txt`, run this command:
```
docker-compose exec php php ./fixtures/texttest_fixture.php
```

Gold Master test runs together with Unit tests.

To run it solely, use:

```
docker-compose exec php vendor/bin/phpunit --filter=ResultGeneratorTest
```

Roll the credits
---------------
[2019 version that's outdated](https://github.com/prodigeris/PHP-GildedRose-Refactoring-Kata)

Arnas Kazlauskas
