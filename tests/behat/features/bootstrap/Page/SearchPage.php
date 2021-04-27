<?php

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class SearchPage extends Page
{
    /**
     * @var string
     */
    protected $path = '/search';
    /**
     * @var array
     */
    protected $elements = [
        "searchBox" =>
        [
          "css" => "#edit-keywords--2"
        ],
        "searchButton" =>
        [
          "css" => "#edit-submit-search--2"
        ],
      ];
      
    /**
     * @return boolean
     */
    public function hasSearchBox()
    {
        return $this->hasElement('searchBox');
    }

    /**
     * @param string $keywords
     */
    public function search($keywords)
    {
        $this->fillField("edit-keywords--2",$keywords);
        $this->pressButton('edit-submit-search--2');
    }

    /**
     * @param string $keywords
     *
     * @return integer
     */
    public function countResults($keywords)
    {
        $results = $this->findAll('xpath', '//h2//span[contains(.,"'.$keywords.'")]');
        return count($results);
    }
}
