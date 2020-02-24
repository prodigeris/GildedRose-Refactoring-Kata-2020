Feature: Sulfuras
  In order to be in the Gilded Rose
  As a sulfuras item
  I need to follow basic rules

  Scenario: Doesn't age
    Given There is "Sulfuras, Hand of Ragnaros" with sell in "2" and quality "80"
    When Day passes in Gilded Rose
    Then 0 item should be "Sulfuras, Hand of Ragnaros" with sell in "2" and quality "80"

  Scenario: Quality is always 80
    Given There is "Sulfuras, Hand of Ragnaros" with sell in "2" and quality "5"
    When Day passes in Gilded Rose
    Then 0 item should be "Sulfuras, Hand of Ragnaros" with sell in "2" and quality "80"


