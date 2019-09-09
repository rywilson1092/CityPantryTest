<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\Collections\AllergiesCollection;

class AllergiesCollectionTest extends TestCase
{
    
    private $allergiesCollection;
    
    CONST ALLERGIES = array('allergie1' , 'allergie2' , 'allergie3');

    /**
     * This fixture is used to setup the object that are used in the unit tests. We will test with an investor starting with 0
     *
     * @method void setUp()
     * @access protected
     * @return void
     */

    protected function setUp(): void
    {
        $this->allergiesCollection = new AllergiesCollection( ...self::ALLERGIES);

    }

    /**
     * We will test here that the allergies collection class can construct
     *
     * @method void testAllergiesCollectionCanConstruct()
     * @access public
     * @return void
     */

    public function testAllergiesCollectionCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Collections\AllergiesCollection', $this->allergiesCollection);
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetAllergiesFromCollection()
     * @access public
     * @return void
     */

    public function testCanGetAllergiesFromCollection() : void
    {
        $this->assertEquals( self::ALLERGIES , $this->allergiesCollection->getAllergies());
    }
}