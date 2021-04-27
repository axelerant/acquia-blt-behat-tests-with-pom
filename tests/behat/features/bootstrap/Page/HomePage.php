<?php

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class HomePage extends Page
{
  protected $path = "/";

  protected $elements = [
    "About Us" =>
    [
      "xpath" => "//li[@class='menu-item']//a[contains(.,'About Us')]"
    ],
    "Articles" =>
    [
      "xpath" => "//li[@class='menu-item']//a[contains(.,'Articles')]"
    ],
    "Blogs" =>
    [
      "xpath" => "//li[@class='menu-item']//a[contains(.,'Blogs')]"
    ],
    "Contact" =>
    [
      "xpath" => "//li[@class='menu-item']//a[contains(.,'Contact')]"
    ],
    "Testimonials" =>
    [
      "xpath" => "//li[@class='menu-item']//a[contains(.,'Testimonials')]"
    ],
    "Login" =>
    [
      "xpath" => "//li[@class='menu-item']//a[contains(.,'Log in')]"
    ],
    "Logout" =>
    [
      "xpath" => "//li[@class='menu-item']//a[contains(.,'Log out')]"
    ]
  ];

  /**
   * @param string $text
   * @return boolean
   */
  public function linkExistsWithText($text)
  {
    return $this->hasElement($text);
  }

  /**
   * @param string $linkname
   */
  public function clickLink($linkname)
  {
    $link = $this->getElement($linkname);
    $link->click();
  }

}
