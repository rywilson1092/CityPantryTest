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

    protected function setUp(): void
    {
        $this->testVendorsCollection = $this->createMock( VendorsCollectionInterface::class );
        $this->testDate = new Datetime();
        $this->queryItems = new QueryItems( $this->testDate , self::TEST_LOCATION , self::TEST_COVERS, new DateTime() );
    }

    public function testQueryItemsCanConstruct() : void
    {
        $this->assertInstanceOf(QueryItems::class, $this->queryItems);
    }

    public function testCanGetItemsCollection() : void
    {
        $allItems = $this->queryItems->getItems( $this->testVendorsCollection );

        $this->assertInstanceOf( ItemsCollectionInterface::class , $allItems );
    }
}