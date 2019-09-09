<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\Item;
use CityPantry\Interfaces\AllergiesCollectionInterface;

class ItemTest extends TestCase
{
    
    private $item;
    private $allergiesCollectionMock;

    CONST TEST_NAME = "Test Item";
    CONST TEST_ADVANCE_TIME = "12h";

    protected function setUp(): void
    {
        $this->allergiesCollectionMock = $this->createMock( AllergiesCollectionInterface::class);
        $this->item = new Item( self::TEST_NAME , self::TEST_ADVANCE_TIME , $this->allergiesCollectionMock );
    }

    public function testItemCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Item', $this->item);
    }

    public function testCanGetName() : void
    {
        $this->assertEquals( self::TEST_NAME , $this->item->getName() );
    }

    public function testCanGetAdvanceTime() : void
    {
        $this->assertEquals( self::TEST_ADVANCE_TIME , $this->item->getAdvanceTime() );
    }

    public function testCanGetAllergies() : void
    {
        $this->assertEquals( $this->allergiesCollectionMock , $this->item->getAllergies() );
    }
}