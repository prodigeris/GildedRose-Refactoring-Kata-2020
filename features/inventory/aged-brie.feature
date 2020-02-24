Feature: Aged Brie
  In order to be in the Gilded Rose
  As a aged brie item
  I need to follow special rules

  Scenario: Quality increases when ages
    Given There is "Aged Brie" with sell in "2" and quality "20"
    When Day passes in Gilded Rose
    Then 0 item should be "Aged Brie" with sell in "1" and quality "21"

  Scenario: Quality cannot go above 50
    Given There is "Aged Brie" with sell in "2" and quality "50"
    When Day passes in Gilded Rose
    Then 0 item should be "Aged Brie" with sell in "1" and quality "50"

  Scenario: Quality cannot go below 0
    Given There is "Aged Brie" with sell in "2" and quality "-2"
    When Day passes in Gilded Rose
    Then 0 item should be "Aged Brie" with sell in "1" and quality "1"


