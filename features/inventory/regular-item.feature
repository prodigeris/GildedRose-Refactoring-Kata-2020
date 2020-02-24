Feature: Regular item
  In order to be in the Gilded Rose
  As a regular item
  I need to follow basic rules

  Scenario: Quality decreases by 1
    Given There is "+5 Dexterity Vest" with sell in "2" and quality "20"
    And There is "Elixir of the Mongoose" with sell in "5" and quality "20"
    When Day passes in Gilded Rose
    Then 0 item should be "+5 Dexterity Vest" with sell in "1" and quality "19"
    Then 1 item should be "Elixir of the Mongoose" with sell in "4" and quality "19"

  Scenario: Quality cannot be above 50
    Given There is "+5 Dexterity Vest" with sell in "2" and quality "60"
    And There is "Elixir of the Mongoose" with sell in "5" and quality "60"
    When Day passes in Gilded Rose
    Then 0 item should be "+5 Dexterity Vest" with sell in "1" and quality "49"
    Then 1 item should be "Elixir of the Mongoose" with sell in "4" and quality "49"

  Scenario: Quality cannot go below 0
    Given There is "+5 Dexterity Vest" with sell in "2" and quality "0"
    And There is "Elixir of the Mongoose" with sell in "5" and quality "0"
    When Day passes in Gilded Rose
    Then 0 item should be "+5 Dexterity Vest" with sell in "1" and quality "0"
    Then 1 item should be "Elixir of the Mongoose" with sell in "4" and quality "0"

  Scenario: Quality decreases by 2 after sell in has passed
    Given There is "+5 Dexterity Vest" with sell in "0" and quality "10"
    And There is "Elixir of the Mongoose" with sell in "0" and quality "10"
    When Day passes in Gilded Rose
    Then 0 item should be "+5 Dexterity Vest" with sell in "-1" and quality "8"
    Then 1 item should be "Elixir of the Mongoose" with sell in "-1" and quality "8"


