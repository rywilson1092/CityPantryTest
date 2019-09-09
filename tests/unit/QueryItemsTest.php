<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\QueryItems;
use CityPantry\Interfaces\VendorsCollectionInterface;
use CityPantry\Interfaces\ItemsCollectionInterface;

class QueryItemsTest extends TestCase
{
    const TEST_LOCATION = "EW3WD";
    const TEST_COVERS = 10;

    private $queryItems;
    private $testVendorsCollection;
    private $testItemsCollection;
    private $testDate;

    /**
     * This fixture is used to setup the object that are used in the unit tests. We will test with an investor starting with 0
     *
     * @method void setUp()
     * @access protected
     * @return void
     */

    protected function setUp(): void
    {
        $this->testVendorsCollection = $this->createMock( VendorsCollectionInterface::class );
        $this->testDate = new Datetime();
        $this->queryItems = new QueryItems( $this->testDate , self::TEST_LOCATION , self::TEST_COVERS, new DateTime() );
    }

    /**
     * We will test here that the item class can construct
     *
     * @method void testVendorCanConstruct()
     * @access public
     * @return void
     */

    public function testQueryItemsCanConstruct() : void
    {
        $this->assertInstanceOf(QueryItems::class, $this->queryItems);
    }

    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetName()
     * @access public
     * @return void
     */

    public function testCanGetItemsCollection() : void
    {
        $allItems = $this->queryItems->getItems( $this->testVendorsCollection );

        $this->assertInstanceOf( ItemsCollectionInterface::class , $allItems );
    }
}