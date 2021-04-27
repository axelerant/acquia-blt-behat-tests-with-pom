<?php

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class LoginPage extends Page
{
  protected $path = '/user/login/';

  /**
   * @param string $uname
   * @param string $pwd
   */
  public function iSubmitTheLoginFormWithCredentials($uname, $pwd)
  {
    $this->findField('name')->setValue($uname);
    $this->findField('pass')->setValue($pwd);
    $this->pressButton('edit-submit');
  }
}
