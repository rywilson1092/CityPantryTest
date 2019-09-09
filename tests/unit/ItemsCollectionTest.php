<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\Collections\ItemsCollection;
use CityPantry\Interfaces\ItemInterface;

class ItemsCollectionsTest extends TestCase
{
    
    private $itemsCollection;
    private $itemMocksArray = array();
    
    CONST NUMBER_OF_ITEM_MOCKS = 5;

    /**
     * This fixture is used to setup the object that are used in the unit tests. We will test with an investor starting with 0
     *
     * @method void setUp()
     * @access protected
     * @return void
     */

    protected function setUp(): void
    {
        
        for( $i = 0; $i < self::NUMBER_OF_ITEM_MOCKS; $i++ ){
            array_push($this->itemMocksArray , $this->createMock( ItemInterface::class ) );
        }

        $this->itemsCollection = new ItemsCollection( ...$this->itemMocksArray );
    }

    /**
     * We will test here that the items collection class can construct
     *
     * @method void testItemsCollectionCanConstruct()
     * @access public
     * @return void
     */

    public function testItemsCollectionCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Collections\ItemsCollection', $this->itemsCollection);
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetItemsFromCollection()
     * @access public
     * @return void
     */

    public function testCanGetItemsFromCollection() : void
    {
        $this->assertEquals( $this->itemMocksArray , $this->itemsCollection->getItems());
    }
}