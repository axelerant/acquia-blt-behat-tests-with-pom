@pom @login
Feature: Login Form
  As a User
  Verify Login Form

  Rule:
    - Implement Page Object Extension in Behat

Background:
  Given I visited homePage
  And I should see "Login" link
  And I hit the "Login" link

@smoke @admin_login_success 
Scenario: Verify login form for Admin with valid credentials
  When I submit the login form with username "admin" and password "admin"
  Then I should see "Moderation Dashboard"
  And I should see "Logout" link
  And I hit the "Logout" link

@negative @login_failure
Scenario: Verify login form for with invalid credentials
  When I submit the login form with username "xxxx" and password "yyyy"
  Then I should see "Unrecognized username or password."
  And I should not see "Moderation Dashboard"
