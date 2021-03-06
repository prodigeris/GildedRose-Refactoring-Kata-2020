Feature: Conjured Mana Cake
  In order to be in the Gilded Rose
  As a conjured mana cake item
  I need to follow special rules

  Scenario: Ages twice as fast as normal
    Given There is "Conjured Mana Cake" with sell in "2" and quality "4"
    When Day passes in Gilded Rose
    Then 0 item should be "Conjured Mana Cake" with sell in "1" and quality "2"

  Scenario: Ages twice as fast when sell in has passed
    Given There is "Conjured Mana Cake" with sell in "0" and quality "10"
    When Day passes in Gilded Rose
    Then 0 item should be "Conjured Mana Cake" with sell in "-1" and quality "6"

  Scenario: Quality cannot go lower than 0
    Given There is "Conjured Mana Cake" with sell in "2" and quality "0"
    When Day passes in Gilded Rose
    Then 0 item should be "Conjured Mana Cake" with sell in "1" and quality "0"

  Scenario: Quality cannot be above 50
    Given There is "Conjured Mana Cake" with sell in "2" and quality "80"
    When Day passes in Gilded Rose
    Then 0 item should be "Conjured Mana Cake" with sell in "1" and quality "48"

