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

    /**
     * This fixture is used to setup the object that are used in the unit tests. We will test with an investor starting with 0
     *
     * @method void setUp()
     * @access protected
     * @return void
     */

    protected function setUp(): void
    {
        $this->allergiesCollectionMock = $this->createMock( AllergiesCollectionInterface::class);
        $this->item = new Item( self::TEST_NAME , self::TEST_ADVANCE_TIME , $this->allergiesCollectionMock );
    }

    /**
     * We will test here that the item class can construct
     *
     * @method void testItemCanConstruct()
     * @access public
     * @return void
     */

    public function testItemCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Item', $this->item);
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetName()
     * @access public
     * @return void
     */

    public function testCanGetName() : void
    {
        $this->assertEquals( self::TEST_NAME , $this->item->getName() );
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetName()
     * @access public
     * @return void
     */

    public function testCanGetAdvanceTime() : void
    {
        $this->assertEquals( self::TEST_ADVANCE_TIME , $this->item->getAdvanceTime() );
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetName()
     * @access public
     * @return void
    */

    public function testCanGetAllergies() : void
    {
        $this->assertEquals( $this->allergiesCollectionMock , $this->item->getAllergies() );
    }
}