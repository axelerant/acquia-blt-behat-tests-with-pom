@pom @search
Feature: Search
    In order to find the content
    As a content editor
    I want to search the content and get the expected results

    Rule:
        - Implement Page Object Extension in Behat

Background: 
    Given I visited searchPage
    And I should see the search box

@article-search @smoke
Scenario: Searching for Articles
    When I search for "Articles"
    Then I should see the content "Articles"

@blogs-search @smoke
Scenario: Searching for Blogs
    When I search for "Blogs"
    Then I should see the content "Blogs"

@testimonials-search @smoke
Scenario: Searching for Testimonials
    When I search for "Testimonials"
    Then I should see the content "Testimonials"

@contact-search @smoke
Scenario: Searching for Contact
    When I search for "Contact"
    Then I should see the content "Contact"

@incorrect-search @negative
Scenario: Searching for Contact
    When I search for "XXXX"
    Then I should see "Your search did not return any results."