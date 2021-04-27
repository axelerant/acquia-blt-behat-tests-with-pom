<?php

use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;

class LoginContext extends PageObjectContext
{

  /**
   * @When /^I submit the login form with username "(?P<uname>(?:[^"]|\\")*)" and password "(?P<pwd>(?:[^"]|\\")*)"$/
   * Example: When I submit the login form with username "username" and password "password"
   */
  public function iSubmitTheLoginFormWithCredentials($uname,$pwd)
  {
    $this->getPage('LoginPage')->iSubmitTheLoginFormWithCredentials($uname,$pwd);
  }


}
