<?php

use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;

class SearchContext extends PageObjectContext
{

    /**
     * @When /^I should see the search box$/
     */
    public function iShouldSeeTheSearchBox()
    {
        expect($this->getPage('SearchPage')->hasSearchBox())->toBe(true);
    }

    /**
     * @When /^I search for "(?P<keywords>[^"]*)"$/
     */
    public function iSearchFor($keywords)
    {
        $this->getPage('SearchPage')->search($keywords);
    }

    /**
     * @Then /^I should see the content "(?P<keywords>[^"]*)"$/
     */
    public function iShouldSeeContent($keywords)
    {
        expect($this->getPage('SearchPage')->countResults($keywords))->toBe(1);
    }
}
