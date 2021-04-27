<?php

use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;

class HomeContext extends PageObjectContext
{

    /**
     * @Then I should see :arg1 link
     */  
    public function iShouldSeeLink($arg1)
    {
        expect($this->getPage('HomePage')->linkExistsWithText($arg1))->toBe(true);
    }
    /**
     * @Given I hit the :arg1 link
     */
    public function iHitTheLink($arg1)
    {
        $this->getPage('HomePage')->clickLink($arg1);
    }
}
