Feature: Backstage passes
  In order to be in the Gilded Rose
  As a backstage passes item
  I need to follow special rules

  Scenario: Quality increases when ages
    Given There is "Backstage passes to a TAFKAL80ETC concert" with sell in "20" and quality "20"
    When Day passes in Gilded Rose
    Then 0 item should be "Backstage passes to a TAFKAL80ETC concert" with sell in "19" and quality "21"

  Scenario: Quality increases by 2 when there are 10 days or less
    Given There is "Backstage passes to a TAFKAL80ETC concert" with sell in "10" and quality "20"
    When Day passes in Gilded Rose
    Then 0 item should be "Backstage passes to a TAFKAL80ETC concert" with sell in "9" and quality "22"

  Scenario: Quality increases by 3 when there are 5 days or less
    Given There is "Backstage passes to a TAFKAL80ETC concert" with sell in "5" and quality "20"
    When Day passes in Gilded Rose
    Then 0 item should be "Backstage passes to a TAFKAL80ETC concert" with sell in "4" and quality "23"

  Scenario: Quality drops to zero after concert
    Given There is "Backstage passes to a TAFKAL80ETC concert" with sell in "0" and quality "20"
    When Day passes in Gilded Rose
    Then 0 item should be "Backstage passes to a TAFKAL80ETC concert" with sell in "-1" and quality "0"

