<?php

namespace Drupal;

use Drupal\DrupalExtension\Context\RawDrupalContext;
use Page\HomePage;
use Page\SearchPage;

/** * FeatureContext class defines custom step definitions for Behat. */

class FeatureContext extends RawDrupalContext
{

  private $homePage;
  private $searchPage;

  /**
   * Every scenario gets its own context instance.
   * You can also pass arbitrary arguments to the * context constructor through behat.yml.
   */
  public function __construct(HomePage $homePage, SearchPage $searchPage)
  {
    $this->homePage = $homePage;
    $this->searchPage = $searchPage;
  }


  /**
   * @Given /^(?:|I )visited (?:|the )(?P<pageName>.*?)$/
   */
  public function iVisitedThe($pageName)
  {
    if (!isset($this->$pageName)) {
      throw new \RuntimeException(sprintf('Unrecognised page: "%s".', $pageName));
    }
    $this->$pageName->open();
  }

  /**
   * Wait for the page load.
   * @Given /^I wait for the page to load$/
   */
  public function iWaitForThePageToLoad()
  {
    $this->getSession()->wait(15000, "document.readyState === 'complete'");
  }
  
}
