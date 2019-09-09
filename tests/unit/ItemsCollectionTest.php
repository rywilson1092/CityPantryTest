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

    protected function setUp(): void
    {
        
        for( $i = 0; $i < self::NUMBER_OF_ITEM_MOCKS; $i++ ){
            array_push($this->itemMocksArray , $this->createMock( ItemInterface::class ) );
        }

        $this->itemsCollection = new ItemsCollection( ...$this->itemMocksArray );
    }

    public function testItemsCollectionCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Collections\ItemsCollection', $this->itemsCollection);
    }

    public function testCanGetItemsFromCollection() : void
    {
        $this->assertEquals( $this->itemMocksArray , $this->itemsCollection->getItems());
    }
}