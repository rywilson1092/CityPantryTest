<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\Collections\AllergiesCollection;

class AllergiesCollectionTest extends TestCase
{
    
    private $allergiesCollection;
    
    CONST ALLERGIES = array('allergie1' , 'allergie2' , 'allergie3');

    protected function setUp(): void
    {
        $this->allergiesCollection = new AllergiesCollection( ...self::ALLERGIES);

    }

    public function testAllergiesCollectionCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Collections\AllergiesCollection', $this->allergiesCollection);
    }
    
    public function testCanGetAllergiesFromCollection() : void
    {
        $this->assertEquals( self::ALLERGIES , $this->allergiesCollection->getAllergies());
    }
}